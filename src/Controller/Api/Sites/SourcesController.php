<?php
namespace App\Controller\Api\Sites;

class SourcesController extends \App\Controller\Api\ApiController
{
    public function index()
    {
        $result = [];

        $query = $this->Sources->find()
            ->where([
                'site_id' => $this->request->params['site_id']
            ]);

        $this->prepareApiQuery($query);

        $query = $query->all();

        foreach ($query as $row) {
            $result[] = [
                'id' => $row->id,
                'caption' => $row->caption,
            ];
        }

        $this->sendData($result);
    }
}
