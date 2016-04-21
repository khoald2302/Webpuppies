<?php
global $zo_base;
/* get local fonts. */
$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;
/**
 * Home Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Main Options', 'creativ'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        array(
            'id' => 'intro_product',
            'type' => 'intro_product',
        )
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Header', 'creativ'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'creativ'),
            'subtitle' => __('select a layout for header', 'creativ'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
                '1' => get_template_directory_uri().'/inc/options/images/header/h-header-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/header/h-header-2.png',
                '3' => get_template_directory_uri().'/inc/options/images/header/h-header-3.png',
                '4' => get_template_directory_uri().'/inc/options/images/header/h-header-4.png',
                '5' => get_template_directory_uri().'/inc/options/images/header/h-header-5.png',
                '6' => get_template_directory_uri().'/inc/options/images/header/h-header-6.png',
                '7' => get_template_directory_uri().'/inc/options/images/header/h-header-7.png',
                '8' => get_template_directory_uri().'/inc/options/images/header/h-header-8.png',
                '9' => get_template_directory_uri().'/inc/options/images/header/h-header-9.png',
                '10' => get_template_directory_uri().'/inc/options/images/header/h-header-10.png',
            )
        ),
        array(
            'id' =>'show_header_top_reponsive',
            'required' => array('header_layout', '=', ''),
            'title'    => __('Show Header Top Mobile', 'creativ'),
            'type' => 'switch',
            'default' => false,
        ),
         array(
            'id' =>'show_header_top_reponsive',
            'required' => array('header_layout', '=', '1'),
            'title'    => __('Show Header Top Mobile', 'creativ'),
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'id' =>'sub_menu_mobi_background',
            'required' => array(array('header_layout', '=', '1')),
            'title'    => __('Background Sub Menu Mobile', 'creativ'),
            'type' => 'switch',
            'default' => true,
        ),
         array(
            'id' =>'menu_reponsive_icon',
            'required' => array(array('header_layout', '=', '1')),
            'title'    => __('Color Icon Menu Reponsive', 'creativ'),
            'type' => 'select',
            'options'  => array(
                '#282828' => 'Black',
                '#ffffff' => 'White',
            ),
            'default'  => '#282828'
        ),
        array(
            'id' =>'header_reponsive_padding',
            'required' => array(array('header_layout', '=', '1')),
            'title'    => __('Header Reponsive Padding', 'creativ'),
            'type' => 'switch',
            'default' => false,
        ),
        array(


            'id'       => 'header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Header Height', 'creativ'),
            'output' => array('#zo-header'),
            'width' => false,
            'default'  => array(
                'height'  => '110px'
            ),
        ),
        array(

            'id' => 'header_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => __('enable transparent mode for header.', 'creativ'),
            'id' => 'menu_transparent',
            'type' => 'switch',
            'title' => __('Transparent Header', 'creativ'),
            'default' => false,
        ),
        array(
            'subtitle' => __('enable sticky mode for menu.', 'creativ'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'creativ'),
            'default' => false,
        ),
        array(
            'id'       => 'menu_sticky_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Header Height', 'creativ'),
            'width' => false,
            'default'  => array(
                'height'  => '74px'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_margin',
            'title' => __('Sticky Header Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header.header-fixed'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_padding',
            'title' => __('Sticky Header Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header.header-fixed'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'creativ'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'creativ'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'creativ'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'creativ'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Header Top */

$this->sections[] = array(
    'title' => __('Header Top', 'creativ'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable header top.', 'creativ'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => __('Enable Header Top', 'creativ'),
            'default' => true,
        ),
        array(
            'id' => 'header_top_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'margin-top'     => '12',
                'margin-right'   => '0',
                'margin-bottom'  => '11',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'header_top_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => __('Logo', 'creativ'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => __('Select Logo', 'creativ'),
            'subtitle' => __('Select an image file for your logo.', 'creativ'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            )
        ),
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Logo Height', 'creativ'),
            'width' => false,
            'default'  => array(
                'height'  => '107px'
            ),
        ),
        array(
            'title' => esc_html__('Favicon', 'creativ'),
            'subtitle' => esc_html__('Select an image file for your favicon.', 'creativ'),
            'id' => 'favicon',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/favicon.ico'
            )
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Logo Height', 'creativ'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
        ),
    )
);

