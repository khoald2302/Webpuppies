<?php 
    /* get categories */
    $taxo = 'portfolio-category';
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
    $zo_image_style = (!empty($atts['zo_image_style'])) ? "port_".$atts['zo_image_style'] : 'port_thumb';
?>
<div class="zo-grid-wrapper zo_grid-portfolio-style-1 clearfix <?php echo esc_attr($atts['template']);?> <?php if(!empty($atts['zo_full_width'])){echo esc_attr($atts['zo_full_width']);}  ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html__('All','creativ'); ?></a></li>
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
    <div class="<?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-portfolio-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="zo-portfolio-inner">
                    <?php if(has_post_thumbnail()) echo zo_get_images_style($zo_image_style)?>
                    <div class="zo-portfolio-overlay"></div>
                        <div class="zo-portfolio-overlay-inner">
                            <div class="zo-portfolio-categories">
                                <?php echo get_the_term_list( get_the_ID(), $taxo, '', ' / ', '' ); ?>
                            </div>
                            <h2 class="zo-portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            <a href="<?php the_permalink();?>" title="" class="btn btn-primary border-radius"><?php echo esc_html_e( 'See project'); ?></a>
                        </div>
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