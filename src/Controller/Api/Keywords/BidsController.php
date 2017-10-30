<?php
namespace App\Controller\Api\Keywords;

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

        $keywordsTable = TableRegistry::get('Keywords');

        $keyword = $keywordsTable->find('all', [
            'conditions' => [
                'id' => $this->request->getParam('keyword_id'),
            ],
            'contain' => ['BidOptions',],
        ])->first();

        if (!empty($keyword->bid_options)) {
            $result = $keyword->bid_options[0]->getObject();
        }

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $keywordId = $this->request->getParam('keyword_id');

        if ($this->Validator->required($data, ['max', 'position', 'increment'])) {

			$BidOptions = TableRegistry::get('BidOptions');

            $BidOptions->deleteAll([
                'type' => 'keyword',
                'rel_id' => $keywordId,
            ]);

			$option = $BidOptions->newEntity();
			$option->type = 'keyword';
			$option->rel_id = $keywordId;
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
