<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Storage'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('capacity'); ?></th>
            <th><?= $this->Paginator->sort('used_size'); ?></th>
            <th><?= $this->Paginator->sort('remain_size'); ?></th>
            <th><?= __('') ?></th>
            <th><?= __('Remain Size') ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('limit_remain'); ?></th>
            <th><?= $this->Paginator->sort('files_count'); ?></th>
            <th><?= $this->Paginator->sort('directories_count'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($storages as $storage): ?>
        <tr>
            <td><?= $this->Number->format($storage->id) ?></td>
            <td><?= h($storage->capacityWithUnit) ?></td>
            <td><?= h($storage->used_sizeWithUnit) ?></td>
            <td><?= h($storage->remain_sizeWithUnit) ?></td>
            <td><?= h($storage->created) ?></td>
            <td><?= h($storage->modified) ?></td>
            <td><?= $this->Number->format($storage->limit_remain) ?></td>
            <td><?= $this->Number->format($storage->files_count) ?></td>
            <td><?= $this->Number->format($storage->directories_count) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $storage->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $storage->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $storage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
