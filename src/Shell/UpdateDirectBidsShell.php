<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use \App\Model\Entity\Credential;

use Biplane\YandexDirect\User;
use Biplane\YandexDirect\Api\V5\Contract\LimitOffset;
use Biplane\YandexDirect\Api\V5\Contract\BidFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\CampaignFieldEnum;
use Biplane\YandexDirect\Api\V5\Contract\GetBidsRequest;
use Biplane\YandexDirect\Api\V5\Contract\GetCampaignsRequest;
use Biplane\YandexDirect\Api\V5\Contract\BidsSelectionCriteria;
use Biplane\YandexDirect\Api\V5\Contract\CampaignsSelectionCriteria;
use Biplane\YandexDirect\Api\V5\Contract\SetBidsRequest;

class UpdateDirectBidsShell extends \Cake\Console\Shell
{
	private $globalOptions = [];

    public function initialize()
    {
        parent::initialize();

        $this->Campaigns = TableRegistry::get('Campaigns');
        $this->Keywords = TableRegistry::get('Keywords');
        $this->AdGroups = TableRegistry::get('AdGroups');
        $this->BidOptions = TableRegistry::get('BidOptions');

		$this->globalOptions = $this->BidOptions->find('all', [
				'conditions' => [
					'BidOptions.type IN' => ['keyword', 'adgroup'],
					'BidOptions.status' => 1,
				],
				'contain' => [
					'Keywords', 'AdGroups',
				],
			])->all();
    }

    public function main()
    {
		$campaigns = $this->Campaigns->find('all', [
			'conditions' => [
				'credential_id >' => '0',
				'Credentials.type' => Credential::TYPE_DIRECT,
			],
			'contain' => ['Credentials', 'BidOptions',],
		])->all();

		foreach($campaigns as $campaign) {
			if(empty($campaign->credential) || empty($campaign->bid_options) || !$campaign->bid_options[0]->status) {
				continue;
			}

			$this->processCampaign($campaign->credential->getUser(), $campaign);
		}
    }

	private function processCampaign($user, $campaign)
	{
		//Log::write('debug', ['campaignId' => $campaign->rel_id, 'options' => [$maxPrice, $incPrice, $position]], ['shell', 'UpdateDirectBidsShell', 'processCampaign']);

		$bids = $user->getBidsService()->get(GetBidsRequest::create()
			->setSelectionCriteria(BidsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id]))
			->setFieldNames([
				BidFieldEnum::KEYWORD_ID,
				BidFieldEnum::CAMPAIGN_ID,
				BidFieldEnum::AD_GROUP_ID,
				BidFieldEnum::BID,
				BidFieldEnum::AUCTION_BIDS,
			])
		//	->setPage(
		//		LimitOffset::create()->setLimit(3)->setOffset(0)
		//	)
		);

		$updateBids = [];

		foreach($bids->getBids() as $bid) {

			$options = $campaign->bid_options[0];
			$bidId = $bid->getKeywordId();

			foreach($this->globalOptions as $go) {
				if($go->type == 'keyword' && $go->keyword->rel_id == $bidId) {
					$options = $go;
					break;
				} else if($go->type == 'adgroup' && $go->ad_group->rel_id == $bid->getAdGroupId() ) {
					$options = $go;
				}
			}

			foreach($bid->getAuctionBids() as $auctionPrice) {
				if($auctionPrice->getPosition() != $options->position) {
					continue;
				}
				$price = $auctionPrice->getPrice() / 1000000;
				$newPrice = $price + ($price / 100 * $options->increment);
				if($newPrice > $options->max) {
					$newPrice = $options->max;
				}

				$updateBids[] = [
					BidFieldEnum::KEYWORD_ID => $bidId,
					BidFieldEnum::BID => $newPrice * 1000000,
				];
			}
		}

		//Log::write('debug', ['campaignId' => $campaign->rel_id, 'bids' => $updateBids], ['shell', 'UpdateDirectBidsShell', 'update bids']);

		if(!empty($updateBids)) {
			//$user->getBidsService()->set(SetBidsRequest::create()->setBids($updateBids));
		}

	}
}
