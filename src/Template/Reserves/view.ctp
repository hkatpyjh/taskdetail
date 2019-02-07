<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserve $reserve
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reserve'), ['action' => 'edit', $reserve->Seq]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserve'), ['action' => 'delete', $reserve->Seq], ['confirm' => __('Are you sure you want to delete # {0}?', $reserve->Seq)]) ?> </li>
        <li><?= $this->Html->link(__('List Reserves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reserves view large-9 medium-8 columns content">
    <h3><?= h($reserve->Seq) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= h($reserve->Seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial') ?></th>
            <td><?= h($reserve->Serial) ?></td>
        </tr>
    </table>
</div>
