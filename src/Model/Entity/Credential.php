<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Credential extends Entity
{
    const TYPE_DIRECT = 'direct';
    const TYPE_ADWORDS = 'adwords';

    public $types = [
        self::TYPE_DIRECT => 'Яндекс.Директ',
        self::TYPE_ADWORDS => 'Google Adwords',
    ];

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected $_hidden = [
        'password',
        'token'
    ];

    public function getType()
    {
        return $this->types[$this->type];
    }

    public function updateLimits($limit)
    {
        $this->limits = $limit;
        TableRegistry::get('Credentials')->save($this);
    }
}
