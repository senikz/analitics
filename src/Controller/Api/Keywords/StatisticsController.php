<?php
namespace App\Controller\Api\Keywords;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('KeywordStatisticsDaily');
    }

    public function summary()
    {
        $fields = $this->request->query;
        $keywordId = $this->request->getParam('keyword_id');

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->sendData($this->KeywordStatisticsDaily->calcTotal([
            'keyword_id' => $keywordId,
            'date >=' => $fields['from'],
            'date <=' => $fields['to'],
        ]));
    }
}
