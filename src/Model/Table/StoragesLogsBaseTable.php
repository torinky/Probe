<?php

namespace App\Model\Table;

//require(__DIR__ . '/../../../vendor/phpclasses/win-logical-drives/LogicalDrives.phpclass');

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Storages Model
 *
 * @property \App\Model\Table\StoragesTable|\Cake\ORM\Association\BelongsTo $Storages
 *
 * @method \App\Model\Entity\StoragesLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoragesLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoragesLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoragesLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoragesLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoragesLogsBaseTable extends Table
{


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

    /**
     * ローカルホストの情報からデフォルトセットを作る
     * @param \LogicalDrive $drive
     * @return \App\Model\Entity\StoragesLog
     */
    public function getDefaultSet(\LogicalDrive $drive)
    {

        $data = $this->newEntity();

        $directory = $drive->Name;

        $data->capacity = @disk_total_space($directory);
        $data->used_size = $data->capacity - @disk_free_space($directory);


        $driveExt = new LogicalDriveConvert($drive);

//        debug($ld [$drive_letter]->Name);
//        debug($ld [$drive_letter]);

        $data->condition = $driveExt->canAccess();

        //todo 総ディレクトリ数


        //todo 総ファイル数
        //ルートで使うと時間がかかり過ぎる
//            debug($this->folderSize($directory.'/'));

//            debug($driveExt->GetAccess());
//            debug($storage);
//            debug($ld [$drive_letter]);
//            debug($ld [$drive_letter]->Access);

        return $data;

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
