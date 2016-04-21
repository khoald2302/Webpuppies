<?php
$params = array(
	array(
		'type' => 'dropdown',
		'heading' => __("Layout", 'creativ'),
		'param_name' => 'zo_layout',
		'value' => array(
			'Default' => '',
			'Progress 2' => 'zo-progress-2',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __("Background Linear Gradient", 'creativ'),
		'param_name' => 'bg_linear_gradient',
		'value' => array(
			'False' => '',
			'True' => 'true',
		),
		"dependency" => array(
			"element" => "zo_layout",
			"not_empty" => true,
		),
		"description" => esc_html__('Enable to set color background linear gradient', 'creativ')
	),
	array(
		'type' => 'colorpicker',
		'heading' => __("Background Linear Gradient - Color 1", 'creativ'),
		'param_name' => 'gb_color_1',
		"dependency" => array(
			"element" => "bg_linear_gradient",
			"not_empty" => true,
		)
	),
	array(
		'type' => 'colorpicker',
		'heading' => __("Background Linear Gradient - Color 2", 'creativ'),
		'param_name' => 'gb_color_2',
		"dependency" => array(
			"element" => "bg_linear_gradient",
			"not_empty" => true,
		)
	)
);
