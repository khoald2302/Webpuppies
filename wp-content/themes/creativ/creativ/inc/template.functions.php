<?php

/**
 * Page title template
 * @since 1.0.0
 * @author ZoTheme
 */
/* Set Variable For Scss */
function zo_setvariablescss($var, $output, $var_default, $var_empty = null) {
    if (trim($var_empty) == null || trim($var_empty) == '')
        $var_empty = $var_default;
    $var = isset($var) ? (empty($var) ? $var_empty : esc_attr($var)) : $var_default;
    echo do_shortcode($output . ':' . $var . ';') . "\n";
}

function zo_page_title() {
    global $smof_data, $zo_meta;
    if (is_page() && isset($zo_meta->_zo_page_title) && $zo_meta->_zo_page_title) {
        if (isset($zo_meta->_zo_page_title_type)) {
            /* Page title for page */
            zo_page_title_content($zo_meta->_zo_page_title_type);
        }
    } else {
        /* Page title content */
        zo_page_title_content($smof_data['page_title_layout']);
    }
}

function zo_page_title_content($page_title_layout) {
    global $zo_base, $smof_data,$zo_meta;
    if ($page_title_layout) {
        if ($page_title_layout == '5'){
            $page_title_before = '<div id="page-title" class="page-title">';
            $page_title_after = '</div><!-- #page-title -->';
        }
        else {
            $page_title_before = '<div id="page-title" class="page-title">
            <div class="container">
            <div class="row">';
            $page_title_after = '</div></div></div><!-- #page-title -->';
        }
        $breadcrumb_before = '<div id="breadcrumb" class="breadcrumb">
            <div class="container-fluid">
            <div class="row">';
        $breadcrumb_after = '</div></div></div><!-- #breadcrumb -->';
        $pa_class = 'zo-page-title-'.$page_title_layout;
        $pa_data = '';
        $pa_style = '';
        if ((isset($smof_data['page_title_parallax']) && (int)$smof_data['page_title_parallax'] == 1) || (isset($zo_meta->_zo_page_title_parallax) && $zo_meta->_zo_page_title_parallax)) {
            $pa_class = "zo_header_parallax zo-page-title-".$page_title_layout;
            $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
        }
        ?>
        <div id="zo-page-element-wrap"
             class="<?php echo esc_attr($pa_class); ?>" <?php echo do_shortcode($pa_style); ?>>
            <?php

            switch ($page_title_layout) {
                /*page title top - breadcrumb bottom*/
                case '1':
                    ?>
                    <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                    <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                    <?php
                    break;
                /*page title bottom - breadcrumb top*/
                case '2':
                    ?>
                    <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                    <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                    <?php
                    break;
                case '3':
                    ?>
                    <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                    <?php
                    break;
                case '4':
                    ?>
                    <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                    <?php
                    break;
                /*                            */
                case '5':
                    ?>
                    <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>

                    <?php
                    break;
            }
            ?>
        </div><!-- #zo-page-element-wrap-->
        <?php
    }
}

/**
 * Get sub page title.
 *
 * @author ZoTheme
 */
function zo_page_sub_title() {
    global $zo_meta, $post,$smof_data;

    if (!empty($zo_meta->_zo_page_title_sub_text)) {

        echo '<div class="page-sub-title">' . wp_kses($zo_meta->_zo_page_title_sub_text,array('span'=>array('class'=>'zo-title-span'))) . '</div>';
    }

    /*elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)) {
        echo '<div class="page-sub-title">' . esc_attr(get_post_meta($post->ID, 'post_subtitle', true)) . '</div>';
    }*/
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_header() {
    global $smof_data, $zo_meta;
    /* header for page */
    if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
        if (isset($zo_meta->_zo_header_layout)) {
            $smof_data['header_layout'] = $zo_meta->_zo_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);

}


/**
 * Get Footer Layout.
 *
 * @author ZoTheme
 * ngocchaucit@gmail.com Add 18:39PM/14/11/2015
 */
function zo_footer() {
    global $smof_data, $zo_meta;
    /* header for page */
    if (isset($zo_meta->_zo_footer) && $zo_meta->_zo_footer) {
        if (isset($zo_meta->_zo_footer_layout)) {
            $smof_data['footer_layout'] = $zo_meta->_zo_footer_layout;
        }
    }
    /* load template. */

    get_template_part('inc/footer/footer', $smof_data['footer_layout']);
}

if (!function_exists('zo_page_header_logo')) {

    function zo_page_header_logo() {
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['main_logo']['url']) ? $smof_data['main_logo']['url'] : get_template_directory() . '/assets/logo.png';
        if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
            if (isset($zo_meta->_zo_header_logo)) {
                $logo = !empty($zo_meta->_zo_header_logo) ? wp_get_attachment_url($zo_meta->_zo_header_logo) : $logo;
            }
        }
        return $logo;
    }

}

if (!function_exists('zo_page_header_logo_canvas')) {

    function zo_page_header_logo_canvas() {
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['main_logo']['url']) ? $smof_data['main_logo']['url'] : get_template_directory() . '/assets/logo.png';
        if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
            if (isset($zo_meta->_zo_header_logo_canvas)) {
                $logo = !empty($zo_meta->_zo_header_logo_canvas) ? wp_get_attachment_url($zo_meta->_zo_header_logo_canvas) : $logo;
            }
        }
        return $logo;
    }

}

