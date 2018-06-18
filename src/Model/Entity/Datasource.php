<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Datasource Entity
 *
 * @property int $id
 * @property string $className
 * @property string $driver
 * @property string $host
 * @property string $memo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $username
 * @property string $databaseName
 * @property int $port
 *
 * @property \App\Model\Entity\DatasourcesLog[] $datasources_logs
 */
class Datasource extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'className' => true,
        'driver' => true,
        'host' => true,
        'memo' => true,
        'created' => true,
        'modified' => true,
        'username' => true,
        'databaseName' => true,
        'port' => true,
        'datasources_logs' => true
    ];
}
