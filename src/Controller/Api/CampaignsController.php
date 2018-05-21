<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class CampaignsController extends ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
        $result = [];

        $query = $this->Campaigns->find('all', [
                'contain' => false,
            ]);

		$this->prepareApiQuery($query);

        foreach ($query as $row) {
            $result[] = [
                    'id' => $row->id,
                    'source_id' => $row->source_id,
                    'caption' => $row->caption,
                ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
                'contain' => ['BidOptions' => [
						'conditions' => [
							'BidOptions.day_num' => (date('w')==0 ? 6 : date('w')-1),
							'BidOptions.hour_num' => date('G'),
							'BidOptions.status' => '1',
						]
					]]
            ]);

		$bidsCurrent = 0;

		if(!empty($campaign->bid_options)) {
			$bidsCurrent = [
				'max' => $campaign->bid_options[0]->max,
				'position' => $campaign->bid_options[0]->position,
			];
		}

        $result = [
                'id' => $campaign->id,
                'source_id' => $campaign->source_id,
                'caption' => $campaign->caption,
                'type' => $campaign->getTypeHuman(),
                'num' => $campaign->rel_id,
				'bids' => [
					'current' => $bidsCurrent,
				],
            ];

        $this->sendData($result);
    }

    public function sync()
    {
		$campaign = $this->Campaigns->find('all')
			->where(['Campaigns.id' => $this->request->getParam('campaign_id')])
			->contain(['Sources'])
			->first();

		if(!empty($campaign)) {
			$campaign->source->syncCampaign($campaign);
		}
    }

    public function keywords()
    {
        $fields = $this->request->query;
        $campaignId = $this->request->getParam('campaign_id');

        $query = TableRegistry::get('Keywords')->find()
            ->where(['campaign_id' => $campaignId,])
            ->contain(false);

        if (!empty($fields['mask'])) {
            $query->where(['keyword LIKE' => '%' . $fields['mask'] . '%', ]);
        }

		$this->setQueryCount($query);
        $this->paginateQuery($query);

        $this->sendData(array_map(function ($keyword) {
            return [
                'id' => $keyword->id,
                'keyword' => $keyword->keyword,
            ];
        }, $query->toArray()));
    }
}
