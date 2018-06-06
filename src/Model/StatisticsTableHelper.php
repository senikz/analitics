<?php

namespace App\Model;

trait StatisticsTableHelper
{
	public $statItems = ['cost', 'views', 'clicks', 'calls', 'emails', 'leads', 'orders'];

    public function calcTotal($conditions)
    {
        $query = $this->find('all')->where($conditions);

        $statistics = $query
            ->select([
                'cost' => $query->func()->sum('cost'),
                'views' => $query->func()->sum('views'),
                'clicks' => $query->func()->sum('clicks'),
                'calls' => $query->func()->sum('calls'),
                'emails' => $query->func()->sum('emails'),
            ])
            ->first();

        if (empty($statistics)) {
            return [];
        }

		$statistics = $this->calcPerc($statistics);

        return [
            'clicks' => (int)$statistics->clicks,
            'views' => (int)$statistics->views,
            'cost' => sprintf('%.2f', $statistics->cost),
            'calls' => (int)$statistics->calls,
            'emails' => (int)$statistics->emails,
			'ctr' => (float)$statistics->ctr,
			'leads' => (int)$statistics->leads,
			'lead_perc' => (float)$statistics->lead_perc,
			'lead_cost' => (float)$statistics->lead_cost,
			'order_perc' => (float)$statistics->order_perc,
			'order_cost' => (float)$statistics->order_cost,
        ];
    }

	public function calcPerc($entity)
	{
		$entity->ctr = ($entity->views > 0 ? round(($entity->clicks * 100 / $entity->views), 2) : 0);
		$entity->leads = $entity->calls + $entity->emails;
		$entity->lead_perc = ($entity->clicks > 0 ? round(($entity->leads * 100 / $entity->clicks), 2) : 0);
		$entity->lead_cost = ($entity->leads > 0 ? round(($entity->cost / $entity->leads), 2) : 0);
		$entity->order_perc = ($entity->leads > 0 ? round(($entity->orders * 100 / $entity->leads), 2) : 0);
		$entity->order_cost = ($entity->orders > 0 ? round(($entity->cost / $entity->orders), 2) : 0);

		return $entity;
	}

	public function beforeSave(\Cake\Event\Event $event, $entity, \ArrayObject $options)
	{
		$entity = $this->calcPerc($entity);
		return true;
	}

	public function findOrCreateRecord($conditions)
	{
		$record = $this->find('all')->where($conditions)->first();

		if (empty($record)) {
			$record = $this->newEntity();
			foreach ($conditions as $name => $value) {
				$record->$name = $value;
			}
		}

		return $record;
	}

	public function findSum($conditions)
	{
		$query = $this->find('all');

		$itemParams = [];
		foreach ($this->statItems as $item) {
			$itemParams[$item] = $query->func()->sum($item);
		}

		return $query
			->select($itemParams)
			->group('date')
			->where($conditions)
			->first();
	}
}
