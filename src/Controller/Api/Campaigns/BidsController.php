<?php
namespace App\Controller\Api\Campaigns;

use Cake\ORM\TableRegistry;

class BidsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
        $result = ['options' => [], 'overrides' => [], 'hit' => 0];

        $Campaigns = TableRegistry::get('Campaigns');

        $campaign = $Campaigns->find('all', [
            'conditions' => [
                'Campaigns.id' => $this->request->getParam('campaign_id'),
            ],
            'contain' => ['BidOptions', 'AdGroups' => ['BidOptions'], 'Keywords' => ['BidOptions']],
        ])->first();

        if (empty($campaign)) {
            $this->sendError('Invalid Campaign ID');
        }

        if (!empty($campaign->bid_options)) {
            foreach ($campaign->bid_options as $option) {
                $res = $option->getObject();
                $res['hit'] = $option->hit;
                $result['options'][] = $res;
            }
        }

        $keywords = $groups = [];

        if (!empty($campaign->ad_groups)) {
            foreach ($campaign->ad_groups as $adGroup) {
                if (!empty($adGroup->bid_options)) {
                    $groups[] = [
                        'id' => $adGroup->id,
                        'name' => $adGroup->name,
                    ];
                }
            }
        }
        if (!empty($campaign->keywords)) {
            foreach ($campaign->keywords as $keyword) {
                if (!empty($keyword->bid_options)) {
                    $keywords[] = [
                        'id' => $keyword->id,
                        'ad_group_id' => $keyword->ad_group_id,
                        'keyword' => $keyword->keyword,
                    ];
                }
            }
        }

        if (!empty($keywords)) {
            $result['overrides']['keywords'] = $keywords;
        }
        if (!empty($groups)) {
            $result['overrides']['ad_groups'] = $groups;
        }

        $result['hit'] = $campaign->bid_hit;

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $campaignId = $this->request->getParam('campaign_id');

        $BidOptions = TableRegistry::get('BidOptions');

        $BidOptions->deleteAll([
            'type' => 'campaign',
            'rel_id' => $campaignId,
        ]);

        foreach ($data['data'] as $item) {
            if (!$this->Validator->required($item, ['max', 'position', 'increment', 'day_num', 'hour_num'])) {
                $this->sendError($this->Validator->getLastError());
            }

            $option = $BidOptions->newEntity();

            $option->type = 'campaign';
            $option->rel_id = $campaignId;
            $option->max = $item['max'];
            $option->position = $item['position'];
            $option->increment = $item['increment'];
            $option->day_num = $item['day_num'];
            $option->hour_num = $item['hour_num'];
            $option->status = empty($item['active']) ? 0 : 1;

            $BidOptions->save($option);
        }
        $this->sendData([]);
    }
}
