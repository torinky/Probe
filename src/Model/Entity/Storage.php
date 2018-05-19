<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Storage Entity
 *
 * @property int $id
 * @property string $name
 * @property string $place
 * @property string $memo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $server_id
 * @property string $type
 * @property bool $condition
 *
 * @property \App\Model\Entity\Server $server
 * @property \App\Model\Entity\StoragesLog[] $storages_logs
 */
class Storage extends Entity
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
        'name' => true,
        'place' => true,
        'memo' => true,
        'created' => true,
        'modified' => true,
        'server_id' => true,
        'type' => true,
        'condition' => true,
        'server' => true,
        'storages_logs' => true
    ];
}
