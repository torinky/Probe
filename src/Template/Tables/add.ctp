<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Table $table
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Tables'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tables Logs'), ['controller' => 'TablesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tables Log'), ['controller' => 'TablesLogs', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Tables'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tables Logs'), ['controller' => 'TablesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tables Log'), ['controller' => 'TablesLogs', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($table); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Table']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('datasource_id', ['options' => $datasources]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
