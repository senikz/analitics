<?php
namespace App\Controller\Api\Accounts;

class CampaignsController extends \App\Controller\Api\ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
        $this->loadModel('Accounts');
        $this->loadModel('Campaigns');
    }

    public function index()
    {
		$accountId = $this->request->getParam('account_id');
		$campaigns = $this->Campaigns->find()->where(['account_id' => $accountId])->all()->toArray();

		return $this->sendData(array_map(function ($campaign) {
			return [
				'id' => $campaign['id'],
				'rel_id' => $campaign['rel_id'],
				'caption' => $campaign['caption']
			];
		}, $campaigns));
    }

	public function load()
	{
		$accountId = $this->request->getParam('account_id');

		if ($account = $this->Accounts->get($accountId)) {
			if (!$account->isCampaignable()) {
				return $this->sendData([]);
			}

			$result = [];
			$campaigns = $account->getCampaigns();
			foreach ($campaigns as $campaign) {
				$result[] = [
					'id' => $campaign->getId(),
					'name' => $campaign->getName(),
				];
			}

			return $this->sendData($result);
		}
	}
}
