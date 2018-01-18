<?php
namespace App\Controller\Api\Sites;

class CampaignsController extends \App\Controller\Api\ApiController
{
    public function index()
    {
        $result = [];

        $query = $this->Campaigns->find()
            ->where([
                'site_id' => $this->request->params['site_id']
            ]);

        $this->paginateQuery($query);

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
