<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

class LeadsController extends \App\Controller\Api\ApiController
{
	public function initialize() {
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
            'site_id' => $this->request->params['site_id'],
            'time >=' => $fields['from'] . ' 00:00:00',
            'time <=' => $fields['to'] . ' 23:59:59',
        ]);

        $this->sendData($leads);
    }

}
