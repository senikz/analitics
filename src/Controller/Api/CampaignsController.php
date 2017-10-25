<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use \App\Model\Entity\Credential;

use Biplane\YandexDirect\User;
use Biplane\YandexDirect\Api\V5\Contract\KeywordFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\AdGroupFieldEnum;

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
                'contain' => false
            ]);

        foreach ($query as $row) {
            $result[] = [
                    'id' => $row->id,
                    'site_id' => $row->site_id,
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

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['site_id', 'profile_id', 'caption', 'key'])) {
                $campaign = $this->Campaigns->newEntity();
                $campaign->rel_id = $data['key'];
                $campaign->credential = $this->Campaigns->Credentials->get($data['profile_id']);
                $campaign = $this->Campaigns->patchEntity($campaign, $data);

                if ($a = $this->Campaigns->save($campaign)) {
                    $this->sendData([
                        'id' => $campaign->id
                    ]);
                }

                $this->sendError(__('Can`t add campaign'));
            }

            $this->sendError($this->Validator->getLastError());
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('delete') && $id) {
            $campaign = $this->Campaigns->get($id);
            if ($this->Campaigns->delete($campaign)) {
                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete campaign'));
            }
        }
    }

    public function sync()
    {
        $campaignId = $this->request->getParam('campaign_id');
        $campaignDetails = $this->Campaigns->get($campaignId, [
			'contain' => ['Credentials'],
		]);

		if(empty($campaignDetails->credential) || $campaignDetails->credential->type != Credential::TYPE_DIRECT) {
			$this->sendError('Campaign #'.$campaignId.' is not associated with any profiles');
		}

		$user = $campaignDetails->credential->getUser();

		$adGroups = $user->getAdGroupsService()->get(
			\Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsRequest::create()
				->setSelectionCriteria(
					\Biplane\YandexDirect\Api\V5\Contract\AdGroupsSelectionCriteria::create()->setCampaignIds([$campaignDetails->rel_id])
				)
				->setFieldNames([
					AdGroupFieldEnum::ID,
					AdGroupFieldEnum::NAME,
					AdGroupFieldEnum::CAMPAIGN_ID,
				])
		)->getAdGroups();

		if(!empty($adGroups)) {
			$adGroupsTable = TableRegistry::get('AdGroups');
			$adGroupsIds = [];

			foreach($adGroups as $group) {
				$groupDetails = $adGroupsTable->find('all', ['conditions' => ['rel_id' => $group->getId()]])->first();
				if(!$groupDetails) {
					$groupDetails = $adGroupsTable->newEntity(['rel_id' => $group->getId(), 'campaign_id' => $campaignId]);
				}
				$groupDetails->name = $group->getName();
				$adGroupsTable->save($groupDetails);

				$adGroupsIds[$group->getId()] = $groupDetails->id;
			}

			$adGroupsTable->deleteAll([
				'AdGroups.campaign_id' => $campaignId,
				'AdGroups.rel_id NOT IN' => array_keys($adGroupsIds),
			]);

			$keywords = $user->getKeywordsService()->get(
				\Biplane\YandexDirect\Api\V5\Contract\GetKeywordsRequest::create()
					->setSelectionCriteria(
						\Biplane\YandexDirect\Api\V5\Contract\KeywordsSelectionCriteria::create()->setCampaignIds([$campaignDetails->rel_id])
					)
					->setFieldNames([
						KeywordFieldEnum::ID,
						KeywordFieldEnum::AD_GROUP_ID,
						KeywordFieldEnum::KEYWORD,
					])
			)->getKeywords();

			if(!empty($keywords)) {
				$keywordsTable = TableRegistry::get('Keywords');
				$keywordsIds = [];

				$query = $keywordsTable->query()->insert(['rel_id', 'campaign_id', 'ad_group_id', 'keyword']);

				foreach($keywords as $keyword) {
					$keywordsIds[] = $keyword->getId();
					$query->values(['rel_id' => $keyword->getId(), 'campaign_id' => $campaignId, 'ad_group_id' => $adGroupsIds[$keyword->getAdGroupId()], 'keyword' => $keyword->getKeyword()]);
				}

				$query->epilog('ON DUPLICATE KEY UPDATE `keyword`=values(`keyword`)')->execute();

				$keywordsTable->deleteAll([
					'Keywords.campaign_id' => $campaignId,
					'Keywords.rel_id NOT IN' => $keywordsIds,
				]);
			}
		}
    }
}
