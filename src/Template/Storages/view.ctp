<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Storage'), ['action' => 'edit', $storage->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Storage'), ['action' => 'delete', $storage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id)]) ?> </li>
<li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Storage'), ['action' => 'edit', $storage->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Storage'), ['action' => 'delete', $storage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id)]) ?> </li>
<li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($storage->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Server') ?></td>
            <td><?= $storage->has('server') ? $this->Html->link($storage->server->name, ['controller' => 'Servers', 'action' => 'view', $storage->server->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($storage->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Capacity') ?></td>
            <td><?= $this->Number->format($storage->capacity) ?></td>
        </tr>
        <tr>
            <td><?= __('Limit Remain') ?></td>
            <td><?= $this->Number->format($storage->limit_remain) ?></td>
        </tr>
        <tr>
            <td><?= __('Files Count') ?></td>
            <td><?= $this->Number->format($storage->files_count) ?></td>
        </tr>
        <tr>
            <td><?= __('Directories Count') ?></td>
            <td><?= $this->Number->format($storage->directories_count) ?></td>
        </tr>
        <tr>
            <td><?= __('Used Size') ?></td>
            <td><?= $this->Number->format($storage->used_size) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($storage->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($storage->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $storage->condition ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= $this->Text->autoParagraph(h($storage->name)); ?></td>
        </tr>
        <tr>
            <td><?= __('Place') ?></td>
            <td><?= $this->Text->autoParagraph(h($storage->place)); ?></td>
        </tr>
        <tr>
            <td><?= __('Memo') ?></td>
            <td><?= $this->Text->autoParagraph(h($storage->memo)); ?></td>
        </tr>
    </table>
</div>

