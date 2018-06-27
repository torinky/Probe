<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility;

/**
 * Datasources Base Model
 *
 * @property \App\Model\Table\DatasourcesLogsTable|\Cake\ORM\Association\HasMany $DatasourcesLogs
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\HasMany $Tables
 *
 * @method \App\Model\Entity\Datasource get($primaryKey, $options = [])
 * @method \App\Model\Entity\Datasource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Datasource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Datasource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Datasource|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
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

            $data = $this->findByDatasouceSetting($datasource);

            if (!is_null($data)) {
                $this->addLog($datasourceName, $data);
                continue;
            }
//            debug($datasource);

            $data = $this->getSingleDefault($datasourceName, $datasource);

            $defaultSets[] = $data;
//debug($datasourceName);
        }

        return $defaultSets;
    }

    public function addLogs()
    {
        foreach (\Cake\Core\Configure::read('Datasources') as $datasourceName => $datasource) {
            $data = $this->findByDatasouceSetting($datasource);
            if (is_null($data)) {
                continue;
            }
            $this->addLog($datasourceName, $data);
        }
    }

    /**
     * @param $datasourceName
     * @param $datasource
     * @return \App\Model\Entity\Datasource
     */
    public function getSingleDefault($datasourceName, $datasource): \App\Model\Entity\Datasource
    {
        $data = $this->newEntity();

        $data->datasourceName = $datasourceName;
        $data->className = Utility\Hash::get($datasource, 'className') ?? 'none';
        $data->driver = Utility\Hash::get($datasource, 'driver') ?? 'none';
        $data->host = Utility\Hash::get($datasource, 'host') ?? 'localhost';
        $data->port = Utility\Hash::get($datasource, 'port') ?? 0;
        $data->username = Utility\Hash::get($datasource, 'username') ?? 'none';
        $data->databaseName = Utility\Hash::get($datasource, 'database') ?? 'none';
        $data->datasources_logs = [$this->DatasourcesLogs->getDefaultSet($datasourceName)];

        //todo tablesがarrayのためdatasource_idが決まらないのでdatasourceをsave後に改めてdatasourceを読み出す必要がある
        $data->tables = $this->Tables->getDefaultSets($datasourceName);

        return $data;
    }

    /**
     * @param string $datasourceName
     * @param \Cake\Datasource\EntityInterface|array|null $target
     * @return \App\Model\Entity\DatasourcesLog|bool|\Cake\Datasource\EntityInterface|false|mixed
     */
    private function addLog($datasourceName, $target)
    {
        $datasourceLog = $this->DatasourcesLogs->getDefaultSet($datasourceName);
        $datasourceLog->datasource_id = $target->id;

        return $this->DatasourcesLogs->save($datasourceLog);
    }

    /**
     * @param $datasource
     * @return array|\Cake\Datasource\EntityInterface|null
     */
    private function findByDatasouceSetting($datasource)
    {
        $targetQuery = $this->find()->where([
            'host' => Utility\Hash::get($datasource, 'host'),
            'databaseName' => Utility\Hash::get($datasource, 'database'),
            'username' => Utility\Hash::get($datasource, 'username') ?? '',
            'port' => Utility\Hash::get($datasource, 'port') ?? 0,
        ]);

//            debug($targetQuery);
        $data = $targetQuery->first();

        return $data;
    }


}
