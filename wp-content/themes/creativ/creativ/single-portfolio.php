<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
get_header();
$meta_data = zo_post_meta_data();

?>
<div class="<?php zo_main_class(); ?>">
    <div class="row">
        <div id="primary" class="<?php if($meta_data->_zo_portfolio_layout == '' ) { echo "col-xs-12 col-sm-8 col-md-8 col-lg-8"; } else { echo "col-xs-12 col-sm-12 col-md-12 col-lg-12";} ?>">
            <div id="content" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php

                    get_template_part('single-templates/portfolio/content', $meta_data->_zo_portfolio_layout); ?>
                    <?php zo_post_nav(); ?>

                    <?php comments_template('', true); ?>

                <?php endwhile; // end of the loop. ?>     
            </div><!-- #content -->
        </div><!-- #primary -->
        <?php if($meta_data->_zo_portfolio_layout == '') : ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?php get_sidebar(); ?>
        </div>

        <?php endif; ?>
    </div>
    
</div>
<div class="single-container">
 <?php if (is_active_sidebar('sidebar-content')) : ?>
            <div class="container-fluid"><?php dynamic_sidebar('sidebar-content'); ?></div>
        <?php endif; ?>
</div>
<?php get_footer(); ?>