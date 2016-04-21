<?php

/**
 * Meta options
 *
 * @author ZoTheme
 * @since 1.0.0
 */
class ZOMetaOptions {

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }

    /* add script */

    function admin_script_loader() {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }

    /* add meta boxs */

    public function add_meta_boxes() {
        $this->add_meta_box('template_page_options', __('Setting', 'creativ'), 'page');
        $this->add_meta_box('testimonial_options', __('Testimonial about', 'creativ'), 'testimonial');
        $this->add_meta_box('pricing_options', __('Pricing Option', 'creativ'), 'pricing');
        $this->add_meta_box('team_options', __('Team About', 'creativ'), 'team');
        $this->add_meta_box('demo_options', __('Demo option', 'creativ'), 'demo');
        $this->add_meta_box('portfolio_options', __('Portfolio About', 'creativ'), 'portfolio');
        $this->add_meta_box('blog_options', __('Blog Option', 'creativ'), 'post');
        $this->add_meta_box('gallery_options', __('Gallry Option', 'creativ'), 'gallery');
    }

    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default') {
        add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }

    /* --------------------- PAGE ---------------------- */

    /**
     *
     */
    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'creativ'); ?></a></li>
                <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php _e('Header', 'creativ'); ?></a></li>
                <li class="tab"><a href="#tabs-footer"><i class="fa fa-diamond"></i><?php _e('Footer', 'creativ'); ?></a></li>
                <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php _e('Page Title', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-general">
                    <?php
                    zo_options(array(
                        'id' => 'full_width',
                        'label' => __('Full Width', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                    ));
                    zo_options(array(
                        'id' => 'boxed_layout',
                        'label' => __('Boxed Layout', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                    ));
                    zo_options(array(
                        'id' => 'dark_layout',
                        'label' => __('Dark Layout', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                    ));
                    ?>
                </div>
                <div id="tabs-header">
                    <?php
                    /* header. */
                    zo_options(array(
                        'id' => 'header',
                        'label' => __('Header', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_header_enable'))
                    ));
                    ?>  <div id="page_header_enable"><?php
                    zo_options(array(
                        'id' => 'header_layout',
                        'label' => __('Layout', 'creativ'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri() . '/inc/options/images/header/h-default.png',
                            '1' => get_template_directory_uri() . '/inc/options/images/header/h-header-1.png',
                            '2' => get_template_directory_uri() . '/inc/options/images/header/h-header-2.png',
                            '3' => get_template_directory_uri() . '/inc/options/images/header/h-header-3.png',
                            '3' => get_template_directory_uri() . '/inc/options/images/header/h-header-3.png',
                            '4' => get_template_directory_uri() . '/inc/options/images/header/h-header-4.png',
                            '5' => get_template_directory_uri() . '/inc/options/images/header/h-header-5.png',
                            '6' => get_template_directory_uri() . '/inc/options/images/header/h-header-6.png',
                            '7' => get_template_directory_uri() . '/inc/options/images/header/h-header-7.png',
                            '8' => get_template_directory_uri() . '/inc/options/images/header/h-header-8.png',
                            '9' => get_template_directory_uri() . '/inc/options/images/header/h-header-9.png',
                            '10' => get_template_directory_uri() . '/inc/options/images/header/h-header-10.png',
                        ),
                        'follow' => array('1' => array('#page_header_option_seting','#page_header_option_seting_default'), '2' => array('1',''))
                    ));
                    ?>

                        <div id="page_header_option_seting_default">
                            <?php
                            zo_options(array(
                                'id' => 'show_header_top_reponsive',
                                'label' => __('Show Header Top Mobile', 'creativ'),
                                'type' => 'select',
                                'options' => array(
                                    '' => 'No',
                                    '1' => 'Yes',
                                )
                            ));
                            ?>
                        </div>
                        <div id="page_header_option_seting">
                            <?php
                            zo_options(array(
                                'id' => 'header_menu_reponsive',
                                'label' => __('Background Sub Menu Mobile', 'creativ'),
                                'type' => 'select',
                                'options' => array(
                                    '1' => 'Yes',
                                    '0' => 'No',
                                )
                            ));
                            zo_options(array(
                                'id' => 'header_menu_reponsive_icon',
                                'label' => __('Color Icon Menu Reponsive', 'creativ'),
                                'type' => 'select',
                                'options' => array(
                                    '#282828' => 'Black',
                                    '#ffffff' => 'White',
                                )
                            ));
                            zo_options(array(
                                'id' => 'header_reponsive_padding',
                                'label' => __('Header Reponsive Padding', 'creativ'),
                                'type' => 'select',
                                'options' => array(
                                    '' => 'No',
                                    '1' => 'Yes',
                                )
                            ));
                            ?>
                        </div>

                        <?php
                        zo_options(array(
                            'id' => 'header_height',
                            'label' => __('Header Height', 'creativ'),
                            'type' => 'text'
                        ));
                        zo_options(array(
                            'id' => 'header_margin',
                            'label' => __('Header Margin', 'creativ'),
                            'type' => 'text',
                        ));
                        zo_options(array(
                            'id' => 'header_padding',
                            'label' => __('Header Padding', 'creativ'),
                            'type' => 'text',
                        ));
                        zo_options(array(
                            'id' => 'header_color',
                            'label' => __('Header color', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        zo_options(array(
                            'id' => 'header_logo',
                            'label' => __('Logo', 'creativ'),
                            'type' => 'image'
                        ));
                        zo_options(array(
                            'id' => 'header_logo_height',
                            'label' => __('Logo Height', 'creativ'),
                            'type' => 'text'
                        ));

                        /* Header top */
                        zo_options(array(
                            'id' => 'header_top_enable',
                            'label' => __('Header Top', 'creativ'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#page_header_top_enable'))
                        ));
                        ?>

                        <div id="page_header_top_enable">
                            <?php
                            zo_options(array(
                                'id' => 'header_top_background',
                                'label' => __('Header top background', 'creativ'),
                                'type' => 'color',
                                'default' => ''
                            ));
                            zo_options(array(
                                'id' => 'header_top_margin',
                                'label' => __('Header Top Margin', 'creativ'),
                                'type' => 'text',
                            ));
                            zo_options(array(
                                'id' => 'header_top_padding',
                                'label' => __('Header Top Padding', 'creativ'),
                                'type' => 'text',
                            ));
                            ?>
                        </div>
                        <?php
                        /*
                         * Custom main menu color
                         */
                        zo_options(array(
                            'id' => 'enable_header_menu',
                            'label' => __('Custom Header Menu Color', 'creativ'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#page_header_menu_enable'))
                        ));
                        ?> <div id="page_header_menu_enable"><?php
                        zo_options(array(
                            'id' => 'header_menu_color',
                            'label' => __('Menu Color - First Level', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        zo_options(array(
                            'id' => 'header_menu_color_hover',
                            'label' => __('Menu Hover - First Level', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        zo_options(array(
                            'id' => 'header_menu_color_active',
                            'label' => __('Menu Active - First Level', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        ?> </div><?php
                            /*
                             * Custom menu color for header fixed
                             */
                              zo_options(array(
                                'id' => 'show_header_fixed',
                                'label' => __('Header Fixed Enable', 'creativ'),
                                'type' => 'switch',
                                'options' => array('off' => '','on' => '1',),
                                'follow' => array('1' => array('#page_header_fixed_show'))
                            ));
                            ?>
                            <div id="page_header_fixed_show">
                                <?php 
                                zo_options(array(
                                    'id' => 'enable_header_fixed',
                                    'label' => __('Header Fixed Custom', 'creativ'),
                                    'type' => 'switch',
                                    'options' => array('on' => '1', 'off' => ''),
                                    'follow' => array('1' => array('#page_header_fixed_enable'))
                                ));
                                ?> 
                                <div id="page_header_fixed_enable"><?php
                                zo_options(array(
                                    'id' => 'header_fixed_bg_color',
                                    'label' => __('Header Fixed - Background Color', 'creativ'),
                                    'type' => 'color',
                                    'default' => '#fff',
                                    'rgba' => true
                                ));
                                zo_options(array(
                                    'id' => 'header_fixed_menu_color',
                                    'label' => __('Header Fixed - Menu Color - First Level', 'creativ'),
                                    'type' => 'color',
                                    'default' => ''
                                ));
                                zo_options(array(
                                    'id' => 'header_fixed_menu_color_hover',
                                    'label' => __('Header Fixed - Menu Hover Color - First Level', 'creativ'),
                                    'type' => 'color',
                                    'default' => ''
                                ));
                                zo_options(array(
                                    'id' => 'header_fixed_menu_color_active',
                                    'label' => __('Header Fixed - Menu Active Color - First Level', 'creativ'),
                                    'type' => 'color',
                                    'default' => ''
                                ));
                                ?> </div>
                            </div> <!--End header fixed enable-->
                            <?php
                            zo_options(array(
                                'id' => 'menu_padding_header',
                                'label' => __('Menu Padding', 'creativ'),
                                'type' => 'text',
                            ));
                            $menus = array();
                            $menus[''] = 'Default';
                            $obj_menus = wp_get_nav_menus();
                            foreach ($obj_menus as $obj_menu) {
                                $menus[$obj_menu->term_id] = $obj_menu->name;
                            }
                            $navs = get_registered_nav_menus();
                          //  $i = 0;
                            foreach ($navs as $key => $mav) {
                             //   if ($i == 1) {
                                    zo_options(array(
                                        'id' => $key,
                                        'label' => $mav,
                                        'type' => 'select',
                                        'options' => $menus
                                    ));
                                //}
                               // $i++;
                            }
                            ?>
                    </div>
                </div>
                <div id ="tabs-footer">
        <?php
        /* Footer. */
        zo_options(array(
            'id' => 'footer',
            'label' => __('Footer', 'creativ'),
            'type' => 'switch',
            'options' => array('on' => '1', 'off' => ''),
            'follow' => array('1' => array('#page_footer_enable'))
        ));
        ?>
                    <div id="page_footer_enable">
                    <?php
                    zo_options(array(
                        'id' => 'footer_layout',
                        'label' => __('Layout', 'creativ'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri() . '/inc/options/images/footer/f-footer.png',
                            '1' => get_template_directory_uri() . '/inc/options/images/footer/f-footer-1.png',
                            '2' => get_template_directory_uri() . '/inc/options/images/footer/f-footer-2.png',
                        )
                    ));
                    ?>
                        <?php
                        /* Footer top */
                        zo_options(array(
                            'id' => 'footer_top_enable',
                            'label' => __('Footer Top', 'creativ'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#page_footer_top_enable'))
                        ));
                        ?>
                        <div id="page_footer_top_enable">
                        <?php
                        zo_options(array(
                            'id' => 'footer_top_background',
                            'label' => __('Footer top background', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        zo_options(array(
                            'id' => 'footer_top_margin',
                            'label' => __('Footer Top Margin', 'creativ'),
                            'type' => 'text',
                        ));
                        zo_options(array(
                            'id' => 'footer_top_padding',
                            'label' => __('Footer Top Padding', 'creativ'),
                            'type' => 'text',
                        ));
                        ?>
                        </div>
                        <?php
                        /* Footer top */
                        zo_options(array(
                            'id' => 'footer_bottom_enable',
                            'label' => __('Footer Bottom', 'creativ'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                            'follow' => array('1' => array('#page_footer_bottom_enable'))
                        ));
                        ?>
                        <div id="page_footer_bottom_enable">
                            <?php
                            zo_options(array(
                                'id' => 'footer_bottom_background',
                                'label' => __('Footer Bottom background', 'creativ'),
                                'type' => 'color',
                                'default' => ''
                            ));
                            zo_options(array(
                                'id' => 'footer_bottom_margin',
                                'label' => __('Footer Bottom Margin', 'creativ'),
                                'type' => 'text',
                            ));
                            zo_options(array(
                                'id' => 'footer_bootom_padding',
                                'label' => __('Footer Bottom Padding', 'creativ'),
                                'type' => 'text',
                            ));
                            ?>
                        </div> 

                    </div>
                </div>
                <div id="tabs-page-title">
                    <?php
                    /* page title. */
                    zo_options(array(
                        'id' => 'page_title',
                        'label' => __('Page Title', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                        'follow' => array('1' => array('#page_title_enable'))
                    ));
                    ?>  <div id="page_title_enable"><?php
                    zo_options(array(
                        'id' => 'page_title_text',
                        'label' => __('Title', 'creativ'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_sub_text',
                        'label' => __('Sub Title', 'creativ'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_margin',
                        'label' => __('Page Title Margin', 'creativ'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_padding',
                        'label' => __('Page Title Padding', 'creativ'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'page_title_background',
                        'label' => __('Page Title Background', 'creativ'),
                        'type' => 'image',
                    ));
                    zo_options(array(
                        'id' => 'page_title_type',
                        'label' => __('Layout', 'creativ'),
                        'type' => 'imegesselect',
                        'options' => array(
                            '' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-0.png',
                            '1' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-1.png',
                            '2' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-2.png',
                            '3' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-3.png',
                            '4' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-4.png',
                            '5' => get_template_directory_uri() . '/inc/options/images/pagetitle/pt-s-5.png',
                        )
                    ));
                    zo_options(array(
                        'id' => 'page_title_parallax',
                        'label' => __('Page Title Parallax', 'creativ'),
                        'type' => 'switch',
                        'options' => array('on' => '1', 'off' => ''),
                    ));
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* --------------------- RATING TESTIMONIAL ---------------------- */

    function testimonial_options() {
        ?>
        <div class="testimonial-rating">
            <?php
            zo_options(array(
                'id' => 'testimonial_position',
                'label' => __('Client Position', 'creativ'),
                'type' => 'text',
            ));
            ?>
        </div>
        <?php
    }

    /* --------------------- PRICING ---------------------- */

    function pricing_options() {
        ?>
        <div class="pricing-option-wrap">
            <table class="wp-list-table widefat fixed">
                <tr>
                    <td>
                        <?php
                        zo_options(array(
                            'id' => 'price',
                            'label' => __('Price', 'creativ'),
                            'type' => 'text',
                        ));

                        zo_options(array(
                            'id' => 'value',
                            'label' => __('Value', 'creativ'),
                            'type' => 'select',
                            'options' => array(
                                'mo' => 'Monthly',
                                'Year' => 'Year'
                            )
                        ));

                        zo_options(array(
                            'id' => 'color',
                            'label' => __('Header Color', 'creativ'),
                            'type' => 'color',
                            'default' => ''
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        zo_options(array(
                            'id' => 'is_feature',
                            'label' => __('Is feature', 'creativ'),
                            'type' => 'switch',
                            'options' => array('on' => '1', 'off' => ''),
                        ));

                        zo_options(array(
                            'id' => 'button_url',
                            'label' => __('Button Url', 'creativ'),
                            'type' => 'text',
                        ));

                        zo_options(array(
                            'id' => 'button_text',
                            'label' => __('Button Text', 'creativ'),
                            'type' => 'text',
                        ));
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }

    /* --------------------- PRICING ---------------------- */

    /* -----------------------TEAM------------------------- */

    function team_options() {
        ?>

        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Position', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-position">
                    <?php
                    zo_options(array(
                        'id' => 'team_position',
                        'label' => __('Position', 'creativ'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    ?>
                    <?php
                    zo_options(array(
                        'id' => 'socials',
                        'label' => __('Socials of team', 'creativ'),
                        'type' => 'social',
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    /*------------------------Demo-------------------------------*/
    function demo_options(){ ?>
          <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Demo', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-position">
                    <?php
                    zo_options(array(
                        'id' => 'links_demo',
                        'label' => __('Links', 'creativ'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    ?>

                </div>
            </div>
        </div>
    <?php
    }
    /*------------------------End Demo---------------------------*/
    /* -----------------------Portfolio------------------------- */

    function portfolio_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php _e('About', 'creativ'); ?></a></li>
                <li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php _e('Layout', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-about">
                    <?php
                    zo_options(array(
                        'id' => 'portfolio_client',
                        'label' => __('Client', 'creativ'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_date',
                        'label' => __('Date', 'creativ'),
                        'type' => 'date',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_skills',
                        'label' => __('Skills', 'creativ'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_url',
                        'label' => __('URL', 'creativ'),
                        'type' => 'text',
                        'value' => '#',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_images',
                        'label' => __('Gallery', 'creativ'),
                        'type' => 'images',
                    ));
                    ?>
                </div>
                <div id="tabs-layout">
                    <?php
                    zo_options(array(
                        'id' => 'portfolio_layout',
                        'label' => __('Layout', 'creativ'),
                        'type' => 'select',
                        'options' => array(
                            '' => 'Default',
                            'style1' => 'Single Portfolio Two',
                            'style2' => 'Single Portfolio Three'
                        )
                    ));
                    ?>
                </div>
            </div>
        </div>


        <?php
    }

    /* -----------------------End Portfolio--------------------- */
    /* -----------------------Blog option------------------------ */

    function blog_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php _e('Layout', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-layout">
                    <?php
                    zo_options(array(
                        'id' => 'blog_layout',
                        'label' => __('Layout', 'creativ'),
                        'type' => 'select',
                        'options' => array(
                            '' => 'Default',
                            'style1' => 'Full width',
                        )
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    /* -----------------------Blog option------------------------ */
    /*     */

    function gallery_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php _e('Gallery Info', 'creativ'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-layout">
                    <?php
                    zo_options(array(
                        'id' => 'gallery_client',
                        'label' => __('Client', 'creativ'),
                        'type' => 'text',
                    ));
                    zo_options(array(
                        'id' => 'gallery_list',
                        'label' => __('Add Gallery', 'creativ'),
                        'type' => 'images',
                        'field' => 'multiple',
                    ));
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

}

new ZOMetaOptions();
