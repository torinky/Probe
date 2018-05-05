<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $server->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $server->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Servers'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($server); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Server']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('ip');
    echo $this->Form->control('condition');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
