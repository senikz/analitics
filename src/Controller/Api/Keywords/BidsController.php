<?php
namespace App\Controller\Api\Keywords;

use Cake\ORM\TableRegistry;

class BidsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('Keywords');
        $this->loadModel('BidOptions');
    }

    public function index()
    {
        $result = ['options' => [], 'overrides' => []];

        $keyword = $this->Keywords->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('keyword_id'),
            ],
            'contain' => ['BidOptions'],
        ])->first();

        if (empty($keyword)) {
            $this->sendError('Invalid Keyword ID');
        }

        if (!empty($keyword->bid_options)) {
            foreach ($keyword->bid_options as $option) {
                $result['options'][] = $option->getObject();
            }
        }

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $keywordId = $this->request->getParam('keyword_id');

        $this->BidOptions->deleteAll([
            'type' => 'keyword',
            'rel_id' => $keywordId,
        ]);

        foreach ($data['data'] as $item) {
            if (!$this->Validator->required($item, ['max', 'position', 'increment', 'day_num', 'hour_num'])) {
                $this->sendError($this->Validator->getLastError());
            }

            $option = $this->BidOptions->newEntity();

            $option->type = 'keyword';
            $option->rel_id = $keywordId;
            $option->max = $item['max'];
            $option->position = $item['position'];
            $option->increment = $item['increment'];
            $option->day_num = $item['day_num'];
            $option->hour_num = $item['hour_num'];
            $option->status = $item['active'];

            $this->BidOptions->save($option);
        }
        $this->sendData([]);
    }
}
