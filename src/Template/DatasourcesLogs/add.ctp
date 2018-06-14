<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DatasourcesLog $datasourcesLog
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Datasources Logs'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Datasources Logs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Datasources'), ['controller' => 'Datasources', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasource'), ['controller' => 'Datasources', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($datasourcesLog); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Datasources Log']) ?></legend>
    <?php
    echo $this->Form->control('datasource_id', ['options' => $datasources]);
    echo $this->Form->control('error');
    echo $this->Form->control('condition');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
