<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

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

        $query = $this->Campaigns->find()->where([
                'deleted !=' => 1,
            ]);

        $this->prepareApiQuery($query);

        foreach ($query->all() as $row) {
            $result[] = [
                    'id' => $row->id,
                    'source_id' => $row->source_id,
                    'caption' => $row->caption,
                ];
        }

        $this->sendData($result);
    }

    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
                'contain' => ['BidOptions' => [
                        'conditions' => [
                            'BidOptions.day_num' => (date('w')==0 ? 6 : date('w')-1),
                            'BidOptions.hour_num' => date('G'),
                            'BidOptions.status' => '1',
                        ]
                    ]]
            ]);

        $bidsCurrent = 0;

        if (!empty($campaign->bid_options)) {
            $bidsCurrent = [
                'max' => $campaign->bid_options[0]->max,
                'position' => $campaign->bid_options[0]->position,
            ];
        }

        $result = [
                'id' => $campaign->id,
                'site_id' => $campaign->site_id,
                'source_id' => $campaign->source_id,
                'account_id' => $campaign->account_id,
                'caption' => $campaign->caption,
                'num' => $campaign->rel_id,
                'deleted' => $campaign->deleted,
                'bids' => [
                    'current' => $bidsCurrent,
                ],
            ];

        $this->sendData($result);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->Validator->required($data, ['source_id', 'account_id', 'site_id', 'caption', 'rel_id'])) {
                $sitesTable = TableRegistry::get('Sites');
                $site = $sitesTable->find()->where(['id' => $data['site_id']])->first();
                if (empty($site)) {
                    $this->sendError(__('Site doesn`t exists or doesn`t belongs to you.'));
                }

                $sourcesTable = TableRegistry::get('Sources');
                $source = $sourcesTable->find()->where(['id' => $data['source_id'], 'site_id' => $site->id])->first();
                if (empty($source)) {
                    $this->sendError(__('Source doesn`t exists or doesn`t belongs to you.'));
                }

                $accountsTable = TableRegistry::get('Accounts');
                $account = $accountsTable->find()->where(['id' => $data['account_id']])->first();
                if (empty($account)) {
                    $this->sendError(__('Account doesn`t exists or doesn`t belongs to you.'));
                }

                $campaign = $this->Campaigns->newEntity();

                $campaign->user_id = $this->request->user->id;
                $campaign->source_id = $source->id;
                $campaign->site_id = $site->id;
                $campaign->account_id = $account->id;
                $campaign->account_id = $account->id;
                $campaign->caption = $data['caption'];
                $campaign->rel_id = $data['num'];

                if ($campaign = $this->Campaigns->save($campaign)) {
                    $this->sendData([
                        'id' => $campaign->id,
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
            $campaign->deleted = 1;
            if ($this->Campaigns->save($campaign)) {
                $this->sendData([]);
            } else {
                $this->sendError(__('Can`t delete campaign'));
            }
        }
    }

    public function sync($id = null)
    {
        if ($id && ($campaign = $this->Campaigns->get($id))) {
            $account = $campaign->getAccount();
            $account->syncCampaign($campaign);
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
