<?php
namespace App\Controller\Api\Sites;

class StatisticsController extends App\Controller\Api\ApiController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $statistics = $this->paginate($this->Statistics);

        $this->set(compact('statistics'));
        $this->set('_serialize', ['statistics']);
    }

    /**
     * View method
     *
     * @param string|null $id Statistic id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $statistic = $this->Statistics->get($id, [
            'contain' => []
        ]);

        $this->set('statistic', $statistic);
        $this->set('_serialize', ['statistic']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $statistic = $this->Statistics->newEntity();
        if ($this->request->is('post')) {
            $statistic = $this->Statistics->patchEntity($statistic, $this->request->getData());
            if ($this->Statistics->save($statistic)) {
                $this->Flash->success(__('The statistic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statistic could not be saved. Please, try again.'));
        }
        $this->set(compact('statistic'));
        $this->set('_serialize', ['statistic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Statistic id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $statistic = $this->Statistics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statistic = $this->Statistics->patchEntity($statistic, $this->request->getData());
            if ($this->Statistics->save($statistic)) {
                $this->Flash->success(__('The statistic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The statistic could not be saved. Please, try again.'));
        }
        $this->set(compact('statistic'));
        $this->set('_serialize', ['statistic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Statistic id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $statistic = $this->Statistics->get($id);
        if ($this->Statistics->delete($statistic)) {
            $this->Flash->success(__('The statistic has been deleted.'));
        } else {
            $this->Flash->error(__('The statistic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
