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
<article id="portfolio-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-6 col-md-4 col-lg-4 zo-portfolio-item'); ?>>
     <div class="zo-portfolio-inner">
        <?php if(has_post_thumbnail()) echo zo_post_thumbnail(590,424,true,true,true);?>
        <div class="zo-portfolio-overlay"></div>
           <div class="zo-portfolio-overlay-inner">
                <div class="zo-portfolio-categories">
                    <?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' ); ?>
                </div>
                <h2 class="zo-portfolio-title"> <a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
            </div>
    </div>
    
</article>
