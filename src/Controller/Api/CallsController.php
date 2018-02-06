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
		$Campaigns = TableRegistry::get('Campaigns');
		$tableKeywords = TableRegistry::get('Keywords');
		$SiteCalls = TableRegistry::get('SiteCalls');

		if(!$site = $Sites->find('all', ['conditions' => ['domain' => $fields['site']]])->first()) {
			$this->sendError(__('Unknown site'));
		}

		$call = $SiteCalls->newEntity();

		$call->site_id = $site->id;
		$call->unique = empty($fields['unique']) ? 0 : 1;

		foreach($fields as $key => $value) {
			switch ($key) {
				case 'callerphone' :
					$call->phone = $value;
					break;
				case 'duration' :
					$call->duration = $value;
					break;
				case 'reclink' :
					$call->link = $value;
					break;
				case 'timestamp' :
					$call->time = date('Y-m-d H:i:s', $value);
					break;
				case 'utm_source' :
					$call->utm_source = $value;
					break;
				case 'utm_medium' :
					$call->utm_medium = $value;
					break;
				case 'utm_campaign' :
					$call->utm_campaign = $value;
					if(preg_match('/[0-9]{8,20}/', $value, $matches)) {
						$camp = $Campaigns->find('all')->where(['rel_id' => $matches[0]])->first();
						if(!empty($camp)) {
							$call->campaign_id = $camp->id;
						}
					}
					break;
				case 'utm_content' :
					$call->utm_content = $value;
					break;
				case 'utm_term' :
					$call->utm_term = $value;
					break;
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
