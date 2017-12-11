<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks index large-9 medium-8 columns content">
    <h3><?= __('Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TargetYearMonthDay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TargetYearMonth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StartTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EndTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WorkTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WorkTimeCompany') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StartLocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EndLocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StartOn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EndOn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NeedApplication') ?></th>
                <th scope="col"><?= $this->Paginator->sort('HaveTask') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= h($task->TargetYearMonthDay) ?></td>
                <td><?= h($task->TargetYearMonth) ?></td>
                <td><?= h($task->Day) ?></td>
                <td><?= h($task->StartTime) ?></td>
                <td><?= h($task->EndTime) ?></td>
                <td><?= h($task->WorkTime) ?></td>
                <td><?= h($task->WorkTimeCompany) ?></td>
                <td><?= h($task->StartLocation) ?></td>
                <td><?= h($task->EndLocation) ?></td>
                <td><?= h($task->Notes) ?></td>
                <td><?= h($task->StartOn) ?></td>
                <td><?= h($task->EndOn) ?></td>
                <td><?= h($task->NeedApplication) ?></td>
                <td><?= h($task->HaveTask) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
