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
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <div class="zo-blog-category"><?php the_category();?> | <?php the_date(); ?></div>
     <h2 class="zo-blog-title"><?php the_title(); ?></h2>
    <?php if (has_post_thumbnail()) : ?>
        <div class="zo-blog-image">
            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail('full'); ?></a>
            <div class="zo-blog-image-overlay"></div>
            <div class="zo-blog-meta"><?php zo_get_post_like(); ?></div>
        </div>
    <?php endif ?>
    <div class="zo-blog-detail">   
        <div class="zo-blog-content">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<p class="page-links"><span class="page-links-title">' . __('Pages:', 'creativ') . '</span>',
                'after' => '</p>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'creativ') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            ));
            ?>
        </div>
    </div>
     <div class="blog-share"><?php zo_social_share() ?></div>
</article>
