<?php
if (empty($menu_items)) {
    $menu_items = [];
}
if (empty($sub_menu_items)) {
    $sub_menu_items = [];
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
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($menu_items as $item): ?>
                    <li class="<?php if (!empty($item->has_children)) { echo 'dropdown'; } ?> <?php if (!empty($item->active)) { echo 'active'; } ?>">
                        <?php
                        $item_options = array();
                        if (!empty($item->has_children)) {
                            $item_options['class'] = 'dropdown-toggle';
                            $item_options['data-toggle'] = 'dropdown';
                        } ?>
                        <?= $this->Html->link(__($item->name), $item->link, $item_options); ?>
                        <?php if (!empty($item->has_children)): ?>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <?php foreach ($item->children as $sub_item): ?>
                                    <li><?= $this->Html->link(__($sub_item->name), $sub_item->link); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
