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
<li><?= $this->Html->link(__('List Storages Logs'), ['controller' => 'StoragesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storages Log'), ['controller' => 'StoragesLogs', 'action' => 'add']) ?> </li>
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
    <li><?= $this->Html->link(__('List Storages Logs'), ['controller' => 'StoragesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storages Log'), ['controller' => 'StoragesLogs', 'action' => 'add']) ?> </li>
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
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= $this->Text->autoParagraph(h($storage->type)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related StoragesLogs') ?></h3>
    </div>
    <?php if (!empty($storage->storages_logs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Storage Id') ?></th>
                <th><?= __('Place') ?></th>
                <th><?= __('Memo') ?></th>
                <th><?= __('Capacity') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Limit Remain') ?></th>
                <th><?= __('Files Count') ?></th>
                <th><?= __('Directories Count') ?></th>
                <th><?= __('Used Size') ?></th>
                <th><?= __('Condition') ?></th>
                <th><?= __('Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($storage->storages_logs as $storagesLogs): ?>
                <tr>
                    <td><?= h($storagesLogs->id) ?></td>
                    <td><?= h($storagesLogs->storage_id) ?></td>
                    <td><?= h($storagesLogs->place) ?></td>
                    <td><?= h($storagesLogs->memo) ?></td>
                    <td><?= h($storagesLogs->capacity) ?></td>
                    <td><?= h($storagesLogs->created) ?></td>
                    <td><?= h($storagesLogs->modified) ?></td>
                    <td><?= h($storagesLogs->limit_remain) ?></td>
                    <td><?= h($storagesLogs->files_count) ?></td>
                    <td><?= h($storagesLogs->directories_count) ?></td>
                    <td><?= h($storagesLogs->used_size) ?></td>
                    <td><?= h($storagesLogs->condition) ?></td>
                    <td><?= h($storagesLogs->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'StoragesLogs', 'action' => 'view', $storagesLogs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'StoragesLogs', 'action' => 'edit', $storagesLogs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'StoragesLogs', 'action' => 'delete', $storagesLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagesLogs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related StoragesLogs</p>
    <?php endif; ?>
</div>
