<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks */
?>
<div class="tasks index large-12 medium-10 columns content">
    <h3><?= __('Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('TargetYearMonthDay') ?></th>
                <th scope="col"><?= $this->Paginator->sort('StartTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EndTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('WorkTime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= h($task->TargetYearMonthDay) ?></td>
                <td><?= h($task->StartTime) ?></td>
                <td><?= h($task->EndTime) ?></td>
                <td><?= h($task->WorkTime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $task->TargetYearMonthDay,$this->Paginator->counter(array('format' => ('{{page}}')))]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->TargetYearMonthDay,$this->Paginator->counter(array('format' => ('{{page}}')))]) ?>
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
