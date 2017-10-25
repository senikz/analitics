<?php
namespace App\Model\Entity\Campaigns;

use App\Model\Entity\Campaign;

class DirectCampaign extends Campaign
{
	public $type = Campaign::TYPE_DIRECT;

	public function test() {
		var_dump('123');exit;
	}
}
