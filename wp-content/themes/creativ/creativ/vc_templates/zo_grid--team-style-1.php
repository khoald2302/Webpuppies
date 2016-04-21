<?php
global $smof_data;
/* Get Categories */
$taxonomy = 'team-category';
$_category = array();
if (!isset($atts['cat']) || $atts['cat'] == '' && taxonomy_exists($taxonomy)) {
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat) {
        $_category[] = $cat->term_id;
    }
} else {
    $_category = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
?>
<div class="zo-grid-wrapper zo-team-layout-1 <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if (isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout'] == 'masonry'): ?>
        <div class="zo-grid-filter">
            <style type="text/css">
              <?php foreach ($atts['categories'] as $category): 
               $term = get_term($category, $taxonomy);
              $zo_color_style = get_option('zo_taxonomy_'.$term->term_id);
              ?>
                <?php  echo esc_attr(".color-".$term->slug)." {
                   background:".$zo_color_style['color']." !important; 
                }"; ?>
              <?php endforeach; ?>
            </style>       
            <ul>
                <li><a class="active" href="#" data-group="all"><?php  esc_html_e( 'All', 'creativ' ); ?></a></li>
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
                        ?>
                        <?php $term = get_term($category, $taxonomy);
                        $zo_color_inline = get_option('zo_taxonomy_'.$term->term_id);
                        ?>
                        <li><a href="#" data-color="<?php echo esc_attr("color-".$term->slug) ?>" style="background: <?php echo esc_attr($zo_color_inline['color']);?> ! important; color: #fff" class="<?php echo esc_attr('category-' . $term->slug); ?>" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                        </li><?php
                    } endforeach; ?>

            </ul>
        </div>
    <?php endif; ?>
    <div class="<?php echo esc_attr($atts['grid_class']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) {
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
             $i=0;
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = '"category-' . $category->slug . '"';
                if($i==0){
                  $zo_color = get_option('zo_taxonomy_'.$category->term_id); 
                }
                $i++;
            }
            $team_meta = zo_post_meta_data();
            $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
            ?>
            <div class="zo-team-wrap <?php echo esc_attr($atts['item_class']); ?>  <?php echo esc_attr($atts['zo_full_width']); ?>" data-groups='[<?php echo implode(',', $groups); ?>]'>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="zo-team-image">
                        <?php the_post_thumbnail('full'); ?>
                        <div class="zo-team-overlay" style="background: <?php echo creativ_hexrgb(esc_attr($zo_color['color']),0.7); ?>">
                            <div class="zo-team-detail">
                                 <?php if (isset($team_meta->_zo_socials) && !empty($team_meta->_zo_socials)): ?>
                                    <ul class="zo-team-socials">
                                        <?php
                                        $socials = json_decode($team_meta->_zo_socials);
                                        if ($socials):
                                            foreach ($socials as $key => $item):
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_attr($item->link); ?>" target="_blank" class="bubble"> 
                                                        <i class="fa <?php echo esc_attr($item->icon); ?>" style="color: <?php echo esc_attr($zo_color['color']); ?>"></i>
                                                    </a>
                                                </li>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                                <h3 class="zo-team-title"><?php the_title(); ?></h3>
                                <div class="zo-team-position">
                                    <span><?php echo esc_attr($team_meta->_zo_team_position); ?></span>
                                </div> 
                            </div>
                        </div>
                    </div>
                <?php endif ?> 
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>