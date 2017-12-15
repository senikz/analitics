<?php
namespace App\Controller\Api\Keywords;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('Campaigns');
        $this->loadModel('Keywords');
        $this->loadModel('KeywordStatisticsDaily');
        $this->loadModel('SiteCalls');
        $this->loadModel('SiteEmails');
    }

    public function summary()
    {
        $fields = $this->request->query;
        $keywordId = $this->request->getParam('keyword_id');

        if (!$this->Validator->required($fields, ['from', 'to'])) {
            $this->sendError($this->Validator->getLastError());
        }

        try {
            $keyword = $this->Keywords->get($keywordId);
			$campaign = $this->Campaigns->get($keyword->campaign_id);
        } catch (\Exception $e) {
            $this->sendError('Invalid Keyword ID');
        }

        $query = $this->KeywordStatisticsDaily->find('all', [
            'conditions' => [
                'keyword_id' => $keywordId,
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

		$calls = $this->SiteCalls->findCountBy([
				'utm_campaign' => $campaign->rel_id,
				'utm_term' => $keyword->keyword,
				'time >=' => $fields['from'] . ' 00:00:00',
				'time <=' => $fields['to'] . ' 23:59:59',
			]);
		$emails = $this->SiteEmails->findCountBy([
				'utm_campaign LIKE' => '%' . $campaign->rel_id,
				'utm_term LIKE' => '%' . $keyword->rel_id,
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
