<?php
namespace App\Model\Entity\Account;

use Cake\ORM\TableRegistry;
use App\Utility\ReportParser;

use Biplane\YandexDirect\User;
use Biplane\YandexDirect\Api\V5\Contract\KeywordFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\AdGroupFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\CampaignFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\GetCampaignsRequest;
use Biplane\YandexDirect\Api\V5\Contract\GetReportsRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportDefinitionBuilder;
use Biplane\YandexDirect\Api\V5\Report\FieldEnum;
use Biplane\YandexDirect\Api\V5\Report\ReportTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\DateRangeTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\FormatEnum;
use Biplane\YandexDirect\Api\V5\Report\FilterOperatorEnum;

class Direct extends \App\Model\Entity\Account
{
	use \App\Model\YandexAccountTrait;

	const TYPE = 'direct';
	const TYPE_HUMAN = 'Яндекс.Директ';

	const SYNC_STATES = ['ON'];

	public function isCampaignable()
	{
		return true;
	}

    public function getProvider()
    {
        return new User([
            'access_token' => $this->option('token'),
            'login' => $this->option('login'),
            'locale' => User::LOCALE_RU,
        ]);
    }

    /*public function updateLimits($service)
    {
        $this->credential->updateLimits($service->getUnits()->getRest());
    }*/

	public function getCampaigns()
	{
		$provider = $this->getProvider();
		if (!$provider) {
			return false;
		}

		$campaignsService = $provider->getCampaignsService();
		return $campaignsService->get(
			GetCampaignsRequest::create()
				->setFieldNames([
					CampaignFieldEnum::ID,
					CampaignFieldEnum::NAME,
					CampaignFieldEnum::STATE,
				])
		)->getCampaigns();
	}

	public function syncCampaigns($options = [])
	{
		$campaignsTable = TableRegistry::get('Campaigns');
		$campaigns = $this->getCampaigns();

		if ($campaigns === null) {
			return;
		}

		$campaignsFoundIds = [];

		foreach ($campaigns as $campaign) {
			if (!in_array($campaign->getState(), self::SYNC_STATES)) {
				continue;
			}

			$campaignsFoundIds[] = $campaign->getId();
			$found = $campaignsTable->find()->where(['account_id' => $this->id, 'rel_id' => $campaign->getId()])->first();

			if (!$found) {
				$found = $campaignsTable->newEntity();
				$found->account_id = $this->id;
				$found->rel_id = $campaign->getId();
			}

			$found->caption = $campaign->getName();
			$found = $campaignsTable->save($found);

			if (!empty($options['load_content']) && $options['load_content']) {
				$this->loadCampaignContents($found);
			}
		}

		if (!empty($campaignsFoundIds) && empty($options['ignore_blank'])) {
			$campaignsTable->updateAll(
				[
					'deleted' => 1,
				], [
					'account_id' => $this->id,
					'rel_id NOT IN' => $campaignsFoundIds,
				]);
		}
	}

    public function syncCampaignContents($campaignIds)
    {
		$campaignIds = is_array($campaignIds) ? $campaignIds : [$campaignIds];
		$campaignsTable = TableRegistry::get('Campaigns');
		foreach ($campaignIds as $campaignId) {
			$campaign = $campaignsTable->get($campaignId);
			$this->loadCampaignContents($campaign);
		}
    }

	public function loadDailyStatisticsReport($date, $type, $fields, $filter = null)
	{
		$provider = $this->getProvider();
		$reportService = $provider->getReportsService();

		$reportDefinition = (new ReportDefinitionBuilder)
			->setFieldNames($fields)
			->setReportName('Statistics report #' . uniqid())
			->setReportType($type);

		if ($date == date('Y-m-d')) {
			$reportDefinition->setDateRangeType(DateRangeTypeEnum::TODAY);
		} else {
			$reportDefinition->setDateRangeType(DateRangeTypeEnum::CUSTOM_DATE, $date, $date);
		}

		$reportDefinition
			->includeVat()
			->setFormat(FormatEnum::TSV);

		if ($filter) {
			call_user_func_array([$reportDefinition, 'addFilter'], $filter);
		}

		$reportRequest = (new ReportRequest)
			->setProcessingMode(ReportRequest::PROCESSING_MODE_AUTO)
			->returnMoneyAsFloat()
			->setDefinition($reportDefinition);

		return ReportParser::parseCsv($reportService->getReady($reportRequest)->getData(), ['col_delimiter' => '\t']);
	}

