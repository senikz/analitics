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
			$this->campaignsLoad(date('Y-m-d'));
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
		$this->campaignsLoad($date);
		$this->campaignsContentLoad($date);
	}

	public function account($accountId, $date = null)
	{
		$account = $this->Accounts->find()->where(['id' => $accountId])->first();

		if (empty($account)) {
			die('Account not found.' . PHP_EOL);
		}

		$date = empty($date) ? date('Y-m-d', strtotime('-1 day')) : $date;

		$account->updateCampaignsDailyStatistics($date);
		$account->updateCampaignsContentStatistics($date);
	}

	/**
	 * Loads daily statistics for every campaign of each
	 * source (which has campaigns)
	 */
	protected function campaignsLoad($date)
	{
		foreach ($this->Accounts->find()->all() as $account) {
			if ($account->isCampaignable()) {
				$account->updateCampaignsDailyStatistics($date);
			}
		}
	}

	/**
	 * Loads daily statistics for content (ad groups, keywords etc.)
	 * of every campaign of each source (which has campaigns)
	 */
	protected function campaignsContentLoad($date)
	{
		foreach ($this->Accounts->find()->all() as $account) {
			if ($account->isCampaignable()) {
				$account->updateCampaignsContentStatistics($date);
			}
		}
	}
}
