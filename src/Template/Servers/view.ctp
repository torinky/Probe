<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Server'), ['action' => 'edit', $server->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Server'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?> </li>
<li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Servers Logs'), ['controller' => 'ServersLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Servers Log'), ['controller' => 'ServersLogs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Server'), ['action' => 'edit', $server->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Server'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?> </li>
<li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Servers Logs'), ['controller' => 'ServersLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Servers Log'), ['controller' => 'ServersLogs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($server->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($server->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($server->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($server->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= $this->Text->autoParagraph(h($server->name)); ?></td>
        </tr>
        <tr>
            <td><?= __('Ip') ?></td>
            <td><?= $this->Text->autoParagraph(h($server->ip)); ?></td>
        </tr>
        <tr>
            <td><?= __('Memo') ?></td>
            <td><?= $this->Text->autoParagraph(h($server->memo)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related ServersLogs') ?></h3>
    </div>
    <?php if (!empty($server->servers_logs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Server Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Condition') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($server->servers_logs as $serversLogs): ?>
                <tr>
                    <td><?= h($serversLogs->id) ?></td>
                    <td><?= h($serversLogs->server_id) ?></td>
                    <td><?= h($serversLogs->created) ?></td>
                    <td><?= h($serversLogs->condition) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'ServersLogs', 'action' => 'view', $serversLogs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'ServersLogs', 'action' => 'edit', $serversLogs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'ServersLogs', 'action' => 'delete', $serversLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serversLogs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related ServersLogs</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Storages') ?></h3>
    </div>
    <?php if (!empty($server->storages)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Place') ?></th>
                <th><?= __('Memo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Server Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Condition') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($server->storages as $storages): ?>
                <tr>
                    <td><?= h($storages->id) ?></td>
                    <td><?= h($storages->name) ?></td>
                    <td><?= h($storages->place) ?></td>
                    <td><?= h($storages->memo) ?></td>
                    <td><?= h($storages->created) ?></td>
                    <td><?= h($storages->modified) ?></td>
                    <td><?= h($storages->server_id) ?></td>
                    <td><?= h($storages->type) ?></td>
                    <td><?= h($storages->condition) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Storages', 'action' => 'view', $storages->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Storages', 'action' => 'edit', $storages->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Storages', 'action' => 'delete', $storages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storages->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Storages</p>
    <?php endif; ?>
</div>
