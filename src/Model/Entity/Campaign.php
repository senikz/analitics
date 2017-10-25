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

	public $types = [
		Credential::TYPE_DIRECT => 'Кампания Яндекс.Директ',
		Credential::TYPE_ADWORDS => 'Кампания Google Adwords',
	];

	public function getType() {
		return empty($this->credential) ? null : $this->types[$this->credential->type];
	}

}
