<?php
namespace App\Controller\Api\AdGroups;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('AdGroups');
        $this->loadModel('Keywords');
        $this->loadModel('Campaigns');
        $this->loadModel('AdGroupStatisticsDaily');
		$this->loadModel('SiteCalls');
		$this->loadModel('SiteEmails');
    }

    public function summary()
    {
        $fields = $this->request->query;
        $adGroupId = $this->request->getParam('ad_group_id');

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

		try {
        	$adGroup = $this->AdGroups->get($adGroupId);
			$campaign = $this->Campaigns->get($adGroup->campaign_id);
		} catch (\Exception $e) {
			$this->sendError('Invalid AdGroup ID');
		}

        $query = $this->AdGroupStatisticsDaily->find('all', [
            'conditions' => [
                'ad_group_id' => $adGroupId,
                'date >=' => $fields['from'],
                'date <=' => $fields['to']
            ],
        ]);

        $statistics = $query
            ->select([
                'total_clicks' => $query->func()->sum('clicks'),
                'total_cost' => $query->func()->sum('cost'),
                'total_views' => $query->func()->sum('views'),
            ])
            ->first();

		$keywordsList = $this->Keywords->find('list', ['keyField' => 'id', 'valueField' => 'rel_id'])->toArray();

		$calls = $this->SiteCalls->findCountBy([
				'utm_campaign LIKE' => '%' . $campaign->rel_id,
				'utm_term IN' => array_values($keywordsList),
				'time >=' => $fields['from'] . ' 00:00:00',
				'time <=' => $fields['to'] . ' 23:59:59',
			]);

		$emails = $this->SiteEmails->findCountBy([
				'utm_campaign LIKE' => '%' . $campaign->rel_id,
				'utm_term REGEXP' => join('|', array_values($keywordsList)),
				'time >=' => $fields['from'] . ' 00:00:00',
				'time <=' => $fields['to'] . ' 23:59:59',
			]);

        if ($statistics) {
            $this->sendData([
                'clicks' => (int)$statistics->total_clicks,
                'views' => (int)$statistics->total_views,
                'cost' => sprintf('%.2f', $statistics->total_cost),
                'calls' => $calls,
                'emails' => $emails,
            ]);
        }
    }
}
