<?php
namespace App\Controller\Api\Projects;

class CampaignsController extends \App\Controller\Api\ApiController
{

    public function index()
    {
		$result = [];

		$query = $this->Campaigns->find('all', [
			'conditions' => [
				'Sites.project_id' => $this->request->params['project_id']
			],
			'contain' => ['Sites',],
		]);


		foreach ($query as $row) {
			$result[] = [
				'id' => $row->id,
				'site_id' => $row->site_id,
				'caption' => $row->caption,
			];
		}

		$this->sendData($result);
    }

}
