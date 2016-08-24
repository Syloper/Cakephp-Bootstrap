<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

class UsersController extends AppController{


    public $paginate = [
        'limit' => 10,
        'order' => [
            'Users.email' => 'asc'
        ]
    ];

    public function index(){
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    
    public function ver($id = null){
        $user = $this->Users->get($id);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    public function agregar(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            if(!empty($this->request->data['imagen']['name'])){
                
                $destino = WWW_ROOT.'img'.DS.'perfiles'.DS;
                //la funcion imagenes va a guardar la nueva imagen y borrar la anterior, devuelve el nuevo nombre.
                $valor = $this->imagenes($this->request->data['imagen'], $destino, 'agregar');
                if(!$valor){
                    $this->Flash->error(__('Error al procesar la imagen. intente nuevamente.'));
                    return $this->redirect(['action' => 'agregar']);
                }

            }else{
                $destino = WWW_ROOT.'img'.DS.'perfiles'.DS;
                if(copy(WWW_ROOT.'img'.DS.'default.png', $destino.'default.png')){
                    $this->request->data['imagen'] = "default.png";
                }
            }

            $data = $this->request->data;


            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario se guardo con exito.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Hubo un error al guardar. Por favor intenta nuevamente.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

  
    public function editar($id = null){
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(empty($this->request->data['imagen']['name'])){
                
                if($user->imagen != ''){
                    $this->request->data['imagen'] = $user->imagen;
                }

            }else{
                 $destino = WWW_ROOT.'img'.DS.'perfiles'.DS;
                //la funcion imagenes va a guardar la nueva imagen y borrar la anterior, devuelve el nuevo nombre.
                $valor = $this->imagenes($this->request->data['imagen'], $destino, 'editar', $user->imagen);
                if(!$valor){
                    $this->Flash->error(__('Error al procesar la imagen. intente nuevamente.'));
                    return $this->redirect(['action' => 'editar', $user->id]);
                }
            }


            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario se edito con exito.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Hubo un error al editar. Por favor intenta nuevamente.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function eliminar($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if($user->imagen != "default.png"){
            $destino = WWW_ROOT.'img'.DS.'perfiles'.DS;
            unlink($destino.$user->imagen);
        }
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario se elimino con exito.'));
        } else {
            $this->Flash->error(__('Hubo un error al eliminar. Por favor intenta nuevamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function buscar(){
        // Busqueda dentro de usuarios
    }

    public function configuracion(){

        $user_data = $this->Users->get($this->Auth->user()['id']);

        if($this->request->is(['patch', 'post', 'put'])){
            // debug($this->request->data); exit;
            
            if(empty($this->request->data['imagen']['name'])){
                
                if($user_data->imagen != ''){
                    $this->request->data['imagen'] = $user_data->imagen;
                }

            }else{
                                       
                $destino = WWW_ROOT.'img'.DS.'perfiles'.DS;
                //la funcion imagenes va a guardar la nueva imagen y borrar la anterior, devuelve el nuevo nombre.
                $valor = $this->imagenes($this->request->data['imagen'], $destino, 'configuracion', $user_data->imagen);
                if(!$valor){
                    $this->Flash->error(__('Error al procesar la imagen. intente nuevamente.'));
                    return $this->redirect(['action' => 'configuracion']);
                }
                
            }

            $data = $this->request->data;
            
            if (!empty($data['nuevo_pass']) && !empty($data['repetir_pass'])) {
                if($data['nuevo_pass'] === $data['repetir_pass']){
                    $user = $this->Users->patchEntity($user_data, 
                        ['password' => $this->request->data['nuevo_pass'],
                        'nuevo_pass' => '']);
                }else{
                    $this->Flash->error('Las Contraseñas no coinciden, intente nuevamente.');
                }
                
            }else{
                $user = $this->Users->patchEntity($user_data, $this->request->data);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success('Se modificaron los datos correctamente.');
                if ($this->Auth->user('id') === $user->id) {
                    $data = $user->toArray();
                    unset($data['password']);
                    $this->Auth->setUser($data);
                }
                 return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'dashboard'
                ]);
            }else{
                $this->Flash->error('Ocurrio un error y no se ha guardado.');
            } 

        }

        $this->set(compact('user_data'));
        $this->set('_serialize', ['user_data']);
    }


    public function logout(){
        $this->Cookie->delete('User');
        return $this->redirect($this->Auth->logout());
    }

    public function login(){

        $this->viewBuilder()->layout('public');

        if ($this->Auth->user()) {
            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'dashboard'
            ]);
        }

        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($this->request->data('remember_me') === '1'){
                    $this->Cookie->write('User',
                        ['email' => $this->request->data['email'],
                        'password' => $this->request->data['password']]
                    );
                }
                /*$this->Flash->success('Bienvenido '.$user['nombre']);*/
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'dashboard'
                ]);
            }
            $this->Flash->error(__('Usuario y/o contraseña incorrectos!.'), ['key' => 'auth']);

        }else{
            // Logeo con cookies
            if(!$this->Auth->user() && $this->Cookie->check('User')){
                $cookie = $this->Cookie->read('User');
                $this->request->data['email'] = $cookie['email'];
                $this->request->data['password'] = $cookie['password'];
                if($this->request->data){
                    $user = $this->Auth->identify();
                    if ($user) {
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                }
            }
        }
    }


    private function imagenes($imagen, $destino, $remite, $imagenAnt = null)
    {
        if (!empty($imagen['name'])) {
            $formatos = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
            if (in_array($imagen['type'], $formatos)) {

                // $respuesta = array();

                if($remite == "editar" || $remite == "configuracion"){
                    if($imagenAnt != "default.png"){
                        unlink($destino.$imagenAnt);
                    }
                }

                $ext = substr(strtolower(strrchr($imagen['name'], '.')), 1);
                $nuevoNombre = uniqid();

                if(move_uploaded_file($imagen['tmp_name'], $destino.$nuevoNombre.'.'.$ext)){
                    $imagen = $nuevoNombre.'.'.$ext;
                    // $respuesta['estado'] = true;
                    $this->request->data['imagen'] = $imagen;
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }


}
