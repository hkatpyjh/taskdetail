<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservedetail[]|\Cake\Collection\CollectionInterface $reservedetail
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>-->
<div class="reservedetail index large-16 medium-12 columns content">
<!--    <h3><?= __('Reservedetail') ?></h3>-->
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="35%"><?= $this->Paginator->sort('ReserveKey') ?></th>
                <th scope="col" width="35%"><?= $this->Paginator->sort('ReserveType') ?></th>
                <th scope="col" width="15%"><?= $this->Paginator->sort('Amount') ?></th>
                <th scope="col" width="15%" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservedetail as $reservedetail): ?>
            <tr>
                <td><?= h($reservedetail->ReserveKey) ?></td>
                <td><?= h($reservedetail->ReserveType) ?></td>
                <td><?= h($reservedetail->Amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservedetail->ReserveKey]) ?>
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
