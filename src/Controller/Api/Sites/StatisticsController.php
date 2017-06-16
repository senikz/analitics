<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{
	public function initialize() {
		parent::initialize();
		$this->loadComponent('Validator');
	}

	public function summary()
	{
		if($this->Validator->required($this->request->query, ['from', 'to'])) {

			$fields = $this->request->query;

			$Sites = TableRegistry::get('Sites');

			$site = $Sites->find('all', [
				'conditions' => [
					'Sites.id' => $this->request->getParam('site_id'),
				],
				'contain' => ['Campaigns.CampaignStatisticsDaily' => function($query) use ($fields) {
					return $query->where([
						'CampaignStatisticsDaily.date >=' => $fields['from'],
						'CampaignStatisticsDaily.date <=' => $fields['to'],
					]);
				}],
			])->first()->toArray();

			$result = [
				'clicks' => 0,
				'views' => 0,
				'cost' => 0,
			];

			if(!empty($site)) {
				foreach($site['campaigns'] as $campaign) {
					foreach($campaign['campaign_statistics_daily'] as $stat) {
						$result['clicks'] += $stat['clicks'];
						$result['views'] += $stat['views'];
						$result['cost'] += $stat['cost'];
					}
				}
			}

			$this->sendData($result);
		}

		$this->sendError($this->Validator->getLastError());
	}

	public function details() {

		if($this->Validator->required($this->request->query, ['from', 'to'])) {

			$fields = $this->request->query;

			$Sites = TableRegistry::get('Sites');

			$site = $Sites->find('all', [
				'conditions' => [
					'Sites.id' => $this->request->getParam('site_id'),
				],
				'contain' => ['Campaigns.CampaignStatisticsHourly' => function($query) use ($fields) {
					return $query->where([
						'CampaignStatisticsHourly.time >=' => $fields['from'] . ' 00:00:00',
						'CampaignStatisticsHourly.time <=' => $fields['to'] . ' 23:59:59',
					]);
				}],
			])->first()->toArray();

			$result = [];

			if(!empty($site)) {

				$details = [];

				foreach($site['campaigns'] as $campaign) {
					foreach($campaign['campaign_statistics_hourly'] as $stat) {
						$key = $stat['time']->format('Y-m-d H:00:00');

						if(!isset($details[$key])) {
							$details[$key] = [
								'clicks' => 0,
								'views' => 0,
								'cost' => 0,
							];
						}

						$details[$key]['clicks'] += $stat['clicks'];
						$details[$key]['views'] += $stat['views'];
						$details[$key]['cost'] += $stat['cost'];
					}
				}

				foreach($details as $time => $statistics) {
					$result[] = [
						'time' => date(DATE_ATOM, strtotime($time)),
						'statistics' => $statistics
					];
				}
			}

			$this->sendData($result);
		}

		$this->sendError($this->Validator->getLastError());
	}

	public function edit() {

		$fields = $this->request->query;
		$data = $this->request->getData();

		if($this->Validator->required($fields, ['date'])) {

			$Statistics = TableRegistry::get('SiteStatisticsDaily');

			$statistic = $Statistics->find('all', [
				'conditions' => [
					'site_id' => $this->request->getParam('site_id'),
					'date' => $fields['date']
				]
			])->first();

			if(empty($statistic)) {
				$statistic = $Statistics->newEntity();
				$statistic->site_id = $this->request->getParam('site_id');
				$statistic->date = $fields['date'];
			}

			$statistic->calls = $data['calls'];
			$statistic->mails = $data['mails'];
			$statistic->orders = $data['orders'];

			$Statistics->save($statistic);

			$this->sendData([]);
		}

		$this->sendError($this->Validator->getLastError());
	}
}
