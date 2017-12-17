<?php
namespace App\Controller\Api\AdGroups;

use Cake\ORM\TableRegistry;

class BidsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('AdGroups');
        $this->loadModel('BidOptions');
    }

    public function index()
    {
        $result = ['options' => [], 'overrides' => []];

        $adGroup = $this->AdGroups->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('ad_group_id'),
            ],
            'contain' => ['BidOptions', 'Keywords' => ['BidOptions']],
        ])->first();

        if (empty($adGroup)) {
            $this->sendError('Invalid Ad Group ID');
        }

        if (!empty($adGroup->bid_options)) {
            foreach ($adGroup->bid_options as $option) {
                $result['options'][] = $option->getObject();
            }
        }

        $keywords = [];

        if (!empty($adGroup->keywords)) {
            foreach ($adGroup->keywords as $keyword) {
                if (!empty($keyword->bid_options)) {
                    $keywords[] = [
                        'id' => $keyword->id,
                        'keyword' => $keyword->keyword,
                    ];
                }
            }
        }

        if (!empty($keywords)) {
            $result['overrides']['keywords'] = $keywords;
        }

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $adGroupId = $this->request->getParam('ad_group_id');

        $this->BidOptions->deleteAll([
            'type' => 'ad_group',
            'rel_id' => $adGroupId,
        ]);

        foreach ($data['data'] as $item) {
            if (!$this->Validator->required($item, ['max', 'position', 'increment', 'day_num', 'hour_num'])) {
                $this->sendError($this->Validator->getLastError());
            }

            $option = $this->BidOptions->newEntity();

            $option->type = 'ad_group';
            $option->rel_id = $adGroupId;
            $option->max = $item['max'];
            $option->position = $item['position'];
            $option->increment = $item['increment'];
            $option->day_num = $item['day_num'];
            $option->hour_num = $item['hour_num'];
            $option->status = @$item['active'];

            $this->BidOptions->save($option);
        }
        $this->sendData([]);
    }
}
