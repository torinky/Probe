<?php
namespace App\Controller;

/**
 * Datasources Controller
 *
 * @property \App\Model\Table\DatasourcesTable $Datasources
 *
 * @method \App\Model\Entity\Datasource[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DatasourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $datasources = $this->paginate($this->Datasources);

        $this->set(compact('datasources'));
    }

    /**
     * View method
     *
     * @param string|null $id Datasource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $datasource = $this->Datasources->get($id, [
            'contain' => ['DatasourcesLogs']
        ]);

        $this->set('datasource', $datasource);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $datasource = $this->Datasources->newEntity();
        if ($this->request->is('post')) {
            $datasource = $this->Datasources->patchEntity($datasource, $this->request->getData());
            if ($this->Datasources->save($datasource)) {
                $this->Flash->success(__('The datasource has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The datasource could not be saved. Please, try again.'));
        }
        $this->set(compact('datasource'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Datasource id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $datasource = $this->Datasources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $datasource = $this->Datasources->patchEntity($datasource, $this->request->getData());
            if ($this->Datasources->save($datasource)) {
                $this->Flash->success(__('The datasource has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The datasource could not be saved. Please, try again.'));
        }
        $this->set(compact('datasource'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Datasource id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $datasource = $this->Datasources->get($id);
        if ($this->Datasources->delete($datasource)) {
            $this->Flash->success(__('The datasource has been deleted.'));
        } else {
            $this->Flash->error(__('The datasource could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
