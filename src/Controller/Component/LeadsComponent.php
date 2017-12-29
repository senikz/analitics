<?php
namespace App\Controller\Component;

use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

class LeadsComponent extends Component
{
    public function getLeadsBy($conditions, $contain = false)
    {
        $fields = [
            'site_id' => 'site_id',
            'source' => 'utm_source',
            'campaign' => 'utm_campaign',
            'keyword ' => 'utm_term',
            'place' => 'position',
            'time' => 'time',
            'phone' => 'phone',
        ];

        $connection = TableRegistry::get('SiteCalls')->connection();

        $callsQuery = TableRegistry::get('SiteCalls')->find()
            ->contain($contain)
            ->where($conditions)
            ->select(array_merge($fields, [
				'id' => 'SiteCalls.id',
                'type' => "'call'",
                'unique',
                'duration',
            ]));

        $emailsQuery = TableRegistry::get('SiteEmails')->find()
            ->contain($contain)
            ->where($conditions)
            ->select(array_merge($fields, [
				'id' => 'SiteEmails.id',
                'type' => "'email'",
                'unique' => "''",
                'duration' => "''",
            ]));

		$controller = $this->_registry->getController();
        $paginationQuery = $connection->newQuery();
        $controller->paginateQuery($paginationQuery);
        $controller->orderQuery($paginationQuery);

        $unionQuery = $callsQuery->unionAll($emailsQuery);
        $unionQuery->epilog($paginationQuery);

        return $unionQuery->toArray();
    }
}
