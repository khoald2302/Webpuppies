<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta;
?>
<div id="collapse1" class="collapse myform">
    <div class="container-fluid">
        <?php get_search_form(); ?>
    </div>
</div>
<!--Header top-->

<div id="zo-header-top"  class="zo-header-top-style-1 
<?php 
$backgroud_class = ($smof_data['sub_menu_mobi_background'] == 0) ? " zo-header-style-8" :  "";
if($zo_meta->_zo_header == '1' && $zo_meta->_zo_header_menu_reponsive == '0' ){
        $backgroud_class = " zo-header-style-8" ;
}   
echo $backgroud_class;
?>
">
    <div class="container-fluid">
       <div class="row">    
			<div id="zo-header-logo" class="col-xs-12 col-sm-8 col-md-4 col-lg-4">
				<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
			</div>
			<?php if ($smof_data['enable_header_top'] == '1'): ?>
				<?php if ($zo_meta->_zo_header_top_enable == '1' || ($zo_meta->_zo_header == '')): ?>
					<?php if (is_active_sidebar('sidebar-2')) : ?>
						<div class="col-md-5 col-lg-4 zo-hiden-mobile"><?php dynamic_sidebar('sidebar-2'); ?></div>
					<?php endif; ?>
					<?php if (is_active_sidebar('sidebar-3')) : ?>
						<div class="col-md-3 col-lg-4 zo-hiden-mobile"><?php dynamic_sidebar('sidebar-3'); ?></div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
        </div> 
    </div>
</div>

<!--End Header top-->
<div id="zo-header" class="zo-main-header  zo-header-style-1 <?php
if (!$smof_data['menu_sticky']) {
    echo 'no-sticky';
}
?> <?php
if ($smof_data['menu_sticky_tablets']) {
    echo 'sticky-tablets';
}
?> 
<?php if($zo_meta->_zo_header_menu_reponsive == '0'){
    echo "zo-header-style-8";
}?>
<?php
if ($smof_data['menu_sticky_mobile']) {
    echo 'sticky-mobile';
}
?> <?php
if (!empty($zo_meta->_zo_enable_header_fixed)) {
    echo 'header-fixed-page';
}
?> <?php if (!empty($zo_meta->_zo_enable_header_menu)) {
		echo 'header-menu-custom';
} ?>">
    <div class="container-fluid">
        <div class="row">
            <div id="zo-header-navigation" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
				<span><a title="<?php echo esc_html__('Search','creativ'); ?>" href="#" id="filter-menu" class="nav-toggle collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false"><i class="fa fa-search"></i></a></span>
			</div> 
            <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars fa-2x"></i></div>
        </div>
    </div>
    <!-- #site-navigation -->
</div>
