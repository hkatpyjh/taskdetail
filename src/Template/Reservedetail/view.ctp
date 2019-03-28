<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservedetail $reservedetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		 <li><?= $this->Html->link(__('List Reservedetail'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="reservedetail view large-9 medium-8 columns content">
    <h3><?= h($reservedetail->Machine) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ReserveKey') ?></th>
            <td><?= h($reservedetail->ReserveKey) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ReserveType') ?></th>
            <td><?= h($reservedetail->ReserveType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($reservedetail->Amount) ?></td>
        </tr>
    </table>
</div>
