<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DatasourcesLog Entity
 *
 * @property int $id
 * @property int $datasource_id
 * @property string $error
 * @property bool $condition
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $server_id
 *
 * @property \App\Model\Entity\Datasource $datasource
 */
class DatasourcesLog extends Entity
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
        'datasource_id' => true,
        'error' => true,
        'condition' => true,
        'created' => true,
        'modified' => true,
        'server_id' => true,
        'datasource' => true
    ];
}
