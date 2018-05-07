<?php
namespace App\Model\Entity\Source;

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
use Google\AdsApi\AdWords\v201802\cm\AdGroupService;
use Google\AdsApi\AdWords\v201802\cm\AdGroupCriterionService;
use Google\AdsApi\AdWords\v201802\cm\CriterionType;
use Google\AdsApi\AdWords\Reporting\v201802\ReportDefinitionDateRangeType;



class Adwords extends \App\Model\Entity\Source
{
	const TYPE = 'adwords';
	const TYPE_HUMAN = 'Google Adwords';

	const PAGE_LIMIT = 200;

    protected $session;

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

    public function loadCampaignStatisticsReport(\App\Model\Entity\Campaign $campaign, $period, array $fields)
    {
		$perfomance = ReportDefinitionReportType::CRITERIA_PERFORMANCE_REPORT;
		$selector = (new Selector())->setFields($fields);
			/*->setPredicates(
				[
                	//new Predicate('CampaignId', PredicateOperator::EQUALS, [$campaign->rel_id]),
					new Predicate('AdGroupId', PredicateOperator::EQUALS, [49600285846])
            	]
			);*/

        $reportDefinition = new ReportDefinition();
        $reportDefinition->setSelector($selector);
    	$reportDefinition->setReportName('Criteria performance report #' . uniqid());
    	$reportDefinition->setDateRangeType($period);
        $reportDefinition->setReportType($perfomance);
        $reportDefinition->setDownloadFormat(DownloadFormat::CSV);

        $reportDownloadResult = (new ReportDownloader($this->getSession()))
			->downloadReport(
				$reportDefinition,
				(new ReportSettingsBuilder())
		            ->includeZeroImpressions(true)
		            ->build()
			);
		//echo ($reportDownloadResult->getAsString());
		//print_r(ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']));
		//exit;
        return ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']);
    }

	public function loadDailyStatisticsReport($date = null)
	{
		$fields = ['CampaignId', 'Impressions', 'Clicks', 'Cost'];
		$perfomance = ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT;

		$selector = (new Selector())
			->setFields($fields);

		$reportDefinition = new ReportDefinition();

		if ($date) {
			$date = date('Ymd', strtotime($date));
			$reportDefinition->setDateRangeType(ReportDefinitionDateRangeType::CUSTOM_DATE);
			$selector->setDateRange((new DateRange())
				->setMin($date)
				->setMax($date)
			);
		} else {
			$reportDefinition->setDateRangeType(ReportDefinitionDateRangeType::TODAY);
		}

		$reportDefinition->setSelector($selector);
		$reportDefinition->setReportName('Criteria performance report #' . uniqid());
		$reportDefinition->setReportType($perfomance);
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
		$selector = new Selector();

		$campaignService = $services->get($session, CampaignService::class);
		$selector->setFields(['Id', 'Name']);
		$campaigns = $campaignService->get($selector)->getEntries();

		if ($campaigns === null) {
			return;
		}

		$campaignsFoundIds = [];

		foreach ($campaigns as $campaign) {
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
		$this->syncCampaignAdGroups($campaign);
	}

	public function syncCampaignAdGroups(\App\Model\Entity\Campaign $campaign)
	{
		$adGroupsService = $this->getService(AdGroupService::class);
		$adGroupsTable = TableRegistry::get('AdGroups');
		$adGSelector = (new Selector())
			->setFields(['Id', 'Name'])
			->setPredicates([
	                new Predicate('CampaignId', PredicateOperator::EQUALS, [$campaign->rel_id])
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

				$adGroupsLocal = $adGroupsTable->find()->where(['rel_id', $adGroupsFoundIds])->all();

				foreach ($adGroupsLocal as $adGroup) {
					$this->syncAdGroupKeywords($adGroup);
				}
			}

			$adGSelector->getPaging()->setStartIndex(
				$adGSelector->getPaging()->getStartIndex() + self::PAGE_LIMIT
			);
		} while ($adGSelector->getPaging()->getStartIndex() < $totalNumEntries);
	}

	public function syncAdGroupKeywords(\App\Model\Entity\AdGroup $adGroup)
	{
		$keywordsService = $this->getService(AdGroupCriterionService::class);
		$keywordsTable = TableRegistry::get('Keywords');
		$kSelector = (new Selector())
			->setFields(['Id', 'KeywordText'])
			->setPredicates([
	                new Predicate('AdGroupId', PredicateOperator::EQUALS, [$adGroup->rel_id])
            ])
	        ->setPaging(new Paging(0, self::PAGE_LIMIT));

		$totalNumEntries = 0;
		do {
			$kPage = $keywordsService->get($kSelector);
			$keywordsFoundIds = [];
			$kUpdate = $keywordsTable->query()
				->insert(['rel_id', 'ad_group_id', 'campaign_id', 'keyword']);

			if ($kPage->getEntries() !== null) {
				$totalNumEntries = $kPage->getTotalNumEntries();
				foreach ($kPage->getEntries() as $criterion) {
					$keyword = $criterion->getCriterion();
					if ($keyword->getType !== CriterionType::KEYWORD) {
						continue;
					}
					$keywordsFoundIds[] = $keyword->getId();
					$kUpdate->values([
						'rel_id' => $keyword->getId(),
						'ad_group_id' => $adGroup->id,
						'campaign_id' => $adGroup->campaign_id,
						'keyword' => $keyword->getText(),
					]);
				}

				$kUpdate
					->epilog('ON DUPLICATE KEY UPDATE `keyword`=VALUES(`keyword`)')
					->execute();

				$keywordsTable->deleteAll([
					'ad_group_id' => $adGroup->id,
					'campaign_id' => $adGroup->campaign_id,
					'rel_id NOT IN' => $keywordsFoundIds,
				]);
			}

			$kSelector->getPaging()->setStartIndex(
				$kSelector->getPaging()->getStartIndex() + self::PAGE_LIMIT
			);
		} while ($kSelector->getPaging()->getStartIndex() < $totalNumEntries);
	}

	public function updateCampaignsDailyStatistics($date)
	{
		$report = $this->loadDailyStatisticsReport($date);
		$statDailyTable = TableRegistry::get('CampaignStatisticsDaily');

		if (empty($report)) {
			return false;
		}

		$statDailyTable->saveCampaignsReport($report, $date, 'Campaign ID');
	}

	/**
	 * Loads statistics for
	 * @param  [type] $campaignId [description]
	 * @param  [type] $date       [description]
	 * @return [type]             [description]
	 */
	public function updateKeywordsDailyStatistics($campaignId, $date)
	{}
}
