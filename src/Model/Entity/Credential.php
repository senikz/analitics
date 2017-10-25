<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Credential Entity
 *
 * @property int $id
 * @property string $rel_id
 * @property string $login
 * @property string $password
 * @property string $token
 * @property string $token2
 *
 * @property \App\Model\Entity\Rel $rel
 * @property \App\Model\Entity\Campaign[] $campaigns
 */
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

	public function getType() {
		return $this->types[$this->type];
	}

    public function getUser()
    {
        return new \Biplane\YandexDirect\User([
            'access_token' => $this->token,
            'login' => $this->login,
            'locale' => \Biplane\YandexDirect\User::LOCALE_RU,
        ]);
    }
}
