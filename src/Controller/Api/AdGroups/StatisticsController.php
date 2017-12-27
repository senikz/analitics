<?php
namespace App\Controller\Api\AdGroups;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('AdGroupStatisticsDaily');
    }

    public function summary()
    {
        $fields = $this->request->query;
        $adGroupId = $this->request->getParam('ad_group_id');

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        $this->sendData($this->AdGroupStatisticsDaily->calcTotal([
            'ad_group_id' => $adGroupId,
            'date >=' => $fields['from'],
            'date <=' => $fields['to'],
        ]));
    }
}
