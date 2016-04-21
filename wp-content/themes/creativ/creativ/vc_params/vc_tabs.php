<?php
/**
 * Add tabs params
 * 
 * @author ZoTheme
 * @since 1.0.0
 */

    vc_add_param("vc_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Tab Background Color", 'creativ'),
        "param_name" => "zo_tab_bg_color",
        "value" => ""
    ));
    vc_add_param("vc_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Tab Border Color", 'creativ'),
        "param_name" => "zo_tab_border_color",
        "value" => ""
    ));
    vc_add_param("vc_tab", array(
        "type" => "textfield",
        "heading" => __("Tab Icon", 'creativ'),
        "param_name" => "zo_tab_icon"
    ));
