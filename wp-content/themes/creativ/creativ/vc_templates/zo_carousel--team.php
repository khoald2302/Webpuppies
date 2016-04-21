<?php
/* Get Categories */
$taxonomy = 'category';
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
<div class="zo-carousel-wrap">
    <?php if ( $atts['filter'] == "true" && !$atts['loop'] ): ?>
        <div class="zo-carousel-filter">
            <ul>
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach ($atts['categories'] as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="zo-carousel-filter-hidden" style="display: none"></div>
    <?php endif; ?>
    <div class="zo-carousel zo-carousel-team <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            $groups = array();
            $groups[] = 'zo-carousel-filter-item all';
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = 'category-' . $category->slug;
            }
            $team_meta = zo_post_meta_data();
            ?>
            <div class="zo-carousel-item <?php echo implode(' ', $groups);?>">
                <?php
                if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                endif;
                
                ?>
                 <div class="zo-team-inner">
                  <div class="zo-team-image-wrap">
                   <?php echo '<div class="zo-grid-media ' . esc_attr($class) . '">' . $thumbnail . '</div>'; ?>
                    <div class="zo-team-overlay"> </div>
                    <div class="zo-team-socials">
                        <?php if (isset($team_meta->_zo_socials) && !empty($team_meta->_zo_socials)): ?>
                            <ul class="socials-icons">
                                <?php
                                $socials = json_decode($team_meta->_zo_socials);
                                if ($socials):
                                    foreach ($socials as $key => $item):
                                        ?>
                                        <li>
                                            <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" 
                                                     data-title="<?php echo esc_html__($item->title); ?>" href="<?php echo do_shortcode($item->link); ?>" target="_blank"> 
                                                    <i class="fa <?php echo esc_html__($item->icon); ?>"></i></a></span>
                                        </li>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                  </div>
                   <div class="zo-team-detail">
                            <h3 class="zo-team-title"><?php the_title(); ?></h3>
                            <div class="zo-team-position">
                                <span><?php echo $team_meta->_zo_team_position; ?></span>
                            </div> 
                        </div>
                 </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>