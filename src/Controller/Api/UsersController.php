<?php
namespace App\Controller\Api;

use Firebase\JWT\JWT;
use Cake\Core\Configure;

class UsersController extends ApiController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'username', 'password' => 'password']
                ]
            ],
            'loginAction' => '/api/users/auth',
            'loginRedirect' => false,
            'logoutRedirect' => false,
        ]);
    }

    public function auth()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $token = JWT::encode([
                    'iat' => time(),
                    'data' => $user
                ], Configure::read('JWT.key'));
                if (!empty($token)) {
                    $this->sendData(['token' => $token]);
                }
            } else {
                $this->sendError('Invalid username or password, try again.');
            }
        }
    }
}
