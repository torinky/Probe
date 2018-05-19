<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServersLogs Model
 *
 * @property \App\Model\Table\ServersTable|\Cake\ORM\Association\BelongsTo $Servers
 *
 * @method \App\Model\Entity\ServersLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServersLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServersLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServersLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServersLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServersLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServersLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServersLogsBaseTable extends Table
{
    public function getDefaultSet($host = '')
    {

        $data = $this->newEntity();
        $data->condition = $this->ping($host);
        return $data;

    }

    /* Ping送信プログラム */
    public function ping($host, $port = 80, $timeout = 6)
    {
        $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
        if (!$fsock) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
