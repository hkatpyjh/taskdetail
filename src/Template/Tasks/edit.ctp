<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend><?= __('Edit Task') ?></legend>
        <?php
            echo $this->Form->control('TargetYearMonth');
            echo $this->Form->control('Day');
            echo $this->Form->control('StartTime');
            echo $this->Form->control('EndTime');
            echo $this->Form->control('WorkTime');
            echo $this->Form->control('WorkTimeCompany');
            echo $this->Form->control('StartLocation');
            echo $this->Form->control('EndLocation');
            echo $this->Form->control('Notes');
            echo $this->Form->control('StartOn');
            echo $this->Form->control('EndOn');
            echo $this->Form->control('NeedApplication');
            echo $this->Form->control('HaveTask');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
