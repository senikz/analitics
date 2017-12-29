<?php
namespace App\Controller\Api\Projects;

use Cake\ORM\TableRegistry;

class LeadsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
        $fields = $this->request->query;

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $conditions = [
            'Sites.project_id' => $this->request->params['project_id'],
            'time >=' => $fields['from'] . ' 00:00:00',
            'time <=' => $fields['to'] . ' 23:59:59',
        ];

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
            ->contain(['Sites',])
            ->where($conditions)
            ->select(array_merge($fields, [
                'type' => "'call'",
				'unique',
				'duration',
            ]));

        $emailsQuery = TableRegistry::get('SiteEmails')->find()
            ->contain(['Sites',])
            ->where($conditions)
            ->select(array_merge($fields, [
                'type' => "'email'",
				'unique' => "''",
				'duration' => "''",
            ]));

        $paginationQuery = $connection->newQuery();
        $this->paginateQuery($paginationQuery);

        $unionQuery = $callsQuery->unionAll($emailsQuery);
        $unionQuery->epilog($paginationQuery);

        $this->sendData($unionQuery->toArray());
    }
}
