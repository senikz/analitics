<?php
namespace App\Model\Entity\Account;

use Cake\ORM\TableRegistry;
use App\Utility\ReportParser;

use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201802\cm\ReportDefinitionReportType;
use Google\AdsApi\AdWords\Reporting\v201802\DownloadFormat;
use Google\AdsApi\AdWords\Reporting\v201802\ReportDownloader;
use Google\AdsApi\AdWords\Reporting\v201802\ReportDefinition;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\Common\OAuth2TokenBuilder;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\v201802\cm\Selector;
use Google\AdsApi\AdWords\v201802\cm\Predicate;
use Google\AdsApi\AdWords\v201802\cm\Paging;
use Google\AdsApi\AdWords\v201802\cm\DateRange;
use Google\AdsApi\AdWords\v201802\cm\PredicateOperator;
use Google\AdsApi\AdWords\v201802\cm\CampaignService;
use Google\AdsApi\AdWords\v201802\cm\CampaignCriterionService;
use Google\AdsApi\AdWords\v201802\cm\AdGroupService;
use Google\AdsApi\AdWords\v201802\cm\AdGroupCriterionService;
use Google\AdsApi\AdWords\v201802\cm\CriterionType;
use Google\AdsApi\AdWords\Reporting\v201802\ReportDefinitionDateRangeType;



class Adwords extends \App\Model\Entity\Account
{
	const TYPE = 'adwords';
	const TYPE_HUMAN = 'Google Adwords';
	const OPTIONS = ['clientCustomerId'];

	const PAGE_LIMIT = 2000;

    protected $session;

	public function isCampaignable()
	{
		return true;
	}

    public function getSession()
    {
        if (!empty($this->session)) {
            return $this->session;
        }

		$this->session = (new AdWordsSessionBuilder())
		    ->fromFile(ADWORDS_CONF_PATH)
			->withClientCustomerId($this->option('clientCustomerId'))
		    ->withOAuth2Credential((new OAuth2TokenBuilder())
	            ->fromFile(ADWORDS_CONF_PATH)
	            ->build())
		    ->build();

        return $this->session;
    }

	protected function getService($classname)
	{
		return (new AdWordsServices())->get($this->getSession(), $classname);
	}

	public function loadDailyStatisticsReport($date, $type, $fields, $predicates = null)
	{
		$perfomance = ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT;

		$selector = (new Selector())
			->setFields($fields);

		if (!empty($predicate)) {
			$selector->setPredicates($predicates);
		}

		$reportDefinition = new ReportDefinition();

		if ($date == date('Y-m-d')) {
			$reportDefinition->setDateRangeType(ReportDefinitionDateRangeType::TODAY);
		} else {
			$date = date('Ymd', strtotime($date));
			$reportDefinition->setDateRangeType(ReportDefinitionDateRangeType::CUSTOM_DATE);
			$selector->setDateRange((new DateRange())
				->setMin($date)
				->setMax($date)
			);
		}

		$reportDefinition->setSelector($selector);
		$reportDefinition->setReportName('Criteria performance report #' . uniqid());
		$reportDefinition->setReportType($type);
		$reportDefinition->setDownloadFormat(DownloadFormat::CSV);

		$reportDownloadResult = (new ReportDownloader($this->getSession()))
			->downloadReport(
				$reportDefinition,
				(new ReportSettingsBuilder())
					->includeZeroImpressions(true)
					->build()
			);

		return ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']);
	}

	public function syncCampaigns()
	{
		$campaignsTable = TableRegistry::get('Campaigns');

		$services = new AdWordsServices();
		$session = $this->getSession();

		$campaignService = $services->get($session, CampaignService::class);
		$campaigns = $campaignService->get((new Selector())->setFields(['Id', 'Name']))->getEntries();

		if ($campaigns === null) {
			return;
		}

		$campaignsFoundIds = [];

		foreach ($campaigns as $campaign) {
			$campaignsFoundIds[] = $campaign->getId();
			$found = $campaignsTable->find()->where(['account_id' => $this->id, 'rel_id' => $campaign->getId()])->first();

			if (!$found) {
				$found = $campaignsTable->newEntity();
				$found->account_id = $this->id;
				$found->rel_id = $campaign->getId();
			}

			$found->caption = $campaign->getName();
			$found = $campaignsTable->save($found);

			$this->syncCampaign($found);
		}

		if (!empty($campaignsFoundIds)) {
			$campaignsTable->deleteAll([
				'account_id' => $this->id,
				'rel_id NOT IN' => $campaignsFoundIds,
			]);
		}
	}

	public function syncCampaign(\App\Model\Entity\Campaign $campaign)
	{
		$this->syncCampaignAdGroups($campaign);
		$this->syncCampaignKeywords($campaign);
	}

