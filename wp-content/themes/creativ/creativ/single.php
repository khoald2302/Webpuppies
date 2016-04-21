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
        <div id="primary" class="<?php
        if ($meta_data->_zo_blog_layout == '') {
            echo "col-xs-12 col-sm-8 col-md-8 col-lg-8";
        } else {
            echo "col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1";
        }
        ?>">
            <div id="content" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('single-templates/single/content', get_post_format()); ?> 

                    <?php zo_post_nav(); ?>

                <?php endwhile; // end of the loop.  ?>
            </div><!-- #content -->
        </div><!-- #primary -->
            <?php if ($meta_data->_zo_blog_layout == '') : ?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <?php get_sidebar(); ?>
            </div>
<?php endif; ?>
    </div>
</div>
<div class="blog-container">
    <div class="comment">
<?php comments_template('', true); ?>
    </div>
</div>
<div class="single-container">
<?php if (is_active_sidebar('sidebar-content-post')) : ?>
            <div class="container-fluid"><?php dynamic_sidebar('sidebar-content-post'); ?></div>
        <?php endif; ?>
</div>
<?php get_footer(); ?>