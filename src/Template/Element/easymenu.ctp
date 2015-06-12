<?php
if (empty($menu_items)) {
    $menu_items = [];
}

function print_menu($item, $view, $menu_items, $level = 0) {
    if ( $item->menu_side == 1) {
        $view->append('EasyMenus.RightMenu');
    }
    if (isset($menu_items[$item->id])): ?>
        <li
            class="dropdown <?php if (!empty($item->active)) { echo 'active'; } ?>"
        >
            <?php
            $link_classes = '';
            if ($level == 0) {
                $link_classes = 'glyphicon glyphicon-chevron-down';
            } else {
                $link_classes = 'glyphicon glyphicon-chevron-right ';
            }?>
            <?php echo $view->Html->link(__(h($item->name)).'&nbsp;&nbsp;<small><i class="'.$link_classes.'"></i></small>', $item->link ,[
                'escape'=>false,
                'data-toggle'=>"dropdown",
                'role'=>"button",
            ]); ?>
            <?php print_children($menu_items[$item->id], $view, $menu_items, $level+1); ?>
        </li>
    <?php else: ?>
        <li class="<?php if (!empty($item->active)) { echo 'active'; } ?>">
            <?= $view->Html->link(__($item->name), $item->link); ?>
        </li>
    <?php endif;
    if ( $item->menu_side == 1) {
        $view->end();
    }
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
        markParentAsActive();
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

    function markParentAsActive() {
        var keepRunning = true;
        while(keepRunning) {
            var currentParent = jQuery('.easymenus .active').parent().parent();
            if ( typeof jQuery(currentParent).get(0) != 'undefined' ) {
                if ( jQuery(currentParent).get(0).tagName != 'LI' ) {
                    keepRunning = false;
                    return false;
                }
            } else {
                keepRunning = false;
                return false;
            }
            jQuery(currentParent).addClass('active');
        }
    }
</script>
<style type="text/css">
    .easymenus .navbar,
    .easymenus .navbar li,
    .easymenus .navbar a {
        -webkit-transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
    }
    .easymenus .dropdown-menu > li.dropdown > ul.dropdown-menu {
        left: 98%;
        top: -.55em;
    }
    .easymenus .navbar-right {
        margin-right: 0;
    }
</style>


<nav class="easymenus navbar <?=($menu_settings['navbar_is_fixed'])?'navbar-fixed-top':''?> <?=$menu_settings['navbar_class']?>">
    <?php if (empty($menu_settings['full_width'])): ?>
    <div class="container">
    <?php endif ?>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php
                switch($menu_settings['brand_display_type']) {
                    case 1: // text
                        echo $menu_settings['brand_display_name'];
                        break;
                    case 2: // image
                        echo $this->Html->image($menu_settings['brand_display_image'], ['title'=>$settings['brand_display_name']]);
                        break;

                }
                ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach ($menu_items[0] as $item): ?>
                    <?php print_menu($item, $this, $menu_items); ?>
                <?php endforeach; ?>
            </ul>
        <?php if ($this->fetch('EasyMenus.RightMenu')): ?>
            <ul class="nav navbar-nav navbar-right">
                <?= $this->fetch('EasyMenus.RightMenu') ?>
            </ul>
        <?php endif; ?>
        </div><!-- /.navbar-collapse -->
    <?php if (empty($menu_settings['full_width'])): ?>
    </div><!-- /.container-fluid -->
    <?php endif ?>
</nav>
