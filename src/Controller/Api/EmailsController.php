<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class EmailsController extends ApiController
{
    public function push()
    {
		$fields = $this->request->query;
		$data = $this->request->getData();

		if(empty($fields['site'])) {
			$this->sendError(__('Site doesn`t specified'));
		}

		$Sites = TableRegistry::get('Sites');
		$SiteEmails = TableRegistry::get('SiteEmails');

		if(!$site = $Sites->find('all', ['conditions' => ['domain' => $fields['site']]])->first()) {
			$this->sendError(__('Unknown site'));
		}

		$email = $SiteEmails->newEntity();

		$email->site_id = $site->id;
		$email->time = date('Y-m-d H:i:s');

		$details = [];
		foreach($data as $param => $value) {
			switch ($param) {
				case 'utm_source' :
					$email->utm_source = $value;
					break;
				case 'utm_medium' :
					$email->utm_medium = $value;
					break;
				case 'utm_campaign' :
					$email->utm_campaign = $value;
					break;
				case 'utm_content' :
					$email->utm_content = $value;
					break;
				case 'utm_term' :
					$email->utm_term = $value;
					break;
				default:
					$details[$param] = $value;
			}
		}

		$email->details = json_encode($details);

		$SiteEmails->save($email);
	}

}
