<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
<?php
global $template;
if( basename($template) === 'blog-classic.php') {
    $zo_image_size = 'full';
} else {
    $zo_image_size = 'zo-blog-medium';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser col-lg-6 col-md-6 col-sm-6 col-xs-12'); ?>>
    <?php if(has_post_thumbnail()) : ?>
    <div class="zo-blog-image">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( $zo_image_size ); ?></a>

    </div>
        <?php echo sunset_posted_footer();?>
    <?php endif ?>

    <div class="zo-blog-detail">
        <div class="zo-blog-date"> <?php echo get_the_time('l j F  Y'); ?></div>

        <h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>


        <div class="zo-blog-content">
            <?php
            if(get_post_type( get_the_ID() ) != 'page'):
               echo get_excerpt();

            endif;
            wp_link_pages( array(
                'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'creativ' ) . '</span>',
                'after'       => '</p>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'creativ' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>
<!--        <a class="btn btn-primary border-radius" title="--><?php //the_title(); ?><!--" href="--><?php //the_permalink() ?><!--" rel="">--><?php //_e('Read More ', 'creativ') ?><!--</a>-->
    </div>

</article>