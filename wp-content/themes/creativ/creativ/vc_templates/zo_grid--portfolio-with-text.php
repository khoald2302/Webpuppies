<?php
/* get categories */
$taxo = 'portfolio-category';
$_category = array();
$zo_hover_item = isset($atts['zo_hover_item']) ? $atts['zo_hover_item'] : 'zo_hover_left';
$zo_background_text = isset($atts['zo_background_text']) ? $atts['zo_background_text'] : 'transparent';
if (!isset($atts['cat']) || $atts['cat'] == '') {
    $terms = get_terms($taxo);
    foreach ($terms as $cat) {
        $_category[] = $cat->term_id;
    }
} else {
    $_category = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
$zo_image_style = (!empty($atts['zo_image_style'])) ? $atts['zo_image_style'] : 'port_thumb';
$atts['zo_full_width'] = (!empty($atts['zo_full_width'])) ? $atts['zo_full_width'] : '';
?>
<div class="zo-grid-wrapper zo_grid-portfolio-style-default <?php echo esc_attr($atts['template']); ?> <?php echo esc_attr($atts['zo_full_width']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if (isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout'] == 'masonry'): ?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__('All', 'creativ'); ?></a></li>
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
                            <?php $term = get_term($category, $taxo); ?>
                            <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                                    <?php echo esc_attr($term->name); ?>
                                </a>
                            </li>
                        <?php }}else{
                        ?><?php $term = get_term($category, $taxo); ?>
                        <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                            <?php echo esc_attr($term->name); ?>
                        </a>
                        </li><?php
                    } endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="row <?php echo esc_attr($atts['grid_class']); ?>">
        <?php
        $posts = $atts['posts'];
        $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';

        while ($posts->have_posts()) {
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach (zoGetCategoriesByPostID(get_the_ID(), $taxo) as $category) {
                $groups[] = '"category-' . $category->slug . '"';
            }
            ?>
            <div class="zo-portfolio-item <?php echo esc_attr($atts['item_class']); ?>" data-groups='[<?php echo implode(',', $groups); ?>]'>
                <div class="zo-portfolio-inner">
                    <?php if(has_post_thumbnail()) echo zo_get_images_style($zo_image_style); ?>
                    <div class="zo-portfolio-overlay <?php echo esc_attr($zo_hover_item) ?>">
                        <div class="zo-portfolio-overlay-inner">
                            <?php if ($atts['zo_show_icon_1'] == 1): ?>
                                <a href="<?php the_permalink(); ?>"><span class="bubble border-radius"><i class="fa fa-link"></i></span></a>
                                <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>" class="zo-show-image" data-rel="prettyPhoto" title=""><span class="bubble border-radius"><i class="fa fa-search"></i></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
                <div class="zo-portfolio-descripton" style="background:<?php echo esc_attr($zo_background_text);?>;">
                    <<?php echo esc_attr($zo_title_size); ?> class="zo-portfolio-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo esc_attr($zo_title_size); ?>> 
                    <div class="zo-portfolio-categories">
                        <?php echo get_the_term_list(get_the_ID(), $taxo, '', ' / ', ''); ?>
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

