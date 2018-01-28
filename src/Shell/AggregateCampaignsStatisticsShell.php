<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class AggregateCampaignsStatisticsShell extends \Cake\Console\Shell
{
/*    public function initialize()
    {
        parent::initialize();

		$this->Campaigns = TableRegistry::get('Campaigns');
		$this->CSD = TableRegistry::get('CampaignStatisticsDaily');

		$this->SiteOrders = TableRegistry::get('SiteOrders');
    }

    public function today()
    {
        $this->forDate(date('Y-m-d'));
    }

    public function yesterday()
    {
        $this->forDate(date('Y-m-d', strtotime('-1 day')));
    }

    public function month()
    {
        $startDate = date('Y-m-d', strtotime('-1 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function doublemonth()
    {
        $startDate = date('Y-m-d', strtotime('-2 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function quarterly()
    {
        $startDate = date('Y-m-d', strtotime('-3 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
    }

	public function semiannually()
    {
        $startDate = date('Y-m-d', strtotime('-6 month'));
        $today = date('Y-m-d');
        while ($startDate < $today) {
            $this->forDate($startDate);
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
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
				'count' => $query->func()->count('*')
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
			$record->calls = $item->calls;
			$record->emails = $item->emails;
			$record->leads = $item->leads;
			$record->orders = $ordersItem->count;

			$this->SSD->save($record);
		}
    }*/
}
