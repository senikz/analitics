<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class AccountsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Accounts = TableRegistry::get('Accounts');
    }

	public function sync($accountId = null)
	{
		if (empty($accountId)) {
			$accounts = $this->Accounts->find()->all();
			foreach ($accounts as $account) {
				$account->syncCampaigns();
			}
		} else {
			$account = $this->Accounts->find()->where(['id' => $accountId])->first();
			if (empty($account)) {
				die('Account not found.' . PHP_EOL);
			}
			$account->syncCampaigns();
		}

	}

}
