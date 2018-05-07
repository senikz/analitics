<?php
namespace App\Shell;

use Cake\ORM\TableRegistry;

class UpdateCampaignsStatisticsShell extends \Cake\Console\Shell
{
    public function initialize()
    {
        parent::initialize();
		$this->Sources = TableRegistry::get('Sources');
    }

	public function today()
	{
		$this->byDate(date('Y-m-d'));
	}

	public function byDate($date)
	{
		$sources = $this->Sources->find()->all();

		foreach ($sources as $source) {
			$source->updateCampaignsDailyStatistics($date);
		}
	}
}
