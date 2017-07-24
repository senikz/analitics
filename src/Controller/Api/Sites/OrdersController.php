<?php
namespace App\Controller\Api\Sites;

use Cake\ORM\TableRegistry;

class OrdersController extends \App\Controller\Api\ApiController
{

/*    public function index()
    {
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }
*/

    public function add()
    {
		if ($this->request->is('post')) {

			$SiteOrders = TableRegistry::get('SiteOrders');

            $data = $this->request->getData();
            $order = $SiteOrders->newEntity();

			$order->site_id = $this->request->params['site_id'];
			$order->count = isset($data['count']) ? $data['count'] : 1;
			$order->comment = isset($data['comment']) ? $data['comment'] : '';
			$order->time = isset($data['time']) ? $data['time'] : date('Y-m-d H:i:s');

            if ($SiteOrders->save($order)) {
                $this->sendData([
                    'id' => $order->id
                ]);
            } else {
				$this->sendError(__('Can`t add order'));
			}
        }
    }

/*    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
