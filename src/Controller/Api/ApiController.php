<?php
namespace App\Controller\Api;

use \Firebase\JWT\JWT;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\BadRequestException;

class ApiController extends Controller
{

	public $freeActionsMap = [
		['controller' => 'Calls', 'prefix' => 'api', 'action' => 'push'],
		['controller' => 'Users', 'action' => 'auth'],
	];

    public function beforeFilter(\Cake\Event\Event $event)
    {
		$this->autoRender = false;

        $this->response->header('Access-Control-Allow-Origin', '*');
        $this->response->header('Access-Control-Allow-Headers', 'User-Token, Access-Control-Allow-Origin, Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
		$this->response->header('Content-Type', 'application/json');

		if($this->request->is('options')) {
			$this->response->statusCode(200);
			$this->response->send();
			exit;
		}

        if (!$this->validateAction()) {
            $headers = getallheaders();

    		if(empty($headers) || empty($headers['User-Token'])) {
                $this->sendError('Access token is empty.');
        	} else {
				try {
					$decoded = JWT::decode($headers['User-Token'], Configure::read('JWT.key'), array('HS256'));
				} catch (\UnexpectedValueException $e) {
					$this->sendError('Invalid token.', 403);
				}
			}
        }

		if(isset($this->request->query['from']) && !isset($this->request->query['to'])) {
			$this->request->query['to'] = $this->request->query['from'];
		}
    }

	protected function validateAction() {

		foreach($this->freeActionsMap as $rule) {
			$validate = true;
			foreach($rule as $key => $value) {
				if(empty($this->request->params[$key]) || $this->request->params[$key] != $value) {
					$validate = false;
				}
			}
			if($validate) {
				return true;
			}
		}

		return false;
	}

	protected function sendData($data) {
		$this->response->body(json_encode(['data' => $data]));
		$this->response->send();
		exit;
	}

	protected function sendError($errors, $code = 400) {

		if(is_string($errors)) {
			$errors = ['message' => $errors];
		}

		$this->response->statusCode($code);
		$this->response->body(json_encode(['errors' => $errors]));
		$this->response->send();
		exit;
	}
}
