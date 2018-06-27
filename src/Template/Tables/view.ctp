<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Table'), ['action' => 'edit', $table->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Table'), ['action' => 'delete', $table->id], ['confirm' => __('Are you sure you want to delete # {0}?', $table->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tables'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Table'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tables Logs'), ['controller' => 'TablesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tables Log'), ['controller' => 'TablesLogs', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Table'), ['action' => 'edit', $table->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Table'), ['action' => 'delete', $table->id], ['confirm' => __('Are you sure you want to delete # {0}?', $table->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Tables'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Table'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tables Logs'), ['controller' => 'TablesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tables Log'), ['controller' => 'TablesLogs', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($table->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Datasource') ?></td>
            <td><?= $table->has('datasource') ? $this->Html->link($table->datasource->id, ['controller' => 'Datasources', 'action' => 'view', $table->datasource->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($table->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($table->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($table->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= $this->Text->autoParagraph(h($table->name)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related TablesLogs') ?></h3>
    </div>
    <?php if (!empty($table->tables_logs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Table Id') ?></th>
                <th><?= __('Error') ?></th>
                <th><?= __('Condition') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Rows') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($table->tables_logs as $tablesLogs): ?>
                <tr>
                    <td><?= h($tablesLogs->id) ?></td>
                    <td><?= h($tablesLogs->table_id) ?></td>
                    <td><?= h($tablesLogs->error) ?></td>
                    <td><?= h($tablesLogs->condition) ?></td>
                    <td><?= h($tablesLogs->created) ?></td>
                    <td><?= h($tablesLogs->modified) ?></td>
                    <td><?= h($tablesLogs->rows) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'TablesLogs', 'action' => 'view', $tablesLogs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'TablesLogs', 'action' => 'edit', $tablesLogs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'TablesLogs', 'action' => 'delete', $tablesLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesLogs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related TablesLogs</p>
    <?php endif; ?>
</div>
