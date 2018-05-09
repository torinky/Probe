<?php

namespace App\Model\Table;
require(__DIR__ . '/../../../vendor/phpclasses/win-logical-drives/LogicalDrives.phpclass');

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storages Model
 *
 * @property \App\Model\Table\ServersTable|\Cake\ORM\Association\BelongsTo $Servers
 *
 * @method \App\Model\Entity\Storage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Storage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Storage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Storage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Storage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Storage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Storage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoragesBaseTable extends Table
{


    /**
     * ローカルホストの情報からデフォルトセットを作る
     * @return array(\App\Model\Entity\Storage)
     */
    public function getDefaultSet()
    {
        $data = [];
        $ld = new \LogicalDrives ();
        // Show assigned drive letters, with their label
        // Note that the $ld object can be accessed as an array, providing the drive letter as an index
        // (the drive letter can be followed by an optional semicolon and is not case-sensitive)
//        debug("Assigned drives      :\n");

        foreach ($ld->GetAssignedDrives() as $drive_letter) {
            $storage = $this->newEntity();
            $storage->name = $drive_letter;

            $directory = trim($drive_letter) . ':';
            $storage->capacity = @disk_total_space($directory);
            $storage->used_size = $storage->capacity - @disk_free_space($directory);
            debug($storage);

            $data[] = $storage;
        }
        return $data;

    }
}
