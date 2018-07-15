<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Exception;

/**
 * Tables Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Datasources
 * @property \App\Model\Table\TablesLogsTable|\Cake\ORM\Association\HasMany $TablesLogs
 *
 * @method \App\Model\Entity\Table get($primaryKey, $options = [])
 * @method \App\Model\Entity\Table newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Table[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Table|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Table patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Table[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Table findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TablesBaseTable extends Table
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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->isUnique(['name', 'datasource_id']));
        $rules->add($rules->existsIn(['datasource_id'], 'Datasources'));

        return $rules;
    }

    /**
     * @param string $datasourceName
     * @return array
     */
    public function getDefaultSets($datasourceName = 'default')
    {
        try {
            $connection = ConnectionManager::get($datasourceName);
        } catch (Exception $connectionError) {
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) :
                $attributes = $connectionError->getAttributes();
                if (isset($attributes['message'])) :
                    $errorMsg .= '\n' . $attributes['message'];
                endif;
            endif;
        }
        if (!isset($connection)) {
            return [];
        }

        $tables = $this->getTableNames($connection);

        if (empty($tables)) {
            return null;
        }
//        debug($tables);
        $data = [];
        foreach ($tables as $tKey => $table) {
            $tempEntities = $this->newEntity();
            $tempEntities->name = $table;
            $tempEntities->tables_logs = [$this->TablesLogs->getDefaultSet($connection, $table)];
            $data[] = $tempEntities;
        }

        debug($data);

        return $data;
    }

    /**
     * @param \App\Model\Entity\Datasource $datasource
     * @return \App\Model\Entity\TablesLog|bool|\Cake\Datasource\EntityInterface|false
     * @throws \Exception
     */
    public function addLogs($datasource)
    {
        $connection = ConnectionManager::get($datasource->datasourceName);

        $tableNames = $this->getTableNames($connection);

        $logs = [];
        foreach ($tableNames as $tKey => $tableName) {
            $tablesQuery = $this->find()->where([
                'datasource_id' => $datasource->id,
                'name' => $tableName,
            ])->orderAsc('name');

            /** @var \App\Model\Entity\Table $table */
            $table = $tablesQuery->first();
            if (empty($table)) {
                continue;
            }
            $tmpLog = $this->TablesLogs->getDefaultSet($connection, $table->name);
            $tmpLog->table_id = $table->id;
            $logs[] = $tmpLog;

        }
        debug($logs);

        return $this->TablesLogs->saveMany($logs);
    }

    /**
     * @param \Cake\Datasource\ConnectionInterface $connection
     * @return array
     */
    private function getTableNames($connection): array
    {
        $tables = [];
        try {
            $tables = $connection->getSchemaCollection()->listTables();
        } catch (Exception $connectionError) {
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) :
                $attributes = $connectionError->getAttributes();
                if (isset($attributes['message'])) :
                    $errorMsg .= '\n' . $attributes['message'];
                endif;
            endif;
        }

        return $tables;
    }
}
