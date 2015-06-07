<?php
if (empty($menu_items)) {
    $menu_items = [];
}

function print_menu($item, $view, $menu_items, $level = 0) {
    if (isset($menu_items[$item->id])): ?>
        <li class="dropdown <?php if (!empty($item->active)) { echo 'active'; } ?>">
            <?php
            $link_classes = '';
            if ($level == 0) {
                $link_classes = 'glyphicon glyphicon-chevron-down';
            } else {
                $link_classes = 'glyphicon glyphicon-chevron-right pull-right';
            }?>
            <?php 
                echo $view->Html->link(__(h($item->name)).'&nbsp;&nbsp;<small><i class="'.$link_classes.'"></i></small>', $item->link ,['escape'=>false]); ?>
            <?php print_children($menu_items[$item->id], $view, $menu_items, $level+1); ?>
        </li>
    <?php else: ?>
        <li class="<?php if (!empty($item->active)) { echo 'active'; } ?>">
            <?= $view->Html->link(__($item->name), $item->link); ?>
        </li>
    <?php endif;
}

function print_children($sub_menu_items, $view, $menu_items, $level) {?>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <?php foreach ($sub_menu_items as $item):
            print_menu($item, $view, $menu_items, $level+1);
        endforeach; ?>
    </ul>

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
<style type="text/css">
    .navbar,
    .navbar li,
    .navbar a {
        -webkit-transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
    }
    .dropdown-menu > li.dropdown > ul.dropdown-menu {
        left: 150px;
        top: -.55em;
    }
</style>
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
                <?php foreach ($menu_items[0] as $item): ?>
                    <?php print_menu($item, $this, $menu_items); ?>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
