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
		$this->SiteCalls = TableRegistry::get('SiteCalls');
		$this->SiteEmails = TableRegistry::get('SiteEmails');
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

			// Orders
			$ordersQuery = $this->SiteOrders->find('all');
			$ordersItem = $ordersQuery->select([
				'count' => $ordersQuery->func()->sum('count')
			])->where([
				'site_id' => $site->id,
				'time >=' => $date . ' 00:00:00',
				'time <=' => $date . ' 23:59:59',
			])->first();

			// Calls
			$callsQuery = $this->SiteCalls->find('all');
			$callsItem = $callsQuery->where([
					'site_id' => $site->id,
					'time >=' => $date . ' 00:00:00',
					'time <=' => $date . ' 23:59:59',
				])
				->select([
					'count' => $callsQuery->func()->count('*'),
				])
				->first();

			// Emails
			$emailsQuery = $this->SiteEmails->find('all');
			$emailsItem = $emailsQuery->where([
					'site_id' => $site->id,
					'time >=' => $date . ' 00:00:00',
					'time <=' => $date . ' 23:59:59',
				])
				->select([
					'count' => $emailsQuery->func()->count('*'),
				])
				->first();

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

			$record->calls = $callsItem->count;
			$record->emails = $emailsItem->count;
			$record->leads = $callsItem->count + $emailsItem->count;
			$record->lead_perc = ($record->clicks > 0 ? round(($record->leads * 100 / $record->clicks), 2) : 0);
			$record->lead_cost = ($record->leads > 0 ? round(($record->cost / $record->leads), 2) : 0);

			$record->orders = $ordersItem->count;
			$record->order_perc = ($record->leads > 0 ? round(($record->orders * 100 / $record->leads), 2) : 0);
			$record->order_cost = ($record->orders > 0 ? round(($record->cost / $record->orders), 2) : 0);

			$this->SSD->save($record);
		}
    }
}
