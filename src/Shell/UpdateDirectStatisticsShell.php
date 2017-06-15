<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use App\Utility\YandexDirectApi;

class UpdateDirectStatisticsShell extends Shell
{

	public function initialize()
    {
        parent::initialize();
        $this->loadModel('CampaignStatisticsDaily');
        $this->loadModel('CampaignStatisticsHourly');

		$this->Campaign = TableRegistry::get('Campaigns');
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

	public function today() {

		$availableCampaigns = $this->Campaign->find('all', [
			'conditions' => [
				'type' => 'direct',
				'rel_id !=' => 0
			],
			'contain' => false
		])->all();

		if(empty($availableCampaigns)) {
			return;
		}

		foreach($availableCampaigns as $availableCampaign) {

			$this->loadSingleCampaign($availableCampaign->id, $availableCampaign->rel_id);

			sleep(1);
		}
	}

	public function loadSingleCampaign($campaignId, $relId) {

		$YandexDirect = new YandexDirectApi();

		$reportDetails = $YandexDirect->createStatisticsReport($relId);

		if($reportDetails === false) {
			Log::write('debug', ['campaignId' => $campaignId, 'report' => $YandexDirect->lastError], ['shell', 'UpdateDirectStatisticsShell', 'today']);
		}

		Log::write('debug', ['campaignId' => $campaignId, 'report' => $reportDetails], ['shell', 'UpdateDirectStatisticsShell', 'today']);

		$currentDate = date('Y-m-d');

		$newClicksCount = 0;
		$newImpressionsCount = 0;
		$newCostCount = 0;

		if(!empty($reportDetails)) {
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

			if(empty($dailyRecord)) {
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

		if(empty($hourlyRecord)) {
			$hourlyRecord = $this->CampaignStatisticsHourly->newEntity();
			$hourlyRecord->campaign_id = $campaignId;
			$hourlyRecord->time = date('Y-m-d H:i:s');
		} else {
			$newClicksCount += $hourlyRecord->clicks;
			$newImpressionsCount += $hourlyRecord->views;
			$newCostCount += $hourlyRecord->cost;
		}

		$hourlyRecord->clicks = $newClicksCount;
		$hourlyRecord->views  = $newImpressionsCount;
		$hourlyRecord->cost   = $newCostCount;

		$this->CampaignStatisticsHourly->save($hourlyRecord);

	}
}
