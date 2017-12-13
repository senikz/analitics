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

			$page = null;
			if(!empty($query['page'])) {
				$page = explode(',', $query['page']);
				$page[0]--;
			}

			foreach($tables as $type => $table) {
				$conditions = [
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
					];

				if($type == 'call') {
					$conditions['fields']['unique'] = 'unique';
					$conditions['fields']['phone'] = 'phone';
					$conditions['fields']['duration'] = 'duration';
				} else {
					$conditions['fields']['details'] = 'details';
				}

				if($page) {
					$conditions['offset'] = $page[0];
					$conditions['limit'] = $page[1];
				}
				$records = $table->find('all', $conditions)->all();
				foreach($records as $item) {

					// Parse utm_content to find place
					if(!empty($item->place)) {
						$key = null;
						$place = [];
						foreach(explode('|', $item->place) as $k => $param) {
						    if($k%2) {
						        $place[$key] = $param;
						    } else {
						        $key = $param;
						    }
						}
						if(!empty($place['position_type']) && !empty($place['position']) && in_array($place['position_type'], ['premium', 'other'])) {
							$item->place = ($place['position_type'] == 'premium' ? '1' : '2') . $place['position'];
						} else if(!empty($place['source'])) {
							$item->place = $place['source'];
						} else {
							$item->place = null;
						}
					}

					// Try to parse json from email & find phone number
					if(!empty($item->details)) {
						$details = json_decode($item->details, true, 512, JSON_UNESCAPED_UNICODE);
						if(!empty($details['phone'])) {
							$item->phone = $details['phone'];
						}
					}

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
