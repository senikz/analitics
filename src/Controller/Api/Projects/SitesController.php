<?php
namespace App\Controller\Api\Projects;

class SitesController extends \App\Controller\Api\ApiController
{

    public function index()
    {
		$result = [];
		$query = $this->request->query;

		$sites = $this->Sites->find('all', [
			'conditions' => [
				'project_id' => $this->request->params['project_id']
			]
		]);

		foreach ($sites as $row) {
			$result[] = [
				'id' => $row->id,
				'domain' => $row->domain,
			];
		}

		$order = empty($query['order']) ? 'time' : $query['order'];
		$reverse = (empty($query['reverse']) || !$query['reverse']) ? false : true;

		usort($result, function($a, $b) use($order, $reverse) {
			return ($a[$order] == $b[$order] ? 0 : ($a[$order] > $b[$order] ? 1 : -1)) * ($reverse ? -1 : 1);
		});

		$this->sendData($result);
    }

}
