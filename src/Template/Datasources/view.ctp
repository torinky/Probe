<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Datasource'), ['action' => 'edit', $datasource->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Datasource'), ['action' => 'delete', $datasource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasource->id)]) ?> </li>
<li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasource'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Datasource'), ['action' => 'edit', $datasource->id]) ?> </li>
    <li><?= $this->Form->postLink(__('Delete Datasource'), ['action' => 'delete', $datasource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasource->id)]) ?> </li>
    <li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasource'), ['action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($datasource->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($datasource->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Port') ?></td>
            <td><?= $this->Number->format($datasource->port) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($datasource->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($datasource->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('ClassName') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->className)); ?></td>
        </tr>
        <tr>
            <td><?= __('Driver') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->driver)); ?></td>
        </tr>
        <tr>
            <td><?= __('Host') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->host)); ?></td>
        </tr>
        <tr>
            <td><?= __('Memo') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->memo)); ?></td>
        </tr>
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->username)); ?></td>
        </tr>
        <tr>
            <td><?= __('DatabaseName') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->databaseName)); ?></td>
        </tr>
        <tr>
            <td><?= __('DatasourceName') ?></td>
            <td><?= $this->Text->autoParagraph(h($datasource->datasourceName)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related DatasourcesLogs') ?></h3>
    </div>
    <?php if (!empty($datasource->datasources_logs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Datasource Id') ?></th>
                <th><?= __('Error') ?></th>
                <th><?= __('Condition') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Server Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($datasource->datasources_logs as $datasourcesLogs): ?>
                <tr>
                    <td><?= h($datasourcesLogs->id) ?></td>
                    <td><?= h($datasourcesLogs->datasource_id) ?></td>
                    <td><?= h($datasourcesLogs->error) ?></td>
                    <td><?= h($datasourcesLogs->condition) ?></td>
                    <td><?= h($datasourcesLogs->created) ?></td>
                    <td><?= h($datasourcesLogs->modified) ?></td>
                    <td><?= h($datasourcesLogs->server_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'DatasourcesLogs', 'action' => 'view', $datasourcesLogs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'DatasourcesLogs', 'action' => 'edit', $datasourcesLogs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'DatasourcesLogs', 'action' => 'delete', $datasourcesLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datasourcesLogs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related DatasourcesLogs</p>
    <?php endif; ?>
</div>
