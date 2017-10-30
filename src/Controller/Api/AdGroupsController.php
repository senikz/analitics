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

        $count = empty($fields['count']) ? 5 : $fields['count'];

        $result = [];

        $keywordsTable = TableRegistry::get('Keywords');

        $conditions = [
            'ad_group_id' => $groupId,
        ];

        if (!empty($fields['mask'])) {
            $conditions['keyword LIKE'] = '%' . $fields['mask'] . '%';
        }

        $keywords = $keywordsTable->find('all', [
            'conditions' => $conditions,
            'contain' => false,
            'limit' => $count,
        ]);

        foreach ($keywords as $keyword) {
            $result[] = [
                'id' => $keyword->id,
                'keyword' => $keyword->keyword,
            ];
        }

        $this->sendData($result);
    }
}
