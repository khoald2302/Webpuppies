<?php 
    /* get categories */
        $taxo = 'category';
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
        $zo_image_style = (!empty($atts['zo_image_style_blog'])) ? $atts['zo_image_style_blog'] : 'thumb';
set_query_var('zo_image_style',$zo_image_style);
?>
<div class="zo-grid-wrapper zo-grid-blog-wrapper <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="container">
 <?php if( isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__( 'All', 'creativ' ); ?></a></li>
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
        <div class="row zo-grid-blog-masonry zo-blog-classic <?php echo esc_attr($atts['grid_class']); ?>">
            <?php
            $posts = $atts['posts'];
            $size = (isset($atts['layout']) && $atts['layout'] == 'basic') ? 'thumbnail' : 'medium';
            while ($posts->have_posts()) :
                $posts->the_post();
                $groups = array();
                $groups[] = '"all"';
                foreach (zoGetCategoriesByPostID(get_the_ID(),'category') as $category) {
                    $groups[] = '"category-' . $category->slug . '"';
                }
                $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
                ?>
                <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                    <?php get_template_part('single-templates/blog/content', get_post_format()); ?>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <?php
        zo_paging_nav($posts);
        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>
</div>