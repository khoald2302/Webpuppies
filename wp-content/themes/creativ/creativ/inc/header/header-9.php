<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta;
?>

<!--end menu-->

<!--End Header top-->
<div id="zo-header" class="zo-main-header zo-header-style-10  sidebar-offcanvas <?php
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
if (!empty($zo_meta->_zo_header_color)) {
    echo ' header-custom-background';
}
?>">
    <div class="col-md-12">
        <div id="zo-header-logo" class="">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
        </div>
        <div id="zo-header-navigation">
            <nav id="site-navigation" class="main-navigation clearfix">
                <?php
                $attr = array(
                    'menu' => zo_menu_location(),
                    'menu_class' => 'nav-menu menu-main-menu',
                );

                $menu_locations = get_nav_menu_locations();

                if (!empty($menu_locations['photography'])) {
                    $attr['theme_location'] = 'photography';
                }

                /* enable mega menu. */
                if (class_exists('HeroMenuWalker')) {
                    $attr['walker'] = new HeroMenuWalker();
                }
                /* main nav. */
                wp_nav_menu($attr);
                ?>
            </nav>    
            <!-- #site-navigation --> 
        </div>
        <div id="zo-sidebar-photography" class="zo-sidebar-photography">
            <?php if (is_active_sidebar('header-version-photography')) : ?>
                <?php dynamic_sidebar('header-version-photography'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>   
<div class="visible-sm visible-xs mobile-menu">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="fa fa-bars"></i></button>
</div>

