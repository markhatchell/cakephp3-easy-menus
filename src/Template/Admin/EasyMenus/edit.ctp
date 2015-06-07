<script type="text/javascript">
    jQuery(document).ready(function(){
        setUpLinkTypeMenu();
    });

    function setUpLinkTypeMenu() {
        jQuery('#link_type_selection').change(function(){
            var link_type = jQuery(this).val();
            var inputs = '.link_options_type_'+link_type;
            if ( link_type == 1 ) {
                jQuery('.params_link_options').html('');
                jQuery('#link').val('').removeAttr('disabled');
            } else {
                jQuery('#link').val('[auto]').attr('disabled','disabled');
                jQuery('.params_link_options').html(
                    jQuery(inputs).html()
                );
            }
        });
        jQuery('#EasyMenuForm').submit(function() {
            jQuery(this).find('input').removeAttr('disabled');
        });
    }
</script>
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
        <?= $this->Form->create($easyMenu, ['id' => 'EasyMenuForm']); ?>
        <fieldset>
            <legend><?= __('Add {0}', ['Easy Menu']) ?></legend>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('link');
            echo $this->Form->input('parent');
            echo $this->Form->input('link_type',['options'=>$link_types,'id'=>'link_type_selection']); ?>
            <div class="params_link_options"></div>
            <?php
            echo $this->Form->input('state');
            echo $this->Form->input('ordering');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>


<?php

$controller = '';
if ( is_array($easyMenu->params) ) {
    if ( is_array($easyMenu->params['link_options']) ) {
        if ( isset($easyMenu->params['link_options']['controller']) ) {
            $controller = $easyMenu->params['link_options']['controller'];
        }
    }
}

$action = '';
if ( is_array($easyMenu->params) ) {
    if ( is_array($easyMenu->params['link_options']) ) {
        if ( isset($easyMenu->params['link_options']['action']) ) {
            $action = $easyMenu->params['link_options']['action'];
        }
    }
}

$plugin = '';
if ( is_array($easyMenu->params) ) {
    if ( is_array($easyMenu->params['link_options']) ) {
        if ( isset($easyMenu->params['link_options']['plugin']) ) {
            $plugin = $easyMenu->params['link_options']['plugin'];
        }
    }
}

$item = '';
if ( is_array($easyMenu->params) ) {
    if ( is_array($easyMenu->params['link_options']) ) {
        if ( isset($easyMenu->params['link_options'][0]) ) {
            $item = $easyMenu->params['link_options'][0];
        }
    }
}

?>
<div class="link_options_type_2 link_options_type_action hidden">
    <?php
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller]);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action]);
    ?>
</div>
<div class="link_options_type_3 link_options_type_action_plugin hidden">
    <?php
    echo $this->Form->input('params[link_options][plugin]', ['value'=>$plugin]);
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller]);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action]);
    ?>
</div>
<div class="link_options_type_4 link_options_type_action_item hidden">
    <?php
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller]);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action]);
    echo $this->Form->input('params[link_options][0]',['value'=>$item]);
    ?>
</div>
<div class="link_options_type_5 link_options_type_action_item_plugin hidden">
    <?php
    echo $this->Form->input('params[link_options][plugin]', ['value'=>$plugin]);
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller]);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action]);
    echo $this->Form->input('params[link_options][0]',['value'=>$item]);
    ?>
</div>

