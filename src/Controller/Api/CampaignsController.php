<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use App\Utility\YandexDirectApi;

class CampaignsController extends ApiController
{

    public function index()
    {
        $result = [];

        $query = $this->Campaigns->find('all', [
                'contain' => false
            ]);

        foreach ($query as $row) {
            $result[] = [
                    'id' => $row->id,
                    'caption' => $row->caption,
                ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
                'contain' => []
            ]);

        $result = [
                'id' => $campaign->id,
				'site_id' => $campaign->site_id,
                'caption' => $campaign->caption,
				'type' => $campaign->getType(),
				'num' => $campaign->rel_id,
            ];

        $this->sendData($result);
    }

	public function importFromYandexDirect() {

		$YandexDirect = new YandexDirectApi();
		$campaignsAvailable = $YandexDirect->GetCampaignsList();

		$campaignsExisting = $this->Campaigns->find('all')->all()->toArray();

		$Sites = TableRegistry::get('Sites');
		$sites = $Sites->find('all')->all()->toArray();

		if(!empty($campaigns)) {
			foreach($sites as $site) {

				$siteParts = explode('.', $site->domain);
				$siteName = $siteParts[count($siteParts)-2];

				foreach($campaignsAvailable as $available) {
					if(in_array($available['State'], ['ON', 'SUSPENDED']) && strpos(strtolower($available['Name']), $siteName) !== false) {

						$added = false;
						foreach($campaignsExisting as $existing) {
							if($existing->type === 'direct' && $existing->rel_id == $available['Id']) {
								$added = true;
								break;
							}
						}

						if(!$added) {
							$newCampaign = $this->Campaigns->newEntity();
							$newCampaign->site_id = $site->id;
							$newCampaign->caption = $available['Name'];
							$newCampaign->type = 'direct';
							$newCampaign->rel_id = $available['Id'];
							$this->Campaigns->save($newCampaign);
						}

					}
				}

			}
		}
	}
}
