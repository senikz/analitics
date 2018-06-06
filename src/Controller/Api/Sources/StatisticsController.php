<?php
namespace App\Controller\Api\Sources;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('SourceStatisticsDaily');
    }

    public function summary()
    {
        $fields = $this->request->query;
        $sourceId = $this->request->getParam('source_id');

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->sendData($this->SourceStatisticsDaily->calcTotal([
            'source_id' => $sourceId,
            'date >=' => $fields['from'],
            'date <=' => $fields['to'],
        ]));
    }
}
