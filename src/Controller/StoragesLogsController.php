<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * StoragesLogs Controller
 *
 * @property \App\Model\Table\StoragesLogsTable $StoragesLogs
 *
 * @method \App\Model\Entity\StoragesLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoragesLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Storages']
        ];
        $storagesLogs = $this->paginate($this->StoragesLogs);

        $this->set(compact('storagesLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Storages Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storagesLog = $this->StoragesLogs->get($id, [
            'contain' => ['Storages']
        ]);

        $this->set('storagesLog', $storagesLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storagesLog = $this->StoragesLogs->newEntity();
        if ($this->request->is('post')) {
            $storagesLog = $this->StoragesLogs->patchEntity($storagesLog, $this->request->getData());
            if ($this->StoragesLogs->save($storagesLog)) {
                $this->Flash->success(__('The storages log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storages log could not be saved. Please, try again.'));
        }
        $storages = $this->StoragesLogs->Storages->find('list', ['limit' => 200]);
        $this->set(compact('storagesLog', 'storages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Storages Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storagesLog = $this->StoragesLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storagesLog = $this->StoragesLogs->patchEntity($storagesLog, $this->request->getData());
            if ($this->StoragesLogs->save($storagesLog)) {
                $this->Flash->success(__('The storages log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The storages log could not be saved. Please, try again.'));
        }
        $storages = $this->StoragesLogs->Storages->find('list', ['limit' => 200]);
        $this->set(compact('storagesLog', 'storages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Storages Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storagesLog = $this->StoragesLogs->get($id);
        if ($this->StoragesLogs->delete($storagesLog)) {
            $this->Flash->success(__('The storages log has been deleted.'));
        } else {
            $this->Flash->error(__('The storages log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
