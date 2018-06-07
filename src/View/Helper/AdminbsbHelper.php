<?php

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Adminbsb helper
 */
class AdminbsbHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

}

class Infobox
{
    private $content = '';
    private $icon = '';
    private $iconBg = '';
    private $column = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
    private $effect = 'hover-expand-effect';

    public function __construct($content = '', $icon = 'fas fa-server', $iconBg = 'bg-light-green')
    {
        $this->content = $content;
        $this->icon = $icon;
        $this->iconBg = $iconBg;
    }

    public function __toString()
    {
        return <<<HTML
 <div class="{$this->column}">
        <div class="info-box {$this->effect}">
            <div class="icon {$this->iconBg}">
                <i class="{$this->icon}"></i>
            </div>
            <div class="content">
                {$this->content}
            </div>
        </div>
    </div>
HTML;

    }

    /**
     * @return string
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param string $effect
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
    }

    /**
     * @return string
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param string $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getIconBg()
    {
        return $this->iconBg;
    }

    /**
     * @param string $iconBg
     * @return Infobox
     */
    public function setIconBg($iconBg)
    {
        $this->iconBg = $iconBg;
        return $this;
    }
}