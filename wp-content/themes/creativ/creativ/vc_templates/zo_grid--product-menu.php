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
        $zo_color_primary_color = $atts['zo_color_primary_color'] ? $atts['zo_color_primary_color'] : '';
?>
<div class="zo-grid-wrapper  <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($atts['zo_full_width']); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__('All','creativ'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <?php if(!empty($zo_color_primary_color)):?>
        <style scoped type="text/css">
            #<?php echo esc_attr($atts['html_id']);?> .zo-imagewrapper:hover .zo-image-overlay:after,
            #<?php echo esc_attr($atts['html_id']);?>  .zo-imagewrapper:hover .zo-image-overlay:before {
                background: <?php echo esc_attr($zo_color_primary_color); ?> !important;
            }
          #<?php echo esc_attr($atts['html_id']);?>  .zo-product-item .price h4 {
                color: <?php echo esc_attr($zo_color_primary_color); ?> !important;
            }
        </style>
    <?php endif; ?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-product-item clearfix <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="zo-imagewrapper pull-left  red-effect">
                    <?php if(has_post_thumbnail()) echo zo_post_thumbnail(134, 134, true); ?>
                    <div class="zo-image-overlay">
                    </div>
                    <div class="zo-buttons">
                    <span>
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Order Now','creativ'); ?></a>
                    </span>
                    </div>
                </div>

                <div class="zo-res-title">
                    <h3> <?php echo the_title(); ?> </h3>
                </div>
                <div class="zo-desc">
                    <?php  echo zo_limit_words(strip_tags( get_the_excerpt()),15); ?>
                </div>
                <?php
                    $price = get_post_meta( get_the_ID(), '_regular_price',true);
                ?>
                <div class="price">
                    <div class="pull-left">
                        <h4><?php echo  get_woocommerce_currency_symbol().' '.esc_attr($price);?></h4>
                    </div><!-- end left -->
                </div>

            </div>

            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>