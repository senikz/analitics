<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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

	public function sync()
	{
		return false;
	}

    public function getAccount()
    {
		if (empty($this->account_id)) {
			return null;
		}
		$accountsTable = TableRegistry::get('Accounts');
		if (@!$account = $accountsTable->get($this->account_id)) {
			return $account;
		}
		return null;
    }

}
