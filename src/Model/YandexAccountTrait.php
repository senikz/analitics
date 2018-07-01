<?php

namespace App\Model;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Account;

trait YandexAccountTrait
{
	public static function settingsFields()
	{
		return ['login'];
	}

    public function auth()
	{
		$login = $this->option('login');
		$token = $this->option('token');
		$result = false;

		// Search already instantiated account
		if (empty($token)) {
			$accountsTable = TableRegistry::get('Accounts');
			$optionsTable = TableRegistry::get('AccountOptions');
			$matches = $accountsTable->find()
				->where(['user_id' => $this->user_id, 'type IN' => ['direct', 'market', 'metrika']])
				->all();
			foreach ($matches as $account) {
				if ($account->option('login') == $login && ($eToken = $account->option('token'))) {
					$this->setToken($eToken);
					$result = true;
					break;
				}
			}
		}

		// Generate link for retrieven new token
		if (!$result) {
			$config = parse_ini_file(CONFIG . 'yandexapi.ini');
			$result = 'https://oauth.yandex.ru/authorize?response_type=code&client_id=' . $config['client_id'];
			$result .= '&state=accid:' . $this->id . '';
		}

		return $result;
	}

	public function setToken($token)
	{
		$optionsTable = TableRegistry::get('AccountOptions');
		$tokenOption = $optionsTable->find()->where(['account_id' => $this->id, 'name' => 'token'])->first();
		if (empty($tokenOption)) {
			$tokenOption = $optionsTable->newEntity();
			$tokenOption->account_id = $this->id;
			$tokenOption->name = 'token';
		}
		$tokenOption->value = $token;
		$this->token = $token;
		$this->status = Account::STATUS_ACTIVE;
		$optionsTable->save($tokenOption);
	}
}
