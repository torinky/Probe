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

            /*            $si_prefix = ['B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB'];
                        $base = 1024;
                        $path = '/';

            //全体サイズ
                        $total_bytes = disk_total_space($path);
                        $class = min((int)log($total_bytes, $base), count($si_prefix) - 1);
                        echo "全体サイズ:" . sprintf('%1.2f', $total_bytes / pow($base, $class)) . $si_prefix[$class] . "<br />";

            //空き容量
                        $free_bytes = disk_free_space($path);
                        $class = min((int)log($free_bytes, $base), count($si_prefix) - 1);
                        echo "空き容量:" . sprintf('%1.2f', $free_bytes / pow($base, $class)) . $si_prefix[$class] . "<br />";

            //使用容量
                        $used_bytes = $total_bytes - $free_bytes;
                        $class = min((int)log($used_bytes, $base), count($si_prefix) - 1);
                        echo "使用容量:" . sprintf('%1.2f', $used_bytes / pow($base, $class)) . $si_prefix[$class] . "<br />";

            //使用率
                        echo "使用率:" . round($used_bytes / $total_bytes * 100, 2) . "%<br />";*/

            $data[] = $storage;
        }
        return $data;

    }
}
