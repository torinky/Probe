<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Storage $storage
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($storage); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Storage']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('place');
    echo $this->Form->control('memo');
    echo $this->Form->control('capacity');
    echo $this->Form->control('limit_remain');
    echo $this->Form->control('files_count');
    echo $this->Form->control('directories_count');
    echo $this->Form->control('used_size');
    echo $this->Form->control('server_id', ['options' => $servers]);
    echo $this->Form->control('condition');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
