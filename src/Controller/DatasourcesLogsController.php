<?php

namespace App\Controller;

/**
 * DatasourcesLogs Controller
 *
 * @property \App\Model\Table\DatasourcesLogsTable $DatasourcesLogs
 *
 * @method \App\Model\Entity\DatasourcesLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DatasourcesLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Datasources']
        ];
        $datasourcesLogs = $this->paginate($this->DatasourcesLogs);

        $this->set(compact('datasourcesLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Datasources Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $datasourcesLog = $this->DatasourcesLogs->get($id, [
            'contain' => ['Datasources']
        ]);

        $this->set('datasourcesLog', $datasourcesLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $datasourcesLog = $this->DatasourcesLogs->newEntity();
        if ($this->request->is('post')) {
            $datasourcesLog = $this->DatasourcesLogs->patchEntity($datasourcesLog, $this->request->getData());
            if ($this->DatasourcesLogs->save($datasourcesLog)) {
                $this->Flash->success(__('The datasources log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The datasources log could not be saved. Please, try again.'));
        }
        $datasources = $this->DatasourcesLogs->Datasources->find('list', ['limit' => 200]);
        $this->set(compact('datasourcesLog', 'datasources'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Datasources Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $datasourcesLog = $this->DatasourcesLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $datasourcesLog = $this->DatasourcesLogs->patchEntity($datasourcesLog, $this->request->getData());
            if ($this->DatasourcesLogs->save($datasourcesLog)) {
                $this->Flash->success(__('The datasources log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The datasources log could not be saved. Please, try again.'));
        }
        $datasources = $this->DatasourcesLogs->Datasources->find('list', ['limit' => 200]);
        $this->set(compact('datasourcesLog', 'datasources'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Datasources Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $datasourcesLog = $this->DatasourcesLogs->get($id);
        if ($this->DatasourcesLogs->delete($datasourcesLog)) {
            $this->Flash->success(__('The datasources log has been deleted.'));
        } else {
            $this->Flash->error(__('The datasources log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
