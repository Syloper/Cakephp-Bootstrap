<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;
use Cake\Controller\Component\CookieComponent;
use Cake\I18n\Time;

class AppController extends Controller{

    
    
    public function isAuthorized($user){
        return true;
    }

    public function initialize(){

        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'action' => '/'
            ],
            'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session',
            'unauthorizedRedirect' => false,
            'authorize' => 'Controller',
            'authError' => false,
        ]);

        $this->loadComponent('Cookie');
        Time::$defaultLocale = 'es-ES';
        Time::setJsonEncodeFormat('HH:mm');

    }

    public function beforeRender(Event $event){
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event){
        $this->Auth->allow(['login', 'logout']);
        $this->set('current_user', $this->request->session()->read('Auth.User'));
        $this->Cookie->configKey('User', 'path', '/');
        $this->Cookie->configKey('User', [
            'expires' => '+10 days',
            'httpOnly' => true
        ]);
    }
}
