<?php
/* get categories */
$taxo = 'product_cat';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']==''){
    $terms = get_terms($taxo);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
$zo_image_style = (!empty($atts['zo_image_style'])) ? $atts['zo_image_style'] : 'port_thumb';
?>
<div class="zo-grid-wrapper zo_grid-portfolio-style-default <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($atts['zo_full_width']); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__( 'All', 'creativ' ); ?></a></li>
                <?php
                $posts=$atts['posts'];
                $query=$posts->query;
                $taxs = array();
                if(isset($query['tax_query'])){
                    $tax_query=$query['tax_query'];
                    foreach($tax_query as $tax){
                        if(is_array($tax)){
                            $taxs[] = $tax['terms'];
                        }
                    }
                }
                foreach ($atts['categories'] as $category):
                    if(!empty($taxs)){
                        if(in_array($category,$taxs)){?>
                            <?php $term = get_term($category, $taxonomy); ?>
                            <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                                    <?php echo esc_attr($term->name); ?>
                                </a>
                            </li>
                        <?php }}else{
                        ?><?php $term = get_term($category, $taxonomy); ?>
                        <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                        </li><?php
                    } endforeach; ?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
        while($posts->have_posts()){

        $posts->the_post();
        $product = wc_get_product( get_the_ID() );
        $groups = array();
        $groups[] = '"all"';
        foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
            $groups[] = '"category-'.$category->slug.'"';
        }
        ?>
        <div class="zo-portfolio-item <?php echo esc_attr($atts['item_class']);?> <?php echo esc_attr($atts['zo_full_width']); ?>" data-groups='[<?php echo implode(',', $groups);?>]'>
            <div class="zo-portfolio-inner">
                <?php if(has_post_thumbnail()) echo zo_post_thumbnail(375,375,true,true,true); ?>
                <div class="zo-portfolio-overlay zo_hover_top">
                    <div class="zo-portfolio-overlay-inner">
                        <a class="btn btn-primary border-radius" href="<?php the_permalink()."?add-to-cart=".get_the_ID(); ?>"><?php echo esc_html__('Add to Cart','creativ');?></a>
                    </div>
                </div>
            </div>
            <div class="zo-content">
                    <<?php echo esc_attr($zo_title_size); ?> class="zo-portfolio-title"> <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></<?php echo esc_attr($zo_title_size); ?>>
                   <?php $currency = get_woocommerce_currency_symbol(); ?>
                    <p class="zo-price"><?php if($product->get_sale_price()) { echo $currency.' '.$product->get_sale_price(); } ?> <span><?php echo $currency.' '.$product->get_regular_price(); ?></span></p>
             </div>
    </div>
<?php
}
?>
</div>
<?php
if($atts['zo_show_pagination'] == '1'){ ?>
    <div  id="zo_blog_paging">
        <?php zo_paging_nav($posts); ?>
    </div>
<?php } ?>

<?php
wp_reset_postdata();
?>
</div>

