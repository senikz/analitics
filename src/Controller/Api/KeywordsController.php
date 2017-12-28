<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class KeywordsController extends ApiController
{
    public function view($id)
    {
        $keyword = $this->Keywords->get($id, [
                'contain' => []
            ]);

        $this->sendData([
            'id' => $keyword->id,
            'keyword' => $keyword->keyword,
            'campaign_id' => $keyword->campaign_id,
            'ad_group_id' => $keyword->ad_group_id,
        ]);
    }

}
