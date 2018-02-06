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
