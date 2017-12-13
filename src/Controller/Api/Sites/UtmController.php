<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

use Biplane\YandexDirect\Api\V5\Contract\IdsCriteria;
use Biplane\YandexDirect\Api\V5\Contract\LimitOffset;
use Biplane\YandexDirect\Api\V5\Contract\AdFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\TextAdFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\SitelinkFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\GetSitelinksRequest;
use Biplane\YandexDirect\Api\V5\Contract\AdsSelectionCriteria;

use Biplane\YandexDirect\Api\V5\Contract\SitelinksSetAddItem;
use Biplane\YandexDirect\Api\V5\Contract\AddSitelinksRequest;
use Biplane\YandexDirect\Api\V5\Contract\DeleteSitelinksRequest;

use Biplane\YandexDirect\Api\V5\Contract\AdUpdateItem;
use Biplane\YandexDirect\Api\V5\Contract\GetAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\UpdateAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\TextAdUpdate;


class UtmController extends \App\Controller\Api\ApiController
{
	public function initialize() {
		parent::initialize();
		$this->loadComponent('Validator');
	}

	private $utmsList = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];

    public function index()
    {
    }

    public function edit()
    {
		$result = [];

		$siteId = $this->request->getParam('site_id');
		$query = $this->request->query;
		$data = $this->request->data;

		$method = empty($query['method']) ? 'replace' : $query['method'];
		$utms = [];
		foreach($this->utmsList as $k) {
			if(isset($data[$k])) {
				$utms[$k] = $data[$k];
			}
		}

		if(empty($utms)) {
			return;
		}

		$campaignsTable = TableRegistry::get('Campaigns');

		$campaigns = $campaignsTable->find('all', [
			'conditions' => [
				'site_id' => $siteId,
				'credential_id !=' => 0,
			]
		]);

		$credentials = [];

		foreach ($campaigns as $campaign) {
			$credentials[$campaign->credential_id]['provider'] = $campaign->getProvider();
			$credentials[$campaign->credential_id]['campaigns'][] = $campaign;
			$credentials[$campaign->credential_id]['campaign_ids'][] = $campaign->rel_id;
		}

		/**
		 * 1. Find all Ads for all campaigns of single credential
		 * 2. Calc list of needed Sitelinks Ids with related Ad Ids
		 * 3. Find Sitelinks
		 * 4. Create clones of Sitelinks with changed Href attribute
		 * 5. Add new Sitelinks
		 * 6. Flash new Sitelinks Ids into Ads
		 * 7. Drop old sitelinks
		 */
		foreach($credentials as $credential) {
			$provider = $credential['provider'];
			$adsService = $provider->getAdsService();

			// Find Ads by campaign ids
			$ads = $adsService->get(
				GetAdsRequest::create()
					->setSelectionCriteria(
						AdsSelectionCriteria::create()->setCampaignIds($credential['campaign_ids'])
					)
					->setFieldNames([
						AdFieldEnum::ID,
						AdFieldEnum::CAMPAIGN_ID,
					])
					->setTextAdFieldNames([
						TextAdFieldEnum::SITELINK_SET_ID,
						TextAdFieldEnum::HREF,
					])
				->setPage(
					LimitOffset::create()->setLimit(3)->setOffset(0)
				)
			)->getAds();

			if(empty($ads)) {
				continue;
			}

			// Assoc array with `ad ID` => `sitelink set ID` pairs
			$adsSitelinksIds = [];

			// Find Sitelinks Ids by Ads
			foreach($ads as $ad) {
				$textAd = $ad->getTextAd();
				$sitelinkId = $textAd->getSitelinkSetId();

				if(!empty($sitelinkId)) {
					$adsSitelinksIds[$ad->getId()] = $sitelinkId;
				}
			}

			if(empty($adsSitelinksIds)) {
				continue;
			}

			$sitelinksService = $provider->getSitelinksService();

			// Find Sitelinks by Ids
			$sitelinkSets = $sitelinksService->get(
				GetSitelinksRequest::create()
					->setSelectionCriteria(
						IdsCriteria::create()->setIds(array_values($adsSitelinksIds))
					)
					->setFieldNames(['Id', 'Sitelinks'])
			)->getSitelinksSets();

			if(empty($sitelinkSets)) {
				continue;
			}

			// Array of SitelinksSetAddItem - prepared for saving object
			$newSitelinkSets = [];

			// Matches response werial number with Ad IDs
			$newAdsRelations = [];

			// Prepare new Sitelinks
			foreach($sitelinkSets as $num => $sitelinkSet) {
				$sitelinks = $sitelinkSet->getSitelinks();
				$setId = $sitelinkSet->getId();

				$newAdsRelations[$num] = [];

				foreach($adsSitelinksIds as $aId => $oldSetId) {
					if($oldSetId == $setId) {
						$newAdsRelations[$num][] = $aId;
					}
				}

				$newSitelinks = [];

				// Replace links
				foreach($sitelinks as $sitelink) {
					$href = $this->prepareHref($sitelink->getHref(), $utms, $method);
					$sitelink->setHref($href);

					$newSitelinks[] = $sitelink;
				}

				$newSitelinkSets[] = SitelinksSetAddItem::create()->setSitelinks($newSitelinks);
			}
	var_dump($sitelinkSets);
	var_dump($newSitelinkSets);
	exit;
			if(empty($newAdsRelations) || empty($newSitelinkSets)) {
				continue;
			}

			// Save new Sitelinks
			$sitelinksResults = $sitelinksService->add(
				AddSitelinksRequest::create()
					->setSitelinksSets($newSitelinkSets)
			)->getAddResults();

			if(empty($sitelinksResults)) {
				continue;
			}

			$updateAdsDetails = [];

			// Get new Sitelinks Ids
			foreach($sitelinksResults as $num => $sitelinksResult) {
				$newId = $sitelinksResult->getId();
				if(empty($newId) || !isset($newAdsRelations[$num])) {
					continue;
				}
				foreach($newAdsRelations[$num] as $adId) {
					$updateAdsDetails[] = AdUpdateItem::create()
						->setId($adId)
						->setTextAd(
							TextAdUpdate::create()
								->setSitelinkSetId($newId)
						);
				}
			}

			if(empty($updateAdsDetails)) {
				continue;
			}

			// Update Ads with new Sitelinks ids
			$adsService->update(
				UpdateAdsRequest::create()
					->setAds($updateAdsDetails)
			);

			// Drop old sitelinks
			$sitelinksService->delete(
				DeleteSitelinksRequest::create()
					->setSelectionCriteria(
						IdsCriteria::create()->setIds(array_values($adsSitelinksIds))
					)
			);

		}

		//var_dump($credentials);
		exit;
    }

	private function prepareHref($href, $utms, $method)
	{
		$url = parse_url($href);
		$query = [];
		if(!empty($url['query'])) {
			parse_str($url['query'], $query);
		}

		foreach($this->utmsList as $uKey) {
			if(isset($utms[$uKey])) {
				$query[$uKey] = $utms[$uKey];
			} else {
				if($method == 'only') {
					unset($query[$uKey]);
				} else if($method == 'all') {
					$query[$uKey] = '';
				}
			}
		}

		$href = $url['scheme'] . '://' . $url['host'] . $url['path'];

		if(!empty($query)) {
			$href .= '?' . http_build_query($query);
		}

		return  $href;
	}

}
