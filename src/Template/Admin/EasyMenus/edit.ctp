<script type="text/javascript">
    var routes_info = {};
    <?php
        foreach($routes_info as $route_template => $options) {
            echo "routes_info['$route_template'] = '$options';\n ";
        }
    ?>
    jQuery(document).ready(function(){
        jQuery('.route_field').css('display','none');
        jQuery('.route_field input').val('0').change();
        setUpLinkTypeMenu();
    });

    function setUpLinkTypeMenu() {
        jQuery('#link_type_selection').change(function(){
            var link_type = jQuery(this).val();
            var inputs = '.link_options_type_'+link_type;
            if ( link_type == 1 ) {
                jQuery('.params_link_options_container').html('');
                jQuery('#link').val('').removeAttr('disabled');
                jQuery('.route_field').css('display','none');
            } else {
                jQuery('#link').val('[auto]').attr('disabled','disabled');
                jQuery('.route_field').css('display','').find('input').val(0).change();
                jQuery('.params_link_options_container').html(
                    jQuery(inputs).html()
                );
            }
            setUpLinkOptionsChange();
        });
        jQuery('#EasyMenuForm').submit(function() {
            jQuery(this).find('input').removeAttr('disabled');
        });
        jQuery('#route').change(function(e){
            var link_val = jQuery(this).val().replace(/\*$/,'');
            var link_has_id = false;
            if (link_val != 0) {
                if ( jQuery(this).val().match(/\*$/,'') ) {
                    link_has_id = true;
                }

                var link_options = jQuery.parseJSON(routes_info[jQuery(this).val()]);

                if (link_options.controller != null && link_options.action != null) {
                    jQuery('#link_type_selection').val(2).change();
                }
                if (link_options.plugin != null && link_options.controller != null && link_options.action != null) {
                    jQuery('#link_type_selection').val(3).change();
                }
                if (link_has_id == true && link_options.controller != null && link_options.action != null) {
                    jQuery('#link_type_selection').val(4).change();
                }
                if (link_has_id == true && link_options.plugin != null && link_options.controller != null && link_options.action != null) {
                    jQuery('#link_type_selection').val(5).change();
                }
                jQuery('.params-link-options-plugin').val(link_options.plugin).change();
                jQuery('.params-link-options-controller').val(link_options.controller).change();
                jQuery('.params-link-options-action').val(link_options.action).change();
                if (typeof e.bubbles == 'boolean') {
                    jQuery('.params-link-options-0').val('').change();
                }
                jQuery('#link').val( link_val );
                jQuery('.params_link_options_container .params-link-options-0').keyup();
            }
        });
        jQuery('.params-link-options').each(function(){
            jQuery(this).attr('data-value',jQuery(this).val());
        });
        jQuery('#route').change();
        jQuery('.params_link_options_container .params-link-options-0').keyup();
    }

    function setUpLinkOptionsChange() {
        jQuery('.params_link_options_container .params-link-options').change(function(e){
            jQuery('.'+jQuery(this).attr('data-class')).attr('data-value', jQuery(this).val());
        });
        jQuery('.params_link_options_container .params-link-options-0').keyup(function(e){
            var link_val = jQuery('#route').val().replace(/\*$/,'');
            jQuery('#link').val(link_val+jQuery(this).val());
        });
        jQuery('.params_link_options_container .params-link-options').each(function(){
            jQuery(this).val(jQuery(this).attr('data-value'));
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
            echo $this->Form->input('link_type',['options'=>$link_types,'id'=>'link_type_selection']);
            ?> <div class="route_field"> <?php
            echo $this->Form->input('route');
            ?> </div> <?php
            echo $this->Form->input('link');
            ?> <div class="params_link_options_container"></div> <?php
            echo $this->Form->input('parent');
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
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller,'data-class'=>'params-link-options-controller', 'class'=>'params-link-options params-link-options-controller']);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action,'data-class'=>'params-link-options-action', 'class'=>'params-link-options params-link-options-action']);
    ?>
</div>
<div class="link_options_type_3 link_options_type_action_plugin hidden">
    <?php
    echo $this->Form->input('params[link_options][plugin]', ['value'=>$plugin,'data-class'=>'params-link-options-plugin', 'class'=>'params-link-options params-link-options-plugin']);
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller,'data-class'=>'params-link-options-controller', 'class'=>'params-link-options params-link-options-controller']);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action,'data-class'=>'params-link-options-action', 'class'=>'params-link-options params-link-options-action']);
    ?>
</div>
<div class="link_options_type_4 link_options_type_action_item hidden">
    <?php
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller,'data-class'=>'params-link-options-controller', 'class'=>'params-link-options params-link-options-controller']);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action,'data-class'=>'params-link-options-action', 'class'=>'params-link-options params-link-options-action']);
    echo $this->Form->input('params[link_options][0]',['value'=>$item,'data-class'=>'params-link-options', 'class'=>'params-link-options params-link-options-0']);
    ?>
</div>
<div class="link_options_type_5 link_options_type_action_item_plugin hidden">
    <?php
    echo $this->Form->input('params[link_options][plugin]', ['value'=>$plugin,'data-class'=>'params-link-options-plugin', 'class'=>'params-link-options params-link-options-plugin']);
    echo $this->Form->input('params[link_options][controller]', ['value'=>$controller,'data-class'=>'params-link-options-controller', 'class'=>'params-link-options params-link-options-controller']);
    echo $this->Form->input('params[link_options][action]', ['value'=>$action,'data-class'=>'params-link-options-action', 'class'=>'params-link-options params-link-options-action']);
    echo $this->Form->input('params[link_options][0]',['value'=>$item,'data-class'=>'params-link-options-0', 'class'=>'params-link-options params-link-options-0']);
    ?>
</div>
