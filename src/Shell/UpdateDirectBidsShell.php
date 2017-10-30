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

        $this->Options = TableRegistry::get('Options');
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
		if(!$this->checkRunTime()) {
			return;
		}

		$campaigns = $this->Campaigns->find('all', [
			'conditions' => [
				'credential_id >' => '0',
				'Credentials.type' => Credential::TYPE_DIRECT,
			],
			'contain' => ['BidOptions',],
		])->all();

		foreach($campaigns as $campaign) {
			$provider = $campaign->getProvider();

			if(empty($provider) || empty($campaign->bid_options) || !$campaign->bid_options[0]->status) {
				continue;
			}

			$this->processCampaign($provider, $campaign);
		}
    }

	private function checkRunTime()
	{
		$optionPeriod = $this->Options->getByName('BidCronTime')->value;
		$optionLastTime = $this->Options->getByName('BidCronLastRun');

		$currentTime = time();
		$lastTime = strtotime($optionLastTime->value);

		if( (($currentTime-$lastTime)/60) >= $optionPeriod ) {
			$optionLastTime->value = date('Y-m-d H:i:s');
			$this->Options->save($optionLastTime);
			return true;
		} else {
			return false;
		}
	}

	private function processCampaign($user, $campaign)
	{
		//Log::write('debug', ['campaignId' => $campaign->rel_id, 'options' => [$maxPrice, $incPrice, $position]], ['shell', 'UpdateDirectBidsShell', 'processCampaign']);

		$bidsService = $user->getBidsService();

		$bids = $bidsService->get(GetBidsRequest::create()
			->setSelectionCriteria(BidsSelectionCriteria::create()->setCampaignIds([$campaign->rel_id]))
			->setFieldNames([
				BidFieldEnum::KEYWORD_ID,
				BidFieldEnum::CAMPAIGN_ID,
				BidFieldEnum::AD_GROUP_ID,
				BidFieldEnum::BID,
				BidFieldEnum::AUCTION_BIDS,
			])
			->setPage(
				LimitOffset::create()->setLimit(3)->setOffset(0)
			)
		);

		$updateBids = [];

		foreach($bids->getBids() as $bid) {

			$prices = $bid->getAuctionBids();

			if(empty($prices)) {
				continue;
			}

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

			foreach($prices as $auctionPrice) {
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
			$bidsService->set(SetBidsRequest::create()->setBids($updateBids));
		}

		$campaign->updateLimits($bidsService);
	}
}
