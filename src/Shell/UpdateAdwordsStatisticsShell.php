<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

use App\Utility\ReportParser;

use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;

use Google\AdsApi\AdWords\v201705\cm\CampaignService;
use Google\AdsApi\AdWords\v201705\cm\OrderBy;
use Google\AdsApi\AdWords\v201705\cm\Paging;
use Google\AdsApi\AdWords\v201705\cm\Selector;
use Google\AdsApi\AdWords\v201705\cm\SortOrder;
use Google\AdsApi\AdWords\v201705\cm\ReportDefinitionReportType;
use Google\AdsApi\AdWords\v201705\cm\ReportDefinitionService;
use Google\AdsApi\AdWords\Reporting\v201705\ReportDownloader;
use Google\AdsApi\AdWords\Reporting\v201705\DownloadFormat;
use Google\AdsApi\AdWords\ReportSettingsBuilder;

use Google\AdsApi\Common\OAuth2TokenBuilder;

class UpdateAdwordsStatisticsShell extends Shell
{
    const PAGE_LIMIT = 500;

	public $reportFields = ['CampaignId', 'Impressions', 'Clicks', 'Cost'];

	public function initialize()
    {
        parent::initialize();
        $this->loadModel('CampaignStatisticsDaily');
        $this->loadModel('CampaignStatisticsHourly');
		$this->Campaign = TableRegistry::get('Campaigns');
    }

    public static function getCampaigns(AdWordsServices $adWordsServices, AdWordsSession $session)
    {
        $campaignService = $adWordsServices->get($session, CampaignService::class);
	    // Create selector.
	    $selector = new Selector();
	        $selector->setFields(['Id', 'Name']);
	        $selector->setOrdering([new OrderBy('Name', SortOrder::ASCENDING)]);
	        $selector->setPaging(new Paging(0, self::PAGE_LIMIT));
	        $totalNumEntries = 0;
	        do {
	            // Make the get request.
	    $page = $campaignService->get($selector);
	    // Display results.
	    if ($page->getEntries() !== null) {
	        $totalNumEntries = $page->getTotalNumEntries();
	        foreach ($page->getEntries() as $campaign) {
	            printf(
	            "Campaign with ID %d and name '%s' was found.\n",
	            $campaign->getId(),
	            $campaign->getName()
	        );
	        }
	    }
	    // Advance the paging index.
	    $selector->getPaging()->setStartIndex(
	        $selector->getPaging()->getStartIndex() + self::PAGE_LIMIT);
	        } while ($selector->getPaging()->getStartIndex() < $totalNumEntries);
	        printf("Number of results found: %d\n", $totalNumEntries);
    }


	public static function getReportFields(AdWordsServices $adWordsServices, AdWordsSession $session) {
		$reportDefinitionService = $adWordsServices->get($session, ReportDefinitionService::class);
		// The type of the report to get fields for.
		$reportType = ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT;
		// Get report fields of the report type.
		$reportDefinitionFields = $reportDefinitionService->getReportFields($reportType);
		printf("The report type '%s' contains the following fields:\n", $reportType);
		foreach ($reportDefinitionFields as $reportDefinitionField) {
			printf('  %s (%s)', $reportDefinitionField->getFieldName(),
			$reportDefinitionField->getFieldType());
			if ($reportDefinitionField->getEnumValues() !== null) {
				printf(' := [%s]',
				implode(', ', $reportDefinitionField->getEnumValues()));
			}
			print "\n";
		}
	}

	public function downloadCriteriaReportWithAwql(AdWordsSession $session) {

		// Create report query to get the data for last 7 days.
		$reportQuery = 'SELECT ' . join(',', $this->reportFields) . ' FROM CAMPAIGN_PERFORMANCE_REPORT DURING TODAY';

		// Download report as a string.
		$reportDownloader = new ReportDownloader($session);

		// Optional: If you need to adjust report settings just for this one
		// request, you can create and supply the settings override here. Otherwise,
		// default values from the configuration file (adsapi_php.ini) are used.
		$reportSettingsOverride = (new ReportSettingsBuilder())
			->includeZeroImpressions(false)
			->build();

		$reportDownloadResult = $reportDownloader->downloadReportWithAwql($reportQuery, DownloadFormat::CSV, $reportSettingsOverride);

		return ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']);
	}





    public function main()
    {
		// self::getCampaigns(new AdWordsServices(), $session);
		// self::getReportFields(new AdWordsServices(), $session);
    }

	public function today() {
		$session = $this->getSession();
		$report = $this->downloadCriteriaReportWithAwql($session);
var_dump($report); exit;
		if(!empty($report)) {

			$currentDate = date('Y-m-d');

			foreach($report as $campaignReport) {

				$campaignDetails = $this->Campaign->find('all', [
					'conditions' => [
						'type' => 'adwords',
						'rel_id' => $campaignReport['Campaign ID'],
					],
					'contain' => false
				])->first();

				if($campaignDetails) {

					$campaignId = $campaignDetails->id;

					$newClicksCount = $campaignReport['Clicks'];
					$newImpressionsCount = $campaignReport['Impressions'];
					$newCostCount = $campaignReport['Cost'];

					// проверить запись в дневной статистике, есть ли текущий день
					$dailyRecord = $this->CampaignStatisticsDaily->find('all', [
						'conditions' => [
							'campaign_id' => $campaignId,
							'date' => $currentDate
						]
					])->first();
					$hourlyRecord = $this->CampaignStatisticsHourly->find('all', [
						'conditions' => [
							'campaign_id' => $campaignId,
							'time >=' => date('Y-m-d H:00:00'),
						]
					])->first();

					if(empty($dailyRecord)) {
						$dailyRecord = $this->CampaignStatisticsDaily->newEntity();
						$dailyRecord->campaign_id = $campaignId;
						$dailyRecord->date = $currentDate;
					} else {
						$newClicksCount -= $dailyRecord->clicks;
						$newImpressionsCount -= $dailyRecord->views;
						$newCostCount -= $dailyRecord->cost;
					}

					if(empty($hourlyRecord)) {
						$hourlyRecord = $this->CampaignStatisticsHourly->newEntity();
						$hourlyRecord->campaign_id = $campaignId;
					} else {
						$newClicksCount += $hourlyRecord->clicks;
						$newImpressionsCount += $hourlyRecord->views;
						$newCostCount += $hourlyRecord->cost;
					}

					$hourlyRecord->time = date('Y-m-d H:i:s');

					$dailyRecord->clicks = $campaignReport['Clicks'];
					$dailyRecord->views  = $campaignReport['Impressions'];
					$dailyRecord->cost   = $campaignReport['Cost'];

					$hourlyRecord->clicks = $newClicksCount;
					$hourlyRecord->views  = $newImpressionsCount;
					$hourlyRecord->cost   = $newCostCount;

					$this->CampaignStatisticsDaily->save($dailyRecord);
					$this->CampaignStatisticsHourly->save($hourlyRecord);

				}
			}
		}
	}

	public function getSession() {
		$oAuth2Credential = (new OAuth2TokenBuilder())
	    	->fromFile(ADWORDS_CONF_PATH)
	    	->build();

	    return (new AdWordsSessionBuilder())
	    	->fromFile(ADWORDS_CONF_PATH)
	    	->withOAuth2Credential($oAuth2Credential)
	    	->build();
	}
}
