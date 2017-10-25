<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class SettingsController extends ApiController
{
	public function profiles() {
		$result = [];
		$credentials = TableRegistry::get('Credentials')->find('all');

		foreach($credentials as $profile) {
			$result[] = [
				'id' => $profile->id,
				'type' => $profile->getType(),
				'login' => $profile->login,
			];
		}

		$this->sendData($result);
	}
}
