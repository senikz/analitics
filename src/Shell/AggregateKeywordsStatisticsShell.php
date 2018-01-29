<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateKeywordsStatisticsShell extends \Cake\Console\Shell
{
	use \App\Shell\AggregateStatisticsHelper;

    public function initialize()
    {
        parent::initialize();
		$this->Keywords = TableRegistry::get('Keywords');
		$this->KSD = TableRegistry::get('KeywordStatisticsDaily');
    }

    private function forDate($date)
    {
		$ks = $this->KSD->find('all')
			->where([
				'date' => $date,
			])
			->all();

		foreach($ks as $record) {

			$record->ctr = ($record->views > 0 ? round(($record->clicks * 100 / $record->views), 2) : 0);
			$record->lead_perc = ($record->clicks > 0 ? round(($record->leads * 100 / $record->clicks), 2) : 0);
			$record->lead_cost = ($record->leads > 0 ? round(($record->cost / $record->leads), 2) : 0);
			$record->order_perc = ($record->leads > 0 ? round(($record->orders * 100 / $record->leads), 2) : 0);
			$record->order_cost = ($record->orders > 0 ? round(($record->cost / $record->orders), 2) : 0);

			$this->KSD->save($record);
		}
    }
}
