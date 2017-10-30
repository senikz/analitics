<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class SettingsController extends ApiController
{
    public function profiles()
    {
        $result = [];
        $credentials = TableRegistry::get('Credentials')->find('all');

        foreach ($credentials as $profile) {
            $result[] = [
                'id' => $profile->id,
                'type' => $profile->getType(),
                'login' => $profile->login,
            ];
        }

        $this->sendData($result);
    }

    public function bidder()
    {
        $method = $this->request->getMethod();

        $optionsTable = TableRegistry::get('Options');

        $periodOption = $optionsTable->getByName('BidCronTime');

        if ($method == 'PUT') {
            if (!empty($this->request->data['period'])) {
                $periodOption->value = (integer)$this->request->data['period'];
            }
            $optionsTable->save($periodOption);
        }

        $this->sendData([
			'period' => $periodOption->value,
		]);
    }
}
