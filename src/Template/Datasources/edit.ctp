<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Datasource $datasource
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
<li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $datasource->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $datasource->id)]
    )
    ?>
</li>
<li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
        $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $datasource->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $datasource->id)]
        )
        ?>
    </li>
    <li><?= $this->Html->link(__('List Datasources'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Datasources Logs'), ['controller' => 'DatasourcesLogs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Datasources Log'), ['controller' => 'DatasourcesLogs', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($datasource); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Datasource']) ?></legend>
    <?php
    echo $this->Form->control('className');
    echo $this->Form->control('driver');
    echo $this->Form->control('host');
    echo $this->Form->control('memo');
    echo $this->Form->control('type');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
