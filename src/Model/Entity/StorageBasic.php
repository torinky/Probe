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
 *
 * @property \App\Model\Entity\Server $server
 */
class StorageBasic extends Entity
{
    const SI_PREFIX = ['B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB'];
    const BASE = 1024;

    protected function _getCapacityWithUnit()
    {


        return $this->getMemorySizeWithUnit($this->_properties['capacity']);


    }

    /**
     * @param int $bytes
     * @return string
     */
    private function getMemorySizeWithUnit($bytes = 0)
    {
        if (empty($bytes)) {
            return '0';
        }
        $si_prefix = ['B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB'];
        $base = 1024;
        $class = min((int)log($bytes, $base), count($si_prefix) - 1);
        return sprintf('%1.2f', $bytes / pow($base, $class)) . $si_prefix[$class];

    }

    protected function _getUsed_sizeWithUnit()
    {
        return $this->getMemorySizeWithUnit($this->_properties['used_size']);
    }

    protected function _getRemain_sizeWithUnit()
    {
        return $this->getMemorySizeWithUnit($this->_getRemain_size());
    }

    protected function _getRemain_size()
    {
        return $this->_properties['capacity'] - $this->_properties['used_size'];
    }

    /**
     * @return float|int
     */
    protected function _getUseRate()
    {
        if (empty($this->_properties['capacity'])) {
            return 0;
        }
        return round($this->_properties['used_size'] / $this->_properties['capacity'] * 100, 2);

    }

}
