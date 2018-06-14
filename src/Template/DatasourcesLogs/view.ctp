<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Datasources Log'), ['action' => 'edit', $datasourcesLog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Datasources Log'), ['action' => 'delete', $datasourcesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasourcesLog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Datasources Logs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasources Log'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Datasources Log'), ['action' => 'edit', $datasourcesLog->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Datasources Log'), ['action' => 'delete', $datasourcesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasourcesLog->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Datasources Logs'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasources Log'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($datasourcesLog->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Datasource') ?></td>
            <td><?= $datasourcesLog->has('datasource') ? $this->Html->link($datasourcesLog->datasource->id, ['controller' => 'Datasources', 'action' => 'view', $datasourcesLog->datasource->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($datasourcesLog->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($datasourcesLog->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($datasourcesLog->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $datasourcesLog->condition ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Error') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasourcesLog->error)); ?></td>
        </tr>
    </table>
</div>

