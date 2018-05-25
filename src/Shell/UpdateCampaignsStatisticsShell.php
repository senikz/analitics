<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class UpdateCampaignsStatisticsShell extends Base
{
    public function initialize()
    {
        parent::initialize();
		$this->Sources = TableRegistry::get('Sources');
		$this->Options = TableRegistry::get('Options');
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

	/**
	 * Loads daily statistics for every campaign of each
	 * source (which has campaigns)
	 */
	protected function campaignsLoad($date)
	{
		foreach ($this->Sources->find()->all() as $source) {
			if ($source->isCampaignable()) {
				$source->updateCampaignsDailyStatistics($date);
			}
		}
	}

	/**
	 * Loads daily statistics for content (ad groups, keywords etc.)
	 * of every campaign of each source (which has campaigns)
	 */
	protected function campaignsContentLoad($date)
	{
		foreach ($this->Sources->find()->all() as $source) {
			if ($source->type == 'direct') {continue;}
			if ($source->isCampaignable()) {
				$source->updateCampaignsContentStatistics($date);
			}
		}
	}
}
