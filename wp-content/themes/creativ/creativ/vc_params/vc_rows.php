<?php
/**
 * Add row params
 *
 * @author Fox
 * @since 1.0.0
 */

vc_remove_param("vc_row", 'gap');
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Animation", 'creativ'),
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
	'description' => esc_html__('View animation effect at https://daneden.github.io/animate.css/', 'creativ')
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__('Animation Delay', 'lucian'),
	"param_name" => "animation_delay",
	"value" => "0",
	"dependency" => array(
		"element" => "animation",
		"not_empty" => true,
	),
	"description" => esc_html__('Delay before the animation starts. Ex: 200ms, 0.5s, 1s...', 'creativ')
));


vc_add_param('vc_row', array(
	'type' => 'dropdown',
	'heading' => esc_html__("Overlay Color", 'creativ'),
	'param_name' => 'overlay_row',
	'value' => array(
		'No' => '',
		'Yes' => 'yes'
	),
	'group' => 'Design Options'
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __('Color', 'creativ'),
	"param_name" => "overlay_color",
	'group' => 'Design Options',
	"dependency" => array(
		"element" => "overlay_row",
		"value" => array(
			"yes"
		)
	),
	"description" => ''
));
vc_add_param('vc_row', array(
	'type' => 'dropdown',
	'heading' => __("Background Style", 'creativ'),
	'param_name' => 'background_fixed',
	'value' => array(
		'Default' => '',
		'Image / Fixed' => 'img_fixed'
	),
	'group' => 'Design Options',
	'description' => __("Select the kind of background would you like to set for this row.", 'creativ')
));
