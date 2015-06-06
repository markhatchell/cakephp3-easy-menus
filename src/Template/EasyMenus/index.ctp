
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
            <th><?= $this->Paginator->sort('ordering'); ?></th>
            <th class="actions text-right"><?= __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($easyMenus as $easyMenu): ?>
            <tr>
                <td><?= $this->Number->format($easyMenu->id) ?></td>
                <td><?= h($easyMenu->name) ?></td>
                <td><?= h($easyMenu->link) ?></td>
                <td width="1%"><?= $this->Number->format($easyMenu->parent) ?></td>
                <td width="1%"><?= $this->Number->format($easyMenu->ordering) ?></td>
                <td width="150"  class="actions text-right">
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
                <th><?= $this->Paginator->sort('name'); ?></th>
                <th><?= $this->Paginator->sort('link'); ?></th>
                <th width="1%"><?= $this->Paginator->sort('parent'); ?></th>
                <th width="1%"><?= $this->Paginator->sort('ordering'); ?></th>
                <th width="150" class=" text-right actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu_items as $easyMenu):
                $level = 1;
            ?>
                <tr>
                    <td><?= $this->Form->input('ids[]',['value'=>$easyMenu->id, 'type'=>'checkbox', 'label'=>false])?></td>
                    <td><?= $easyMenu->name ?></td>
                    <td><?= $easyMenu->link ?></td>
                    <td><?= $easyMenu->parent ?></td>
                    <td><?= $easyMenu->ordering ?></td>
                    <td class="text-right  actions">
                    <?= $this->Html->link('', ['action' => 'view', $easyMenu->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $easyMenu->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $easyMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easyMenu->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
                <?php if (!empty($easyMenu->has_children)): ?>
                    <?php foreach ($easyMenu->children as $easySubMenu):
                        $level = 2;
                    ?>
                        <tr>
                            <td><?= $this->Form->input('ids',['value'=>$easySubMenu->id, 'type'=>'checkbox', 'label'=>false])?></td>
                            <td style="padding-left:<?=1*$level?>%;"><?= $easySubMenu->name ?></td>
                            <td><?= $easySubMenu->link ?></td>
                            <td><?= $easySubMenu->parent ?></td>
                            <td><?= $easySubMenu->ordering ?></td>
                            <td class=" text-right actions">
                                    <?= $this->Html->link('', ['action' => 'view', $easySubMenu->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                                    <?= $this->Html->link('', ['action' => 'edit', $easySubMenu->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                                    <?= $this->Form->postLink('', ['action' => 'delete', $easySubMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $easySubMenu->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
