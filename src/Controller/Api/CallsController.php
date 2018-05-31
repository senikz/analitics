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

		//if(!$site = $Sites->find()->where(['domain' => $fields['site'], 'user_id' => $this->request->user->id])->first()) {
		if(!$site = $Sites->find()->where(['domain' => $fields['site']])->first()) {
			$this->sendError(__('Unknown site'));
		}

		$fieldsMatch = [
			'phone' => 'callerphone',
			'duration',
			'link' => 'reclink',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'utm_content',
			'utm_term',
		];

		$call = $SiteCalls->newEntity();

		$call->site_id = $site->id;
		$call->unique = empty($fields['unique']) ? 0 : 1;
		$call->time = date('Y-m-d H:i:s', $fields['timestamp']);

		$call->fillUtm($fields, $fieldsMatch);

		$SiteCalls->save($call);
	}

}
