<?php
/**
 * Add tabs params
 * 
 * @author ZoTheme
 * @since 1.0.0
 */
    vc_add_param("vc_accordion_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Accordion Background Color", 'creativ'),
        "param_name" => "zo_accordion_bg_color",
        "value" => "",
    ));
    vc_add_param("vc_accordion_tab", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => __("Accordion Border Color", 'creativ'),
        "param_name" => "zo_accordion_border_color",
        "value" => "",
    ));
    vc_add_param("vc_accordion_tab", array(
        "type" => "textfield",
        "heading" => __("Accordion Icon", 'creativ'),
        "param_name" => "zo_accordion_icon",
        "description" => __("Select icon website(http://fortawesome.github.io/Font-Awesome/icons;https://icomoon.io/app/)",'creativ')
    ));