<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('New Datasources Log'), ['action' => 'add']); ?></li>
<li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']); ?></li>
<li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('datasource_id'); ?></th>
        <th><?= $this->Paginator->sort('condition'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($datasourcesLogs as $datasourcesLog): ?>
        <tr>
            <td><?= $this->Number->format($datasourcesLog->id) ?></td>
            <td>
                <?= $datasourcesLog->has('datasource') ? $this->Html->link($datasourcesLog->datasource->id, ['controller' => 'Datasources', 'action' => 'view', $datasourcesLog->datasource->id]) : '' ?>
            </td>
            <td><?= h($datasourcesLog->condition) ?></td>
            <td><?= h($datasourcesLog->created) ?></td>
            <td><?= h($datasourcesLog->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $datasourcesLog->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $datasourcesLog->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $datasourcesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasourcesLog->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
