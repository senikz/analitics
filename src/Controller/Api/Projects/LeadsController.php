<?php
namespace App\Controller\Api\Projects;

use Cake\ORM\TableRegistry;

class LeadsController extends \App\Controller\Api\ApiController
{
	public function initialize() {
		parent::initialize();
		$this->loadComponent('Validator');
	}

    public function index()
    {
		$query = $this->request->query;

		if($this->Validator->required($query, ['from', 'to'])) {

			$result = [];

			$tables = [
				'call' => TableRegistry::get('SiteCalls'),
				'email' => TableRegistry::get('SiteEmails'),
			];

			foreach($tables as $type => $table) {
				$records = $table->find('all', [
						'conditions' => [
							'Sites.project_id' => $this->request->params['project_id'],
							'time >=' => $query['from'] . ' 00:00:00',
							'time <=' => $query['to'] . ' 23:59:59',
						],
						'fields' => [
							'site_id',
							'type' => "'" . $type . "'",
							'source' => 'utm_source',
							'campaign' => 'utm_campaign',
							'keyword' => 'utm_term',
							'place' => 'utm_content',
							'time',
						],
						'contain' => ['Sites',],
					])->all();
				foreach($records as $item) {
					$result[] = $item->toArray();
				}
			}

			$order = empty($query['order']) ? 'time' : $query['order'];
			$reverse = (empty($query['reverse']) || !$query['reverse']) ? false : true;

			usort($result, function($a, $b) use($order, $reverse) {
				return ($a[$order] == $b[$order] ? 0 : ($a[$order] > $b[$order] ? 1 : -1)) * ($reverse ? -1 : 1);
			});

			$this->sendData($result);
		}

		$this->sendError($this->Validator->getLastError());
    }

}
