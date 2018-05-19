<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ServersLogs Controller
 *
 * @property \App\Model\Table\ServersLogsTable $ServersLogs
 *
 * @method \App\Model\Entity\ServersLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServersLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Servers']
        ];
        $serversLogs = $this->paginate($this->ServersLogs);

        $this->set(compact('serversLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Servers Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serversLog = $this->ServersLogs->get($id, [
            'contain' => ['Servers']
        ]);

        $this->set('serversLog', $serversLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serversLog = $this->ServersLogs->newEntity();
        if ($this->request->is('post')) {
            $serversLog = $this->ServersLogs->patchEntity($serversLog, $this->request->getData());
            if ($this->ServersLogs->save($serversLog)) {
                $this->Flash->success(__('The servers log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servers log could not be saved. Please, try again.'));
        }
        $servers = $this->ServersLogs->Servers->find('list', ['limit' => 200]);
        $this->set(compact('serversLog', 'servers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Servers Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serversLog = $this->ServersLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serversLog = $this->ServersLogs->patchEntity($serversLog, $this->request->getData());
            if ($this->ServersLogs->save($serversLog)) {
                $this->Flash->success(__('The servers log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The servers log could not be saved. Please, try again.'));
        }
        $servers = $this->ServersLogs->Servers->find('list', ['limit' => 200]);
        $this->set(compact('serversLog', 'servers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Servers Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serversLog = $this->ServersLogs->get($id);
        if ($this->ServersLogs->delete($serversLog)) {
            $this->Flash->success(__('The servers log has been deleted.'));
        } else {
            $this->Flash->error(__('The servers log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
