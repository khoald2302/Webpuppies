<?php
/**
 * New button implementation
 * array_merge is needed due to merging other shortcode data into params.
 * @since 4.5
 */
global $pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
    array(
        'include_only_regex' => '/^(type|icon_\w*)/',
        // we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
    ), array(
        'element' => 'add_icon',
        'value' => 'true',
    )
);
// populate integrated vc_icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
    foreach ( $icons_params as $key => $param ) {
        if ( is_array( $param ) && ! empty( $param ) ) {
            if ( $param['param_name'] == 'i_type' ) {
                // append pixelicons to dropdown
                $icons_params[ $key ]['value'][ __( 'Pixel', 'creativ' ) ] = 'pixelicons';
            }
            if ( isset( $param['admin_label'] ) ) {
                // remove admin label
                unset( $icons_params[ $key ]['admin_label'] );
            }

        }
    }
}

//Linear Icons
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
    foreach ( $icons_params as $key => $param ) {
        if ( is_array( $param ) && ! empty( $param ) ) {
            if ( $param['param_name'] == 'i_type' ) {
                // append pixelicons to dropdown
                $icons_params[ $key ]['value'][ __( 'Linearicons', 'creativ' ) ] = 'linearicons';
            }
            if ( isset( $param['admin_label'] ) ) {
                // remove admin label
                unset( $icons_params[ $key ]['admin_label'] );
            }

        }
    }
}

$params = array_merge(
    array(
        array(
            'type' => 'textfield',
            'heading' => __( 'Text Button', 'creativ' ),
            'save_always' => true,
            'param_name' => 'title',
            // fully compatible to btn1 and btn2
            'value' => __( 'Text on the button', 'creativ' ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => __( 'URL (Link)', 'creativ' ),
            'param_name' => 'link',
            'description' => __( 'Add link to button.', 'creativ' ),
            // compatible with btn2 and converted from href{btn1}
        ),
		
		/* Vu edit */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Button Type", 'creativ'),
            "param_name" => "button_type",
            "value" => array(
                'Button Default' => 'btn btn-default',
                'Button Primary' => 'btn btn-primary',
                'Button Transparent' => 'btn btn-transparent',
                'Button Gray' => 'btn btn-gray',
                'Button Gray Transparent' => 'btn btn-gray btn-transparent',
            )
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Text Transform", 'creativ'),
            "param_name" => "text_transform",
            "value" => array(
                'none' => 'none',
                'Uppercase' => 'uppercase',
                'Lowercase' => 'lowercase',
                'Capitalize' => 'capitalize',
            )
        ),
		array(
            'type' => 'textfield',
            'heading' => __( 'Padding', 'creativ' ),
            'param_name' => 'padding',
            'description' => __( 'Ex: 15px 35px 15px 35px.', 'creativ' ),
        ),
		array(
            'type' => 'dropdown',
            'heading' => __( 'Letter Spacing', 'creativ' ),
            'param_name' => 'letter_spacing',
            'value' => array(
                __( 'Default', 'creativ' ) => '',
                __( 'Letter Spacing: 50', 'creativ' ) => '0.05em',
                __( 'Letter Spacing: 100', 'creativ' ) => '0.1em',
                __( 'Letter Spacing: 200', 'creativ' ) => '0.2em',
                __( 'Letter Spacing: 300', 'creativ' ) => '0.3em',
                __( 'Letter Spacing: 400', 'creativ' ) => '0.4em',
                __( 'Letter Spacing: 500', 'creativ' ) => '0.5em'
            )
        ),
		array(
            'type' => 'textfield',
            'heading' => __( 'Font Size', 'creativ' ),
            'param_name' => 'font_size',
            'description' => __( 'Ex: 15px', 'creativ' ),
        ),
		array(
            'type' => 'textfield',
            'heading' => __( 'Radius', 'creativ' ),
            'param_name' => 'radius',
            'description' => __( 'Ex: 15px 35px 15px 35px.', 'creativ' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Alignment', 'creativ' ),
            'param_name' => 'align',
            'description' => __( 'Select button alignment.', 'js_comopser' ),
            // compatible with btn2, default left to be compatible with btn1
            'value' => array(
                __( 'Inline', 'creativ' ) => 'inline',
                // default as well
                __( 'Left', 'creativ' ) => 'left',
                // default as well
                __( 'Right', 'creativ' ) => 'right',
                __( 'Center', 'creativ' ) => 'center'
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Set full width button?', 'creativ' ),
            'param_name' => 'button_block',
            'dependency' => array(
                'element' => 'align',
                'value_not_equal_to' => 'inline',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add icon?', 'creativ' ),
            'param_name' => 'add_icon',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon Alignment', 'creativ' ),
            'description' => __( 'Select icon alignment.', 'creativ' ),
            'param_name' => 'i_align',
            'value' => array(
                __( 'Left', 'creativ' ) => 'left',
                // default as well
                __( 'Right', 'creativ' ) => 'right',
            ),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ),
        ),
    ),
    $icons_params,
    array(
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'creativ' ),
            'param_name' => 'i_icon_pixelicons',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'source' => $pixel_icons,
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'pixelicons',
            ),
            'description' => __( 'Select icon from library.', 'creativ' ),
        ),
    ),
    array(
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'creativ' ),
            'param_name' => 'i_icon_linearicons',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'linearicons',
            ),
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'linearicons',
            ),
            'description' => __( 'Select icon from library.', 'creativ' ),
        ),
    ),
    array(
        vc_map_add_css_animation( true ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'creativ' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'creativ' ),
        ),
    )
);
/**
 * @class WPBakeryShortCode_VC_Btn
 */
vc_map( array(
    'name' => __( 'Button', 'creativ' ),
    'base' => 'vc_btn',
    'icon' => 'icon-wpb-ui-button',
    'category' => array(
        __( 'Content', 'creativ' ),
    ),
    'description' => __( 'Eye catching button', 'creativ' ),
    'params' => $params,
    'js_view' => 'VcButton3View',
    'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
