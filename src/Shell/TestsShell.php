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
		/*foreach($this->SiteEmails->find()->all() as $email) {
			try {
				$details = json_decode($email->details, true);

				if(!empty($details)) {
					if(!empty($details['phone'])) {
						$email->phone = $details['phone'];
					}
					if(!empty($details['email'])) {
						$email->email = $details['email'];
					}

					$this->SiteEmails->save($email);
				}

			} catch (\Exception $e) {}
		}*/
    }
}
