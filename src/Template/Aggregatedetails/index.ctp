<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aggregatedetail[]|\Cake\Collection\CollectionInterface $aggregatedetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ReserveDetail'), ['controller' => 'Reservedetail', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="aggregatedetails index large-9 medium-8 columns content">
    <h3><?= __('Aggregatedetails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ReserveDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ReserveType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Amount') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aggregatedetails as $aggregatedetail): ?>
            <tr>
                <td><?= h($aggregatedetail->ReserveKey) ?></td>
                <td><?= h($aggregatedetail->ReserveType) ?></td>
                <td><?= h($aggregatedetail->Amount) ?></td>
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
