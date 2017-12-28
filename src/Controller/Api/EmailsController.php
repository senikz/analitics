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
        $tableKeywords = TableRegistry::get('Keywords');
        $SiteEmails = TableRegistry::get('SiteEmails');

        if (!$site = $Sites->find('all', ['conditions' => ['domain' => $fields['site']]])->first()) {
            $this->sendError(__('Unknown site'));
        }

        $email = $SiteEmails->newEntity();

        $email->site_id = $site->id;
        $email->time = date('Y-m-d H:i:s');

        $details = [];
        foreach ($data as $param => $value) {
            switch ($param) {
                case 'utm_source':
                    $email->utm_source = $value;
                    break;
                case 'utm_medium':
                    $email->utm_medium = $value;
                    break;
                case 'utm_campaign':
                    $email->utm_campaign = $value;
                    break;
                case 'utm_content':
                    $email->utm_content = $value;
                    break;
                case 'utm_term':
                    $email->utm_term = $value;
                    break;
                case 'phone':
                    $email->phone = $value;
                    break;
                case 'email':
                    $email->email = $value;
                    break;
                default:
                    $details[$param] = $value;
            }
        }

        $email->details = json_encode($details);

        if ($details = $email->getContentDetails()) {
            if (!empty($details['phrase_id'])) {
                $keyword = $tableKeywords->find('all')->where(['rel_id' => $details['phrase_id']])->first();
                if (!empty($keyword)) {
                    $email->keyword_id = $keyword->id;
                    $email->ad_group_id = $keyword->ad_group_id;
                    $email->campaign_id = $keyword->campaign_id;
                }
            }
            if (!empty($details['position_type']) && !empty($details['position']) && in_array($details['position_type'], ['premium', 'other'])) {
                $email->position = ($details['position_type'] == 'premium' ? '1' : '2') . $details['position'];
            }
        }

        $SiteEmails->save($email);
    }
}
