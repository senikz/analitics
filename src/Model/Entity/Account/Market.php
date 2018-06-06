<?php
namespace App\Model\Entity\Account;

class Market extends \App\Model\Entity\Account
{
	const TYPE = 'market';
	const TYPE_HUMAN = 'Яндекс.Маркет';
	const OPTIONS = [];

	public function isCampaignable()
	{
		return false;
	}
}
