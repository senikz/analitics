<?php
namespace App\Controller\Api\Projects;

class StatisticsController extends \App\Controller\Api\ApiController
{

    public function index()
    {

		var_dump('works');
		var_dump($this);
		return;
/*
        $api/projects/statistics = $this->paginate($this->Api/Projects/Statistics);

        $this->set(compact('api/projects/statistics'));
        $this->set('_serialize', ['api/projects/statistics']);*/
    }

}