/* Menu */
$this->sections[] = array(
    'title' => __('Menu', 'creativ'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Menu position.',
            'id' => 'menu_position',
            'options' => array(
                '' => 'Initial',
                'left' => 'Menu Left',
                'right' => 'Menu Right',
                'center' => 'Menu Center',
            ),
            'type' => 'select',
            'title' => __('Menu Position', 'creativ'),
            'default' => 'right'
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => __('Menu Margin - First Level', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('#zo-header-navigation .main-navigation .menu-main-menu > li',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li '),
            'default' => array(
                'margin-top'     => '',
                'margin-right'   => '',
                'margin-bottom'  => '',
                'margin-left'    => '',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_padding_first_level',
            'title' => __('Menu Padding - First Level', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('#zo-header-navigation .menu-main-menu > li ',
                '#zo-header-navigation .menu-main-menu > ul > li'),
            'default' => array(
                'padding-top'     => '43px',
                'padding-right'   => '25px',
                'padding-bottom'  => '43px',
                'padding-left'    => '25px',
                'units'          => 'px',
            )
        ),
        
        array(
            'id' => 'menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - First Level', 'creativ'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'font-weight' => '700',
                'font-family' => 'Montserrat',
            )
        ),
        array(
            'id' => 'menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - Sub Level', 'creativ'),
            'google' => true,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header-navigation .main-navigation .menu-main-menu > li ul a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li ul a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
                'font-weight' => '700',
                'font-family' => 'Montserrat',
            )
        ),
        array(
            'subtitle' => __('enable sub menu border bottom.', 'creativ'),
            'id' => 'menu_border_color_bottom',
            'type' => 'switch',
            'title' => __('Border Bottom Menu Item Sub Level', 'creativ'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'creativ'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'creativ'),
            'default' => true,
        ),
        array(
            'subtitle' => __('Enable menu first level uppercase.', 'creativ'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => __('Menu First Level Uppercase', 'creativ'),
            'default' => false,
        ),
        array(
            'id' => 'menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Menu Icon Font Size', 'creativ'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
    )
);

/* Stick Menu */
$this->sections[] = array(
    'title' => __('Stick Menu', 'creativ'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'stick_menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Stick Menu Font Size - First Level', 'creativ'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
        array(
            'id' => 'sticky_menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Sticky Menu Font Size - Sub Level', 'creativ'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li ul li a',
                '#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'sticky_menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Sticky Menu Icon Font Size', 'creativ'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header.header-fixed .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),

    )
);

/**
 * Page Title
 *
 * @author ZoTheme
 */

/**
 * Page title settings
 *
 */
$page_title = array(
    array(
        'id' => 'page_title_layout',
        'title' => __('Layouts', 'creativ'),
        'subtitle' => __('select a layout for page title', 'creativ'),
        'default' => '2',
        'type' => 'image_select',
        'options' => array(
            '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
            '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
            '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
            '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
            '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
            '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
        )
    ),
    array(
        'id'       => 'page_title_background',
        'type'     => 'background',
        'title'    => __( 'Background', 'creativ' ),
        'subtitle' => __( 'page title background with image, color, etc.', 'creativ' ),
        'output'   => array('#zo-page-element-wrap'),
        'default'   => array(
            'background-color'=>'#ffffff',
            'background-image'=> get_template_directory_uri().'/assets/images/pagetitle.png',
            'background-repeat'=>'',
            'background-size'=>'cover',
            'background-attachment'=>'',
            'background-position'=>'center center'
        )
    ),
    array(
        'id' => 'page_title_margin',
        'title' => __('Margin', 'creativ'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'margin',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '90px',
            'margin-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_padding',
        'title' => __('Padding', 'creativ'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'padding',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'padding-top'     => '58px',
            'padding-right'   => '0',
            'padding-bottom'  => '66px',
            'padding-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_parallax',
        'title' => __('Enable Header Parallax', 'creativ'),
        'type' => 'switch',
        'default' => false
    ),
    array(
        'id' => 'page_title_custom_post',
        'title' => __('Custom Background For Post Type', 'creativ'),
        'type' => 'switch',
        'default' => false
    ),
);
/**
 * add custom background for post type
 */
$post_types = zo_list_post_types();
foreach( $post_types as $type => $name) {
    $page_title[] = array(
        'id'       => 'page_title_custom_post_' . $type,
        'type'     => 'background',
        'title'    => sprintf( __( 'Background For %s' , 'creativ'), $name),
        'subtitle' => sprintf( __( 'Custom background image for post type %s', 'creativ' ), $name),
        'output'   => array('.single-'.$type.' #zo-page-element-wrap'),
        'background-color' => false,
        'background-repeat' => false,
        'background-size' => false,
        'background-attachment' => false,
        'background-position' => false,
        'default'   => array(
            'background-image'=> '',
        ),
        'required' => array( 'page_title_custom_post', '=', 1 )
    );
}
/**
 * Section settings
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'creativ'),
    'icon' => 'el-icon-map-marker',
    'fields' => $page_title
);

/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => __('Page Title', 'creativ'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => __('Typography', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'creativ'),
            'default' => array(
                'color' => '#000',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '40px',
                'line-height' => '48px',
                'text-align' => 'center'
            )
        ),
        array(
            'id' => 'page_sub_title_typography',
            'type' => 'typography',
            'title' => __('Sub Title', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text .page-sub-title'),
            'units' => 'px',
            'subtitle' => __('Typography option with sub title text.', 'creativ'),
            'default' => array(
                'color' => '#999',
                'font-weight' => '300',
                'font-family' => 'Source Sans Pro',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '22.75px',
                'text-align' => 'center'
            )
        ),
        
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => __('Breadcrumb', 'creativ'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('The text before the breadcrumb home.', 'creativ'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'creativ'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
			'color' => false,
            'output'  => array('#breadcrumb #breadcrumb-text ul, #breadcrumb #breadcrumb-text ul li','#breadcrumb #breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'creativ'),
            'default' => array(
                'font-style' => 'italic',
                'font-weight' => '400',
                'font-family' => 'Athelas',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '22.75px',
                'text-align' => 'center'
            )
        ),
    )
);

/**
 * Body
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Body', 'creativ'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => __('Set layout boxed default(Wide).', 'creativ'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => __('Boxed Layout', 'creativ'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Set layout dark default(Light).', 'creativ'),
            'id' => 'dark_layout',
            'type' => 'switch',
            'title' => __('Dark Layout', 'creativ'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'creativ' ),
            'subtitle' => __( 'body background with image, color, etc.', 'creativ' ),
            'output'   => array('body'),
        ),
        array(
            'id' => 'body_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
);

/**
 * Content
 *
 * Archive, Pages, Single, 404, Search, Category, Tags ....
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Content', 'creativ'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'creativ' ),
            'subtitle' => __( 'Container background with image, color, etc.', 'creativ' ),
            'output'   => array('#main'),
        ),
        array(
            'id' => 'container_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page #main'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'container_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page #main'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/**
 * Page Loadding
 *
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Page Loadding', 'creativ'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable page loadding.', 'creativ'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', 'creativ'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Select Style Page Loadding.', 'creativ'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => __('Page Loadding Style', 'creativ'),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);
/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Footer', 'creativ'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
     array(
            'id' => 'footer_layout',
            'title' => __('Layouts', 'creativ'),
            'subtitle' => __('select a layout for footer', 'creativ'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/footer/f-footer.png',
                '1' => get_template_directory_uri().'/inc/options/images/footer/f-footer-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/footer/f-footer-2.png',
            )
        ),
    )
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Top', 'creativ'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer top.', 'creativ'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => __('Enable Footer Top', 'creativ'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'creativ' ),
            'subtitle' => __( 'footer background with image, color, etc.', 'creativ' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
                'background-color'=>'#2d2d2d'
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'padding-top'     => '80px',
                'padding-right'   => '0',
                'padding-bottom'  => '80px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* footer botton */
$this->sections[] = array(
    'title' => __('Footer Bottom', 'creativ'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer bottom.', 'creativ'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => __('Enable Footer Bottom', 'creativ'),
            'default' => false,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'creativ' ),
            'subtitle' => __( 'background with image, color, etc.', 'creativ' ),
            'output'   => array('footer #zo-footer-bottom'),
            'default'   => array(
                'background-color'=>'#202020'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_margin',
            'title' => __('Margin', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_padding',
            'title' => __('Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'padding-top'     => '22px',
                'padding-right'   => '0',
                'padding-bottom'  => '22px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable button back to top.', 'creativ'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'creativ'),
            'default' => true,
        )
    )
);

/**
 * Button Option
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Button', 'creativ'),
    'icon' => 'el el-bold',
    'fields' => array(
        array(
            'id' => 'button_font_size',
            'type' => 'typography',
            'title' => __('Button Font Size', 'creativ'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3 , .button, .btn, input[type="submit"]'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
        array(
            'subtitle' => __('Enable button uppercase.', 'creativ'),
            'id' => 'button_text_uppercase',
            'type' => 'switch',
            'title' => __('Button Text Uppercase', 'creativ'),
            'default' => true,
        ),
    )
);

/* Button Default */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => __('Button Default', 'creativ'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_default_padding',
            'title' => __('Button Default - Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default' => array(
                'padding-top'     => '15px',
                'padding-right'   => '35px',
                'padding-bottom'  => '15px',
                'padding-left'    => '35px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_default_border',
            'type'     => 'border',
            'title'    => __('Button Default - Border', 'creativ'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#03acdc',
                'border-top'    => '2px',
                'border-right'  => '2px',
                'border-bottom' => '2px',
                'border-left'   => '2px'
            )
        ),
        array(
            'id'       => 'btn_default_border_hover',
            'type'     => 'border',
            'title'    => __('Button Default - Border Hover', 'creativ'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn:hover, button.vc_general.vc_btn3:hover, a.vc_general.vc_btn3:hover, .button:hover, .btn:hover, input[type="submit"]:hover, .vc_general.vc_btn3.btn:focus, button.vc_general.vc_btn3:focus, a.vc_general.vc_btn3:focus, .button:focus'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#282828',
                'border-top'    => '2px',
                'border-right'  => '2px',
                'border-bottom' => '2px',
                'border-left'   => '2px'
            )
        ),
        array(
            'id'       => 'btn_default_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Button Default - Border Radius', 'creativ'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);

/* Button Primary */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => __('Button Primary', 'creativ'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_primary_padding',
            'title' => __('Button Primary - Padding', 'creativ'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn.btn-primary, .vc_general.btn.btn-primary'),
            'default' => array(
                'padding-top'     => '10px',
                'padding-right'   => '22px',
                'padding-bottom'  => '10px',
                'padding-left'    => '22px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_primary_border',
            'type'     => 'border',
            'title'    => __('Button Primary - Border', 'creativ'),
            'output'   => array('.btn.btn-primary, .vc_general.vc_btn3.btn.btn-primary'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#03acdc',
                'border-top'    => '2px',
                'border-right'  => '2px',
                'border-bottom' => '2px',
                'border-left'   => '2px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_hover',
            'type'     => 'border',
            'title'    => __('Button Primary - Border Hover', 'creativ'),
            'output'   => array('.btn.btn-primary:hover, .vc_general.vc_btn3.btn.btn-primary:hover'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#282828',
                'border-top'    => '2px',
                'border-right'  => '2px',
                'border-bottom' => '2px',
                'border-left'   => '2px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Button Primary - Border Radius', 'creativ'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);
/**
 * Styling
 *
 * css color.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Styling', 'creativ'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => __('set color main color.', 'creativ'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'creativ'),
            'default' => '#03acdc'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'creativ'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => __('Link Color', 'creativ'),
            'output'  => array('a'),
            'default' => array(
				'regular'  => '#03acdc',
				'hover'    => '#03acdc',
			)
        ),
    )
);

/** Header Top Color **/
$this->sections[] = array(
    'title' => __('Header Top Color', 'creativ'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set background color header top.', 'creativ'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'output'  => array('body #zo-header-top'),
            'title' => __('Background Color', 'creativ'),
            'default' => array(
				'background-color' => '#ececec',
			)
        ),
        array(
            'subtitle' => __('Set color header top.', 'creativ'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output'  => array('body #zo-header-top'),
            'title' => __('Font Color', 'creativ'),
            'default' => ''
        )
    )
);

/** Header Main Color **/
$this->sections[] = array(
    'title' => __('Header Main Color', 'creativ'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for header background color.', 'creativ'),
            'id' => 'bg_header',
            'type' => 'color_rgba',
            'title' => __('Header Background Color', 'creativ'),
            'default'   => array(
                'alpha'     => 1,
				'color'		=> '#fff'
            )
        )
    )
);

/** Sticky Header Color **/
$this->sections[] = array(
    'title' => __('Sticky Header', 'creativ'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for sticky header.', 'creativ'),
            'id' => 'bg_sticky_header',
            'type' => 'color_rgba',
            'title' => __('Sticky Background Color', 'creativ'),
            'default'   => array(
                'alpha'     => 0
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/** Menu Color **/
$this->sections[] = array(
    'title' => __('Menu Color', 'creativ'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the text color of first level menu items.', 'creativ'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color - First Level', 'creativ'),
            'default' => '#282828'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'creativ'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - First Level', 'creativ'),
            'default' => '#03acdc'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'creativ'),
            'id' => 'menu_color_active_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Active - First Level', 'creativ'),
            'default' => '#03acdc'
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'creativ'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color - Sub Level', 'creativ'),
            'default' => '#b1b1b1'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'creativ'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - Sub Level', 'creativ'),
            'default' => '#03acdc'
        )
    )
);

/** Button Color **/

$this->sections[] = array(
    'title' => __('Button Color', 'creativ'),
    'icon' => 'el el-bold',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the button text color.', 'creativ'),
            'id' => 'btn_default_color',
            'type' => 'color',
            'title' => __('Button Default - Font Color', 'creativ'),
            'default' => '#000000'
        ),
        array(
            'subtitle' => __('Controls the button text hover color.', 'creativ'),
            'id' => 'btn_default_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Font Color Hover', 'creativ'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'creativ'),
            'id' => 'btn_default_bg_color',
            'type' => 'color',
            'title' => __('Button Default - Background Color', 'creativ'),
            'default' => 'transparent'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'creativ'),
            'id' => 'btn_default_bg_color_hover',
            'type' => 'color',
            'title' => __('Button Default - Background Color Hover', 'creativ'),
            'default' => '#03acdc'
        ),
        array(
            'subtitle' => __('Controls the button text color.', 'creativ'),
            'id' => 'btn_primary_color',
            'type' => 'color',
            'title' => __('Button Primary - Font Color', 'creativ'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button text hover color.', 'creativ'),
            'id' => 'btn_primary_color_hover',
            'type' => 'color',
            'title' => __('Button Primary - Font Color Hover', 'creativ'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'creativ'),
            'id' => 'btn_primary_bg_color',
            'type' => 'color',
            'title' => __('Button Primary - Background Color', 'creativ'),
            'default' => '#03acdc'
        ),
        array(
            'subtitle' => __('Controls the button background color.', 'creativ'),
            'id' => 'btn_primary_bg_color_hover',
            'type' => 'color',
            'title' => __('Button Primary - Background Color Hover', 'creativ'),
            'default' => '#282828'
        ),
    )
);

/** Footer Top Color **/
$this->sections[] = array(
    'title' => __('Footer Top Color', 'creativ'),
    'icon' => 'el-icon-chevron-up',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'creativ'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'output' => array('#zo-footer-top'),
            'title' => __('Footer Top Color', 'creativ'),
            'default' => '#282828'
        ),
        array(
            'subtitle' => __('Set title color footer top.', 'creativ'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'output' => array('#zo-footer-top h1,#zo-footer-top h2,#zo-footer-top h3,#zo-footer-top h4,#zo-footer-top h5,#zo-footer-top h6'),
            'title' => __('Footer Heading Color', 'creativ'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'creativ'),
            'id' => 'footer_top_link_color',
            'type' => 'link_color',
            'output' => array('#zo-footer-top a'),
            'title' => __('Footer Link Color', 'creativ'),
            'default' => '#282828',
            'default' => array(
				'regular'  => '#282828',
				'hover'    => '#03acdc',
				'active'   => '#03acdc'
			)
        ),
    )
);

/** Footer Bottom Color **/
$this->sections[] = array(
    'title' => __('Footer Bottom Color', 'creativ'),
    'icon' => 'el-icon-chevron-down',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'creativ'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'output' => array('#zo-footer-bottom'),
            'title' => __('Footer Bottom Color', 'creativ'),
            'default' => '#3a3a3a'
        )
    )
);

/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Typography', 'creativ'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#999999',
                'font-weight' => '300',
                'font-family' => 'Source Sans Pro',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '22.75px',
                'text-align' => ''
            ),
            'subtitle' => __('Typography option with each property can be called individually.', 'creativ'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-weight' => '300',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-weight' => '300',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '30px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#000',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'creativ'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#141414',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '43.2px',
                'text-align' => ''
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'creativ'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'creativ'),
            'subtitle' => __('extend class "zo_extra_font1" to using this font', 'creativ'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font1'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'creativ'),
            'subtitle' => __('extend class "zo_extra_font2" to using this font', 'creativ'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font2'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => __('Font 3', 'creativ'),
            'subtitle' => __('extend class "zo_extra_font3" to using this font', 'creativ'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'output' => array('.zo_extra_font3'),
            'default' => array(
                'font-weight' => '',
                'font-family' => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', 'creativ'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', 'creativ' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'creativ'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'creativ'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', 'creativ' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'creativ'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'creativ'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'creativ'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'creativ'),
            'subtitle' => __('create your css code here.', 'creativ'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Animations', 'creativ'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation mouse scroll...', 'creativ'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => __('Smooth Scroll', 'creativ'),
            'default' => false
        ),
        array(
            'subtitle' => __('Enable animation parallax for images...', 'creativ'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'creativ'),
            'default' => true
        ),
    )
);
/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'creativ'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'creativ'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'creativ'),
            'default' => false
        )
    )
);
/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('404 Page', 'creativ'),
    'icon' => 'el-icon-remove-circle',
    'fields' => array(
        array(
            'subtitle' => __('select page 404...', 'creativ'),
            'id' => '404_page_option',
            'type' => 'select',
            'title' => __('404 Page', 'creativ'),
            'default' => '1',
            'options'  => array(
                '1' => 'Not Found Version 1',
                '2' => 'Not Found Version 2',
            ),
        ),
        array(
            'id'       => '404_background',
            'title'    => __('Background page', 'creativ'),
            'subtitle' => __('Select an image file for your 404 background.', 'creativ'),
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/404.jpg'
            )
        ),
         array(
            'id'       => '404_link_facebook',
            'type'     => 'text',
            'title'    => __('Link Facebook', 'creativ'),
            'desc'     => __('Enter link Facebook.', 'creativ'),
            'default'  => '#'
        ),
        array(
            'id'       => '404_link_google',
            'type'     => 'text',
            'title'    => __('Link Google Plus', 'creativ'),
            'desc'     => __('Enter link Google Plus.', 'creativ'),
            'default'  => '#'
        ),
        array(
            'id'       => '404_link_twitter',
            'type'     => 'text',
            'title'    => __('Link Twitter', 'creativ'),
            'desc'     => __('Enter link Twitter.', 'creativ'),
            'default'  => '#'
        ),
        array(
            'id'       => '404_link_dribbble',
            'type'     => 'text',
            'title'    => __('Link Dribbble', 'creativ'),
            'desc'     => __('Enter link Dribbble.', 'creativ'),
            'default'  => '#'
        ),
        array(
            'id'       => '404_link_pinterest',
            'type'     => 'text',
            'title'    => __('Link Pinterest', 'creativ'),
            'desc'     => __('Enter link Pinterest.', 'creativ'),
            'default'  => '#'
        ),
    ),
  
);

$section = apply_filters( 'redux-opts-sections-creativ',null);

if(!empty($section)) {
    $this->sections =  array_merge($this->sections,$section);
}
