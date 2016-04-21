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
<div class="zo-grid-wrapper zo-team-layout-2 <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if (isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout'] == 'masonry'): ?>
        <div class="zo-grid-filter">
            <ul>
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'creativ'); ?></a></li>
                <?php foreach ($atts['categories'] as $category): ?>
                    <?php $term = get_term($category, $taxonomy); ?>
                    <li><a href="#" class="<?php echo esc_attr('category-' . $term->slug); ?>" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
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
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                $groups[] = '"category-' . $category->slug . '"';
            }
            $team_meta = zo_post_meta_data();
            $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
            ?>
            <div class="zo-team-wrap <?php echo esc_attr($atts['item_class']); ?>   <?php echo esc_attr($atts['zo_full_width']); ?>" data-groups='[<?php echo implode(',', $groups); ?>]'>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="zo-team-inner">
                        <div class="zo-team-image-wrap">
                            <?php the_post_thumbnail('full'); ?>
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
                                                             data-title="<?php echo esc_attr($item->title); ?>" href="<?php echo do_shortcode($item->link); ?>" target="_blank"> 
                                                            <i class="fa <?php echo esc_attr($item->icon); ?>"></i></a></span>
                                                </li>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                <?php endif; ?>
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