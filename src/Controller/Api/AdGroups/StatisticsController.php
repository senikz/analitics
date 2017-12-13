<?php
namespace App\Controller\Api\AdGroups;

use Cake\ORM\TableRegistry;

class StatisticsController extends \App\Controller\Api\ApiController
{

	public function initialize() {
		parent::initialize();
		$this->loadComponent('Validator');
	}

    public function summary()
    {

	}
}
