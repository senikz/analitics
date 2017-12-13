<?php
namespace App\Controller\Api\Projects;

use Cake\ORM\TableRegistry;

class OrdersController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
    }

    public function cost()
    {
        if ($this->Validator->required($this->request->query, ['from', 'to'])) {
            $result = $details = [];

            $fields = $this->request->query;

            $dateRange = new \DatePeriod(new \DateTime($fields['from']), \DateInterval::createFromDateString('1 hour'), new \DateTime($fields['to']));

            if (!$dateRange) {
                $this->sendError(__('Can`t create date range'));
            }

            foreach ($dateRange as $dt) {
                $details[$dt->format("Y-m-d")] = [
                    'cost' => 0,
                    'orders' => 0,
                ];
            }

            $Projects = TableRegistry::get('Projects');

            $project = $Projects->find('all', [
                'conditions' => [
                    'Projects.id' => $this->request->getParam('project_id'),
                ],
                'contain' => [
                    'Sites.Campaigns.CampaignStatisticsDaily' => function ($query) use ($fields) {
                        return $query->where([
                            'CampaignStatisticsDaily.date >=' => $fields['from'],
                            'CampaignStatisticsDaily.date <=' => $fields['to'],
                        ]);
                    },
                    'Sites.SiteOrders' => function ($query) use ($fields) {
                        return $query->where(["time BETWEEN '{$fields['from']}' AND '{$fields['to']}'"]);
                    }
                ],
            ])->first()->toArray();

            if (!empty($project['sites'])) {
                foreach ($project['sites'] as $site) {
                    foreach ($site['campaigns'] as $campaign) {
                        foreach ($campaign['campaign_statistics_daily'] as $stat) {
                            $key = $stat['date']->format('Y-m-d');
                            $details[$key]['cost'] += $stat['cost'];
                        }
                    }
                    foreach ($site['site_orders'] as $order) {
                        $key = $order['time']->format('Y-m-d');
                        $details[$key]['orders'] += $order['count'];
                    }
                }

                foreach ($details as $date => $statistics) {
                    $result[] = [
                        'date' => $date,
                        'cost' => ($statistics['orders'] > 0) ? sprintf("%.2f", $statistics['cost'] / $statistics['orders']) : 0,
                    ];
                }
            }

            $this->sendData($result);
        }

        $this->sendError($this->Validator->getLastError());
    }
}
