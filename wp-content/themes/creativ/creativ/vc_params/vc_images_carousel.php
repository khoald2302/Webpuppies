<?php
/**
 * Add custom heading params
 *
 * @author ZoTheme
 * @since 1.0.0
 */

    vc_add_param("vc_images_carousel", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Image Hover Effect", 'creativ'),
        "admin_label" => true,
        "param_name" => "zo_carousel_hover_effect",
        "value" => array(
            'Default' => '',
            'Opacity' => 'opacity'
        )
    ));

    vc_add_param("vc_images_carousel", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => __("Carousel Libraries", 'creativ'),
        "admin_label" => true,
        "param_name" => "zo_carousel_lib",
        "value" => array(
            'Default' => '',
            'ZO Carousel' => 'zo'
        ),

    ));

    vc_add_param("vc_images_carousel", array(
        "type" => "checkbox",
        "class" => "",
        "heading" => __("Show Pagination With Image", 'creativ'),
        "admin_label" => true,
        "param_name" => "zo_page_image",
        "value" => array('Yes' => 'yes'),
        'dependency' => array(
            "element"=>"zo_carousel_lib",
            "value"=> 'zo'
        )
    ));

    vc_add_param("vc_images_carousel", array(
        "type" => "textfield",
        "class" => "",
        "heading" => __("Number Image For Pagination", 'creativ'),
        "admin_label" => true,
        "param_name" => "zo_page_image_count",
        "value" => 3,
        'dependency' => array(
            "element"=>"zo_carousel_lib",
            "value"=>'zo'
        )
    ));