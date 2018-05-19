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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $storage->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Storages Logs'), ['controller' => 'StoragesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Storages Log'), ['controller' => 'StoragesLogs', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $storage->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $storage->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Storages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Storages Logs'), ['controller' => 'StoragesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storages Log'), ['controller' => 'StoragesLogs', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($storage); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Storage']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('place');
    echo $this->Form->control('memo');
    echo $this->Form->control('server_id', ['options' => $servers]);
    echo $this->Form->control('type');
    echo $this->Form->control('condition');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
