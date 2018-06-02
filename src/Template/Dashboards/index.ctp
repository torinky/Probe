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

?>

<div class="block-header">
    <h2 class="text-right">Last update <i class="fas fa-clock"></i> 12:00 2018-06-02</h2>
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
    <h2>DATABASES</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box hover-expand-effect">
            <div class="icon bg-light-green">
                <i class="fas fa-database"></i>
            </div>
            <div class="content">
                <div class="text">Master</div>
                <div class="number">Active</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box hover-expand-effect">
            <div class="icon bg-red">
                <i class="fas fa-database"></i>
            </div>
            <div class="content">
                <div class="text">Slave</div>
                <div class="number">Inactive</div>
            </div>
        </div>
    </div>

</div>


<!-- #END# Chart Samples -->
