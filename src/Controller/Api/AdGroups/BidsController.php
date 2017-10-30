<?php
namespace App\Controller\Api\AdGroups;

use Cake\ORM\TableRegistry;

class BidsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
        $result = null;

        $groupsTable = TableRegistry::get('AdGroups');

        $group = $groupsTable->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('ad_group_id'),
            ],
            'contain' => ['BidOptions',],
        ])->first();

        if (!empty($group->bid_options)) {
            $result = $group->bid_options[0]->getObject();
        }

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $groupId = $this->request->getParam('ad_group_id');

        if ($this->Validator->required($data, ['max', 'position', 'increment'])) {

			$BidOptions = TableRegistry::get('BidOptions');

            $BidOptions->deleteAll([
                'type' => 'adgroup',
                'rel_id' => $groupId,
            ]);

			$option = $BidOptions->newEntity();
			$option->type = 'adgroup';
			$option->rel_id = $groupId;
			$option->max = $data['max'];
			$option->position = $data['position'];
			$option->increment = $data['increment'];
			$option->status = @(int)$data['active'];
			$BidOptions->save($option);

            $this->sendData([]);
        }

        $this->sendError($this->Validator->getLastError());
    }
}
