<?php

namespace App\Model\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

/**
 * DatasourcesLogs Model
 *
 * @property \App\Model\Table\DatasourcesTable|\Cake\ORM\Association\BelongsTo $Datasources
 *
 * @method \App\Model\Entity\DatasourcesLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\DatasourcesLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DatasourcesLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DatasourcesLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DatasourcesLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DatasourcesLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DatasourcesLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DatasourcesLogsBaseTable extends Table
{
    public function getDefaultSet($datasourceName)
    {
        $errorMsg = '';
        try {
            $connection = ConnectionManager::get($datasourceName);
            $connected = $connection->connect();
        } catch (Exception $connectionError) {
            $connected = false;
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')) :
                $attributes = $connectionError->getAttributes();
                if (isset($errorMsg['message'])) :
                    $errorMsg .= '\n' . $attributes['message'];
                endif;
            endif;
        }
        $data = $this->newEntity();
//        $data->condition = $this->ping($host);
        $data->error = $errorMsg;
        $data->condition = $connected;
        return $data;

    }
}
