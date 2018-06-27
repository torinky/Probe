<?php

namespace App\Controller;

/**
 * TablesLogs Controller
 *
 * @property \App\Model\Table\TablesLogsTable $TablesLogs
 *
 * @method \App\Model\Entity\TablesLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TablesLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tables']
        ];
        $tablesLogs = $this->paginate($this->TablesLogs);

        $this->set(compact('tablesLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Tables Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tablesLog = $this->TablesLogs->get($id, [
            'contain' => ['Tables']
        ]);

        $this->set('tablesLog', $tablesLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tablesLog = $this->TablesLogs->newEntity();
        if ($this->request->is('post')) {
            $tablesLog = $this->TablesLogs->patchEntity($tablesLog, $this->request->getData());
            if ($this->TablesLogs->save($tablesLog)) {
                $this->Flash->success(__('The tables log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tables log could not be saved. Please, try again.'));
        }
        $tables = $this->TablesLogs->Tables->find('list', ['limit' => 200]);
        $this->set(compact('tablesLog', 'tables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tables Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tablesLog = $this->TablesLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tablesLog = $this->TablesLogs->patchEntity($tablesLog, $this->request->getData());
            if ($this->TablesLogs->save($tablesLog)) {
                $this->Flash->success(__('The tables log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tables log could not be saved. Please, try again.'));
        }
        $tables = $this->TablesLogs->Tables->find('list', ['limit' => 200]);
        $this->set(compact('tablesLog', 'tables'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tables Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tablesLog = $this->TablesLogs->get($id);
        if ($this->TablesLogs->delete($tablesLog)) {
            $this->Flash->success(__('The tables log has been deleted.'));
        } else {
            $this->Flash->error(__('The tables log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
