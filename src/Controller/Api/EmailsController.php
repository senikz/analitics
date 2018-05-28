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

        if (empty($fields['site'])) {
            $this->sendError(__('Site doesn`t specified'));
        }

        $Sites = TableRegistry::get('Sites');
        $Campaigns = TableRegistry::get('Campaigns');
        $tableKeywords = TableRegistry::get('Keywords');
        $SiteEmails = TableRegistry::get('SiteEmails');

        if (!$site = $Sites->find('all', ['conditions' => ['domain' => $fields['site']]])->first()) {
            $this->sendError(__('Unknown site'));
        }

		$fieldsMatch = [
			'phone',
			'email',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'utm_content',
			'utm_term',
		];

        $email = $SiteEmails->newEntity();

        $email->site_id = $site->id;
        $email->time = date('Y-m-d H:i:s');

		$email->fillUtm($data, $fieldsMatch);

        $details = [];
        foreach ($data as $param => $value) {
			if (!in_array($param, $fieldsMatch)) {
				$details[$param] = $value;
			}
        }
        $email->details = json_encode($details);

        $SiteEmails->save($email);
    }
}
