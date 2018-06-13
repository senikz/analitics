<?php
namespace App\Controller\Api\Projects;

class SitesController extends \App\Controller\Api\ApiController
{
    public function index()
    {
        $result = [];

        if (empty($this->request->query['order'])) {
            $this->request->query['order'] = 'order';
        }

        $sites = $this->Sites->find()
            ->where([
				'project_id' => $this->request->params['project_id'],
				'deleted !=' => 1,
			]);

		$this->prepareApiQuery($sites);

        $sites = $sites->all();

        foreach ($sites as $row) {
            $result[] = [
                'id' => $row->id,
                'domain' => $row->domain,
            ];
        }

        $this->sendData($result);
    }
}
