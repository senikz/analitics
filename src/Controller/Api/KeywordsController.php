<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

class KeywordsController extends ApiController
{
    public function view($id)
    {
        $keyword = $this->Keywords->get($id, [
                'contain' => ['BidOptions' => [
						'conditions' => [
							'BidOptions.day_num' => (date('w')==0 ? 6 : date('w')-1),
							'BidOptions.hour_num' => date('G'),
							'BidOptions.status' => '1',
						]
					]]
            ]);

		$bidsCurrent = 0;

		if(!empty($keyword->bid_options)) {
			$bidsCurrent = [
				'max' => $keyword->bid_options[0]->max,
				'position' => $keyword->bid_options[0]->position,
			];
		}

        $this->sendData([
            'id' => $keyword->id,
            'keyword' => $keyword->keyword,
            'campaign_id' => $keyword->campaign_id,
            'ad_group_id' => $keyword->ad_group_id,
			'bids' => [
				'current' => $bidsCurrent,
			],
        ]);
    }

}
