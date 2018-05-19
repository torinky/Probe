<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Storages Log'), ['action' => 'edit', $storagesLog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Storages Log'), ['action' => 'delete', $storagesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagesLog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Storages Logs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storages Log'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Storages Log'), ['action' => 'edit', $storagesLog->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Storages Log'), ['action' => 'delete', $storagesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagesLog->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Storages Logs'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storages Log'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($storagesLog->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Storage') ?></td>
            <td><?= $storagesLog->has('storage') ? $this->Html->link($storagesLog->storage->name, ['controller' => 'Storages', 'action' => 'view', $storagesLog->storage->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($storagesLog->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Capacity') ?></td>
            <td><?= $this->Number->format($storagesLog->capacity) ?></td>
        </tr>
        <tr>
            <td><?= __('Limit Remain') ?></td>
            <td><?= $this->Number->format($storagesLog->limit_remain) ?></td>
        </tr>
        <tr>
            <td><?= __('Files Count') ?></td>
            <td><?= $this->Number->format($storagesLog->files_count) ?></td>
        </tr>
        <tr>
            <td><?= __('Directories Count') ?></td>
            <td><?= $this->Number->format($storagesLog->directories_count) ?></td>
        </tr>
        <tr>
            <td><?= __('Used Size') ?></td>
            <td><?= $this->Number->format($storagesLog->used_size) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($storagesLog->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($storagesLog->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $storagesLog->condition ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Place') ?></td>
            <td><?= $this->Text->autoParagraph(h($storagesLog->place)); ?></td>
        </tr>
        <tr>
            <td><?= __('Memo') ?></td>
            <td><?= $this->Text->autoParagraph(h($storagesLog->memo)); ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= $this->Text->autoParagraph(h($storagesLog->type)); ?></td>
        </tr>
    </table>
</div>

