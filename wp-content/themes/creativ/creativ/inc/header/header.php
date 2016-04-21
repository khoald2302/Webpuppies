<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta;

$zo_meta->_zo_header = (isset($zo_meta->_zo_header)) ? $zo_meta->_zo_header : '';
if(isset($zo_meta->_zo_header_top_enable)){
    $smof_data['enable_header_top'] = $zo_meta->_zo_header_top_enable;
}

$_zo_header  = "";
$show_hd_top = "";
if(!empty($smof_data['show_header_top_reponsive'])){
    $show_hd_top = $smof_data['show_header_top_reponsive'];
}
else {
     if(isset($zo_meta->_zo_show_header_top_reponsive )){ $show_hd_top = $zo_meta->_zo_show_header_top_reponsive ;};
}
?>
<!--Header top-->
<div id="collapse1" class="collapse myform">
    <div class="container-fluid">
        <?php get_search_form(); ?>
    </div>
</div>
<?php if ($smof_data['enable_header_top'] == '1'):

    ?>
        <div id="zo-header-top" class="<?php
        if (!empty($show_hd_top)) {
                echo 'header_top_reponsive';
            }
        ?>">
            <div class="container-fluid">
                <?php if (is_active_sidebar('sidebar-2')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-2'); ?></div>
                <?php endif; ?>
                <?php if (is_active_sidebar('sidebar-3')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php dynamic_sidebar('sidebar-3'); ?></div>
                <?php endif;?>
            </div>
        </div>
<?php endif; ?>
<!--End Header top-->
<div id="zo-header" class="zo-main-header header-default <?php
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
if(!empty($zo_meta->_zo_header_color)){
    echo ' header-custom-background';
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
		

            <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars fa-2x"></i></div>
        </div>
        <!-- #site-navigation -->
    </div>
</div>
<!--end #zo-header  -->