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
        ),
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Full Width", 'creativ'),
        "param_name" => "zo_full_width",
        "value" => array(
            "Default" => "",
            "No Padding" => "no-padding"
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Show icon", 'creativ'),
        "param_name" => "zo_show_icon",
        "value" => array(
            "Yes" => 1,
            "No" => 0,
        ),
        "template" => array(
            'zo_grid--portfolio-without-text.php'
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Background Box text", 'creativ'),
        "param_name" => "zo_background_text",
        "template" => array(
            'zo_grid--portfolio-with-text.php'
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Hove event", 'creativ'),
        "param_name" => "zo_hover_item",
        "value" => array(
            "Left" => 'zo_hover_left',
            "Top" => 'zo_hover_top',
            "Right" => 'zo_hover_right',
            "Bottom" => 'zo_hover_bottom',
        ),
        "template" => array(
            'zo_grid--portfolio-without-text.php',
            'zo_grid--portfolio-with-text.php',
            'zo_grid--portfolio-gallery.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Show icon", 'creativ'),
        "param_name" => "zo_show_icon_1",
        "value" => array(
            "Yes" => 1,
            "No" => 0,
        ),
        "template" => array(
            'zo_grid--portfolio-with-text.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Show icon", 'creativ'),
        "param_name" => "zo_show_icon_2",
        "value" => array(
            "Yes" => 1,
            "No" => 0,
        ),
        "template" => array(
            'zo_grid--portfolio-gallery.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Show Pagination", 'creativ'),
        "param_name" => "zo_show_pagination",
        "value" => array(
            "Yes" => 1,
            "No" => 0,
        ),
        "template" => array(
            'zo_grid--blog-classic.php',
            'zo_grid--portfolio-product.php',
            'zo_grid--blog-timeline.php'
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Image Size", 'creativ'),
        "param_name" => "zo_image_style_blog",
        "value" => array(
            "Thumbnail (400px x 368px)" => "thumb",
            "Medium (500px x 500px)" => "medium",
            "Full" => "full",
        ),
        "template" => array(
            'zo_grid--blog-classic.php',
            'zo_grid--blog-masonry.php',

        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Image Style", 'creativ'),
        "param_name" => "zo_image_style",
        "value" => array(
            "Image 4 Columns (550px x 415px)" => "port_thumb",
            "Image 3 Columns (590px x 424px)" => "port_medium",
            "Image 3 Columns Without Text (590px x 500px)" => "port_without_text",
            "Image 2 Columns (575px x 470px)" => "port_two",
            "Image Show Case (400px x 470px)" => "port_showcase",
            "Image Full" => "full",
        ),
        "template" => array(
            'zo_grid--portfolio-without-text.php',
            'zo_grid--portfolio-with-text.php',
            'zo_grid--portfolio-style-1.php',

        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Image Style", 'creativ'),
        "param_name" => "zo_image_style_timeline",
        "value" => array(
            "Image Blog Timeline (Width 482px - Height Auto )" => "482",
            "Image Blog Timeline Sidebar  (Width 596px - Height Auto )" => "596",
            "Image Full" => "full",
        ),
        "template" => array(
            'zo_grid--blog-timeline.php',
            'zo_grid--blog-timeline-style-1.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Line height default?", 'creativ'),
        "param_name" => "line_height_default",
        "value" => array(
            "Yes" => "",
            "No" => "zo_custom_line_height",
        ),
        "template" => array(
            'zo_grid--portfolio-without-text.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Background Item", 'creativ'),
        "param_name" => "zo_background_item",
        "value" => array(
            "No" => "",
            "Yes" => "zo_background_item",
        ),
        "template" => array(
            'zo_grid--blog-classic.php',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => __("Show Title", 'creativ'),
        "param_name" => "zo_show_title",
        "value" => array(
            "No" => "",
            "Yes" => "yes",
        ),
        "template" => array(
            'zo_grid--demo.php',
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Background Box Pricing", 'creativ'),
        "param_name" => "zo_background_pricing",
        "template" => array(
            'zo_grid--pricing.php'
        )
    ),
    array(
        "type" => "colorpicker",
        "heading" => __("Primary Color", 'creativ'),
        "param_name" => "zo_color_primary_color",
        "template" => array(
            'zo_grid--product-menu.php'
        )
    ),
);
