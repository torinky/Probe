<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TablesLog $tablesLog
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Tables Logs'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Tables Logs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($tablesLog); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Tables Log']) ?></legend>
    <?php
    echo $this->Form->control('table_id', ['options' => $tables]);
    echo $this->Form->control('error');
    echo $this->Form->control('condition');
    echo $this->Form->control('rows');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
