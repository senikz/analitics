<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateCampaignsStatisticsShell extends \Cake\Console\Shell
{
	use \App\Shell\AggregateStatisticsHelper;

    public function initialize()
    {
        parent::initialize();
		$this->Campaigns = TableRegistry::get('Campaigns');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');
    }

    private function forDate($date)
    {
		$cs = $this->CSD->find('all')
			->where([
				'date' => $date,
			])
			->all();

		foreach($cs as $record) {

			$record->ctr = ($record->views > 0 ? round(($record->clicks * 100 / $record->views), 2) : 0);
			$record->lead_perc = ($record->clicks > 0 ? round(($record->leads * 100 / $record->clicks), 2) : 0);
			$record->lead_cost = ($record->leads > 0 ? round(($record->cost / $record->leads), 2) : 0);
			$record->order_perc = ($record->leads > 0 ? round(($record->orders * 100 / $record->leads), 2) : 0);
			$record->order_cost = ($record->orders > 0 ? round(($record->cost / $record->orders), 2) : 0);

			$this->CSD->save($record);
		}
    }
}
