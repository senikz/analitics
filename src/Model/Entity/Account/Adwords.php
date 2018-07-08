<?php
namespace App\Model\Entity\Account;

use Cake\ORM\TableRegistry;
use App\Utility\ReportParser;

use Google\AdsApi\AdWords\AdWordsSession;
use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\AdWords\v201806\cm\ReportDefinitionReportType;
use Google\AdsApi\AdWords\Reporting\v201806\DownloadFormat;
use Google\AdsApi\AdWords\Reporting\v201806\ReportDownloader;
use Google\AdsApi\AdWords\Reporting\v201806\ReportDefinition;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\Common\OAuth2TokenBuilder;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\v201806\cm\Selector;
use Google\AdsApi\AdWords\v201806\cm\Predicate;
use Google\AdsApi\AdWords\v201806\cm\Paging;
use Google\AdsApi\AdWords\v201806\cm\DateRange;
use Google\AdsApi\AdWords\v201806\cm\PredicateOperator;
use Google\AdsApi\AdWords\v201806\cm\CampaignService;
use Google\AdsApi\AdWords\v201806\cm\CampaignCriterionService;
use Google\AdsApi\AdWords\v201806\cm\AdGroupService;
use Google\AdsApi\AdWords\v201806\cm\AdGroupCriterionService;
use Google\AdsApi\AdWords\v201806\cm\CriterionType;
use Google\AdsApi\AdWords\Reporting\v201806\ReportDefinitionDateRangeType;

class Adwords extends \App\Model\Entity\Account
{
    const TYPE = 'adwords';
    const TYPE_HUMAN = 'Google Adwords';

    const PAGE_LIMIT = 2000;

    const
        REPORT_COL_CAMPAIGN_ID = 'Campaign ID',
        REPORT_COL_AD_GROUP_ID = 'Ad group ID',
        REPORT_COL_AD_GROUP = 'Ad group',
        REPORT_COL_KEYWORD_ID = 'Keyword ID',
        REPORT_COL_KEYWORD = 'Keyword / Placement',
        REPORT_COL_KEYWORD_TYPE = 'Criteria Type';

    protected $session;

    public static function settingsFields()
    {
        return ['clientCustomerId'];
    }

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

