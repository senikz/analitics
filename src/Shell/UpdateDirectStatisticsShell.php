<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use \App\Model\Entity\Source\Direct;

use Biplane\YandexDirect\Api\V5\Contract\GetReportsRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportRequest;
use Biplane\YandexDirect\Api\V5\Report\ReportDefinitionBuilder;
use Biplane\YandexDirect\Api\V5\Report\FieldEnum;
use Biplane\YandexDirect\Api\V5\Report\ReportTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\DateRangeTypeEnum;
use Biplane\YandexDirect\Api\V5\Report\FormatEnum;
use Biplane\YandexDirect\Api\V5\Report\FilterOperatorEnum;

class UpdateDirectStatisticsShell extends Shell
{
    private $accounts = [];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CampaignStatisticsDaily');
        $this->loadModel('CampaignStatisticsHourly');

        $this->Campaigns = TableRegistry::get('Campaigns');
    }

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('today', [
            'help' => 'Update the `todays` statistics'
        ]);

        return $parser;
    }

    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    public function today()
    {
		$campaigns = $this->Campaigns->find('all', [
			'conditions' => [
				'Sources.type' => Direct::TYPE,
			],
			'contain' => ['Sources'],
		])->all();

		foreach($campaigns as $campaign) {
			$provider = $campaign->source->getProvider();

			if(empty($provider)) {
				continue;
			}

			$this->processCampaign($provider, $campaign);
		}
    }

	private function processCampaign($provider, $campaign)
	{
		$campaignId = $campaign->id;

		$fieldNames = [FieldEnum::CAMPAIGN_ID, FieldEnum::COST, FieldEnum::IMPRESSIONS, FieldEnum::CLICKS];

		$reportService = $provider->getReportsService();
		var_dump($reportService);exit;
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
					->addFilter(FieldEnum::CAMPAIGN_ID, FilterOperatorEnum::IN, [$campaign->rel_id])
			);

		$reportResult = $reportService->getReady($reportRequest);
		$reportDetails = $this->parseReportAnswer($reportResult->getData(), $fieldNames);

		if (empty($reportDetails)) {
            Log::write('debug', ['campaignId' => $campaignId, 'report' => 'empty'], ['shell', 'UpdateDirectStatisticsShell', 'today']);
            return;
        }

        $currentDate = date('Y-m-d');

        Log::write('debug', ['campaignId' => $campaignId, 'report' => $reportDetails], ['shell', 'UpdateDirectStatisticsShell', 'today']);

        $newClicksCount = 0;
        $newImpressionsCount = 0;
        $newCostCount = 0;

        if (!empty($reportDetails)) {
            $reportCampaign = $reportDetails[0];

            $newClicksCount = $reportCampaign['Clicks'];
            $newImpressionsCount = $reportCampaign['Impressions'];
            $newCostCount = $reportCampaign['Cost'];

            // проверить запись в дневной статистике, есть ли текущий день
            $dailyRecord = $this->CampaignStatisticsDaily->find('all', [
                'conditions' => [
                    'campaign_id' => $campaignId,
                    'date' => $currentDate
                ]
            ])->first();

            if (empty($dailyRecord)) {
                $dailyRecord = $this->CampaignStatisticsDaily->newEntity();
                $dailyRecord->campaign_id = $campaignId;
                $dailyRecord->date = $currentDate;
            } else {
                $newClicksCount -= $dailyRecord->clicks;
                $newImpressionsCount -= $dailyRecord->views;
                $newCostCount -= $dailyRecord->cost;
            }

            $dailyRecord->clicks = $reportCampaign['Clicks'];
            $dailyRecord->views  = $reportCampaign['Impressions'];
            $dailyRecord->cost   = $reportCampaign['Cost'];

            $this->CampaignStatisticsDaily->save($dailyRecord);
        }

        $hourlyRecord = $this->CampaignStatisticsHourly->find('all', [
            'conditions' => [
                'campaign_id' => $campaignId,
                'time >=' => date('Y-m-d H:00:00')
            ]
        ])->first();

        if (empty($hourlyRecord)) {
            $hourlyRecord = $this->CampaignStatisticsHourly->newEntity();
            $hourlyRecord->campaign_id = $campaignId;
        } else {
            $newClicksCount += $hourlyRecord->clicks;
            $newImpressionsCount += $hourlyRecord->views;
            $newCostCount += $hourlyRecord->cost;
        }

        $hourlyRecord->time = date('Y-m-d H:i:s');

        $hourlyRecord->clicks = $newClicksCount;
        $hourlyRecord->views  = $newImpressionsCount;
        $hourlyRecord->cost   = $newCostCount;

        $this->CampaignStatisticsHourly->save($hourlyRecord);

		sleep(2);
	}

	private function parseReportAnswer($report, $fields) {

		$reportContent = [];

		if($lines = explode(PHP_EOL, $report)) {
			$lines = array_filter($lines);

			for($lineId = 2; $lineId<(count($lines)-1); $lineId++ ) {
				$line = array_filter(preg_split('/[\s]+/', $lines[$lineId]), function($item) {
				    return $item !== '';
				});

				if(!empty($line) && count($line) == count($fields)) {
					$reportLine = [];
					foreach($fields as $num => $field) {
						$reportLine[$field] = $line[$num];
					}
					$reportContent[] = $reportLine;
				}
			}
		}

		return $reportContent;
	}
}
