<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function summary()
    {
        if ($this->Validator->required($this->request->query, ['from', 'to'])) {
            $fields = $this->request->query;

            $Sites = TableRegistry::get('Sites');
            $SiteCalls = TableRegistry::get('SiteCalls');
            $SiteEmails = TableRegistry::get('SiteEmails');

            $site = $Sites->find('all', [
                'conditions' => [
                    'Sites.id' => $this->request->getParam('site_id'),
                ],
                'contain' => [
					'Campaigns.CampaignStatisticsDaily' => function ($query) use ($fields) {
	                    return $query->where([
	                        'CampaignStatisticsDaily.date >=' => $fields['from'],
	                        'CampaignStatisticsDaily.date <=' => $fields['to'],
	                    ]);
	                },
					'SiteEmails' => function ($query) use ($fields) {
						return $query->select(['site_id', 'total' => $query->func()->count('*')])->where(["time BETWEEN '{$fields['from']} 00:00:00' AND '{$fields['to']} 23:59:59'"]);
					},
					'SiteCalls' => function ($query) use ($fields) {
						return $query->select(['site_id', 'total' => $query->func()->count('*')])->where(["time BETWEEN '{$fields['from']} 00:00:00' AND '{$fields['to']} 23:59:59'"]);
					},
					'SiteOrders' => function ($query) use ($fields) {
						return $query->select(['site_id', 'total' => $query->func()->sum('count')])->where(["time BETWEEN '{$fields['from']} 00:00:00' AND '{$fields['to']} 23:59:59'"]);
					},
					'SiteCosts' => function ($query) use ($fields) {
						return $query->select(['site_id', 'total' => $query->func()->sum('cost')])->where(["time BETWEEN '{$fields['from']} 00:00:00' AND '{$fields['to']} 23:59:59'"]);
					}
				],
            ])->first()->toArray();

            $result = [
                'clicks' => 0,
                'views' => 0,
                'cost' => isset($site['site_costs'][0]) ? $site['site_costs'][0]['total'] : 0,
                'emails' => isset($site['site_emails'][0]) ? $site['site_emails'][0]['total'] : 0,
                'calls' => isset($site['site_calls'][0]) ? $site['site_calls'][0]['total'] : 0,
				'orders' => isset($site['site_orders'][0]) ? $site['site_orders'][0]['total'] : 0,
            ];

            if (!empty($site)) {
                foreach ($site['campaigns'] as $campaign) {
                    foreach ($campaign['campaign_statistics_daily'] as $stat) {
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

    public function details()
    {
        if ($this->Validator->required($this->request->query, ['from', 'to'])) {

            $result = $details = [];

            $fields = $this->request->query;

            $siteId = $this->request->getParam('site_id');

            $dateFrom = $fields['from'] . ' 00:00:00';
            $dateTo = $fields['to'] . ' 23:59:59';
            $dateRange = new \DatePeriod(new \DateTime($dateFrom), \DateInterval::createFromDateString('1 hour'), new \DateTime($dateTo));

            if (!$dateRange) {
                $this->sendError(__('Can`t create date range'));
            }

            foreach ($dateRange as $dt) {
				$details[$dt->format("Y-m-d H:00:00")] = [
					'clicks' => 0,
					'views' => 0,
					'cost' => 0,
					'calls' => 0,
					'emails' => 0,
					'orders' => 0,
				];
            }

            $Sites = TableRegistry::get('Sites');
            $SiteCalls = TableRegistry::get('SiteCalls');
            $SiteEmails = TableRegistry::get('SiteEmails');

            $site = $Sites->find('all', [
                'conditions' => [
                    'Sites.id' => $siteId,
                ],
                'contain' => [
					'Campaigns.CampaignStatisticsHourly' => function ($query) use ($dateFrom, $dateTo) {
	                    return $query->where([
	                        'CampaignStatisticsHourly.time >=' => $dateFrom,
	                        'CampaignStatisticsHourly.time <=' => $dateTo,
	                    ]);
	                },
					'SiteEmails' => function ($query) use ($dateFrom, $dateTo) {
	                    return $query->where(["(time BETWEEN '{$dateFrom}' AND '{$dateTo}')"]);
	                },
					'SiteCalls' => function ($query) use ($dateFrom, $dateTo) {
	                    return $query->where(["(time BETWEEN '{$dateFrom}' AND '{$dateTo}')"]);
	                },
					'SiteOrders' => function ($query) use ($dateFrom, $dateTo) {
	                    return $query->where(["(time BETWEEN '{$dateFrom}' AND '{$dateTo}')"]);
	                },
					'SiteCosts' => function ($query) use ($dateFrom, $dateTo) {
	                    return $query->where(["(time BETWEEN '{$dateFrom}' AND '{$dateTo}')"]);
	                }
				],
            ])->first()->toArray();

            if (!empty($site['campaigns'])) {
                foreach ($site['campaigns'] as $campaign) {
                    foreach ($campaign['campaign_statistics_hourly'] as $stat) {
                        $key = $stat['time']->format('Y-m-d H:00:00');

                        $details[$key]['clicks'] += $stat['clicks'];
                        $details[$key]['views'] += $stat['views'];
                        $details[$key]['cost'] += $stat['cost'];
                    }
                }
            }

			foreach($site['site_emails'] as $email) {
				$key = $email['time']->format('Y-m-d H:00:00');
				$details[$key]['emails']++;
			}
			foreach($site['site_calls'] as $call) {
				$key = $call['time']->format('Y-m-d H:00:00');
				$details[$key]['calls']++;
			}
			foreach($site['site_orders'] as $order) {
				$key = $order['time']->format('Y-m-d H:00:00');
				$details[$key]['calls'] += $order['count'];
			}
			foreach($site['site_costs'] as $cost) {
				$key = $cost['time']->format('Y-m-d H:00:00');
				$details[$key]['cost'] += $cost['cost'];
			}

            foreach ($details as $time => $statistics) {
                $result[] = [
                    'time' => date(DATE_ATOM, strtotime($time)),
                    'statistics' => $statistics
                ];
            }

            $this->sendData($result);
        }

        $this->sendError($this->Validator->getLastError());
    }

    /*public function edit() {

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
    }*/
}
