<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Server Entity
 *
 * @property int $id
 * @property string $name
 * @property string $ip
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $condition
 *
 * @property \App\Model\Entity\Storage[] $storages
 */
class Server extends Entity
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
        'ip' => true,
        'created' => true,
        'modified' => true,
        'condition' => true,
        'storages' => true
    ];
}