    public function getService($classname)
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
            $selector->setDateRange(
                (new DateRange())
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

    public function loadCriteriaReport($predicates = null)
    {
        $selector = new Selector();
        $selector->setFields(
            [
                'Id',
                'CampaignId',
                'AdGroupId',
                'AdGroupName',
                'Criteria',
                'CriteriaType',
            ]
        );
        if ($predicates) {
            $selector->setPredicates($predicates);
        }

        $reportDefinition = new ReportDefinition();
        $reportDefinition->setSelector($selector);
        $reportDefinition->setReportName(
            'Criteria performance report #' . uniqid()
        );
        $reportDefinition->setDateRangeType(
            ReportDefinitionDateRangeType::YESTERDAY
        );
        $reportDefinition->setReportType(
            ReportDefinitionReportType::CRITERIA_PERFORMANCE_REPORT
        );
        $reportDefinition->setDownloadFormat(DownloadFormat::CSV);
        $reportDownloader = new ReportDownloader($this->getSession());
        $reportDownloadResult = $reportDownloader->downloadReport(
            $reportDefinition,
            (new ReportSettingsBuilder())->includeZeroImpressions(true)->build()
        );

        return ReportParser::parseCsv($reportDownloadResult->getAsString(), ['col_delimiter' => ',']);
    }

    public function getCampaigns()
    {
        $services = new AdWordsServices();
        $session = $this->getSession();

        $campaignService = $services->get($session, CampaignService::class);
        return $campaignService->get((new Selector())->setFields(['Id', 'Name']))->getEntries();
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
            $campaignsFoundIds[] = $campaign->getId();
            $found = $campaignsTable->find()->where(['account_id' => $this->id, 'rel_id' => $campaign->getId()])->first();

            if (!$found) {
                $found = $campaignsTable->newEntity();
                $found->account_id = $this->id;
                $found->rel_id = $campaign->getId();
            }

            $found->caption = $campaign->getName();
            $found = $campaignsTable->save($found);
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

		if (!empty($options['load_content']) && $options['load_content']) {
			$this->syncCampaignContents($campaignsFoundIds);
		}

    }

    public function syncCampaignContents($campaignIds)
    {
		$campaignsTable = TableRegistry::get('Campaigns');
		$campaignIds = is_array($campaignIds) ? $campaignIds : [$campaignIds];
		$campaignIds = $campaignsTable->find()->where(['id IN' => $campaignIds])->extract('rel_id')->toArray();
        $report = $this->loadCriteriaReport([
            new Predicate('CampaignId', PredicateOperator::IN, $campaignIds),
        ]);
        $this->syncCampaignsCriteriaReport($report);
    }

    /*public function syncCampaignAdGroups(\App\Model\Entity\Campaign $campaign)
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
    }*/

    /*public function syncCampaignKeywords(\App\Model\Entity\Campaign $campaign)
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
    }*/

    public function cronJob()
    {
        $date = date('Y-m-d');
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

    public function dailyCronJob($date)
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

    private function syncCampaignsCriteriaReport($content)
    {
        $adGroups = [];
        foreach ($content as $item) {
            $campaignId = $item[self::REPORT_COL_CAMPAIGN_ID];
            $adGroupId = $item[self::REPORT_COL_AD_GROUP_ID];
            $keywordId = $item[self::REPORT_COL_KEYWORD_ID];
            $adGroupName = $item[self::REPORT_COL_AD_GROUP];

            if (!isset($adGroups[$campaignId])) {
                $adGroups[$campaignId] = [];
            }
            if (!isset($adGroups[$campaignId][$adGroupId])) {
                $adGroups[$campaignId][$adGroupId] = [
                    'name' => $adGroupName,
                    'keywords' => [],
                ];
            }
            $adGroups[$campaignId][$adGroupId]['keywords'][$keywordId] = $item[self::REPORT_COL_KEYWORD];
        }

		$campaignsTable = TableRegistry::get('Campaigns');
		$adGroupsTable = TableRegistry::get('AdGroups');
        $adGroupsTable = TableRegistry::get('AdGroups');
        $keywordsTable = TableRegistry::get('Keywords');

        foreach ($adGroups as $campaignId => $adGroups) {
            $adGroupIds = array_keys($adGroups);
			$campaign = $campaignsTable->find()->where(['rel_id' => $campaignId, 'account_id' => $this->id])->first();

            $adGroupsTable->deleteAll([
                'campaign_id' => $campaign->id,
                'rel_id NOT IN' => $adGroupIds,
            ]);

            // Fill Ad Groups
            $adGroupsUpdate = $adGroupsTable->query()->insert(['rel_id', 'campaign_id', 'name']);
            foreach ($adGroups as $adGroupId => $adGroup) {
                $adGroupsUpdate->values([
                    'rel_id' => $adGroupId,
                    'campaign_id' => $campaign->id,
                    'name' => $adGroup['name'],
                ]);
            }
            if (!empty($adGroups)) {
                $adGroupsUpdate
                    ->epilog('ON DUPLICATE KEY UPDATE `name`=VALUES(`name`)')
                    ->execute();
            }

			// Fill Keywords
			foreach ($adGroups as $adGroupId => $adGroup) {
				$group = $adGroupsTable->find()->where(['rel_id' => $adGroupId, 'campaign_id' => $campaign->id])->first();

				if (!empty($adGroup['keywords'])) {
					$kUpdate = $keywordsTable->query()->insert(['rel_id', 'ad_group_id', 'campaign_id', 'keyword']);
					foreach ($adGroup['keywords'] as $keywordId => $keyword) {
						$kUpdate->values([
							'rel_id' => $keywordId,
							'ad_group_id' => $group->id,
							'campaign_id' => $campaign->id,
							'keyword' => $keyword,
						]);
					}
					$kUpdate
						->epilog('ON DUPLICATE KEY UPDATE `keyword`=VALUES(`keyword`)')
						->execute();

					$keywordsTable->deleteAll([
						'ad_group_id' => $group->id,
						'campaign_id' => $campaign->id,
						'rel_id NOT IN' => array_keys($adGroup['keywords']),
					]);
				}
			}
        }
    }
}
