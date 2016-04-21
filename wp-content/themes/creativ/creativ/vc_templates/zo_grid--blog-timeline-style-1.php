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
        $year = date('Y');
        global $wpdb;
        $months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE     post_status = 'publish' AND YEAR(post_date) = '".$year."'  ORDER BY post_date ASC");
        
?>
<div class="zo-grid-wrapper zo-grid-blog-wrapper zo-grid-timeline <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
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
            <ul class="timeline">
            <?php  foreach($months as $month) : ?>
                 <li class="date"> <div class="tldate border-radius"><?php echo date( 'F Y', mktime(0, 0, 0, $month) );?></div> </li>
            <?php
          //  $posts = $atts['posts'];
             
                        $args  = array(
                            'post_type'=>'post',
                            'MONTH(post_date)'=>$month,
                            'relation' => 'AND',
                            'orderby' => 'post_date', 
                            'order' => 'ASC',
                            'year' => $year, 
                            
                        );
                    
             
              $posts = new WP_Query( $args );
            $size = ($atts['layout'] == 'basic') ? 'thumbnail' : 'full';
            $i =0;
            while ($posts->have_posts()) :
            
                $posts->the_post();
                $groups = array();
                $groups[] = '"all"';
                foreach (zoGetCategoriesByPostID(get_the_ID(),'category') as $category) {
                    $groups[] = '"category-' . $category->slug . '"';
                }
                $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
                ?>
                 <li class="left">
                  <div class="tl-circ"></div>
                   <div class="timeline-panel">  
                    <div class="zo-grid-item col-lg-5 col-md-5 col-sm-5 col-xs-12" data-groups='[<?php echo implode(',', $groups);?>]'>
                        <?php get_template_part('single-templates/blog/content'); ?>
                    </div>
                </div>
                </li>
            <?php
            $i++;
            endwhile;
            endforeach;
            ?>
            </ul>
        </div>
        <?php
        zo_paging_nav($posts);
        wp_reset_postdata();
        wp_reset_query();
        ?>
</div>