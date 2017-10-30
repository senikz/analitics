<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use \App\Model\Entity\Credential;

class CampaignsController extends ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Validator');
    }

    public function index()
    {
        $result = [];

        $query = $this->Campaigns->find('all', [
                'contain' => false,
            ]);

        foreach ($query as $row) {
            $result[] = [
                    'id' => $row->id,
                    'site_id' => $row->site_id,
                    'caption' => $row->caption,
                ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
                'contain' => []
            ]);

        $result = [
                'id' => $campaign->id,
                'site_id' => $campaign->site_id,
                'caption' => $campaign->caption,
                'type' => $campaign->getTypeHuman(),
                'num' => $campaign->rel_id,
            ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['site_id', 'profile_id', 'caption', 'key'])) {
                $campaign = $this->Campaigns->newEntity();
                $campaign->rel_id = $data['key'];
                $campaign->credential = $this->Campaigns->Credentials->get($data['profile_id']);
                $campaign = $this->Campaigns->patchEntity($campaign, $data);

                if ($a = $this->Campaigns->save($campaign)) {
                    $this->sendData([
                        'id' => $campaign->id
                    ]);
                }

                $this->sendError(__('Can`t add campaign'));
            }

            $this->sendError($this->Validator->getLastError());
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('delete') && $id) {
            $campaign = $this->Campaigns->get($id);
            if ($this->Campaigns->delete($campaign)) {
                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete campaign'));
            }
        }
    }

    public function sync()
    {
        $this->Campaigns->get($this->request->getParam('campaign_id'))->sync();
    }

    public function keywords()
    {
        $fields = $this->request->query;
        $campaignId = $this->request->getParam('campaign_id');

        $count = empty($fields['count']) ? 5 : $fields['count'];

        $result = [];

        $keywordsTable = TableRegistry::get('Keywords');

        $conditions = [
            'campaign_id' => $campaignId,
        ];

        if (!empty($fields['mask'])) {
            $conditions['keyword LIKE'] = '%' . $fields['mask'] . '%';
        }

        $keywords = $keywordsTable->find('all', [
            'conditions' => $conditions,
            'contain' => false,
            'limit' => $count,
        ]);

        foreach ($keywords as $keyword) {
            $result[] = [
                'id' => $keyword->id,
                'keyword' => $keyword->keyword,
            ];
        }

        $this->sendData($result);
    }
}
