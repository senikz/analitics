<?php
namespace App\Controller\Api;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class CallsController extends ApiController
{

    public function push()
    {
		Log::write('debug', $this->request->query, ['controller', 'Calls', 'push']);
    /*    $call = $this->Calls->newEntity();
        if ($this->request->is('post')) {
            $call = $this->Calls->patchEntity($call, $this->request->getData());
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The call could not be saved. Please, try again.'));
        }
        $this->set(compact('call'));
        $this->set('_serialize', ['call']);*/
    }

}