	public function syncCampaignAdGroups(\App\Model\Entity\Campaign $campaign)
	{
		$adGroupsService = $this->getService(AdGroupService::class);
		$adGroupsTable = TableRegistry::get('AdGroups');
		$adGSelector = (new Selector())
			->setFields(['Id', 'Name'])
			->setPredicates([
	                new Predicate('CampaignId', PredicateOperator::IN, [$campaign->rel_id])
            ])
	        ->setPaging(new Paging(0, self::PAGE_LIMIT));

		$totalNumEntries = 0;
		do {
			$adGPage = $adGroupsService->get($adGSelector);
			$adGroupsFoundIds = [];
			$adGroupsUpdate = $adGroupsTable->query()
				->insert(['rel_id', 'campaign_id', 'name']);

			if ($adGPage->getEntries() !== null) {
				$totalNumEntries = $adGPage->getTotalNumEntries();
				foreach ($adGPage->getEntries() as $adGroup) {
					$adGroupsFoundIds[] = $adGroup->getId();
					$adGroupsUpdate->values([
						'rel_id' => $adGroup->getId(),
						'campaign_id' => $campaign->id,
						'name' => $adGroup->getName(),
					]);
				}

				$adGroupsUpdate
					->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')
					->execute();

				$adGroupsTable->deleteAll([
					'campaign_id' => $campaign->id,
					'rel_id NOT IN' => $adGroupsFoundIds,
				]);
			}

			$adGSelector->getPaging()->setStartIndex(
				$adGSelector->getPaging()->getStartIndex() + self::PAGE_LIMIT
			);
		} while ($adGSelector->getPaging()->getStartIndex() < $totalNumEntries);
	}

	public function syncCampaignKeywords(\App\Model\Entity\Campaign $campaign)
	{
		$adGroupIds = [];
		$adGroupsTable = TableRegistry::get('AdGroups');
		$adGroupsLocal = $adGroupsTable->find()->where(['campaign_id' => $campaign->id])->all();

		foreach ($adGroupsLocal as $ag) {
			$adGroupIds[] = $ag->rel_id;
		}

		$keywordsService = $this->getService(AdGroupCriterionService::class);
		$keywordsTable = TableRegistry::get('Keywords');
		$kSelector = (new Selector())
			->setFields(['Id', 'KeywordText', 'AdGroupId', 'BaseCampaignId'])
			->setPredicates([
	                new Predicate('AdGroupId', PredicateOperator::IN, $adGroupIds)
            ])
	        ->setPaging(new Paging(0, self::PAGE_LIMIT));

		$totalNumEntries = 0;
		do {
			$kPage = $keywordsService->get($kSelector);
			$keywordsFoundIds = [];
			$kUpdate = $keywordsTable->query()
				->insert(['rel_id', 'ad_group_id', 'campaign_id', 'keyword']);

			$entries = $kPage->getEntries();

			if ($entries !== null) {
				$totalNumEntries = $kPage->getTotalNumEntries();
				foreach ($entries as $criterion) {
					$keyword = $criterion->getCriterion();
					if ($keyword->getType() !== CriterionType::KEYWORD) {
						continue;
					}
					foreach ($adGroupsLocal as $ag) {
						if ($ag->rel_id == $criterion->getAdGroupId()) {
							$adGroup = $ag;
							break;
						}
					}

					$keywordsFoundIds[] = $keyword->getId();
					$kUpdate->values([
						'rel_id' => $keyword->getId(),
						'ad_group_id' => $adGroup->id,
						'campaign_id' => $campaign->id,
						'keyword' => $keyword->getText(),
					]);
				}

				if (!empty($keywordsFoundIds)) {
					$kUpdate
						->epilog('ON DUPLICATE KEY UPDATE `keyword`=VALUES(`keyword`)')
						->execute();

					$keywordsTable->deleteAll([
						'ad_group_id' => $adGroup->id,
						'campaign_id' => $adGroup->campaign_id,
						'rel_id NOT IN' => $keywordsFoundIds,
					]);
				}
			}

			$kSelector->getPaging()->setStartIndex(
				$kSelector->getPaging()->getStartIndex() + self::PAGE_LIMIT
			);
		} while ($kSelector->getPaging()->getStartIndex() < $totalNumEntries);
	}

	public function updateCampaignsDailyStatistics($date)
	{
		$report = $this->loadDailyStatisticsReport(
			$date,
			ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT,
			['CampaignId', 'Impressions', 'Clicks', 'Cost']
		);

		if (empty($report)) {
			return false;
		}

		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');
		$statDailyTable->saveCampaignsReport($report, $date, 'Campaign ID', null, 1000000);
	}

	public function updateCampaignsContentStatistics($date)
	{
		$campaignsTable = TableRegistry::get('Campaigns');
		$campaignIds = $campaignsTable->find('list', ['valueField' => 'rel_id'])->where(['account_id' => $this->id])->toArray();

		if (empty($campaignIds)) {
			return true;
		}

		$report = $this->loadDailyStatisticsReport(
			$date,
			ReportDefinitionReportType::CRITERIA_PERFORMANCE_REPORT,
			['CampaignId', 'AdGroupId', 'Criteria', 'Id', 'Impressions', 'Clicks', 'Cost'],
			[
				new Predicate('CampaignId', PredicateOperator::EQUALS, $campaignIds),
			]
		);

		if (empty($report)) {
			return false;
		}

		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');
		$statDailyTable->saveCampaignsContentReport($report, $date, 'Ad group ID', 'Keyword ID', null, 1000000);
	}
}
