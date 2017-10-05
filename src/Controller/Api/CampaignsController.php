<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use App\Utility\YandexDirectApi;

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
                'contain' => false
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
                'type' => $campaign->getType(),
                'num' => $campaign->rel_id,
            ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['site_id', 'type', 'caption', 'key'])) {
                $campaign = $this->Campaigns->newEntity();
				$campaign->rel_id = $data['key'];
                $campaign = $this->Campaigns->patchEntity($campaign, $data);

                if ($this->Campaigns->save($campaign)) {
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
}
