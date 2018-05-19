<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Servers Log'), ['action' => 'edit', $serversLog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Servers Log'), ['action' => 'delete', $serversLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serversLog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Servers Logs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Servers Log'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Servers Log'), ['action' => 'edit', $serversLog->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Servers Log'), ['action' => 'delete', $serversLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serversLog->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Servers Logs'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Servers Log'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($serversLog->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Server') ?></td>
            <td><?= $serversLog->has('server') ? $this->Html->link($serversLog->server->name, ['controller' => 'Servers', 'action' => 'view', $serversLog->server->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($serversLog->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($serversLog->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $serversLog->condition ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

