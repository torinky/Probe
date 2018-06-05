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
    private $content;

    public function __construct($content = '')
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return <<<HTML
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box hover-expand-effect">
            <div class="icon bg-light-green">
                <i class="fas fa-server"></i>
            </div>
            <div class="content">
                {$this->content}
            </div>
        </div>
    </div>
HTML;

    }
}