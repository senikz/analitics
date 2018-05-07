<?php
namespace App\Model\Entity\Source;

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

class Direct extends \App\Model\Entity\Source
{
	const TYPE = 'direct';
	const TYPE_HUMAN = 'Яндекс.Директ';

	const SYNC_STATES = ['ON'];

    protected function getProvider()
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

	public function syncCampaigns()
	{
		$campaignsTable = TableRegistry::get('Campaigns');
		$provider = $this->getProvider();

		if (!$provider) {
            return false;
        }

		$campaignsService = $provider->getCampaignsService();
		$campaigns = $campaignsService->get(
			GetCampaignsRequest::create()
				->setFieldNames([
					CampaignFieldEnum::ID,
					CampaignFieldEnum::NAME,
					CampaignFieldEnum::STATE,
				])
		)->getCampaigns();

		if ($campaigns === null) {
			return;
		}

		$campaignsFoundIds = [];

		foreach ($campaigns as $campaign) {
			if (!in_array($campaign->getState(), self::SYNC_STATES)) {
				continue;
			}

			$campaignsFoundIds[] = $campaign->getId();
			$found = $campaignsTable->find()->where(['source_id' => $this->id, 'rel_id' => $campaign->getId()])->first();

			if (!$found) {
				$found = $campaignsTable->newEntity();
				$found->source_id = $this->id;
				$found->rel_id = $campaign->getId();
			}

			$found->caption = $campaign->getName();
			$found = $campaignsTable->save($found);

			$this->syncCampaign($found);
		}

		if (!empty($campaignsFoundIds)) {
			$campaignsTable->deleteAll([
				'source_id' => $this->id,
				'rel_id NOT IN' => $campaignsFoundIds,
			]);
		}
	}

    public function syncCampaign(\App\Model\Entity\Campaign $campaign)
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

	public function loadDailyStatisticsReport($date = null)
	{
		$fieldNames = [FieldEnum::CAMPAIGN_ID, FieldEnum::COST, FieldEnum::IMPRESSIONS, FieldEnum::CLICKS];

		$provider = $this->getProvider();
		$reportService = $provider->getReportsService();

		$reportRequest = (new ReportRequest)
			->setProcessingMode(ReportRequest::PROCESSING_MODE_ONLINE)
			->returnMoneyAsFloat()
			->setDefinition(
				(new ReportDefinitionBuilder)
					->setFieldNames($fieldNames)
					->setReportName('Statistics report 1001')
					->setReportType(ReportTypeEnum::CAMPAIGN_PERFORMANCE_REPORT)
					->setDateRangeType(DateRangeTypeEnum::TODAY)
					->includeVat()
					->setFormat(FormatEnum::TSV)
			);

		return ReportParser::parseCsv($reportService->getReady($reportRequest)->getData(), ['col_delimiter' => '\t']);
	}

	public function updateCampaignsDailyStatistics($date)
	{
		$report = $this->loadDailyStatisticsReport($date);
		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');

		if (empty($report)) {
			return false;
		}

		$statDailyTable->saveCampaignsReport($report, $date, 'CampaignId');
	}
}
