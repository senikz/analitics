<?php
namespace App\Model\Entity\Account;

class Avito extends \App\Model\Entity\Account
{
	const TYPE = 'avito';
	const TYPE_HUMAN = 'Авито';

	public function isCampaignable()
	{
		return false;
	}
}
