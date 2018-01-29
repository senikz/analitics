<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class StatisticsController extends ApiController
{
	public function initialize() {
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

		$query = $this->getQuery()
			->select(['project_id'])
			->group('project_id');

		if(!empty($fields['project_ids'])) {
			if(is_string($fields['project_ids'])) {
				$fields['project_ids'] = explode(',', $fields['project_ids']);
			}
			$query->where([
				'project_id IN' => $fields['project_ids'],
			]);
		}

		$this->completeQuery($query);

		$result = [];

		foreach ($query as $item) {
		    $result[] = array_merge([
					'project_id' => $item->project_id,
				],
				$this->getItem($item)
			);
		}

		$this->sendData($result);
	}

    public function sites()
    {
		$fields = $this->request->query;
		if (!$this->Validator->required($fields, ['from', 'to'])) {
			$this->sendError($this->Validator->getLastError());
		}

		$this->StatTable = TableRegistry::get('SiteStatisticsDaily');
		$query = $this->getQuery($fields)
			->select(['site_id'])
			->group('site_id');

		if(!empty($fields['site_ids'])) {
			if(is_string($fields['site_ids'])) {
				$fields['site_ids'] = explode(',', $fields['site_ids']);
			}
			$query->where([
				'site_id IN' => $fields['site_ids'],
			]);
		}

		if(!empty($fields['project_id'])) {
			$query
				->leftJoinWith('Sites', function ($q) use ($fields) {
			        return $q
						->where(['Site.project_id' => $fields['project_id']]);
			    });
		}

		$this->completeQuery($query);

		$result = [];

		foreach ($query as $item) {
		    $result[] = array_merge([
					'site_id' => $item->site_id,
				],
				$this->getItem($item)
			);
		}

		$this->sendData($result);
	}

    public function campaigns()
    {
		$fields = $this->request->query;
		if (!$this->Validator->required($fields, ['from', 'to'])) {
			$this->sendError($this->Validator->getLastError());
		}

		$this->StatTable = TableRegistry::get('CampaignStatisticsDaily');
		$query = $this->getQuery($fields)
			->select(['campaign_id'])
			->group('campaign_id');

		if(!empty($fields['campaign_ids'])) {
			if(is_string($fields['campaign_ids'])) {
				$fields['campaign_ids'] = explode(',', $fields['campaign_ids']);
			}
			$query->where([
				'campaign_id IN' => $fields['campaign_ids'],
			]);
		}

		if(!empty($fields['site_id'])) {
			$query
				->leftJoinWith('Campaigns', function ($q) use ($fields) {
			        return $q
						->where(['Campaigns.site_id' => $fields['site_id']]);
			    });
		} else if(!empty($fields['project_id'])) {
			$query = $query
				->leftJoinWith('Campaigns.Sites', function ($q) use ($fields) {
			        return $q->where(['Sites.project_id' => $fields['project_id']]);
			    });
		}

		$this->completeQuery($query);

		$result = [];

		foreach ($query as $item) {
		    $result[] = array_merge([
					'campaign_id' => $item->campaign_id,
				],
				$this->getItem($item)
			);
		}

		$this->sendData($result);
	}

    public function adGroups()
    {
		$fields = $this->request->query;
		if (!$this->Validator->required($fields, ['from', 'to'])) {
			$this->sendError($this->Validator->getLastError());
		}

		$this->StatTable = TableRegistry::get('AdGroupStatisticsDaily');
		$query = $this->getQuery($fields)
			->select(['ad_group_id'])
			->group('ad_group_id');

		if(!empty($fields['ad_group_ids'])) {
			if(is_string($fields['ad_group_ids'])) {
				$fields['ad_group_ids'] = explode(',', $fields['ad_group_ids']);
			}
			$query->where([
				'ad_group_id IN' => $fields['ad_group_ids'],
			]);
		}

		if(!empty($fields['campaign_id'])) {
			$query
				->leftJoinWith('AdGroups', function ($q) use ($fields) {
			        return $q
						->where(['AdGroups.campaign_id' => $fields['campaign_id']]);
			    });
		}

		$this->completeQuery($query);

		$result = [];

		foreach ($query as $item) {
		    $result[] = array_merge([
					'ad_group_id' => $item->ad_group_id,
				],
				$this->getItem($item)
			);
		}

		$this->sendData($result);
	}

    public function keywords()
    {
		$fields = $this->request->query;
		if (!$this->Validator->required($fields, ['from', 'to'])) {
			$this->sendError($this->Validator->getLastError());
		}

		$this->StatTable = TableRegistry::get('KeywordStatisticsDaily');
		$query = $this->getQuery($fields)
			->select(['keyword_id'])
			->group('keyword_id');

		if(!empty($fields['keyword_ids'])) {
			if(is_string($fields['keyword_ids'])) {
				$fields['keyword_ids'] = explode(',', $fields['keyword_ids']);
			}
			$query->where([
				'keyword_id IN' => $fields['keyword_ids'],
			]);
		}

		if(!empty($fields['campaign_id']) || !empty($fields['ad_group_id'])) {
			$query
				->leftJoinWith('Keywords', function ($q) use ($fields) {
					if(!empty($fields['campaign_id'])) {
						$q->where(['Keywords.campaign_id' => $fields['campaign_id']]);
					}
					if(!empty($fields['ad_group_id'])) {
						$q->where(['Keywords.ad_group_id' => $fields['ad_group_id']]);
					}
			        return $q;
			    });

		}

		$this->completeQuery($query);

		$result = [];

		foreach ($query as $item) {
		    $result[] = array_merge([
					'keyword_id' => $item->keyword_id,
				],
				$this->getItem($item)
			);
		}

		$this->sendData($result);
	}


	private function getQuery($fields)
	{
		$query = $this->StatTable->find('all');

		$query->select([
			'cost' => $query->func()->sum('cost'),
			'views' => $query->func()->sum('views'),
			'clicks' => $query->func()->sum('clicks'),
			'calls' => $query->func()->sum('calls'),
			'emails' => $query->func()->sum('emails'),
			'leads' => $query->func()->sum('leads'),
		]);

		$query->where([
			'date >=' => $fields['from'] . ' 00:00:00',
			'date <=' => $fields['from'] . ' 23:59:59',
		]);

		return $query;
	}

	private function getItem($item)
	{
		return [
			'cost' => $item->cost,
			'views' => $item->views,
			'clicks' => $item->clicks,
			'calls' => $item->calls,
			'emails' => $item->emails,
			'leads' => $item->leads,
			'orders' => $item->orders,
		];
	}

	private function completeQuery(&$query)
	{
		$this->paginateQuery($query);
		$this->orderQuery($query);
		$this->setQueryCount($query);
	}
}
