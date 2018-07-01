<?php
namespace App\Controller\Api\Projects;

class AccountsController extends \App\Controller\Api\ApiController
{

    public function index()
    {
		$result = [];

		$query = $this->Accounts->find()
			->where([
				'project_id' => $this->request->params['project_id']
			]);

		$this->prepareApiQuery($query);

		$this->sendData(array_map(function ($source) {
            return [
                'id' => $source->id,
                'type' => $source->type,
                'caption' => $source->caption,
            ];
        }, $query->all()->toArray()));
    }

}
