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

	public function loadCampaigns($accountId = null)
	{
		if (empty($accountId)) {
			$accounts = $this->Accounts->find()->all();
			foreach ($accounts as $account) {
				if ($account->status == 'active') {
					$account->syncCampaigns(['load_content' => true]);
				}
			}
		} else {
			$account = $this->Accounts->find()->where(['id' => $accountId])->first();
			if (empty($account)) {
				die('Account not found.' . PHP_EOL);
			}
			$account->syncCampaigns(['load_content' => true]);
		}

	}

	public function syncCampaignsContent($accountId = null)
	{
		$this->runForAccount($accountId, function ($account) {
			$campaignIds = $this->Campaigns->find()->where(['account_id' => $account->id])->extract('id')->toArray();
			$account->syncCampaignContents($campaignIds);
		});
	}

	public function loadCampaignsContent($accountId, $from, $to = null)
	{
		$date = $from;
		if (!$to) {
			$to = $from;
		}
        do {
			echo $date . PHP_EOL;
			$this->runForAccount($accountId, function ($account) use ($date) {
				$account->dailyCronJob($date);
			});
            $date = date('Y-m-d', strtotime($date . ' +1 day'));
        } while ($date <= $to);
	}



	private function runForAccount($accountId, $callback)
	{
		if (empty($accountId)) {
			$accounts = $this->Accounts->find()->all();
			foreach ($accounts as $account) {
				if ($account->status == 'active') {
					$callback($account);
				}
			}
		} else {
			$account = $this->Accounts->find()->where(['id' => $accountId])->first();
			if (empty($account)) {
				die('Account not found.' . PHP_EOL);
			}
			$callback($account);
		}
	}
}
