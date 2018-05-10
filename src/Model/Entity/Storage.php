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
 * @property int $capacity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $limit_remain
 * @property int $files_count
 * @property int $directories_count
 * @property int $used_size
 * @property int $server_id
 * @property bool $condition
 * @property string $type
 *
 * @property \App\Model\Entity\Server $server
 */
class Storage extends StorageBase
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
        'capacity' => true,
        'created' => true,
        'modified' => true,
        'limit_remain' => true,
        'files_count' => true,
        'directories_count' => true,
        'used_size' => true,
        'server_id' => true,
        'condition' => true,
        'type' => true,
        'server' => true
    ];
}
