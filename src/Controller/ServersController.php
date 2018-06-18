<?php

namespace App\Controller;

/**
 * Servers Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 *
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServersController extends ServersBaseContoroller
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        //todo グラフ表示

        $servers = $this->paginate($this->Servers);

        $this->set(compact('servers'));
    }

    /**
     * View method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => ['ServersLogs', 'Storages']
        ]);

        $this->set('server', $server);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $server = $this->Servers->newEntity();
        if ($this->getRequest()->is('post')) {
            $server = $this->Servers->patchEntity($server, $this->getRequest()->getData());
            if ($this->Servers->save($server)) {
                $this->Flash->success(__('The server has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server could not be saved. Please, try again.'));
        }
        $this->set(compact('server'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $server = $this->Servers->get($id, [
            'contain' => []
        ]);
        if ($this->getRequest()->is(['patch', 'post', 'put'])) {
            $server = $this->Servers->patchEntity($server, $this->getRequest()->getData());
            if ($this->Servers->save($server)) {
                $this->Flash->success(__('The server has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server could not be saved. Please, try again.'));
        }
        $this->set(compact('server'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Server id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->getRequest()->allowMethod(['post', 'delete']);
        $server = $this->Servers->get($id);
        if ($this->Servers->delete($server)) {
            $this->Flash->success(__('The server has been deleted.'));
        } else {
            $this->Flash->error(__('The server could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
