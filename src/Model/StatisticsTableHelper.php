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
                'total_cost' => $query->func()->sum('cost'),
                'total_views' => $query->func()->sum('views'),
                'total_clicks' => $query->func()->sum('clicks'),
                'total_calls' => $query->func()->sum('calls'),
                'total_emails' => $query->func()->sum('emails'),
            ])
            ->first();

        if (empty($statistics)) {
            return [];
        }

        return [
            'clicks' => (int)$statistics->total_clicks,
            'views' => (int)$statistics->total_views,
            'cost' => sprintf('%.2f', $statistics->total_cost),
            'calls' => (int)$statistics->total_calls,
            'emails' => (int)$statistics->total_emails,
        ];
    }

	public function create($statRecord, $date, $entity = false)
	{

	}

	public function beforeSave(\Cake\Event\Event $event, $entity, \ArrayObject $options)
	{
		$entity->ctr = ($entity->views > 0 ? round(($entity->clicks * 100 / $entity->views), 2) : 0);
		$entity->leads = $entity->calls + $entity->emails;
		$entity->lead_perc = ($entity->clicks > 0 ? round(($entity->leads * 100 / $entity->clicks), 2) : 0);
		$entity->lead_cost = ($entity->leads > 0 ? round(($entity->cost / $entity->leads), 2) : 0);
		$entity->order_perc = ($entity->leads > 0 ? round(($entity->orders * 100 / $entity->leads), 2) : 0);
		$entity->order_cost = ($entity->orders > 0 ? round(($entity->cost / $entity->orders), 2) : 0);

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
