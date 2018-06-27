<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TablesLog Entity
 *
 * @property int $id
 * @property int $table_id
 * @property string $error
 * @property bool $condition
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $rows
 *
 * @property \App\Model\Entity\Table $table
 */
class TablesLog extends Entity
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
        'table_id' => true,
        'error' => true,
        'condition' => true,
        'created' => true,
        'modified' => true,
        'rows' => true,
        'table' => true
    ];
}
