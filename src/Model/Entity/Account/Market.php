<?php
namespace App\Model\Entity\Account;

class Market extends \App\Model\Entity\Account
{
	use \App\Model\YandexAccountTrait;

	const TYPE = 'market';
	const TYPE_HUMAN = 'Яндекс.Маркет';

	public function isCampaignable()
	{
		return false;
	}
}
