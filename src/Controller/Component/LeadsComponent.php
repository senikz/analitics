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
            'site_id',
            'source' => 'utm_source',
            'campaign' => 'utm_campaign',
            'keyword' => 'utm_term',
            'place' => 'position',
            'time',
            'phone',
        ];

        $connection = TableRegistry::get('SiteCalls')->connection();

        $callsQuery = TableRegistry::get('SiteCalls')->find()
            ->contain($contain)
            ->where($conditions)
            ->select(array_merge($fields, [
                'type' => "'call'",
                'unique',
                'duration',
            ]));

        $emailsQuery = TableRegistry::get('SiteEmails')->find()
            ->contain($contain)
            ->where($conditions)
            ->select(array_merge($fields, [
                'type' => "'email'",
                'unique' => "''",
                'duration' => "''",
            ]));

        $paginationQuery = $connection->newQuery();
        $this->_registry->getController()->paginateQuery($paginationQuery);

        $unionQuery = $callsQuery->unionAll($emailsQuery);
        $unionQuery->epilog($paginationQuery);

        return $unionQuery->toArray();
    }
}
