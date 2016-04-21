<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta;
?>
<!--Header top-->
<div id="collapse2" class="collapse myform">
    <div class="container">
        <?php get_search_form(); ?>
    </div>
</div>
<!--End Header top-->
<div id="zo-header" class="zo-main-header zo-header-transparent <?php
if (!$smof_data['menu_sticky']) {
    echo 'no-sticky';
}
?> <?php
if ($smof_data['menu_sticky_tablets']) {
    echo 'sticky-tablets';
}
?> <?php
if ($smof_data['menu_sticky_mobile']) {
    echo 'sticky-mobile';
}
?> <?php
if (!empty($zo_meta->_zo_enable_header_fixed)) {
    echo 'header-fixed-page';
}
?> <?php
if (!empty($zo_meta->_zo_enable_header_menu)) {
    echo 'header-menu-custom';
}
?>"> 
    <div class="container-fluid">
        <div class="row">
            <div id="zo-header-logo" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
            </div>

            <div id="zo-header-navigation" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                <nav id="site-navigation" class="main-navigation">
                    <?php
                    $attr = array(
                        'menu' => zo_menu_location(),
                        'menu_class' => 'nav-menu menu-main-menu',
                    );

                    $menu_locations = get_nav_menu_locations();

                    if (!empty($menu_locations['primary'])) {
                        $attr['theme_location'] = 'primary';
                    }

                    /* enable mega menu. */
                    if (class_exists('HeroMenuWalker')) {
                        $attr['walker'] = new HeroMenuWalker();
                    }

                    /* main nav. */
                    wp_nav_menu($attr);
                    ?>
                </nav>	   
            </div>
			<div class="menu-right">
				<span><a title="Search" href="#" id="filter-menu" class="nav-toggle collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false"><i class="fa fa-search"></i></a></span>
			</div> 
            <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars fa-2x"></i></div>
        </div>
        <!-- #site-navigation -->
    </div>
</div>

