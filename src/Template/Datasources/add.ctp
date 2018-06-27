<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Datasource $datasource
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($datasource); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Datasource']) ?></legend>
    <?php
    echo $this->Form->control('className');
    echo $this->Form->control('driver');
    echo $this->Form->control('host');
    echo $this->Form->control('memo');
    echo $this->Form->control('username');
    echo $this->Form->control('databaseName');
    echo $this->Form->control('port');
    echo $this->Form->control('datasourceName');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
