<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoragesLog $storagesLog
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Storages Logs'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Storages Logs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($storagesLog); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Storages Log']) ?></legend>
    <?php
    echo $this->Form->control('storage_id', ['options' => $storages]);
    echo $this->Form->control('place');
    echo $this->Form->control('memo');
    echo $this->Form->control('capacity');
    echo $this->Form->control('limit_remain');
    echo $this->Form->control('files_count');
    echo $this->Form->control('directories_count');
    echo $this->Form->control('used_size');
    echo $this->Form->control('condition');
    echo $this->Form->control('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
