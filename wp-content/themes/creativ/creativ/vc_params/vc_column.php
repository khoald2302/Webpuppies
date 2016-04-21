<?php

/**
 * Add column params
 *
 * @author ZoTheme
 * @since 1.0.0
 */
vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Animation", 'lucian'),
    "admin_label" => true,
    "param_name" => "animation",
    "value" => array(
        "None" => "",
        "bounce" => "bounce",
        "flash" => "flash",
        "pulse" => "pulse",
        "rubberBand" => "rubberBand",
        "shake" => "shake",
        "swing" => "swing",
        "tada" => "tada",
        "wobble" => "wobble",
        "jello" => "jello",
        "bounceIn" => "bounceIn",
        "bounceInDown" => "bounceInDown",
        "bounceInLeft" => "bounceInLeft",
        "bounceInRight" => "bounceInRight",
        "bounceInUp" => "bounceInUp",
        "fadeIn" => "fadeIn",
        "fadeInDown" => "fadeInDown",
        "fadeInDownBig" => "fadeInDownBig",
        "fadeInLeft" => "fadeInLeft",
        "fadeInLeftBig" => "fadeInLeftBig",
        "fadeInRight" => "fadeInRight",
        "fadeInRightBig" => "fadeInRightBig",
        "fadeInUp" => "fadeInUp",
        "fadeInUpBig" => "fadeInUpBig",
        "flip" => "flip",
        "flipInX" => "flipInX",
        "flipInY" => "flipInY",
        "lightSpeedIn" => "lightSpeedIn",
        "lightSpeedOut" => "lightSpeedOut",
        "rotateIn" => "rotateIn",
        "rotateInDownLeft" => "rotateInDownLeft",
        "rotateInDownRight" => "rotateInDownRight",
        "rotateInUpLeft" => "rotateInUpLeft",
        "rotateInUpRight" => "rotateInUpRight",
        "slideInUp" => "slideInUp",
        "slideInDown" => "slideInDown",
        "slideInLeft" => "slideInLeft",
        "slideInRight" => "slideInRight",
        "zoomIn" => "zoomIn",
        "zoomInDown" => "zoomInDown",
        "zoomInLeft" => "zoomInLeft",
        "zoomInRight" => "zoomInRight",
        "zoomInUp" => "zoomInUp",
        "rollIn" => "rollIn",
    ),
    'description' => esc_html__('View animation effect at https://daneden.github.io/animate.css/', 'lucian')
));
vc_add_param("vc_column", array(
    "type" => "textfield",
    "class" => "",
    "heading" => esc_html__('Animation Delay', 'lucian'),
    "param_name" => "animation_delay",
    "value" => "0",
    "dependency" => array(
        "element" => "animation",
        "not_empty" => true,
    ),
    "description" => esc_html__('Delay before the animation starts. Ex: 200ms, 0.5s, 1s...', 'lucian')
));
vc_add_param('vc_column', array(
    'type' => 'dropdown',
    'heading' => __("Background Position", 'creativ'),
    'param_name' => 'background_position',
    'value' => array(
        'Center' => '',
        'Left' => 'left',
        'Left Bottom' => 'left bottom',
		'Right' => 'right',
		'Right Bottom' => 'right bottom',
        'None' => 'inherit',
    ),
    'group' => 'Design Options'
));
