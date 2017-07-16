<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class CallsController extends ApiController
{
    public function push()
    {
		$fields = $this->request->query;

		if(!empty($fields['unique']) && $fields['unique']) {
			$SiteCalls = TableRegistry::get('SiteCalls');
			$call = $SiteCalls->newEntity();

			foreach($fields as $key => $value) {
				switch ($key) {

					case 'site':
						$Sites = TableRegistry::get('Sites');
						if($site = $Sites->find('all', ['conditions' => ['domain' => $value]])->first()) {
							$call->site_id = $site->id;
						}
						break;

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
						break;
					case 'utm_content' :
						$call->utm_content = $value;
						break;
					case 'utm_term' :
						$call->utm_term = $value;
						break;
				}
			}

			$SiteCalls->save($call);
		}
	}

}
