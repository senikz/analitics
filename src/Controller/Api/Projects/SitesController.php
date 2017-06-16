<?php
namespace App\Controller\Api\Projects;

class SitesController extends \App\Controller\Api\ApiController
{

    public function index()
    {
		$result = [];

		$query = $this->Sites->find('all', [
			'conditions' => [
				'project_id' => $this->request->params['project_id']
			]
		]);

		foreach ($query as $row) {
			$result[] = [
				'id' => $row->id,
				'domain' => $row->domain,
			];
		}

		$this->sendData($result);
    }

}
