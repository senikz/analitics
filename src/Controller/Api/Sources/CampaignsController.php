<?php
namespace App\Controller\Api\Sources;

class CampaignsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
		$sourceId = $this->request->getParam('source_id');
		$campaigns = $this->Campaigns->find()->where(['source_id' => $sourceId]);

		$this->prepareApiQuery($campaigns);
		$campaigns = $campaigns->all()->toArray();

		return $this->sendData(array_map(function ($campaign) {
			return [
				'id' => $campaign['id'],
				'rel_id' => $campaign['rel_id'],
				'caption' => $campaign['caption']
			];
		}, $campaigns));
    }
}
