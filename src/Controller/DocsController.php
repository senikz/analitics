<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class DocsController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

	public function index() {
		$this->viewBuilder()->setLayout('blank');
	}
}
