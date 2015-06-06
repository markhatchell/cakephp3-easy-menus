<div class="container">
    <div class="col-sm-12">
        <ul class="nav navbar-nav">
            <li><?=
                $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $easyMenu->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $easyMenu->id)]
                )
                ?></li>
            <li><?= $this->Html->link(__('Menus'), ['action' => 'index']) ?></li>
        </ul>
    </div>
    <div class="col-sm-12">
        <?= $this->Form->create($easyMenu); ?>
        <fieldset>
            <legend><?= __('Add {0}', ['Easy Menu']) ?></legend>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('link');
            echo $this->Form->input('parent');
            echo $this->Form->input('params');
            echo $this->Form->input('ordering');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
