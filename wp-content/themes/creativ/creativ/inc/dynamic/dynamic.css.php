<?php

/**
 * Auto create css from Meta Options.
 *
 * @author ZoTheme
 * @version 1.0.0
 */
class ZoTheme_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $zo_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $zo_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="zo_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_meta;
        ob_start();

        /* custom css.  */
        if( isset($smof_data['custom_css']) ) {
            echo wp_filter_nohtml_kses(trim($smof_data['custom_css']))."\n";
        }
        /* ==========================================================================
           Start Header
        ========================================================================== */
        /* set background to header top*/
        if(!empty($zo_meta->_zo_header_top_background)) {
          
            echo  "body #zo-header-top { 
               background-color: ".esc_attr($zo_meta->_zo_header_top_background)." !important; 
             }\n";
            echo ".zo-social li a i{
                    background: #373737 none repeat scroll 0 0 !important;
            }\n";
            
            
        }
         if(!empty($zo_meta->_zo_header_top_margin)) {
            echo  "body #zo-header-top { 
               margin: ".esc_attr($zo_meta->_zo_header_top_margin)." !important; 
             }\n";
        }
        if(!empty($zo_meta->_zo_header_top_padding)) {
            echo  "body #zo-header-top { 
               padding:".esc_attr($zo_meta->_zo_header_top_padding)." !important;
             }\n";
        }
        /*Set background to header*/
        if(!empty($zo_meta->_zo_header_color)) {
            echo  "#zo-header { 
               background-color: ".esc_attr($zo_meta->_zo_header_color)."; 
             }\n";
        }
        /* Set margin pading header  */
        if(!empty($zo_meta->_zo_header_padding)){
            echo  "#zo-header{
                    padding:".esc_attr($zo_meta->_zo_header_padding)." !important;
                   
            }\n"; 
        } 
        if(!empty($zo_meta->_zo_header_margin)){
            echo  "#zo-header{
                  margin:".esc_attr($zo_meta->_zo_header_margin)." !important;
                   
            }\n"; 
        }
        if(!empty($zo_meta->_zo_header_menu_reponsive_icon && !empty($zo_meta->_zo_header_layout == '1'))){
            echo  "#zo-header #zo-menu-mobile i, #zo-header .menu-right #filter-menu {
                  color:".esc_attr($zo_meta->_zo_header_menu_reponsive_icon)." !important; 
            }\n"; 
        }
         if(!empty($zo_meta->_zo_header_reponsive_padding)){
              
               echo " @media screen and (max-width: 767px) {
                    #zo-header-top.zo-header-top-style-1 {
                     padding: 30px 0 !important;
                    }\n
                    #zo-header.zo-header-style-1 #zo-menu-mobile {
                      top: -70px !important;
                    }\n
                    
            }\n"; 
            }
        /*Set height header*/
        if(!empty($zo_meta->_zo_header_height)){
            echo "body #zo-header {
                height:".esc_attr($zo_meta->_zo_header_height).";
             }";
        }
        /* Set logo height*/
        if(!empty($zo_meta->_zo_header_logo_height)){
             echo "#zo-header-logo a { line-height: ".esc_attr($zo_meta->_zo_header_logo_height)."; }\n";
             echo "#zo-header-top.zo-header-top-style-1 .zo-hiden-mobile, #zo-header-top.zo-header-top-style-6 .zo-hiden-mobile {
              line-height: ".esc_attr($zo_meta->_zo_header_logo_height).";
             } \n";
             echo "#zo-header.zo-header-style-9 #zo-header-left .zo-header-left-content, #zo-header.zo-header-style-9 #zo-header-left .menu-portfolio , #zo-header.zo-header-style-9 ul.zo-social {
                line-height:".esc_attr($zo_meta->_zo_header_logo_height).";
             }\n";

             
        }
        if(!empty($zo_meta->_zo_header_layout) && $zo_meta->_zo_header_layout =='8') {
            echo "header#masthead {width:100%; position: absolute; background:#282828}\n";
            echo "#zo-collapse { position: relative; z-index: 999;}\n";
          
        }
        /* Header Fixed Only Page */
        if (!empty($zo_meta->_zo_header_fixed_bg_color)) {
            echo "#zo-header.header-fixed.header-fixed-page {
				background-color: ".esc_attr($zo_meta->_zo_header_fixed_bg_color).";
			}\n";
        }
        /* End Header Fixed Only Page */
		
        /* Custom Menu Color Only Page */
        if (!empty($zo_meta->_zo_menu_padding_header)) {
            echo "
			@media (min-width: 992px) {
				#zo-header #zo-header-navigation .main-navigation .menu-main-menu > li,#zo-header #zo-header-navigation #menu-one-page-version.menu-main-menu > li {
					padding: ".esc_attr($zo_meta->_zo_menu_padding_header).";
				}
			}\n";
        } 
        if (!empty($zo_meta->_zo_header_menu_color)) {
            echo "#zo-header-navigation .main-navigation .menu-main-menu > li > a, #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a, #zo-header #filter-menu, #zo-menu-mobile i {
				color: ".esc_attr($zo_meta->_zo_header_menu_color). ";
			}\n";
        }
        if (!empty($zo_meta->_zo_header_menu_color_hover)) {
            echo "#zo-header.header-menu-custom #zo-header-navigation .main-navigation .menu-main-menu > li:hover > a,
				#zo-header .widget_cart_search_wrap .widget_cart_search_wrap_item > a.icon:hover, #zo-header #filter-menu:hover, #zo-menu-mobile i:hover  {
				color: ".esc_attr($zo_meta->_zo_header_menu_color_hover).";
			}\n";
        }
        if (!empty($zo_meta->_zo_header_menu_color_active)) {
            echo "#zo-header.header-menu-custom #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#zo-header.header-menu-custom #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#zo-header.header-menu-custom #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#zo-header.header-menu-custom #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a,
			#zo-header .widget_cart_search_wrap .widget_cart_search_wrap_item > a.icon:hover, #zo-header #filter-menu:active {
				color: ".esc_attr($zo_meta->_zo_header_menu_color_active).";
			}\n";
        }
        /* End Custom Menu Color Only Page */

        /* Menu Fixed Only Page */
        if (!empty($zo_meta->_zo_header_fixed_menu_color)) {
            echo "#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li > a {
				color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color).";
			}\n";
        }
        if (!empty($zo_meta->_zo_header_fixed_menu_color_hover)) {
            echo "#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li > a:hover {
				color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color_hover).";
			}\n";
        }
        if (!empty($zo_meta->_zo_header_fixed_menu_color_active)) {
            echo "#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#zo-header.header-fixed-page #zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a {
				color: ".esc_attr($zo_meta->_zo_header_fixed_menu_color_active).";
			}\n";
        }
        /* End Menu Fixed Only Page */
        /* Start Page Title */
        if (!empty($zo_meta->_zo_page_title_margin)) {
            echo "body #page div#zo-page-element-wrap {
                margin: ".esc_attr($zo_meta->_zo_page_title_margin).";
            }\n";
        } 
        if (!empty($zo_meta->_zo_page_title_padding)) {
            echo "body #page .page-title {
				padding: ".esc_attr($zo_meta->_zo_page_title_padding).";
			}\n";
        }
        if (!empty($zo_meta->_zo_page_title_background)) {
            $background = wp_get_attachment_image_src($zo_meta->_zo_page_title_background, 'full');
            echo "body #zo-page-element-wrap {
				background-image: url('".esc_url($background[0])."');
			}\n";
        }
        /* End Page Title */
        /* ==========================================================================
           End Header
        ========================================================================== */
        /* ==========================================================================
           Start Footer
        ========================================================================== */
        /*Footer top background*/
         if(!empty($zo_meta->_zo_footer_top_background)) {
            echo  "footer #zo-footer-top { 
               background-color: ".esc_attr($zo_meta->_zo_footer_top_background)." !important; 
             }\n";
        }
        /*Footer bottom background*/
        if(!empty($zo_meta->_zo_footer_bottom_background)) {
            echo  "footer #zo-footer-bottom { 
               background-color: ".esc_attr($zo_meta->_zo_footer_bottom_background)." !important; 
             }\n";
        }
        
        
        /* ==========================================================================
           End Footer
        ========================================================================== */
        
        return ob_get_clean();
    }
}

new ZoTheme_DynamicCss();
