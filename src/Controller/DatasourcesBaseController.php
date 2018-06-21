<?php

namespace App\Controller;

/**
 * Datasources Controller
 *
 * @property \App\Model\Table\DatasourcesTable $Datasources
 *
 * @method \App\Model\Entity\Datasource[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DatasourcesBaseController extends AppController
{


    /**
     * デフォルトセットを保存する
     */
    public function setDefault()
    {
        $data = $this->Datasources->getDefaultSet();
//        debug($data);
//        $result = $this->Datasources->saveMany($data);
        $result = $this->Datasources->saveMany($data, [
            /*            'associated' => [
                            'Storages' => [
                                'associated' => ['StoragesLogs']
                            ],
                            'ServersLogs'
                        ]*/
        ]);
        debug($result);

        $this->setAction('index');
    }

}