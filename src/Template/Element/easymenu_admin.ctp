<?php
if (empty($admin_menu_items)) {
    $admin_menu_items = [0=>array()];
}

function admin_print_menu($item, $view, $admin_menu_items, $level = 0) {
    if (isset($admin_menu_items[$item->id])): ?>
        <tr>
            <td style="width:1%; "><?= $view->Form->input('ids',['value'=>$item->id, 'type'=>'checkbox', 'label'=>false])?></td>
            <td style="padding-left:<?=8*($level+1)?>px;"><?= $item->name ?></td>
            <td><?= $item->link ?></td>
            <td><?= $item->parent ?></td>
            <td><?= $item->ordering ?></td>
            <td class=" text-right actions">
                <?= $view->Html->link('', ['action' => 'view', $item->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $view->Html->link('', ['action' => 'edit', $item->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $view->Form->postLink('', ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item   ->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php admin_print_children($admin_menu_items[$item->id], $view, $admin_menu_items, $level+1); ?>
    <?php else: ?>
        <tr>
            <td><?= $view->Form->input('ids',['value'=>$item->id, 'type'=>'checkbox', 'label'=>false])?></td>
            <td style="padding-left:<?=8*($level+1)?>px;"><?= $item->name ?></td>
            <td><?= $item->link ?></td>
            <td><?= $item->parent ?></td>
            <td><?= $item->ordering ?></td>
            <td class=" text-right actions">
                <?= $view->Html->link('', ['action' => 'view', $item->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $view->Html->link('', ['action' => 'edit', $item->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $view->Form->postLink('', ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item   ->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
    <?php endif;
}

function admin_print_children($sub_menu_items, $view, $admin_menu_items, $level) {?>
    <?php foreach ($sub_menu_items as $item):
        admin_print_menu($item, $view, $admin_menu_items, $level+1);
    endforeach; ?>

<?php
}
?>
<table class="table table-striped" cellpadding="0" cellspacing="0"  style="width:100%;">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('name'); ?></th>
        <th><?= $this->Paginator->sort('link'); ?></th>
        <th width="1%"><?= $this->Paginator->sort('parent'); ?></th>
        <th width="1%"><?= $this->Paginator->sort('ordering'); ?></th>
        <th width="150" class=" text-right actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($admin_menu_items[0] as $item): ?>
            <?php admin_print_menu($item, $this, $admin_menu_items); ?>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>