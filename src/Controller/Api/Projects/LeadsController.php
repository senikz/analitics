<?php
namespace App\Controller\Api\Projects;

use Cake\ORM\TableRegistry;

class LeadsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadComponent('Leads');
    }

    public function index()
    {
        $fields = $this->request->query;

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

		$leads = $this->Leads->getLeadsBy([
            'Sites.project_id' => $this->request->params['project_id'],
            'time >=' => $fields['from'] . ' 00:00:00',
            'time <=' => $fields['to'] . ' 23:59:59',
        ], ['Sites']);

        $this->sendData($leads);
    }
}
