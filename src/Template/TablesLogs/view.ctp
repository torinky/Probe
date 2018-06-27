<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Tables Log'), ['action' => 'edit', $tablesLog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Tables Log'), ['action' => 'delete', $tablesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesLog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tables Logs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tables Log'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Tables Log'), ['action' => 'edit', $tablesLog->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Tables Log'), ['action' => 'delete', $tablesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesLog->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Tables Logs'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tables Log'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($tablesLog->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Table') ?></td>
            <td><?= $tablesLog->has('table') ? $this->Html->link($tablesLog->table->name, ['controller' => 'Tables', 'action' => 'view', $tablesLog->table->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($tablesLog->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Rows') ?></td>
            <td><?= $this->Number->format($tablesLog->rows) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($tablesLog->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($tablesLog->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $tablesLog->condition ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Error') ?></td>
            <td><?= $this->Text->autoParagraph(h($tablesLog->error)); ?></td>
        </tr>
    </table>
</div>

