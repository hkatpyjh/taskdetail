<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->TargetYearMonthDay, $page]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index', $page]) ?> </li>
    </ul>
</nav>
<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->TargetYearMonthDay) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TargetYearMonthDay') ?></th>
            <td><?= h($task->TargetYearMonthDay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TargetYearMonth') ?></th>
            <td><?= h($task->TargetYearMonth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= h($task->Day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartTime') ?></th>
            <td><?= h($task->StartTime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndTime') ?></th>
            <td><?= h($task->EndTime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WorkTime') ?></th>
            <td><?= h($task->WorkTime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WorkTimeCompany') ?></th>
            <td><?= h($task->WorkTimeCompany) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartLocation') ?></th>
            <td><?= h($task->StartLocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndLocation') ?></th>
            <td><?= h($task->EndLocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartOn') ?></th>
            <td><?= $task->StartOn ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndOn') ?></th>
            <td><?= $task->EndOn ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NeedApplication') ?></th>
            <td><?= $task->NeedApplication ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HaveTask') ?></th>
            <td><?= $task->HaveTask ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
