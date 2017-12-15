<?php
namespace App\Controller\Api\Campaigns;

use Cake\ORM\TableRegistry;

class AdGroupsController extends \App\Controller\Api\ApiController
{
    public function index()
    {
		$this->sendData(array_map(function($group) {
			return [
				'id' => $group->id,
				'caption' => $group->name,
			];
		}, $this->AdGroups->find('all', [
			'conditions' => [
				'campaign_id' => $this->request->getParam('campaign_id'),
			],
            'contain' => []
        ])->toArray()));
    }
}