/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function zo_menu_location($option = '_zo_primary') {
    global $zo_meta;
    /* get menu id from page setting */
    return (isset($zo_meta->$option) && $zo_meta->$option) ? $zo_meta->$option : null;
}

function zo_get_page_loading() {
    global $smof_data;

    if ($smof_data['enable_page_loadding']) {
        echo '<div id="zo-loadding">';
        switch ($smof_data['page_loadding_style']) {
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div id="preloader_1" class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                 </div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add page class
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_page_class() {
    global $smof_data,$zo_meta;

    $page_class = '';

    /* check boxed layout */
    if (!empty($smof_data['body_layout']) || !empty($zo_meta->_zo_boxed_layout)) {
        $page_class = 'zo-boxed';
    } else {
        $page_class = 'zo-wide';
    }
    if(!empty($smof_data['dark_layout'])){
        $page_class = 'zo-dark';
    }
    if(!empty($zo_meta->_zo_dark_layout)){
        $page_class = 'zo-dark';
    }
    if(!empty($zo_meta->_zo_header_layout) && $zo_meta->_zo_header_layout == '9') {
        $smof_data['header_layout'] = $zo_meta->_zo_header_layout;
    }
    if(!empty($smof_data['header_layout']) && $smof_data['header_layout'] == '9'){
        $page_class = 'zo-vertical-menu';
    }
    echo apply_filters('zo_page_class', $page_class);
}

/**
 * Add main class
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_main_class() {
    global $zo_meta;

    $main_class = '';
    /* chect content full width */
    if (is_page() && isset($zo_meta->_zo_full_width) && $zo_meta->_zo_full_width) {
        /* full width */
        $main_class = "container-fluid";
    } else {
        /* boxed */
        $main_class = "container";
    }

    echo apply_filters('zo_main_class', $main_class);
}

/**
 * Show post like.
 *
 * @since 1.0.0
 */
function zo_get_post_like() {

    $likes = get_post_meta(get_the_ID(), '_zo_post_likes', true);

    if (!$likes)
        $likes = 0;
    ?>
    <span class="zo-post-like" data-id="<?php the_ID(); ?>"><i class="<?php echo!isset($_COOKIE['zo_post_like_' . get_the_ID()]) ? 'fa fa-heart-o' : 'fa fa-heart'; ?>"></i><span> <?php echo esc_attr($likes); ?></span></span>
    <?php
}

/**
 * Archive detail
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_detail() {
    ?>
    <div class="author vcard"><?php _e('By', 'creativ'); ?> <?php the_author_posts_link(); ?></div>
    <ul>
        <li class="zo-blog-comment"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('0', '1', '%'); ?></a></li>
        <li class="zo-blog-views"><i class="fa fa-eye"></i> <?php echo zo_get_count_view(); ?></li>
        <?php if (has_category()): ?>
            <li class="zo-blog-category"><?php the_terms(get_the_ID(), 'category', '<i class="fa fa-bookmark-o"></i>', ' / '); ?></li>
        <?php endif; ?>
        <?php if (has_tag()): ?>
            <li class="zo-blog-tag"><?php the_tags('<i class="fa fa-tags"></i>', ' / '); ?></li>
        <?php endif; ?>
        <li class="zo-blog-date">
            <span class="day"><?php echo get_the_date("d"); ?></span>
            <span class="month"><?php echo get_the_date("M"); ?></span>
        </li>
    </ul>
    <?php
}

/**
 * Archive readmore
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_readmore() {
    echo '<a class="btn btn-default" href="' . get_the_permalink() . '" title="' . get_the_title() . '" >' . __('Continue Reading', 'creativ') . '</a>';
}

/**
 * Media Audio.
 *
 * @param string $before
 * @param string $after
 * @return bool|string
 */
function zo_archive_audio() {
    global $zo_base, $smof_data;
    /* get shortcode audio. */
    $shortcode = $zo_base->getShortcodeFromContent('audio', get_the_content());

    if ($shortcode) {
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function zo_archive_video() {

    global $wp_embed, $zo_base, $smof_data;
    /* Get Local Video */
    $local_video = $zo_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $zo_base->getShortcodeFromContent('embed', get_the_content());

    if ($local_video) {
        /* view local. */
        return do_shortcode($local_video);
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));
        ;
    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author ZoTheme
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function zo_archive_gallery($image_size = 'full') {
    global $zo_base, $smof_data;
    /* get shortcode gallery. */
    $shortcode = $zo_base->getShortcodeFromContent('gallery', get_the_content());
    if ($shortcode != '') {
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if (!empty($ids)) {

            $array_id = explode(",", $ids[1]);
            ob_start();
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if ($attachment_image[0] != ''):
                            ?>
                            <div class="item <?php
                            if ($i == 0) {
                                echo 'active';
                            }
                            ?>">
                                <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]); ?>" alt="" />
                            </div>
                            <?php
                            $i++;
                        endif;
                        ?>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php
            return ob_get_clean();
        } else {
            return false;
        }
    } elseif (has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return false;
}

/**
 * Quote Text.
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_quote() {
    global $smof_data;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if (!empty($blockquote[0])) {
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author Zacky
 * @since 1.0.0
 */
function zo_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if (!empty($link[0])) {
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get icon from post format.
 *
 * @return multitype:string Ambigous <string, mixed>
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_post_icon() {
    $post_icon = array('icon' => 'fa fa-file-text-o', 'text' => __('STANDARD', 'creativ'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = __('GALLERY', 'creativ');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = __('LINK', 'creativ');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = __('QUOTE', 'creativ');
            break;
        case 'video':
            $post_icon['icon'] = 'fa fa-youtube-play';
            $post_icon['text'] = __('VIDEO', 'creativ');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = __('AUDIO', 'creativ');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = __('STANDARD', 'creativ');
            break;
    }
    echo do_shortcode('<i class="' . $post_icon['icon'] . '"></i>');
}

/**
 * Get social share link
 *
 * @return string
 * @author Zacky
 * @since 1.0.0
 */
function zo_social_share() {
    ?>
    <ul class="social-icons">
        <li><a href="#" data-title="Facebook" data-placement="bottom" data-trigger="hover" data-toggle="tooltip" data-rel="tooltip" data-original-title="" title="">
                <i class="fa fa-facebook"></i></a></li>
        <li><a href="#" data-title="Google Plus" data-placement="bottom" data-trigger="hover" data-toggle="tooltip" data-rel="tooltip" data-original-title="" title="">
                <i class="fa fa-google-plus"></i>
            </a></li>
        <li><a href="#" data-title="Twitter" data-placement="bottom" data-trigger="hover" data-toggle="tooltip" data-rel="tooltip" data-original-title="" title="">
                <i class="fa fa-twitter"></i>
            </a></li>
        <li><a href="#" data-title="Dribbble" data-placement="bottom" data-trigger="hover" data-toggle="tooltip" data-rel="tooltip" data-original-title="" title="">
                <i class="fa fa-dribbble"></i>
            </a></li>
        <li><a href="#" data-title="Pinterest" data-placement="bottom" data-trigger="hover" data-toggle="tooltip" data-rel="tooltip" data-original-title="" title="">
                <i class="fa fa-pinterest"></i>
            </a></li>

    </ul>
    <?php
}

/**
 * Load a template part into a template
 *
 * Makes it easy for a theme to reuse sections of code in a easy to overload way
 * for child themes.
 *
 * Includes the named template part for a theme or if a name is specified then a
 * specialised part will be included. If the theme contains no {slug}.php file
 * then no template will be included.
 *
 * The template is included using require, not require_once, so you may include the
 * same template part multiple times.
 *
 * For the $name parameter, if the file is called "{slug}-special.php" then specify
 * "special".
 *
 * For the var parameter, simple create an array of variables you want to access in the template
 * and then access them e.g.
 *
 * array("var1=>"Something","var2"=>"Another One","var3"=>"heres a third";
 *
 * becomes
 *
 * $var1, $var2, $var3 within the template file.
 *
 * @since 3.0.0
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @param array $vars The list of variables to carry over to the template
 * @author Eugene Agyeman zmastaa.com
 */
function zo_get_template_part($slug, $name = null, $atts = null) {
    /**
     * Fires before the specified template part file is loaded.
     *
     * The dynamic portion of the hook name, `$slug`, refers to the slug name
     * for the generic template part.
     *
     * @since 3.0.0
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialized template.
     * @param array $vars The list of variables to carry over to the template
     */
    do_action("get_template_part_{$slug}", $slug, $name);

    $templates = array();
    $name = (string) $name;
    if ('' !== $name)
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    foreach ($templates as $template) {
        locate_template($template, true, false);
    }
}

function zo_comment_nav() {
    // Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(__('Older Comments', 'creativ'))) :
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                endif;

                if ($next_link = get_next_comments_link(__('Newer Comments', 'creativ'))) :
                    printf('<div class="nav-next">%s</div>', $next_link);
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
    endif;
}

function zo_get_post_thumbnail($size = 'full') {
    switch($size) {
        case 'full' :
            the_post_thumbnail('full');
            break;
        case 'medium' :
            echo zo_post_thumbnail();
            break;
    }
}
/*Fuction conver Backgroud*/
function  creativ_hexrgb($hexstr,$opacity) {
    $int = hexdec($hexstr);
    $print = array("red" => 0xFF & ($int >> 0x10), "green" => 0xFF & ($int >> 0x8), "blue" => 0xFF & $int);
    return "rgba(".$print['red'].",".$print['green'].",".$print['blue'].",".$opacity.");";
}
/*--Get Favicon--*/
if (!function_exists('cmstheme_page_favicon')) {
    function cmstheme_page_favicon()
    {
        global $smof_data, $zo_meta;
        $favicon = isset($smof_data['favicon']['url']) ? $smof_data['favicon']['url'] : get_template_directory() . '/favicon_16.ico';

        return $favicon;
    }
}