<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class UpdateCampaignsStatisticsShell extends Base
{
    public function initialize()
    {
        parent::initialize();
		$this->Accounts = TableRegistry::get('Accounts');
    }

	public function main()
	{
		/**
		 * Every N minutes run daily statistics loading.
		 */
		if ($this->checkRunTime('CampaignsLastStatistics')) {
			$this->campaignsLoad();
		}

		/**
		 * At specified time run gathering yesterday statistics once per day.
		 */
		if ($this->checkRunTime('CampaignsContentStatistics')) {
			$this->campaignsContentLoad(date('Y-m-d', strtotime('-1 day')));
		}
	}

	public function date($date)
	{
		$this->campaignsLoad();
		$this->campaignsContentLoad($date);
	}

	public function account($accountId, $date = null)
	{
		$account = $this->Accounts->find()->where(['id' => $accountId])->first();

		if (empty($account)) {
			die('Account not found.' . PHP_EOL);
		}

		$date = empty($date) ? date('Y-m-d', strtotime('-1 day')) : $date;

		$account->cronJob();
		$account->dailyCronJob($date);
	}

	/**
	 * Loads daily statistics for every campaign of each
	 * source (which has campaigns)
	 */
	protected function campaignsLoad()
	{
		foreach ($this->Accounts->find()->all() as $account) {
			$account->cronJob();
		}
	}

	/**
	 * Loads daily statistics for content (ad groups, keywords etc.)
	 * of every campaign of each source (which has campaigns)
	 */
	protected function campaignsContentLoad($date)
	{
		foreach ($this->Accounts->find()->all() as $account) {
			$account->dailyCronJob($date);
		}
	}
}
