<?php
namespace App\Model\Entity\Campaign;

use Cake\ORM\TableRegistry;

class Adwords extends \App\Model\Entity\Campaign
{
	public function getTypeHuman()
	{
		return 'Кампания Google Adwords';
	}
}
