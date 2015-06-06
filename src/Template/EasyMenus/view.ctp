<?php
?>
<div class="col-sm-12">
    <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Edit Easy Menu'), ['action' => 'edit', $easyMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Easy Menu'), ['action' => 'delete', $easyMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easyMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Easy Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Easy Menu'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<h2><?= h($easyMenu->name) ?></h2>
<div class="row">
    <div class="col-lg-5">
        <h6><?= __('Name') ?></h6>
        <p><?= h($easyMenu->name) ?></p>
        <h6><?= __('Link') ?></h6>
        <p><?= h($easyMenu->link) ?></p>
        <h6><?= __('Params') ?></h6>
        <p><?= h($easyMenu->params) ?></p>
    </div>
    <div class="col-lg-2">
        <h6><?= __('Id') ?></h6>
        <p><?= $this->Number->format($easyMenu->id) ?></p>
        <h6><?= __('Parent') ?></h6>
        <p><?= $this->Number->format($easyMenu->parent) ?></p>
        <h6><?= __('Order') ?></h6>
        <p><?= $this->Number->format($easyMenu->ordering) ?></p>
    </div>
</div>
