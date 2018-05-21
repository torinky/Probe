<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servers Base Model
 *
 * @property \App\Model\Table\ServersLogsTable|\Cake\ORM\Association\HasMany $ServersLogs
 * @property \App\Model\Table\StoragesTable|\Cake\ORM\Association\HasMany $Storages
 *
 * @method \App\Model\Entity\Server get($primaryKey, $options = [])
 * @method \App\Model\Entity\Server newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Server[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Server|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Server patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Server[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Server findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServersBaseTable extends Table
{


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules
            ->add($rules->isUnique(['name']))
            ->add($rules->isUnique(['ip']));

        return $rules;
    }

    /**
     * ローカルホストの情報からデフォルトデータを作る
     * @return \App\Model\Entity\Server
     */
    public function getDefaultSet()
    {
        $data = $this->newEntity();
        /*        $data = $this->newEntity(null, [
                    'associated' => ['Storages', 'ServersLogs']
                ]);*/
        $data->name = gethostname();
        $data->ip = gethostbyname($data->name);

        $data->servers_logs = [$this->ServersLogs->getDefaultSet($data->ip)];
        $data->storages = $this->Storages->getDefaultSet();

//        debug($data);
        return $data;
    }

    public function addLogs($serverId = 0)
    {
        $targetQuery = $this->find()->where([
            'name' => gethostname()
        ]);
        $target = $targetQuery->first();
        if (is_null($target)) {
            return false;
        }

        $serverLogData = $this->ServersLogs->getDefaultSet($target->ip);
        $serverLogData->server_id = $target->id;
        $this->ServersLogs->save($serverLogData);

        $this->Storages->addLogs($target->id);

    }

}
