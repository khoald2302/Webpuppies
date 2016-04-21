<?php 
    /* get categories */
    $taxonomy = 'portfolio-category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="zo-masonry-wrapper zo-masonry-style-style-4 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if( isset($atts['filter']) && $atts['filter'] == 1 ) :?>
        <div class="zo-masonry-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__('All','creativ');?></a></li>
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
    <div class="zo-masonry">
        <?php
        $posts = $atts['posts'];
        $i = 0;
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            /**
             * Get Masonry Size
             * It's require, don't remove it
             * zo_masonry_size()
             */
            $size = zo_masonry_size($atts['post_id'] , $atts['html_id'], $i);
            ?>
            <div class="zo-masonry-item item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>"
                     data-groups='[<?php echo implode(',', $groups);?>]' data-index="<?php echo esc_attr($i); ?>" data-id="<?php echo esc_attr($atts['post_id']); ?>">
                         <?php 
                    if(has_post_thumbnail()):
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $thumbnail = $thumbnail[0];
                    else:
                        $thumbnail = ZO_IMAGES.'no-image.jpg';
                    endif;

                ?>
                <div class="zo-masonry-inner" style="background-image: url('<?php echo esc_url($thumbnail); ?>')">
                    <!--<img src="<?php // echo esc_url($thumbnail); ?>">-->
                    <div class="zo-masonry-overlay">
                        <div class="zo-masonry-overlay-inner">
                            <div class="zo-masonry-categories">
                                <?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' ); ?>
                            </div>
                            <h3 class="zo-masonry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>