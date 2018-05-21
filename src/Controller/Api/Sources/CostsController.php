<?php
namespace App\Controller\Api\Sources;

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
			$sourceId = $this->request->params['source_id'];

			$sourcesTable = TableRegistry::get('sources');
			$costsTable = TableRegistry::get('SiteCosts');

			$source = $sourcesTable->get($sourceId);
			if (empty($source)) {
				$this->sendError(__('Source not found'), 404);
			}

			$data = $this->request->getData();
			$from = empty($data['date']['from']) ? date('y-m-d') : $data['date']['from'];
			$to = empty($data['date']['to']) ? date('y-m-d') : $data['date']['to'];

			$interval = (new \DateTime($from))->diff(new \DateTime($to));
			$days = $interval->days + 1;
			$amount = $days == 1 ? $data['cost'] : $data['cost'] / $days;

			$date = date('Y-m-d 10:00:00', strtotime($from . ' -1 day'));
			for ($i = 1; $i <= $days; $i++) {
				$cost = $costsTable->newEntity();

				$cost->site_id = $source->site_id;
				$cost->source_id = $source->id;
				$cost->cost = $amount;
				$cost->comment = isset($data['comment']) ? $data['comment'] : '';
				$cost->time = $date = date('Y-m-d 10:00:00', strtotime($date . ' +1 day'));;

				$costsTable->save($cost);
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
