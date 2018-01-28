<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Credential;

class Campaign extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

	public function getType()
	{
		return strtolower((new \ReflectionClass($this))->getShortName());
	}

	public function getTypeHuman()
	{}

	public function getProvider()
	{}

	public function sync()
	{
		return false;
	}

}
