<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('New Storages Log'), ['action' => 'add']); ?></li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']); ?></li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('storage_id'); ?></th>
        <th><?= $this->Paginator->sort('capacity'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th><?= $this->Paginator->sort('limit_remain'); ?></th>
        <th><?= $this->Paginator->sort('files_count'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($storagesLogs as $storagesLog): ?>
        <tr>
            <td><?= $this->Number->format($storagesLog->id) ?></td>
            <td>
                <?= $storagesLog->has('storage') ? $this->Html->link($storagesLog->storage->name, ['controller' => 'Storages', 'action' => 'view', $storagesLog->storage->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($storagesLog->capacity) ?></td>
            <td><?= h($storagesLog->created) ?></td>
            <td><?= h($storagesLog->modified) ?></td>
            <td><?= $this->Number->format($storagesLog->limit_remain) ?></td>
            <td><?= $this->Number->format($storagesLog->files_count) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $storagesLog->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $storagesLog->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $storagesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storagesLog->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
