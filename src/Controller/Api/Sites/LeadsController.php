<?php
namespace App\Controller\Api\Sites;

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
							'site_id' => $this->request->params['site_id'],
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
						'contain' => false,
					])->all();
				foreach($records as $item) {
					$result[] = $item->toArray();
				}
			}

			$order = empty($query['order']) ? 'time' : $query['order'];
			$reverse = (empty($query['reverse']) || !$query['reverse']) ? false : true;


			uasort($result, function($a, $b) use($order, $reverse) {
				if($reverse) {
					return strnatcmp($b[$order], $a[$order]);
				} else {
					return strnatcmp($a[$order], $b[$order]);
				}

			});

			$this->sendData($result);
		}

		$this->sendError($this->Validator->getLastError());
    }

}
