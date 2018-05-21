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

	public function index()
	{
		$bidsTable = TableRegistry::get('BidOptions');

		$query = $bidsTable->find('all');
		$bids = $query
			->select([
				'type',
				'rel_id',
			])
			->group($query->func()->concat([
				'type' => 'identifier',
				'rel_id' => 'identifier',
			]))
			->all()
			->toArray();

		$this->sendData(array_map(function ($bid) {
			return [
				'type' => $bid->type,
				'rel_id' => $bid->rel_id,
			];
		}, $bids));
	}

	public function info()
    {
        $optionsTable = TableRegistry::get('Options');

        $periodOption = $optionsTable->getByName('BidCronTime');
        $lastTimeOption = $optionsTable->getByName('BidCronLastRun');

        $this->sendData([
			'period' => $periodOption->value,
			'last_run' => date(DATE_ATOM, strtotime($lastTimeOption->value)),
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
