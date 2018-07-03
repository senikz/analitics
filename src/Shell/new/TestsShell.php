<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

use Google\AdsApi\AdWords\Reporting\v201802\ReportDefinitionDateRangeType;

class TestsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();

		$this->Accounts = TableRegistry::get('Accounts');
		$this->Sources = TableRegistry::get('Sources');

        $this->SiteCosts = TableRegistry::get('SiteCosts');
        $this->SiteCalls = TableRegistry::get('SiteCalls');
        $this->SiteEmails = TableRegistry::get('SiteEmails');
        $this->Sources = TableRegistry::get('Sources');
        $this->Campaigns = TableRegistry::get('Campaigns');
        $this->Keywords = TableRegistry::get('Keywords');
        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->BidOptions = TableRegistry::get('BidOptions');

		$this->KSD = TableRegistry::get('KeywordStatisticsDaily');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');
		$this->AGSD = TableRegistry::get('AdGroupStatisticsDaily');
		$this->SOSD = TableRegistry::get('SourceStatisticsDaily');
    }

    public function main()
    {
		/*$costs = $this->SiteCosts->find()->all();

		foreach ($costs as $cost) {
			if (!$cost->source_id) {
				continue;
			}
			$date = $cost->time->format('Y-m-d');
			$stat = $this->SOSD->find()
				->where(['source_id' => $cost->source_id, 'date' => $date])
				->first();
			if (!$stat) {
				continue;
			}

			$stat->cost = $stat->cost + $cost->cost;
			$this->SOSD->save($stat);
		}*/
    }

	public function fill_leads()
	{
		foreach($this->SiteCalls->find()->all() as $call) {
			if($call->campaign_id > 100000) {
				$camp = $this->Campaigns->find('all')->where(['rel_id' => $call->campaign_id])->first();
				if(!empty($camp)) {
					$call->campaign_id = $camp->id;
					$this->SiteCalls->save($call);
				}
			}
		}
		foreach($this->SiteEmails->find()->all() as $call) {
			if($call->campaign_id > 100000) {
				$camp = $this->Campaigns->find('all')->where(['rel_id' => $call->campaign_id])->first();
				if(!empty($camp)) {
					$call->campaign_id = $camp->id;
					$this->SiteEmails->save($call);
				}
			}
		}
	}

}
