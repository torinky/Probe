<?php

namespace App\Controller;

/**
 * Servers Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 *
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServersBaseController extends AppController
{


    /**
     * デフォルトセットを保存する
     */
    public function setDefault()
    {
        $data = $this->Servers->getDefaultSet();
        $this->Servers->save($data, [
            'associated' => [
                'Storages' => [
                    'associated' => ['StoragesLogs']
                ],
                'ServersLogs'
            ]
        ]);

        $this->setAction('index');
    }

    public function updateLog()
    {
        if ($this->Servers->addLogs() === false) {
            $this->setAction('setDefault');
        }
        $this->setAction('index');
    }
}
