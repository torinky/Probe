<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('New Tables Log'), ['action' => 'add']); ?></li>
<li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']); ?></li>
<li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('table_id'); ?></th>
        <th><?= $this->Paginator->sort('condition'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th><?= $this->Paginator->sort('rows'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tablesLogs as $tablesLog): ?>
        <tr>
            <td><?= $this->Number->format($tablesLog->id) ?></td>
            <td>
                <?= $tablesLog->has('table') ? $this->Html->link($tablesLog->table->name, ['controller' => 'Tables', 'action' => 'view', $tablesLog->table->id]) : '' ?>
            </td>
            <td><?= h($tablesLog->condition) ?></td>
            <td><?= h($tablesLog->created) ?></td>
            <td><?= h($tablesLog->modified) ?></td>
            <td><?= $this->Number->format($tablesLog->rows) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $tablesLog->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $tablesLog->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $tablesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesLog->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
