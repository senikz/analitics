<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class AccountsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Accounts = TableRegistry::get('Accounts');
		$this->Campaigns = TableRegistry::get('Campaigns');
    }

	public function syncCampaignsContent($accountId = null)
	{
		if (empty($accountId)) {
			$accounts = $this->Accounts->find()->all();
			foreach ($accounts as $account) {
				if ($account->status == 'active') {
					$this->syncAccountContents($account);
				}
			}
		} else {
			$account = $this->Accounts->find()->where(['id' => $accountId])->first();
			if (empty($account)) {
				die('Account not found.' . PHP_EOL);
			}
			$this->syncAccountContents($account);
		}

	}

	private function syncAccountContents($account)
	{
		$campaignIds = $this->Campaigns->find()->where(['account_id' => $account->id])->extract('id')->toArray();
		$account->syncCampaignContents($campaignIds);
	}

}
