<?php
namespace App\Controller\Api\Projects;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Validator');
	}

	public function summary()
	{
		if($this->Validator->required($this->request->query, ['from', 'to'])) {

			$fields = $this->request->query;

			$Projects = TableRegistry::get('Projects');

			$project = $Projects->find('all', [
				'conditions' => [
					'Projects.id' => $this->request->getParam('project_id'),
				],
				'contain' => [
					'Sites.Campaigns.CampaignStatisticsDaily' => function($query) use ($fields) {
						return $query->where([
							'CampaignStatisticsDaily.date >=' => $fields['from'],
							'CampaignStatisticsDaily.date <=' => $fields['to'],
						]);
					},
				],
			])->first()->toArray();

			$result = [
				'clicks' => 0,
				'views' => 0,
				'cost' => 0,
			];

			if(!empty($project)) {
				foreach($project['sites'] as $site) {
					foreach($site['campaigns'] as $campaign) {
						foreach($campaign['campaign_statistics_daily'] as $stat) {
							$result['clicks'] += $stat['clicks'];
							$result['views'] += $stat['views'];
							$result['cost'] += $stat['cost'];
						}
					}
				}
			}

			$this->sendData($result);
		}

		$this->sendError($this->Validator->getLastError());
	}

}
