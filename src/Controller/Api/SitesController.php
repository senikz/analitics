<?php
namespace App\Controller\Api;

class SitesController extends ApiController
{
	public function index()
    {
		$result = [];

		$query = $this->Sites->find('all', [
			'contain' => false
		]);

		foreach ($query as $row) {
			$result[] = [
				'id' => $row->id,
				'domain' => $row->domain,
			];
		}

		$this->sendData($result);
    }

    public function view($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => []
        ]);

		$result = [
			'id' => $site->id,
			'caption' => $site->domain,
		];

		$this->sendData($result);
    }
}
