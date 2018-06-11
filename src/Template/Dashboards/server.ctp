<?php
/**
 * Created by PhpStorm.
 * User: kazutaka
 * Date: 2018/05/29
 * Time: 22:27
 */

/**
 * @var \App\View\AppView $this
 */

use Cake\Datasource\ConnectionManager;

$this->extend('/Dashboards/menus');


$this->assign('title', 'Probe');
$this->assign('resetUrl', \Cake\Routing\Router::url([
    'action' => 'index',
    'controller' => 'dashboards',
]));

$this->Html->script([
    '/node_modules/adminbsb-materialdesign/plugins/jquery-sparkline/jquery.sparkline.js',
    '/node_modules/jquery-countto/jquery.countTo.js',
    'infobox-1.js'
], ['block' => true]);

//debug($servers);

//servers
$serverInfobox = '';
$baseInfobox = new \App\View\Helper\Infobox('', 'fas fa-server');
/** @var array[] $servers */
/** @var \App\Model\Table\ServersTable $server */
foreach ($servers as $sKey => $server) {
    if ($server->state) {
        $baseInfobox->setIconBg('bg-light-green');
        $state = 'Active';
    } else {
        $baseInfobox->setIconBg('bg-red');
        $state = 'Inactive';
    }
    $baseInfobox->setContent('<div class="text">' . $server->name . '</div><div class="number">' . $state . '</div>');
    $serverInfobox .= $baseInfobox;
}


//dbs
//debug(\Cake\Core\Configure::read('Datasources'));
//debug(\Cake\Core\Configure::read('dbs'));
$dbInfobox = '';
$baseInfobox = new \App\View\Helper\Infobox('', 'fas fa-database');
foreach (\Cake\Core\Configure::read('Datasources') as $datasourceName => $datasource) {
//debug($datasourceName);
    $errorMsg = '';
    try {
        $connection = ConnectionManager::get($datasourceName);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $connected = false;
        $errorMsg = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) :
            $attributes = $connectionError->getAttributes();
            if (isset($errorMsg['message'])) :
                $errorMsg .= '<br />' . $attributes['message'];
            endif;
        endif;
    }

    if ($connected) {
        $baseInfobox->setIconBg('bg-light-green');
        $state = 'Active';
        $baseInfobox->setTooltip('');
    } else {
        $baseInfobox->setIconBg('bg-red');
        $state = 'Inactive';
        $baseInfobox->setTooltip($errorMsg);
//        $baseInfobox->setContent('<div data-toggle="tooltip" title="' .h($errorMsg). '"><div class="text">' . $datasourceName . '</div><div class="number">' . $state . '</div><div class="small">' .$errorMsg. '</div></div>');
    }
    $baseInfobox->setContent('<div class="text">' . $datasourceName . '</div><div class="number">' . $state . '</div>');
    $dbInfobox .= $baseInfobox;

}
?>

<div class="block-header">
    <h2 class="text-right">Last Update <i class="fas fa-clock"></i> 2018-06-02 12:00</h2>
    <!--    <h2>
            COUNTER ANIMATION
            <small>Taken from <a href="https://github.com/mhuggins/jquery-countTo" target="_blank">github.com/mhuggins/jquery-countTo</a>
            </small>
        </h2>
    --> <h2>
        HTTP
    </h2>
</div>
<!-- Counter Examples -->
<div class="row clearfix">
    <?= $serverInfobox ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box hover-expand-effect">
            <div class="icon bg-light-green">
                <i class="fas fa-server"></i>
            </div>
            <div class="content">
                <div class="text">Y1MA5S01</div>
                <div class="number">Active</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box hover-expand-effect">
            <div class="icon bg-red">
                <i class="fas fa-server"></i>
            </div>
            <div class="content">
                <div class="text">Y1MA5S02</div>
                <div class="number">Inactive</div>
            </div>
        </div>
    </div>
</div>
<div class="block-header">
    <h2>DATASOURCES</h2>
</div>
<div class="row clearfix">
    <?= $dbInfobox ?>

</div>


<!-- #END# Chart Samples -->
