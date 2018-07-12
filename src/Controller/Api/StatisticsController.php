<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class StatisticsController extends ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function projects()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to', 'project_ids'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('ProjectStatisticsDaily');

        $query = $this->getQuery($fields)
			->join([
					'table' => 'projects',
					'alias' => 'Projects',
					'type' => 'RIGHT',
					'conditions' => 'ProjectStatisticsDaily.project_id = Projects.id and ' . $this->getDateString($fields),
				])
            ->select(['key_id' => 'Projects.id']);

        if (!empty($fields['project_ids'])) {
            if (is_string($fields['project_ids'])) {
                $fields['project_ids'] = explode(',', $fields['project_ids']);
            }
            $query->where([
                'Projects.id IN' => $fields['project_ids'],
            ]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    public function sites()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('SiteStatisticsDaily');
        $query = $this->getQuery($fields)
			->join([
					'table' => 'sites',
					'alias' => 'Sites',
					'type' => 'RIGHT',
					'conditions' => 'SiteStatisticsDaily.site_id = Sites.id and ' . $this->getDateString($fields),
				])
            ->select(['key_id' => 'Sites.id']);

        if (!empty($fields['site_ids'])) {
            if (is_string($fields['site_ids'])) {
                $fields['site_ids'] = explode(',', $fields['site_ids']);
            }
            $query->where([
                'Sites.id IN' => $fields['site_ids'],
            ]);
        }

        if (!empty($fields['project_id'])) {
            $query->where(['Sites.project_id' => $fields['project_id']]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    public function sources()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('SourceStatisticsDaily');
        $query = $this->getQuery($fields)
			->join([
					'table' => 'sources',
					'alias' => 'Sources',
					'type' => 'RIGHT',
					'conditions' => 'SourceStatisticsDaily.source_id = Sources.id and ' . $this->getDateString($fields),
				])
            ->select(['key_id' => 'Sources.id']);

        if (!empty($fields['source_ids'])) {
            if (is_string($fields['source_ids'])) {
                $fields['source_ids'] = explode(',', $fields['source_ids']);
            }
            $query->where([
                'Sources.id IN' => $fields['source_ids'],
            ]);
        }

        if (!empty($fields['site_id'])) {
            $query->where(['Sources.site_id' => $fields['site_id']]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    public function campaigns()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('CampaignStatisticsDaily');
        $query = $this->getQuery($fields)
			->join([
					'table' => 'campaigns',
					'alias' => 'Campaigns',
					'type' => 'RIGHT',
					'conditions' => 'CampaignStatisticsDaily.campaign_id = Campaigns.id and ' . $this->getDateString($fields),
				])
            ->select(['key_id' => 'Campaigns.id']);

        if (!empty($fields['campaign_ids'])) {
            if (is_string($fields['campaign_ids'])) {
                $fields['campaign_ids'] = explode(',', $fields['campaign_ids']);
            }
            $query->where([
                'Campaigns.id IN' => $fields['campaign_ids'],
            ]);
        }

        if (!empty($fields['source_id'])) {
            $query->where(['Campaigns.source_id' => $fields['source_id']]);
        } elseif (!empty($fields['site_id'])) {
            $query->where(['Campaigns.site_id' => $fields['site_id']]);
        } elseif (!empty($fields['project_id'])) {
            $query
                ->leftJoinWith('Campaigns.Sites')
                ->where(['Sites.project_id' => $fields['project_id']]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    public function ad_groups()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('AdGroupStatisticsDaily');
        $query = $this->getQuery($fields)
			->join([
					'table' => 'ad_groups',
					'alias' => 'AdGroups',
					'type' => 'RIGHT',
					'conditions' => 'AdGroupStatisticsDaily.ad_group_id = AdGroups.id and ' . $this->getDateString($fields),
				])
            ->select(['key_id' => 'AdGroups.id']);

        if (!empty($fields['ad_group_ids'])) {
            if (is_string($fields['ad_group_ids'])) {
                $fields['ad_group_ids'] = explode(',', $fields['ad_group_ids']);
            }
            $query->where([
                'AdGroups.id IN' => $fields['ad_group_ids'],
            ]);
        }

        if (!empty($fields['campaign_id'])) {
            $query->where(['AdGroups.campaign_id' => $fields['campaign_id']]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    public function keywords()
    {
        $fields = $this->request->query;
        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->StatTable = TableRegistry::get('KeywordStatisticsDaily');
        $query = $this->getQuery($fields)
            ->join([
                    'table' => 'keywords',
                    'alias' => 'Keywords',
                    'type' => 'RIGHT',
                    'conditions' => 'KeywordStatisticsDaily.keyword_id = Keywords.id and ' . $this->getDateString($fields),
                ])
            ->select(['key_id' => 'Keywords.id']);


        if (!empty($fields['keyword_ids'])) {
            if (is_string($fields['keyword_ids'])) {
                $fields['keyword_ids'] = explode(',', $fields['keyword_ids']);
            }
            $query->where([
                'Keywords.id IN' => $fields['keyword_ids'],
            ]);
        }

        if (!empty($fields['campaign_id'])) {
            $query->where(['Keywords.campaign_id' => $fields['campaign_id']]);
        }
        if (!empty($fields['ad_group_id'])) {
            $query->where(['Keywords.ad_group_id' => (int)$fields['ad_group_id']]);
        }

        $this->completeQuery($query);
        $this->sendData($this->buildResult($query));
    }

    private function getQuery($fields)
    {
        $query = $this->StatTable->find('all');

        $query->select([
            'cost' => $query->func()->sum('cost'),
            'views' => $query->func()->sum('views'),
            'clicks' => $query->func()->sum('clicks'),
            'ctr' => $query->func()->avg('ctr'),
            'calls' => $query->func()->sum('calls'),
            'emails' => $query->func()->sum('emails'),
            'leads' => $query->func()->sum('leads'),
            'lead_perc' => $query->newExpr('sum(leads) * 100 / sum(clicks)'),
            'lead_cost' => $query->newExpr('sum(cost) / sum(leads)'),
            'orders' => $query->func()->sum('orders'),
            'order_perc' => $query->newExpr('sum(orders) * 100 / sum(leads)'),
            'order_cost' => $query->newExpr('sum(cost) / sum(orders)'),
        ]);

        /*$query->where([
            'date >=' => $fields['from'],
            'date <=' => $fields['to'],
        ]);*/

        $query->group('key_id');

        return $query;
    }

    private function filterQuery($query, $fields)
    {
        $query->where([
            'date >=' => $fields['from'],
            'date <=' => $fields['to'],
        ]);
        return $query;
    }

    private function getDateString($fields)
    {
        return " date >= '{$fields['from']}' and date <= '{$fields['to']}'";
    }

    private function getItem($item)
    {
        return [
            'key_id' => $item->key_id,
            'cost' => (float)$item->cost,
            'views' => (int)$item->views,
            'clicks' => (int)$item->clicks,
            'ctr' => (float)$item->ctr,
            'calls' => (int)$item->calls,
            'emails' => (int)$item->emails,
            'leads' => (int)$item->leads,
            'lead_perc' => (float)$item->lead_perc,
            'lead_cost' => (float)$item->lead_cost,
            'orders' => (int)$item->orders,
            'order_perc' => (float)$item->order_perc,
            'order_cost' => (float)$item->order_cost,
        ];
    }

    private function buildResult($query)
    {
        $result = [];
        foreach ($query as $item) {
            $result[] = $this->getItem($item);
        }
        return $result;
    }

    private function completeQuery(&$query)
    {
        $this->paginateQuery($query);
        $this->orderQuery($query);
        $this->setQueryCount($query);
    }
}
