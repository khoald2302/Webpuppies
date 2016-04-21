<?php

$params = array(
    array(
        "type" => "dropdown",
        "heading" => __("Title Size", 'creativ'),
        "param_name" => "zo_title_size",
        "value" => array(
            "H2" => "h2",
            "H3" => "h3",
            "H4" => "h4",
            "H5" => "h5",
            "H6" => "h6"
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Style", 'creativ'),
        "param_name" => "zo_fancybox_style",
        "value" => array(
            "Default" => "",
            "Large" => "large",
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Align", 'creativ'),
        "param_name" => "zo_fancybox_align",
        "value" => array(
            "Left" => "",
            "Right" => "right",
        ),
        "template" => array(
            'zo_fancybox_single--style-2.php'
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Style Icon", 'creativ'),
        "param_name" => "zo_fancybox_style_class",
        "value" => array(
            "Circle" => "zo_circle",
            "Square" => "zo_square",
            "Square - Border radius" => "zo_square_radius",
        ),
        "template" => array(
            'zo_fancybox_single--style-3.php',
            'zo_fancybox_single.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Title text transformn", 'creativ'),
        "param_name" => "zo_title_text_transform",
        "value" => array(
            "Uppercase" => "uppercase",
            "None" => "none",
            "Capitalize" => "capitalize",
        ),
        "template" => array(
            'zo_fancybox_single.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Custom Line-height?", 'creativ'),
        "param_name" => "zo_title_space",
        "value" => array(
            "No" => "",
            "Yes" => "zo-custom-space",
        ),
        "template" => array(
            'zo_fancybox_single--style-1.php',
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Icon background", 'creativ'),
        "param_name" => "zo_fancybox_icon_background",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "value" => '',
        "template" => array(
            'zo_fancybox_single--style-3.php',
            'zo_fancybox_single--style-4.php',
            'zo_fancybox_single.php',
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Item background", 'creativ'),
        "param_name" => "zo_fancybox_item_background",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "value" => '',
        "template" => array(
            'zo_fancybox_single--style-2.php',
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Color Text", 'creativ'),
        "param_name" => "zo_fancybox_color_title",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "template" => array(
            'zo_fancybox_single--style-2.php',
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Color title", 'creativ'),
        "param_name" => "zo_fancybox_color_title",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "template" => array(
            'zo_fancybox_single--style-3.php',
            'zo_fancybox_single--style-4.php',
            'zo_fancybox_single--style-2.php',
        )
    ),
     array(
        "type" => "colorpicker",
        "heading" => __("Content title", 'creativ'),
        "param_name" => "zo_fancybox_color_content",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "template" => array(
            'zo_fancybox_single--style-3.php',
        )
    ),
     array(
        "type" => "colorpicker",
        "heading" => __("Icon color", 'creativ'),
        "param_name" => "zo_fancybox_color_icon",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "template" => array(
            'zo_fancybox_single--style-3.php',
        )
    ),
    array(
        "type" => "textfield",
        "heading" => __("Value Item", 'creativ'),
        "param_name" => "zo_fancybox_value",
        "group" => __("Fancy Icon Settings", 'creativ'),
        "template" => array(
            'zo_fancybox_single--style-3.php',
        )
    ),
);
