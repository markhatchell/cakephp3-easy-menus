
    <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']); ?></li>
    </ul>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('link'); ?></th>
            <th><?= $this->Paginator->sort('parent'); ?></th>
            <th><?= $this->Paginator->sort('params'); ?></th>
            <th><?= $this->Paginator->sort('ordering'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($easyMenus as $easyMenu): ?>
            <tr>
                <td><?= $this->Number->format($easyMenu->id) ?></td>
                <td><?= h($easyMenu->name) ?></td>
                <td><?= h($easyMenu->link) ?></td>
                <td><?= $this->Number->format($easyMenu->parent) ?></td>
                <td><?= h($easyMenu->params) ?></td>
                <td><?= $this->Number->format($easyMenu->ordering) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $easyMenu->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $easyMenu->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $easyMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easyMenu->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                </td>
            </tr>

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

    <table class="table table-striped" cellpadding="0" cellspacing="0"  style="width:100%;">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id'); ?></th>
                <th style="width:80%;"><?= $this->Paginator->sort('name'); ?></th>
                <th><?= $this->Paginator->sort('link'); ?></th>
                <th><?= $this->Paginator->sort('parent'); ?></th>
                <th><?= $this->Paginator->sort('params'); ?></th>
                <th><?= $this->Paginator->sort('ordering'); ?></th>
                <th class="actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu_items as $easyMenu): ?>
                <tr>
                    <td><?= $this->Form->input('ids[]',['value'=>$easyMenu->id, 'type'=>'checkbox', 'label'=>false])?></td>
                    <td><?= $easyMenu->name ?></td>
                    <td><?= $easyMenu->link ?></td>
                    <td><?= $easyMenu->parent ?></td>
                    <td><?= $easyMenu->params ?></td>
                    <td><?= $easyMenu->ordering ?></td>
                    <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $easyMenu->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $easyMenu->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $easyMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easyMenu->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
                <?php if (!empty($easyMenu->has_children)): ?>
                    <?php foreach ($sub_menu_items[$easyMenu->id] as $easySubMenu): ?>
                        <tr>
                            <td><?= $this->Form->input('ids',['value'=>$easySubMenu->id, 'type'=>'checkbox', 'label'=>false])?></td>
                            <td style="padding-left:<?=2*$easySubMenu->level?>%;"><?= $easySubMenu->name ?></td>
                            <td><?= $easySubMenu->link ?></td>
                            <td><?= $easySubMenu->parent ?></td>
                            <td><?= $easySubMenu->params ?></td>
                            <td><?= $easySubMenu->ordering ?></td>
                            <td class="actions">
                                <nobr>
                                    <?= $this->Html->link('', ['action' => 'view', $easySubMenu->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                                    <?= $this->Html->link('', ['action' => 'edit', $easySubMenu->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                                    <?= $this->Form->postLink('', ['action' => 'delete', $easySubMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easySubMenu->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                                </nobr>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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
