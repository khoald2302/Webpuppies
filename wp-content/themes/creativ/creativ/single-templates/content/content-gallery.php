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
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="zo-blog-image zo-blog-gallery">
        <?php echo zo_archive_gallery( $zo_image_size); ?>
    </div>

    <div class="zo-blog-detail">
         <div class="cate">
         <?php echo get_the_term_list( get_the_ID(), 'category', '', ' / ', '' ); ?>
        </div>
        <h3 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h3>
        <div class="zo-blog-meta"><?php //zo_archive_detail(); ?></div>
        <div class="zo-blog-content">
            <?php the_excerpt();
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
        <a class="btn btn-primary border-radius" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More ', 'creativ') ?></a>
    </div>
</article>
