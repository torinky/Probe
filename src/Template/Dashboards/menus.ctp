<?php
/**
 * Created by PhpStorm.
 * User: kazutaka
 * Date: 2018/05/27
 * Time: 20:27
 */
/**
 * @var \App\View\AppView $this
 */

?>

<?php $this->start('topBar') ?>
<ul class="nav navbar-nav navbar-right">
    <!-- Call Search -->
    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
    <!-- #END# Call Search -->

    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
</ul>
<?php $this->end() ?>


<?php $this->start('leftSideBar') ?>

<!-- Menu -->
<div class="menu" >
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <?=
            $this->Html->link('<i class="fas fa-server fa-lg"></i><span>Servers</span>', [
                'action' => 'servers'
            ], ['escape' => false])
            ?>
        </li>
        <li>
            <?=
            $this->Html->link('<i class="fa fa-hdd fa-lg"></i><span>Storages</span>', [
                'action' => 'servers'
            ], ['escape' => false])
            ?>
        </li>
    </ul>
</div>
<!-- #Menu -->
<?php $this->end(); ?>




<?php $this->start('rightSideBar') ?>

<ul class="nav nav-tabs tab-nav-right" role="tablist">
    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
    <!--    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>-->
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
        <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
                <div class="red"></div>
                <span>Red</span>
            </li>
            <li data-theme="pink">
                <div class="pink"></div>
                <span>Pink</span>
            </li>
            <li data-theme="purple">
                <div class="purple"></div>
                <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
                <div class="deep-purple"></div>
                <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
                <div class="indigo"></div>
                <span>Indigo</span>
            </li>
            <li data-theme="blue">
                <div class="blue"></div>
                <span>Blue</span>
            </li>
            <li data-theme="light-blue">
                <div class="light-blue"></div>
                <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
                <div class="cyan"></div>
                <span>Cyan</span>
            </li>
            <li data-theme="teal">
                <div class="teal"></div>
                <span>Teal</span>
            </li>
            <li data-theme="green">
                <div class="green"></div>
                <span>Green</span>
            </li>
            <li data-theme="light-green">
                <div class="light-green"></div>
                <span>Light Green</span>
            </li>
            <li data-theme="lime">
                <div class="lime"></div>
                <span>Lime</span>
            </li>
            <li data-theme="yellow">
                <div class="yellow"></div>
                <span>Yellow</span>
            </li>
            <li data-theme="amber">
                <div class="amber"></div>
                <span>Amber</span>
            </li>
            <li data-theme="orange">
                <div class="orange"></div>
                <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
                <div class="deep-orange"></div>
                <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
                <div class="brown"></div>
                <span>Brown</span>
            </li>
            <li data-theme="grey">
                <div class="grey"></div>
                <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
                <div class="blue-grey"></div>
                <span>Blue Grey</span>
            </li>
            <li data-theme="black">
                <div class="black"></div>
                <span>Black</span>
            </li>
        </ul>
    </div>
</div>

<?php $this->end(); ?>

<?= $this->fetch('content') ?>