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

            //todo 総ディレクトリ数

            $storage->type = $ld [$drive_letter]->GetDriveType();
            $driveExt = new LogicalDriveConvert($ld [$drive_letter]);
            $storage->condition = $driveExt->canAccess();

            //todo 総ファイル数
            //ルートで使うと時間がかかり過ぎる
//            debug($this->folderSize($directory.'/'));

//            debug($driveExt->GetAccess());
//            debug($storage);
//            debug($ld [$drive_letter]);
//            debug($ld [$drive_letter]->Access);

            $data[] = $storage;
        }
        return $data;

    }


    /**
     * ディレクトリのサイズとファイル数を得る
     * ルートで使うと時間がかかり過ぎる
     * @param $dir
     * @return array
     */
    static public function folderSize($dir)
    {
        $size = 0;
        $num = 0;
        foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
            if (is_file($each)) {
                $size += filesize($each);
                $num++;
            } else {
                $result = self::folderSize($each);
                $size += $result['size'];
                $num += $result['num'];
//                $size += $this->folderSize($each);
            }
        }
        return ['num' => $num, 'size' => $size];
    }

}


class LogicalDriveConvert
{
    private $drive;

    public function __construct(\LogicalDrive $drive)
    {
        $this->drive = $drive;
    }

    public function GetAccess()
    {
        if (is_null($this->drive->Access)) {
            return 'offline';
        }
        switch ($this->drive->Access) {
            // Drive access types (Access property)
            case    \LogicalDrive::DRIVE_ACCESS_UNKNOWN        :
                return ("Unknown");
            case    \LogicalDrive::DRIVE_ACCESS_READ    :
                return ("Read");
            case    \LogicalDrive::DRIVE_ACCESS_WRITE        :
                return ("Write");
            case    \LogicalDrive::DRIVE_ACCESS_WRITE_ONCE        :
                return ("Write Once");
            default                        :
                return ("Unknown access type " . $this->drive->Access);
        }
    }

    public function canAccess()
    {
        if (!isset($this->drive->Access) || is_null($this->drive->Access)) {
            return false;
        }
        return true;
    }

}