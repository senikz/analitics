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
    }

    public function main()
    {
		foreach($this->SiteEmails->find()->all() as $email) {

			if(!empty($email->campaign_id)) {
				continue;
			}

			if(preg_match('/[0-9]{8,20}/', $email->utm_campaign, $matches)) {
				$email->campaign_id = $matches[0];
				$this->SiteEmails->save($email);
			}
		}


		foreach($this->SiteCalls->find()->all() as $call) {

			if(!empty($call->campaign_id)) {
				continue;
			}

			if(preg_match('/[0-9]{8,20}/', $call->utm_campaign, $matches)) {
				$call->campaign_id = $matches[0];
				$this->SiteCalls->save($call);
			}
		}
    }
}
