<?php
namespace App\Controller\Api\Campaigns;

use Cake\ORM\TableRegistry;

class AdGroupsController extends \App\Controller\Api\ApiController
{
    public function index()
    {
		$query = $this->AdGroups->find()
			->where(['campaign_id' => $this->request->getParam('campaign_id'),])
			->contain(false);

		$this->setQueryCount($query);
		$this->paginateQuery($query);

		$this->sendData(array_map(function($group) {
			return [
				'id' => $group->id,
				'caption' => $group->name,
			];
		}, $query->toArray()));
    }
}
