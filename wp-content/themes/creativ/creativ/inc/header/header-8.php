<?php
    /**
    * @name : Default
    * @package : ZoTheme
    * @author : ZoTheme
    */
?>
<?php global $smof_data, $zo_meta;
?>
<div id="zo-navigation-pofolio" class="overlay overlay-scale">

    <nav id="site-navigation" class="pofolio-navigation">
        <?php
            $attr = array(
                'menu' => zo_menu_location(),
                'menu_class' => 'nav-menu menu-main-menu',
            );

            $menu_locations = get_nav_menu_locations();

            if (!empty($menu_locations['portfolio'])) {
                $attr['theme_location'] = 'portfolio';
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
<!--end menu-->

<div id="zo-collapse" class="collapse myform">
    <div class="container-fluid">
        <?php get_search_form(); ?>
    </div>
</div>

<!--End Header top-->
<div id="zo-header" class="zo-main-header zo-header-style-9 <?php
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
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="zo-header-logo" class="pull-left clearfix">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
            </div>
            <div id="zo-header-left" class="pull-right clearfix">
                <?php if (is_active_sidebar('sidebar-3')) : ?>
                    <div class="zo-header-left-content"><?php dynamic_sidebar('sidebar-3'); ?></div>
                <?php endif;?>
                <div class="menu-portfolio clearfix">
                    <span><a title="Search" href="#" id="filter-menu" class="nav-toggle collapsed" data-toggle="collapse" data-target="#zo-collapse" aria-expanded="false"><i class="fa fa-search"></i></a></span>
                    <span><a id="trigger-overlay" href="#"><i class="fa fa-bars"></i></a></span>
                </div> 
            </div>
            
            
         </div>
    </div>
  </div>  
   <!--.container-fluid--> 
</div>    

