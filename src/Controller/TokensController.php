<?php
namespace App\Controller;

use Cake\Http\Client;
use Cake\ORM\TableRegistry;

class TokensController extends AppController
{
	public function yandex()
	{
		$query = $this->request->query;
		$config = parse_ini_file(CONFIG . 'yandexapi.ini');
		$http = new Client();

		$response = $http->post('https://oauth.yandex.ru/token', [
			'grant_type' => 'authorization_code',
			'code' => $query['code'],
			'client_id' => $config['client_id'],
			'client_secret' => $config['client_secret'],
		]);

		if ($response->code == 200 && ($data = json_decode($response->body, true))) {
			$details = [];
			foreach (explode('|', $query['state']) as $param) {
				$op = explode(':', $param);
				$details[$op[0]] = $op[1];
			}
			$accountsTable = TableRegistry::get('Accounts');
			$account = $accountsTable->get($details['accid']);
			$account->setToken($data['access_token']);
		}

		exit;
	}
}
