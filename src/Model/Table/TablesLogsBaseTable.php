<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Exception;


/**
 * TablesLogs Model
 *
 * @property \App\Model\Table\TablesTable|\Cake\ORM\Association\BelongsTo $Tables
 *
 * @method \App\Model\Entity\TablesLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\TablesLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TablesLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TablesLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TablesLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TablesLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TablesLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TablesLogsBaseTable extends Table
{
    /**
     * @param \Cake\Datasource\ConnectionInterface $connection
     * @param string $datasourceName
     * @return \App\Model\Entity\TablesLog
     * @throws \Cake\Datasource\Exception\
     */
    public function getDefaultSet($connection, $datasourceName)
    {
        $data = $this->newEntity();

        try {
            $rows = $connection->query('SELECT count(*) as ct FROM ' . $datasourceName)->fetch('assoc');
            $data->condition = true;
            $data->rows = $rows['ct'];
        } catch (Exception $connectionError) {
            $data->condition = false;
            $data->rows = 0;
            $data->error = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) {
                $attributes = $connectionError->getAttributes();
                if (isset($attributes['message'])) {
                    $data->error = '\n' . $attributes['message'];
                }
            }
        }


        return $data;

    }

}
