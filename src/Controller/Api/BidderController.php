<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class BidderController extends ApiController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Validator');
	}

	public function info()
    {
        $optionsTable = TableRegistry::get('Options');

        $periodOption = $optionsTable->getByName('BidCronTime');
        $lastTimeOption = $optionsTable->getByName('BidCronLastRun');

        $this->sendData([
			'period' => $periodOption->value,
			'last_run' => $lastTimeOption->value,
		]);
    }

	public function period()
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
