<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateSitesStatisticsShell extends \Cake\Console\Shell
{
	use \App\Shell\AggregateStatisticsHelper;

    public function initialize()
    {
        parent::initialize();

        $this->Sites = TableRegistry::get('Sites');
		$this->SSD = TableRegistry::get('SiteStatisticsDaily');

		$this->Campaigns = TableRegistry::get('Campaigns');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');

		$this->SiteOrders = TableRegistry::get('SiteOrders');
    }

    private function forDate($date)
    {
		$sites = $this->Sites->find('all')->all();

		foreach($sites as $site) {

			$query = $this->CSD->find('all');

			$campaigns = $this->Campaigns->find('all')->select('id')->where(['site_id' => $site->id])->all()->toArray();

			$cIds = array_map(function($campaign) {
				return $campaign->id;
			}, $campaigns);

			if(empty($cIds)) {
				continue;
			}

			$item = $query->select([
					'cost' => $query->func()->sum('cost'),
					'views' => $query->func()->sum('views'),
					'clicks' => $query->func()->sum('clicks'),
					'calls' => $query->func()->sum('calls'),
					'emails' => $query->func()->sum('emails'),
					'leads' => $query->func()->sum('leads'),
				])
				->group('date')
				->where([
					'campaign_id IN' => $cIds,
					'date' => $date,
				])
				->first();

			if(empty($item)) {
				continue;
			}

			$ordersQuery = $this->SiteOrders->find('all');
			$ordersItem = $ordersQuery->select([
				'count' => $query->func()->sum('count')
			])->where([
				'site_id' => $site->id,
				'time >=' => $date . ' 00:00:00',
				'time <=' => $date . ' 23:59:59',
			])->first();

			$record = $this->SSD->find('all')->where([
				'date' => $date,
				'site_id' => $site->id,
			])->first();

			if (empty($record)) {
				$record = $this->SSD->newEntity();
				$record->site_id = $site->id;
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

			$record->orders = $ordersItem->count;
			$record->order_perc = ($item->leads > 0 ? round(($item->orders * 100 / $item->leads), 2) : 0);
			$record->order_cost = ($item->orders > 0 ? round(($item->cost / $item->orders), 2) : 0);

			$this->SSD->save($record);
		}
    }
}
