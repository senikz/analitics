<?php
namespace App\Model\Entity\Account;

class Metrika extends \App\Model\Entity\Account
{
	use \App\Model\YandexAccountTrait;

	const TYPE = 'metrika';
	const TYPE_HUMAN = 'Яндекс.Метрика';

	public function isCampaignable()
	{
		return false;
	}

	public function dailyCronJob($date)
	{
		//
	}
}
