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
            $tables = ConnectionManager::get($datasourceName)->getSchemaCollection()->listTables();
//            $connection = ConnectionManager::get($datasourceName);
//            $connected = $connection->connect();
        } catch (Exception $connectionError) {
            $connected = false;
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) :
                $attributes = $connectionError->getAttributes();
                if (isset($attributes['message'])) :
                    $errorMsg .= '\n' . $attributes['message'];
                endif;
            endif;
        }

        /*        $connection = ConnectionManager::get($datasourceName);
                $collection = $connection->getSchemaCollection();
                $tables = $collection->listTables();*/
        /*        if (empty($tables)) {
                    return null;
                }*/
//        debug($tables);
        $data = [];
        foreach ($tables as $tKey => $table) {
            if (empty($table)) {
                continue;
            }
//            $temp = $this->newEntity();
//            $temp->name = $table;

//            $data[] = $temp;
            $data[] = [
                'name' => $table,
            ];
        }
        $data = $this->newEntities($data);

        return $data;
    }
}
