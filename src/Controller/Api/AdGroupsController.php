<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class AdGroupsController extends ApiController
{
    public function index()
    {
        $result = [];

        $groups = $this->AdGroups->find('all', [
                'contain' => []
            ]);

        foreach ($groups as $group) {
            $result[] = [
                    'id' => $group->id,
                    'campaign_id' => $group->campaign_id,
                    'caption' => $group->name,
                ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $group = $this->AdGroups->get($id, [
                'contain' => []
            ]);

        $this->sendData([
            'id' => $group->id,
            'campaign_id' => $group->campaign_id,
            'caption' => $group->name,
        ]);
    }

    public function keywords()
    {
		$fields = $this->request->query;
		$groupId = $this->request->getParam('ad_group_id');

		$query = TableRegistry::get('Keywords')->find()
			->where(['ad_group_id' => $groupId,])
			->contain(false);

		if (!empty($fields['mask'])) {
			$query->where(['keyword LIKE' => '%' . $fields['mask'] . '%', ]);
		}

		$this->setQueryCount($query);
		$this->paginateQuery($query);

		$this->sendData(array_map(function ($keyword) {
			return [
				'id' => $keyword->id,
				'keyword' => $keyword->keyword,
			];
		}, $query->toArray()));
    }
}
