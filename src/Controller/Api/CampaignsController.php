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

		$this->prepareApiQuery($query);

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
            if ($this->Campaigns->deleteAll(['id' => $id])) {
                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete campaign'));
            }
        }
    }

    public function sync()
    {
		$campaign = $this->Campaigns->find('all')
			->where(['Campaigns.id' => $this->request->getParam('campaign_id')])
			->contain(['Credentials'])
			->first();

		if(!empty($campaign)) {
			$campaign->sync();
		}
    }

    public function keywords()
    {
        $fields = $this->request->query;
        $campaignId = $this->request->getParam('campaign_id');

        $query = TableRegistry::get('Keywords')->find()
            ->where(['campaign_id' => $campaignId,])
            ->contain(false);

        if (!empty($fields['mask'])) {
            $query->where(['keyword LIKE' => '%' . $fields['mask'] . '%', ]);
        }

		$this->setQueryCount($query);
        $this->paginateQuery($query);

        $this->sendData(array_map(function ($keyword) {
            return [
                'id' => $keyword->id,
                'keyword' => $keyword->keyword,
            ];
        }, $query->toArray()));
    }
}
