<?php
namespace App\Model\Entity\Source;

use Cake\ORM\TableRegistry;

use Biplane\YandexDirect\User;
use Biplane\YandexDirect\Api\V5\Contract\KeywordFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\AdGroupFieldEnum;

class Direct extends \App\Model\Entity\Source
{
	const TYPE = 'direct';
	const TYPE_HUMAN = 'Яндекс.Директ';

    public function getProvider()
    {
        return new User([
            'access_token' => $this->option('token'),
            'login' => $this->option('login'),
            'locale' => User::LOCALE_RU,
        ]);
    }

    /*public function updateLimits($service)
    {
        $this->credential->updateLimits($service->getUnits()->getRest());
    }*/

    public function syncCampaign(\App\Model\Entity\Campaign $campaign)
    {
        $provider = $this->getProvider();

        if (!$provider) {
            return false;
        }

        $adGroupsService = $provider->getAdGroupsService();
        $adGroups = $adGroupsService->get(
            \Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsRequest::create()
                ->setSelectionCriteria(
                    \Biplane\YandexDirect\Api\V5\Contract\AdGroupsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id])
                )
                ->setFieldNames([
                    AdGroupFieldEnum::ID,
                    AdGroupFieldEnum::NAME,
                    AdGroupFieldEnum::CAMPAIGN_ID,
                ])
        )->getAdGroups();
        //$this->updateLimits($adGroupsService);

        if (!empty($adGroups)) {
            $adGroupsTable = TableRegistry::get('AdGroups');
            $adGroupsIds = [];

            foreach ($adGroups as $group) {
                $groupDetails = $adGroupsTable->find('all', ['conditions' => ['rel_id' => $group->getId()]])->first();
                if (!$groupDetails) {
                    $groupDetails = $adGroupsTable->newEntity(['rel_id' => $group->getId(), 'campaign_id' => $campaign->id]);
                }
                $groupDetails->name = $group->getName();
                $adGroupsTable->save($groupDetails);

                $adGroupsIds[$group->getId()] = $groupDetails->id;
            }

            $adGroupsTable->deleteAll([
                'AdGroups.campaign_id' => $campaign->id,
                'AdGroups.rel_id NOT IN' => array_keys($adGroupsIds),
            ]);

            $keywordsService = $provider->getKeywordsService();
            $keywords = $keywordsService->get(
                \Biplane\YandexDirect\Api\V5\Contract\GetKeywordsRequest::create()
                    ->setSelectionCriteria(
                        \Biplane\YandexDirect\Api\V5\Contract\KeywordsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id])
                    )
                    ->setFieldNames([
                        KeywordFieldEnum::ID,
                        KeywordFieldEnum::AD_GROUP_ID,
                        KeywordFieldEnum::KEYWORD,
                    ])
            )->getKeywords();
            //$this->updateLimits($keywordsService);

            if (!empty($keywords)) {
                $keywordsTable = TableRegistry::get('Keywords');
                $keywordsIds = [];

                $query = $keywordsTable->query()->insert(['rel_id', 'campaign_id', 'ad_group_id', 'keyword']);

                foreach ($keywords as $keyword) {
                    $keywordsIds[] = $keyword->getId();
                    $query->values(['rel_id' => $keyword->getId(), 'campaign_id' => $campaign->id, 'ad_group_id' => $adGroupsIds[$keyword->getAdGroupId()], 'keyword' => $keyword->getKeyword()]);
                }

                $query->epilog('ON DUPLICATE KEY UPDATE `keyword`=values(`keyword`)')->execute();

                $keywordsTable->deleteAll([
                    'Keywords.campaign_id' => $campaign->id,
                    'Keywords.rel_id NOT IN' => $keywordsIds,
                ]);
            }

            return true;
        }
    }


}
