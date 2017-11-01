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
        $result = null;

        $Campaigns = TableRegistry::get('Campaigns');

        $campaign = $Campaigns->find('all', [
            'conditions' => [
                'Campaigns.id' => $this->request->getParam('campaign_id'),
            ],
            'contain' => ['BidOptions',],
        ])->first();

        if (!empty($campaign->bid_options)) {
            $result = $campaign->bid_options[0]->getObject();
			$result['hit'] = $campaign->bid_options[0]->hit;
        }

        $this->sendData($result);
    }

    public function edit()
    {
        $data = $this->request->getData();
        $campaignId = $this->request->getParam('campaign_id');

        if ($this->Validator->required($data, ['max', 'position', 'increment'])) {

			$BidOptions = TableRegistry::get('BidOptions');

            $BidOptions->deleteAll([
                'type' => 'campaign',
                'rel_id' => $campaignId,
            ]);

			$option = $BidOptions->newEntity();
			$option->type = 'campaign';
			$option->rel_id = $campaignId;
			$option->max = $data['max'];
			$option->position = $data['position'];
			$option->increment = $data['increment'];
			$option->status = @(int)$data['active'];
			$BidOptions->save($option);

            $this->sendData([]);
        }

        $this->sendError($this->Validator->getLastError());
    }
}
