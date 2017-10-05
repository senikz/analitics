<?php
namespace App\Shell;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

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
    public function initialize()
    {
        parent::initialize();
        $this->Campaign = TableRegistry::get('Campaigns');
    }

    public function main()
    {
		$credentials = \Cake\Core\Configure::read('Yandex.api');

		foreach($credentials as $login) {
			$user = new User([
				'access_token' => $credentials[0]['token'],
				'login' => $credentials[0]['login'],
				'locale' => User::LOCALE_RU,
			]);

			$campaigns = $user->getCampaignsService()->get(
				GetCampaignsRequest::create()
					->setSelectionCriteria(
						CampaignsSelectionCriteria::create()->setStates(['ON', 'SUSPENDED']))
					->setFieldNames([
						CampaignFieldEnum::ID,
						CampaignFieldEnum::NAME,
						CampaignFieldEnum::STATE,
						CampaignFieldEnum::STATUS,
						CampaignFieldEnum::TYPE,
					])
			);

			foreach ($campaigns->getCampaigns() as $campaign) {
				$availableCampaign = $this->Campaign->find('all', [
					'conditions' => [
						'type' => 'yandex',
						'rel_id' => $campaign->getId(),
						'bid_inc >' => '0',
					],
					'contain' => false
				])->first();
				if(empty($availableCampaign)) {
					continue;
				}

				$this->processCampaign($campaign, $availableCampaign, $user);
			}
		}
    }

	private function processCampaign($campaign, $record, $user)
	{
		$maxPrice = $record->bid_max;
		$incPrice = $record->bid_inc;
		$position = $record->bid_pos;

		Log::write('debug', ['campaignId' => $campaign->getId(), 'options' => [$maxPrice, $incPrice, $position]], ['shell', 'UpdateDirectBidsShell', 'processCampaign']);

		$bids = $user->getBidsService()->get(GetBidsRequest::create()
			->setSelectionCriteria(BidsSelectionCriteria::create()->setCampaignIds([$campaign->getId()]))
			->setFieldNames([
				BidFieldEnum::KEYWORD_ID,
				BidFieldEnum::CAMPAIGN_ID,
				BidFieldEnum::BID,
				BidFieldEnum::AUCTION_BIDS,
			])
			->setPage(
				LimitOffset::create()->setLimit(3)->setOffset(0)
			)
		);

		$updateBids = [];

		foreach($bids->getBids() as $bid) {

			foreach($bid->getAuctionBids() as $auctionPrice) {
				if($auctionPrice->getPosition() != $position) {
					continue;
				}
				$price = $auctionPrice->getPrice() / 1000000;
				$newPrice = $price + ($price / 100 * $incPrice);
				if($newPrice > $maxPrice) {
					$newPrice = $maxPrice;
				}

				$updateBids[] = [
					BidFieldEnum::KEYWORD_ID => $bid->getKeywordId(),
					BidFieldEnum::BID => $newPrice * 1000000,
				];
			}
		}

		Log::write('debug', ['campaignId' => $campaign->getId(), 'bids' => $updateBids], ['shell', 'UpdateDirectBidsShell', 'update bids']);

		if(!empty($updateBids)) {
			//$user->getBidsService()->set(SetBidsRequest::create()->setBids($updateBids));
		}

	}
}
