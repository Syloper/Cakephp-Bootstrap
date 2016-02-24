<?php

namespace GCM\Controller;

use App\Controller\AppController as BaseController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;


class AppController extends BaseController{


    public function initialize(){

        parent::initialize();

        $this->loadComponent('RequestHandler');
    }

    public function beforeRender(Event $event){
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

}
