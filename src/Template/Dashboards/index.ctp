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

$title='test';
$resetUrl=\Cake\Routing\Router::url([
    'action'=>'index',
    'controller'=>'dashboards',
]);

$this->assign('title',$title);
$this->assign('resetUrl',$resetUrl);
