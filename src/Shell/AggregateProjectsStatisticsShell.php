<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateProjectsStatisticsShell extends \Cake\Console\Shell
{
	use \App\Shell\AggregateStatisticsHelper;

    public function initialize()
    {
        parent::initialize();

        $this->Projects = TableRegistry::get('Projects');
		$this->PSD = TableRegistry::get('ProjectStatisticsDaily');

		$this->Sites = TableRegistry::get('Sites');
		$this->SSD = TableRegistry::get('SiteStatisticsDaily');

		//$this->SiteOrders = TableRegistry::get('SiteOrders');
    }

    private function forDate($date)
    {
		$projects = $this->Projects->find('all')->all();

		foreach($projects as $project) {

			$query = $this->SSD->find('all');

			$sIds = array_map(function($site) {
					return $site->id;
				},
				$this->Sites->find('all')->select('id')->where(['project_id' => $project->id])->all()->toArray()
			);

			if(empty($sIds)) {
				continue;
			}

			$item = $query->select([
					'cost' => $query->func()->sum('cost'),
					'views' => $query->func()->sum('views'),
					'clicks' => $query->func()->sum('clicks'),
					'calls' => $query->func()->sum('calls'),
					'emails' => $query->func()->sum('emails'),
					'leads' => $query->func()->sum('leads'),
					'orders' => $query->func()->sum('orders'),
				])
				->group('date')
				->where([
					'site_id IN' => $sIds,
					'date' => $date,
				])
				->first();

			if(empty($item)) {
				continue;
			}

			$record = $this->PSD->find('all')->where([
				'date' => $date,
				'project_id' => $project->id,
			])->first();

			if (empty($record)) {
				$record = $this->PSD->newEntity();
				$record->project_id = $project->id;
				$record->date = $date;
			}

			$record->cost = $item->cost;

			$record->views = $item->views;
			$record->clicks = $item->clicks;
			$record->ctr = ($item->views > 0 ? round(($item->clicks * 100 / $item->views), 2) : 0);

			$record->calls = $item->calls;
			$record->emails = $item->emails;
			$record->leads = $item->leads;
			$record->lead_perc = ($item->clicks > 0 ? round(($item->leads * 100 / $item->clicks), 2) : 0);
			$record->lead_cost = ($item->leads > 0 ? round(($item->cost / $item->leads), 2) : 0);

			$record->orders = $item->orders;
			$record->order_perc = ($item->leads > 0 ? round(($item->orders * 100 / $item->leads), 2) : 0);
			$record->order_cost = ($item->orders > 0 ? round(($item->cost / $item->orders), 2) : 0);

			$this->PSD->save($record);
		}
    }
}
