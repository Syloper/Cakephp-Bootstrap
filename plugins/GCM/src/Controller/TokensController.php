<?php
namespace GCM\Controller;

use GCM\Controller\AppController;

/**
 * Tokens Controller
 *
 * @property \GCM\Model\Table\TokensTable $Tokens
 */
class TokensController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('tokens', $this->paginate($this->Tokens));
        $this->set('_serialize', ['tokens']);
    }

    /**
     * View method
     *
     * @param string|null $id Token id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $token = $this->Tokens->get($id, [
            'contain' => []
        ]);
        $this->set('token', $token);
        $this->set('_serialize', ['token']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $token = $this->Tokens->newEntity();
        if ($this->request->is('post')) {
            $token = $this->Tokens->patchEntity($token, $this->request->data);
            if ($this->Tokens->save($token)) {
                $this->Flash->success(__('The token has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The token could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('token'));
        $this->set('_serialize', ['token']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Token id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $token = $this->Tokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $token = $this->Tokens->patchEntity($token, $this->request->data);
            if ($this->Tokens->save($token)) {
                $this->Flash->success(__('The token has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The token could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('token'));
        $this->set('_serialize', ['token']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Token id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $token = $this->Tokens->get($id);
        if ($this->Tokens->delete($token)) {
            $this->Flash->success(__('The token has been deleted.'));
        } else {
            $this->Flash->error(__('The token could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
