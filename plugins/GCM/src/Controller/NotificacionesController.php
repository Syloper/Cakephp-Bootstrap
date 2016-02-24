<?php
namespace GCM\Controller;

use GCM\Controller\AppController;

class NotificacionesController extends AppController{

    private $apiKey = 'AIzaSyCr3s280Xte3vHkFzjVW-NZ6V5-1YLoTMg';

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Tokens');
        $this->loadModel('Users');
    }

    public function index(){
        $this->set('usuarios', $this->paginate($this->Users));
        $this->set('notificaciones', $this->paginate($this->Notificaciones));
        $this->set('_serialize', ['notificaciones','usuarios']);
    }

    public function ver($id = null){
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);
        $this->set('notificacione', $notificacione);
        $this->set('_serialize', ['notificacione']);
    }

    public function agregar(){
        $notificacione = $this->Notificaciones->newEntity();
        if ($this->request->is('post')) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->data);
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    public function editar($id = null){
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->data);
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    public function eliminar($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $notificacione = $this->Notificaciones->get($id);
        if ($this->Notificaciones->delete($notificacione)) {
            $this->Flash->success(__('The notificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function enviar($id = null){

        /*function enviarMensaje( $data, $ids ) {
                      
            // https://code.google.com/apis/console/        
            
            $url = 'https://gcm-http.googleapis.com/gcm/send';
            $post = array(
                'registration_ids'  => $ids,
                'data'              => $data,
            );


            $headers = array( 
                'Authorization: key=' . $this->apiKey,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );
            $result = curl_exec( $ch );

            if ( curl_errno( $ch ) ) {

                echo 'Error GCM: ' . curl_error( $ch );

            }

            curl_close( $ch );
            //print_r( $result );
        }

        $ids    = array();
        $data   = array( 
            'titulo'     => $this->request->data['titulo'],
            'contenido'  => $this->request->data['contenido'],
            'autoCancel' => $this->request->data['autocancel'],
            'sonido'     => $this->request->data['sonido'],
            'vibrar'     => $this->request->data['vibrar'],
            'led'        => $this->request->data['led']
        );

        $tokens = $this->Tokens->find('all');
        $tokens = $tokens->toArray();
        
        foreach ($tokens as $c) {
            array_push($ids, $c['clave']);
        }        

        enviarMensaje( $data, $ids );*/

        $ids = [];
        $notificacion = $this->Notificaciones->get($id);
        $tokens = $this->Tokens->find('all')->toArray();
        foreach ($tokens as $c) {
            array_push($ids, $c['clave']);
        }

        $this->set(compact('ids'));
        $this->set('_serialize', ['ids']);

    }
}
