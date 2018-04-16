<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class CallsController extends ApiController
{
    public function push()
    {
		$fields = $this->request->query;

		if(empty($fields['site'])) {
			$this->sendError(__('Site doesn`t specified'));
		}

		$Sites = TableRegistry::get('Sites');
		$SiteCalls = TableRegistry::get('SiteCalls');

		if(!$site = $Sites->find()->where(['domain' => $fields['site'], 'user_id' => $this->request->user->id])->first()) {
			$this->sendError(__('Unknown site'));
		}

		$fieldsMatch = [
			'phone' => 'callerphone',
			'duration',
			'link' => 'reclink',
			'time' => 'timestamp',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'utm_content',
			'utm_term',
		];

		$call = $SiteCalls->newEntity();

		$call->site_id = $site->id;
		$call->unique = empty($fields['unique']) ? 0 : 1;

		$call->fillUtm($fields, $fieldsMatch);


var_dump($call);exit;


		if(!empty($call->utm_campaign)) {
			$call->utm_campaign = $value;
			if(preg_match('/[0-9]{8,20}/', $value, $matches)) {
				$camp = $Campaigns->find('all')->where(['rel_id' => $matches[0]])->first();
				if(!empty($camp)) {
					$call->campaign_id = $camp->id;
				}
			}
		}


		if($details = $call->getContentDetails()) {

			if(!empty($details['phrase_id'])) {
				$keyword = $tableKeywords->find('all')->where(['rel_id' => $details['phrase_id']])->first();
				if(!empty($keyword)) {
					$call->keyword_id = $keyword->id;
					$call->ad_group_id = $keyword->ad_group_id;
					$call->campaign_id = $keyword->campaign_id;
				}
			}

			if (!empty($details['position_type']) && !empty($details['position']) && in_array($details['position_type'], ['premium', 'other'])) {
				$call->position = ($details['position_type'] == 'premium' ? '1' : '2') . $details['position'];
			}
		}

		$SiteCalls->save($call);
	}

}
