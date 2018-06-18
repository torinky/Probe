<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility;

/**
 * Datasources Base Model
 *
 * @property \App\Model\Table\DatasourcesLogsTable|\Cake\ORM\Association\HasMany $DatasourcesLogs
 * @property \App\Model\Table\StoragesTable|\Cake\ORM\Association\HasMany $Storages
 *
 * @method \App\Model\Entity\Datasource get($primaryKey, $options = [])
 * @method \App\Model\Entity\Datasource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Datasource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Datasource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Datasource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Datasource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DatasourcesBaseTable extends Table
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
        $rules->add($rules->isUnique(
            ['host', 'databaseName', 'port'],
            'この host, databaseName, port の組み合わせはすでに使用されています。'
        ));
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }

    /**
     * ローカルホストの情報からデフォルトデータを作る
     * @return \App\Model\Entity\Datasource[]
     */
    public function getDefaultSet()
    {

        $defaultSets = [];

        foreach (\Cake\Core\Configure::read('Datasources') as $datasourceName => $datasource) {

            $data = $this->find('all')->where([
                'host' => Utility\Hash::get($datasource, 'host'),
                'databaseName' => Utility\Hash::get($datasource, 'database'),
                'username' => Utility\Hash::get($datasource, 'username'),
                'port' => Utility\Hash::get($datasource, 'port'),
            ])->count();

            if ($data > 0) {
                continue;
            }
//            debug($datasource);

            $data = $this->newEntity();

            $data->className = Utility\Hash::get($datasource, 'className') ?? 'none';
            $data->driver = Utility\Hash::get($datasource, 'driver') ?? 'none';
            $data->host = Utility\Hash::get($datasource, 'host') ?? 'localhost';
            $data->port = Utility\Hash::get($datasource, 'port') ?? 0;
            $data->username = Utility\Hash::get($datasource, 'username') ?? 'none';
            $data->databaseName = Utility\Hash::get($datasource, 'database') ?? 'none';

            $defaultSets[] = $data;
//debug($datasourceName);
        }

        return $defaultSets;
    }

    public function addLogs()
    {
        $name = gethostname();
        $targetQuery = $this->find()->where([
            'name' => $name,
            'ip' => gethostbyname($name),
        ]);
        $target = $targetQuery->first();
        if (is_null($target)) {
            return false;
        }

        $serverLogData = $this->DatasourcesLogs->getDefaultSet($target->ip);
        $serverLogData->server_id = $target->id;
        $this->DatasourcesLogs->save($serverLogData);

        $this->Storages->addLogs($target->id);

    }

}
