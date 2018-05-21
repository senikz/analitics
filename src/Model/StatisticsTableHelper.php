<?php

namespace App\Model;

trait StatisticsTableHelper
{
    public function saveStatistics($record)
    {
        if ($record->cost || $record->views || $record->calls || $record->emails || $record->clicks) {
            $this->save($record);
        }
    }

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
		$entity->lead_perc = ($entity->clicks > 0 ? round(($entity->leads * 100 / $entity->clicks), 2) : 0);
		$entity->lead_cost = ($entity->leads > 0 ? round(($entity->cost / $entity->leads), 2) : 0);
		$entity->order_perc = ($entity->leads > 0 ? round(($entity->orders * 100 / $entity->leads), 2) : 0);
		$entity->order_cost = ($entity->orders > 0 ? round(($entity->cost / $entity->orders), 2) : 0);

		return true;
	}
}
