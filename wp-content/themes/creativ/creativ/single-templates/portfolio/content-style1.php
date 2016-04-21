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
$meta_data = zo_post_meta_data();
$images = !empty($meta_data->_zo_portfolio_images) ? $meta_data->_zo_portfolio_images : '';
$image_ids = explode(',', $images);
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class('portfolio-gallery zo-single-portfolio-style1'); ?>>
   <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div id="portfolio-gallery-<?php the_ID(); ?>" class="zo-slick">
                <?php foreach ($image_ids as $image_id) : ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if ($attachment_image[0] != ''):
                        ?>
                        <div>
                            <img src="<?php echo esc_url($attachment_image[0]); ?>" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div><!--end image-->
        <div class="col-md-5 col-sm-5 col-xs-12">
             <div class="zo-portfolio-detail">
                <h2 class="zo-portfolio-title"><?php the_title(); ?></h2>
                <div class="zo-portfolio-content">
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
               <div class="zo-portfolio-info">
                <div class="portfolio-item">
                    <h3><?php _e('Date', 'creativ'); ?></h3>
                    <span><?php echo mysql2date('M d Y', $meta_data->_zo_portfolio_date) ?></span>
                </div>
                <div class="portfolio-item">
                    <h3><?php _e('Client', 'creativ'); ?></h3>
                    <span><?php echo esc_attr($meta_data->_zo_portfolio_client) ?></span>
                </div>
                <div class="portfolio-item">
                    <h3><?php _e('Category', 'creativ'); ?></h3>
                    <span><?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' ' ); ?></span>
                </div>
                
            </div>
        </div>
    </div> <!--end row-->
</article>
