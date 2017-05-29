<?php
namespace App\Controller\Api;

use \Firebase\JWT\JWT;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\BadRequestException;

class ApiController extends Controller
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
		$this->autoRender = false;

        $this->response->header('Access-Control-Allow-Origin', '*');
        $this->response->header('Access-Control-Allow-Headers', 'user_token');
		$this->response->header('Content-Type', 'application/json');

        if ($this->request->params['controller'] != 'Users' || $this->request->params['action'] != 'auth') {
            $headers = getallheaders();

    		if(empty($headers) || empty($headers['user_token'])) {
                $this->sendError('Access token is empty.');
        	} else {
				try {
					$decoded = JWT::decode($headers['user_token'], Configure::read('JWT.key'), array('HS256'));
				} catch (\UnexpectedValueException $e) {
					$this->sendError('Invalid token.', 403);
				}
			}
        }
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
