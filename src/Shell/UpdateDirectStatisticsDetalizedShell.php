<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use \App\Model\Entity\Credential;

use Biplane\YandexDirect\Api\V5\Contract\GetReportsRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportDefinitionBuilder;
use Biplane\YandexDirect\Api\V5\Report\FieldEnum;
use Biplane\YandexDirect\Api\V5\Report\ReportTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\DateRangeTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\FormatEnum;
use Biplane\YandexDirect\Api\V5\Report\FilterOperatorEnum;

class UpdateDirectStatisticsDetalizedShell extends Shell
{
    private $reportFieldNames = [FieldEnum::CAMPAIGN_ID, FieldEnum::AD_GROUP_ID,  FieldEnum::CRITERIA_TYPE, FieldEnum::CRITERIA_ID, FieldEnum::COST, FieldEnum::IMPRESSIONS, FieldEnum::CLICKS];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('AdGroups');
        $this->loadModel('Keywords');
        $this->loadModel('AdGroupStatisticsDaily');
        $this->loadModel('KeywordStatisticsDaily');

        $this->Campaigns = TableRegistry::get('Campaigns');
    }

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('yesterday', [
            'help' => 'Update the `yesterday` statistics for ad_groups & keywords'
        ]);

        return $parser;
    }

    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    public function yesterday()
    {
        $date = date('Y-m-d', strtotime('-1 day'));
        $statProto = [
            'cost' => 0,
            'views' => 0,
            'clicks' => 0,
        ];

        foreach ($this->getCampaigns() as $group) {
            $campaigns = $group['campaigns'];

            $report = $this->loadReport($group['provider'], $group['ids'], DateRangeTypeEnum::YESTERDAY);

            if (!$report) {
                continue;
            }

            $keywords = [];
            $adGroups = [];

            foreach ($report as $row) {
                if (!isset($adGroups[ $row[FieldEnum::AD_GROUP_ID] ])) {
                    $adGroups[ $row[FieldEnum::AD_GROUP_ID] ] = $statProto;
                }
                if (!isset($keywords[ $row[FieldEnum::CRITERIA_ID] ])) {
                    $keywords[ $row[FieldEnum::CRITERIA_ID] ] = $statProto;
                }

                $adGroups[ $row[FieldEnum::AD_GROUP_ID] ]['cost'] += (float)$row[FieldEnum::COST];
                $adGroups[ $row[FieldEnum::AD_GROUP_ID] ]['views'] += (int)$row[FieldEnum::IMPRESSIONS];
                $adGroups[ $row[FieldEnum::AD_GROUP_ID] ]['clicks'] += (int)$row[FieldEnum::CLICKS];

                $keywords[ $row[FieldEnum::CRITERIA_ID] ]['cost'] += (float)$row[FieldEnum::COST];
                $keywords[ $row[FieldEnum::CRITERIA_ID] ]['views'] += (int)$row[FieldEnum::IMPRESSIONS];
                $keywords[ $row[FieldEnum::CRITERIA_ID] ]['clicks'] += (int)$row[FieldEnum::CLICKS];
            }

            foreach ($adGroups as $gId => $gStat) {
                $adGroup = $this->AdGroups->find('all', ['conditions' => ['rel_id' => $gId,]])->first();
                if (empty($adGroup)) {
                    continue;
                }

				$record = $this->AdGroupStatisticsDaily->find('all')
					->where([
						'ad_group_id' => $adGroup->id,
						'date' => $date,
					])
					->first();

				if(empty($record)) {
					$record = $this->AdGroupStatisticsDaily->newEntity();
				}

                $record->ad_group = $adGroup;
                $record->cost = $gStat['cost'];
                $record->views = $gStat['views'];
                $record->clicks = $gStat['clicks'];
                $record->date = $date;

                $this->AdGroupStatisticsDaily->save($record);
            }

            foreach ($keywords as $kId => $kStat) {
                $keyword = $this->Keywords->find('all', ['conditions' => ['rel_id' => $kId,]])->first();
                if (empty($keyword)) {
                    continue;
                }

				$record = $this->KeywordStatisticsDaily->find('all')
					->where([
						'keyword_id' => $keyword->id,
						'date' => $date,
					])
					->first();

				if(empty($record)) {
					$record = $this->KeywordStatisticsDaily->newEntity();
				}

                $record->keyword = $keyword;
                $record->cost = $kStat['cost'];
                $record->views = $kStat['views'];
                $record->clicks = $kStat['clicks'];
                $record->date = $date;

                $this->KeywordStatisticsDaily->save($record);
            }
        }
    }

    private function getCampaigns()
    {
        $result = [];
        $campaigns = $this->Campaigns->find('all', [
            'conditions' => [
                'credential_id >' => '0',
                'Credentials.type' => Credential::TYPE_DIRECT,
            ],
			'contain' => ['Credentials'],
        ])->all();

        foreach ($campaigns as $campaign) {
            $provider = $campaign->getProvider();

            if (empty($provider)) {
                continue;
            }

            $login = $provider->getLogin();

            if (empty($result[$login])) {
                $result[$login] = [
                    'ids' => [],
                    'provider' => $provider,
                    'campaigns' => [],
                ];
            }

            $result[$login]['ids'][] = $campaign->rel_id;
            $result[$login]['campaigns'][] = $campaign;
        }

        return $result;
    }

    private function loadReport($provider, $campaignIds, $date)
    {
        $reportService = $provider->getReportsService();
        $reportRequest = (new ReportRequest)
            ->setProcessingMode(ReportRequest::PROCESSING_MODE_AUTO)
            ->returnMoneyAsFloat()
            ->setDefinition(
                (new ReportDefinitionBuilder)
                    ->setFieldNames($this->reportFieldNames)
                    ->setReportName('Statistics perfomance report ' . uniqid())
                    ->setReportType(ReportTypeEnum::SEARCH_QUERY_PERFORMANCE_REPORT)
                    ->setDateRangeType($date)
                    ->includeVat()
                    ->setFormat(FormatEnum::TSV)
                    ->addFilter(FieldEnum::CAMPAIGN_ID, FilterOperatorEnum::IN, $campaignIds)
            );

        $reportResult = $reportService->getReady($reportRequest);
        $reportDetails = $this->parseReportAnswer($reportResult->getData(), $this->reportFieldNames);

        if (empty($reportDetails) || !is_array($reportDetails)) {
            Log::write('debug', ['campaignIds' => $campaignIds, 'report' => 'empty'], ['shell', 'UpdateDirectStatisticsDetalizedShell', $date]);
            return false;
        }

        return $reportDetails;
    }

    private function parseReportAnswer($report, $fields)
    {
        $reportContent = [];

        if ($lines = explode(PHP_EOL, $report)) {
            $lines = array_filter($lines);

            for ($lineId = 2; $lineId<(count($lines)-1); $lineId++) {
                $line = array_filter(preg_split('/[\s]+/', $lines[$lineId]), function ($item) {
                    return $item !== '';
                });

                if (!empty($line) && count($line) == count($fields)) {
                    $reportLine = [];
                    foreach ($fields as $num => $field) {
                        $reportLine[$field] = $line[$num];
                    }
                    $reportContent[] = $reportLine;
                }
            }
        }

        return $reportContent;
    }
}
