<?php

/**
 * Add custom heading params
 * 
 * @author Fox
 * @since 1.0.0
 */
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Custom Heading Style", 'creativ'),
    "admin_label" => true,
    "param_name" => "zo_custom_heading",
    "value" => array(
        "Default" => 'default',
        "Title Line Bottom - Style 1" => "style-1",
        "Title With Background - Style 2" => "style-2"
    )
));
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Custom Font", 'creativ'),
    "admin_label" => true,
    "param_name" => "zo_custom_font_heading",
    "value" => array(
        "None" => "",
        "Yes" => "yes",
    )
));

vc_add_param("vc_custom_heading", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Custom Font", 'creativ'),
    "admin_label" => true,
    "param_name" => "zo_custom_font",
    'dependency' => array(
        "element" => "zo_custom_font_heading",
        "value" => "yes"
    )
        )
);
vc_add_param("vc_custom_heading", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Custom Font weight", 'creativ'),
    "admin_label" => true,
    "param_name" => "zo_custom_font_weight",
    'dependency' => array(
        "element" => "zo_custom_font_heading",
        "value" => "yes"
    )
        )
);
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Custom font style", 'creativ'),
    "admin_label" => true,
    "param_name" => "zo_custom_font_style",
    "value" => array(
        "None" => "normal",
        "Italic" => "italic",
    ),
    'dependency' => array(
        "element" => "zo_custom_font_heading",
        "value" => "yes"
    )
        )
);

