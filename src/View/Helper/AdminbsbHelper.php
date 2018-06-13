<?php
/**
 * @var \App\View\AppView $this
 */

namespace App\View\Helper;

use Cake\Routing\Router;
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
    private $tooltip = '';
    private $url;
    private $target = '_self';

    public function __construct($content = '', $icon = 'fas fa-server', $iconBg = 'bg-light-green')
    {
        $this->content = $content;
        $this->icon = $icon;
        $this->iconBg = $iconBg;
    }

    public function __toString()
    {

        $infoBox = <<<HTML
        <div class="info-box {$this->effect}">
            <div class="icon {$this->iconBg}">
                <i class="{$this->icon}"></i>
            </div>
            <div class="content">
                {$this->content}
            </div>
        </div>

HTML;

        if (!empty($this->url)) {
            $url = Router::url($this->url);
            $infoBox = <<<HTML
<a href="{$url}" target="{$this->target}">{$infoBox}</a>
HTML;

//            $infoBox = $this->Html->link($infoBox,$this->url,['escape'=>false]);
        }

        $result = <<<HTML
 <div class="{$this->column}">
 {$infoBox}
 </div>
HTML;

        if (!empty($this->tooltip)) {
            $result = '<div data-toggle="tooltip" data-html="true" title="' . $this->tooltip . '">' . $result . '</div>';
        }

        return $result;

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

    /**
     * @return string
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * @param string $tooltip
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;
    }

    public function setUrl($url, $target = '')
    {
        $this->url = $url;
        if (!empty($target)) {
            $this->target = $target;
        }
    }
}