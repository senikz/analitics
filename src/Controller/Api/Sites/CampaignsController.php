<?php
namespace App\Controller\Api\Sites;

class CampaignsController extends App\Controller\Api\ApiController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sites', 'Rels']
        ];
        $campaigns = $this->paginate($this->Campaigns);

        $this->set(compact('campaigns'));
        $this->set('_serialize', ['campaigns']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => ['Sites', 'Rels', 'CampaignStatisticsDaily', 'CampaignStatisticsHourly']
        ]);

        $this->set('campaign', $campaign);
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaign = $this->Campaigns->newEntity();
        if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $sites = $this->Campaigns->Sites->find('list', ['limit' => 200]);
        $rels = $this->Campaigns->Rels->find('list', ['limit' => 200]);
        $this->set(compact('campaign', 'sites', 'rels'));
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $sites = $this->Campaigns->Sites->find('list', ['limit' => 200]);
        $rels = $this->Campaigns->Rels->find('list', ['limit' => 200]);
        $this->set(compact('campaign', 'sites', 'rels'));
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaign = $this->Campaigns->get($id);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('The campaign has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
