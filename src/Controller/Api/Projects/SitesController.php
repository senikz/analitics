<?php
namespace App\Controller\Api\Projects;

class SitesController extends \App\Controller\Api\ApiController
{

    public function index()
    {
		$result = [];

		$query = $this->Sites->find('all', [
			'conditions' => [
				'project_id' => $this->request->params['project_id']
			]
		]);

		foreach ($query as $row) {
			$result[] = [
				'id' => $row->id,
				'domain' => $row->domain,
			];
		}

		$this->sendData($result);
    }

/*
    public function view($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => ['Projects', 'Campaigns', 'SiteStatisticsHourly']
        ]);

        $this->set('site', $site);
        $this->set('_serialize', ['site']);
    }

    public function add()
    {
        $site = $this->Sites->newEntity();
        if ($this->request->is('post')) {
            $site = $this->Sites->patchEntity($site, $this->request->getData());
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site could not be saved. Please, try again.'));
        }
        $projects = $this->Sites->Projects->find('list', ['limit' => 200]);
        $this->set(compact('site', 'projects'));
        $this->set('_serialize', ['site']);
    }

    public function edit($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $site = $this->Sites->patchEntity($site, $this->request->getData());
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site could not be saved. Please, try again.'));
        }
        $projects = $this->Sites->Projects->find('list', ['limit' => 200]);
        $this->set(compact('site', 'projects'));
        $this->set('_serialize', ['site']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $site = $this->Sites->get($id);
        if ($this->Sites->delete($site)) {
            $this->Flash->success(__('The site has been deleted.'));
        } else {
            $this->Flash->error(__('The site could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	*/
}
