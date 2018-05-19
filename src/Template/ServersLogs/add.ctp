<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServersLog $serversLog
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('List Servers Logs'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Servers Logs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Servers'), ['controller' => 'Servers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Server'), ['controller' => 'Servers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($serversLog); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Servers Log']) ?></legend>
    <?php
    echo $this->Form->control('server_id', ['options' => $servers]);
    echo $this->Form->control('condition');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
