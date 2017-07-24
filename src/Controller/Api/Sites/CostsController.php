<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

class CostsController extends \App\Controller\Api\ApiController
{
    /*public function index()
    {
        $costs = $this->paginate($this->Costs);

        $this->set(compact('costs'));
        $this->set('_serialize', ['costs']);
    }

    public function view($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => []
        ]);

        $this->set('cost', $cost);
        $this->set('_serialize', ['cost']);
    }*/

    public function add()
    {
		if ($this->request->is('post')) {

			$SiteCosts = TableRegistry::get('SiteCosts');

			$data = $this->request->getData();
			$cost = $SiteCosts->newEntity();

			$cost->site_id = $this->request->params['site_id'];
			$cost->cost = isset($data['cost']) ? $data['cost'] : 0;
			$cost->comment = isset($data['comment']) ? $data['comment'] : '';
			$cost->time = isset($data['time']) ? $data['time'] : date('Y-m-d H:i:s');

			if ($SiteCosts->save($cost)) {
				$this->sendData([
					'id' => $cost->id
				]);
			} else {
				$this->sendError(__('Can`t add costs'));
			}
		}
    }

    /*public function edit($id = null)
    {
        $cost = $this->Costs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost = $this->Costs->patchEntity($cost, $this->request->getData());
            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }
        $this->set(compact('cost'));
        $this->set('_serialize', ['cost']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cost = $this->Costs->get($id);
        if ($this->Costs->delete($cost)) {
            $this->Flash->success(__('The cost has been deleted.'));
        } else {
            $this->Flash->error(__('The cost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