	public function cronJob()
	{
		$date = date('Y-m-d');
		$report = $this->loadDailyStatisticsReport(
			$date,
			ReportTypeEnum::CAMPAIGN_PERFORMANCE_REPORT,
			[FieldEnum::CAMPAIGN_ID, FieldEnum::COST, FieldEnum::IMPRESSIONS, FieldEnum::CLICKS]
		);
		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');

		if (empty($report)) {
			return false;
		}

		$statDailyTable->saveCampaignsReport($report, $date, 'CampaignId');
	}

	public function dailyCronJob($date)
	{
		$campaignsTable = TableRegistry::get('Campaigns');
		$campaignIds = $campaignsTable->find('list', ['valueField' => 'rel_id'])->where(['account_id' => $this->id])->toArray();

		if (empty($campaignIds)) {
			return true;
		}

		$report = $this->loadDailyStatisticsReport(
			$date,
			ReportTypeEnum::SEARCH_QUERY_PERFORMANCE_REPORT,
			[FieldEnum::CAMPAIGN_ID, FieldEnum::AD_GROUP_ID,  FieldEnum::CRITERIA_TYPE, FieldEnum::CRITERIA_ID, FieldEnum::COST, FieldEnum::IMPRESSIONS, FieldEnum::CLICKS],
			[FieldEnum::CAMPAIGN_ID, FilterOperatorEnum::IN, $campaignIds]
		);

		if (empty($report)) {
			return false;
		}

		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');
		$statDailyTable->saveCampaignsContentReport($report, $date);
	}

	private function loadCampaignContents($campaign)
	{
		$provider = $this->getProvider();

		if (!$provider) {
			return false;
		}

		$adGroupsService = $provider->getAdGroupsService();
		$adGroups = $adGroupsService->get(
			\Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsRequest::create()
				->setSelectionCriteria(
					\Biplane\YandexDirect\Api\V5\Contract\AdGroupsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id])
				)
				->setFieldNames([
					AdGroupFieldEnum::ID,
					AdGroupFieldEnum::NAME,
					AdGroupFieldEnum::CAMPAIGN_ID,
				])
		)->getAdGroups();
		//$this->updateLimits($adGroupsService);

		if (!empty($adGroups)) {
			$adGroupsTable = TableRegistry::get('AdGroups');
			$adGroupsIds = [];

			foreach ($adGroups as $group) {
				$groupDetails = $adGroupsTable->find('all', ['conditions' => ['rel_id' => $group->getId()]])->first();
				if (!$groupDetails) {
					$groupDetails = $adGroupsTable->newEntity(['rel_id' => $group->getId(), 'campaign_id' => $campaign->id]);
				}
				$groupDetails->name = $group->getName();
				$adGroupsTable->save($groupDetails);

				$adGroupsIds[$group->getId()] = $groupDetails->id;
			}

			$adGroupsTable->deleteAll([
				'AdGroups.campaign_id' => $campaign->id,
				'AdGroups.rel_id NOT IN' => array_keys($adGroupsIds),
			]);

			$keywordsService = $provider->getKeywordsService();
			$keywords = $keywordsService->get(
				\Biplane\YandexDirect\Api\V5\Contract\GetKeywordsRequest::create()
					->setSelectionCriteria(
						\Biplane\YandexDirect\Api\V5\Contract\KeywordsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id])
					)
					->setFieldNames([
						KeywordFieldEnum::ID,
						KeywordFieldEnum::AD_GROUP_ID,
						KeywordFieldEnum::KEYWORD,
					])
			)->getKeywords();
			//$this->updateLimits($keywordsService);

			if (!empty($keywords)) {
				$keywordsTable = TableRegistry::get('Keywords');
				$keywordsIds = [];

				$query = $keywordsTable->query()->insert(['rel_id', 'campaign_id', 'ad_group_id', 'keyword']);

				foreach ($keywords as $keyword) {
					$keywordsIds[] = $keyword->getId();
					$query->values(['rel_id' => $keyword->getId(), 'campaign_id' => $campaign->id, 'ad_group_id' => $adGroupsIds[$keyword->getAdGroupId()], 'keyword' => $keyword->getKeyword()]);
				}

				$query->epilog('ON DUPLICATE KEY UPDATE `keyword`=values(`keyword`)')->execute();

				$keywordsTable->deleteAll([
					'Keywords.campaign_id' => $campaign->id,
					'Keywords.rel_id NOT IN' => $keywordsIds,
				]);
			}

			return true;
		}
	}
}
