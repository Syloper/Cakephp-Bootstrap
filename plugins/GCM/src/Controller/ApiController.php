<?php
namespace GCM\Controller;

use GCM\Controller\AppController;
use Cake\Event\Event;

class ApiController extends AppController{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Tokens');
    }

   public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['tokens','guardarToken']);
    }

    public function tokens(){
        $tokens = $this->Tokens->find('all');
        $cantidad = $tokens->count();
        
        $mensaje = "Listado de tokens correcto.";
        $estado  = true;

        if (!$cantidad) {
            $mensaje = "No se encontraron resultados.";
            $estado  = false; 
        }

        $this->set([
            'estado' => $estado,
            'mensaje' => $mensaje,
            'tokens' => $tokens,
            '_serialize' => ['estado', 'mensaje', 'tokens']
        ]);
    }

    public function guardarToken(){
        $this->request->data['clave'] = $_POST['clave'];

        $anterior = $this->Tokens->find('all')
        ->where(['Tokens.clave' => $_POST['clave']])
        ->first();

        if (!$anterior) {
            $token = $this->Tokens->newEntity($this->request->data);
            if ($this->Tokens->save($token)) {
                $mensaje = 'Token guardado correctamente.';
                $estado  = true;
            } else {
                $mensaje = 'Error al guardar token.';
                $estado  = false;
            }
        }else{
            $mensaje = 'El token enviado ya existe en el registro';
            $estado  = false;
            $token = $anterior;
        }

        $this->set([
            'estado' => $estado,
            'mensaje' => $mensaje,
            'token' => $token,
            '_serialize' => ['estado', 'mensaje', 'token']
        ]);
    }

    
    
}