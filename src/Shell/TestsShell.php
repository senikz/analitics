<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class TestsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();

        $this->SiteCalls = TableRegistry::get('SiteCalls');
        $this->SiteEmails = TableRegistry::get('SiteEmails');
        $this->Campaigns = TableRegistry::get('Campaigns');
        $this->Keywords = TableRegistry::get('Keywords');
        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->BidOptions = TableRegistry::get('BidOptions');

		$this->KSD = TableRegistry::get('KeywordStatisticsDaily');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');
		$this->AGSD = TableRegistry::get('AdGroupStatisticsDaily');
    }

    public function main()
    {


		//$this->fill_leads();
    }

	public function fill_leads()
	{
		foreach($this->KSD->find()->all() as $stat) {
			$leads = $stat->calls + $stat->emails;
			if(!$leads) {
				continue;
			}
			$stat->leads = $leads;
			$this->KSD->save($stat);
		}
		foreach($this->CSD->find()->all() as $stat) {
			$leads = $stat->calls + $stat->emails;
			if(!$leads) {
				continue;
			}
			$stat->leads = $leads;
			$this->CSD->save($stat);
		}
		foreach($this->AGSD->find()->all() as $stat) {
			$leads = $stat->calls + $stat->emails;
			if(!$leads) {
				continue;
			}
			$stat->leads = $leads;
			$this->AGSD->save($stat);
		}
	}

}
