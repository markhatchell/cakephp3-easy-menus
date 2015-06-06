<?php
if (empty($menu_items)) {
    $menu_items = [];
}

function print_menu($item, $view, $level = 1) {
    if ($item->has_children): ?>
        <li class="<?php if (!empty($item->has_children)) { echo 'dropdown'; } ?> <?php if (!empty($item->active)) { echo 'active'; } ?>">
            <?php
            $item_options = array();
            if (!empty($item->has_children)) {
                $item_options['class'] = 'dropdown-toggle';
                $item_options['data-toggle'] = 'dropdown';
            } ?>
            <?= $view->Html->link(__($item->name), $item->link, $item_options); ?>
            <?php print_children($item, $view, ($level+1)); ?>
        </li>
    <?php else: ?>
        <li class="<?php if (!empty($item->active)) { echo 'active'; } ?>">
            <?= $view->Html->link(__($item->name), $item->link); ?>
        </li>
    <?php endif;
}

function print_children($item, $view, $level = 2) {?>
    <?php if ($item->has_children): ?>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <?php foreach ($item->children as $sub_item): ?>
                <li data-level="<?=$level?>" class="
                    <?php if (!empty($sub_item->active)) { echo 'active'; } ?>
                    <?php if ($level == 3) { echo 'dropdown-submenu'; } else { echo 'dropdown'; } ?>
                ">
                    <?php
                    $item_options = array();
                    if (!empty($sub_item->has_children)) {
                        $item_options['class'] = 'dropdown-toggle';
                        $item_options['data-toggle'] = 'dropdown';
                    } ?>
                    <?= $view->Html->link(__($sub_item->name), $sub_item->link, $item_options); ?>
                    <?php if ($sub_item->has_children) { print_children($sub_item, $view, ($level+1)); } ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <?= $view->Html->link(__($sub_item->name), $sub_item->link); ?>
        </ul>
    <?php endif; ?>

<?php
}
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        setUpEasyMenus();
    });

    function setUpEasyMenus() {
        jQuery('.easymenus li.dropdown a').click(function(event){
            document.location.href = jQuery(this).attr('href');
            event.stopPropagation();
            event.preventDefault();
        });

        jQuery('.easymenus li.dropdown').mouseenter(function(event){
            jQuery(this).addClass('open');
        });
        jQuery('.easymenus li.dropdown').mouseleave(function(event){
            jQuery(this).removeClass('open');
        });
    }
</script>
<nav class="easymenus navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($menu_items as $item): ?>
                    <?php print_menu($item, $this); ?>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
