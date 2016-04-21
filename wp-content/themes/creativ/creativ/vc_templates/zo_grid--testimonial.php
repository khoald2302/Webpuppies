<?php
global $smof_data;
    /* Get Categories */
        $taxonomy = 'testimonial-category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
            $terms = get_terms($taxonomy);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
?>
<div class="zo-grid-wrapper zo-grid-testimonial <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter']== 1 && $atts['layout']=='masonry'):?>
        <div class="zo-grid-filter">
            <ul>
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxonomy );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            $post_meta = zo_post_meta_data();
            $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
            ?>
            <div class="zo-testimonial-wrap <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="zo-testimonial-inner">
                    <?php if(has_post_thumbnail()) : ?>
                    <div class="zo-testimonial-header">
                        <div class="zo-testimonial-image">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="zo-testimonial-body">
                        <div class="zo-testimonial-content"><?php the_excerpt(); ?></div>
                        <div class="zo-testimonial-line"><span></span></div>
                        <div class="zo-testimonial-info">
                            <<?php echo esc_attr($zo_title_size); ?>  class="zo-testimonial-title"><?php the_title();?></<?php echo esc_attr($zo_title_size); ?> >
                            <div class="zo-testimonial-position"><?php echo esc_attr($post_meta->_zo_testimonial_position); ?></div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>