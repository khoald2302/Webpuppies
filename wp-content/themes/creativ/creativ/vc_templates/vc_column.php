<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$atts['background_position'] = (!empty($atts['background_position'])) ? $atts['background_position'] : '';
$el_class = $style = $width = $css = $offset   = $overlay = $arrow = '';
if($atts['background_position']){
    $style = "style='background-position:".$atts['background_position']." ;'";

}

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

$wrapper_attributes = array();


/**
 * Animation
 */
if ($animation) {
	wp_enqueue_script( 'waypoints');
	$wrapper_attributes[] = 'style="animation-delay:'.$animation_delay.';-webkit-animation-delay:'.$animation_delay.';-o-animation-delay:'.$animation_delay.';"';
	$wrapper_attributes[] = 'data-zo-animation="'.$animation.'"';
	$css_classes[] = 'zo-animation';
}

/**
 * Background Overlay
 */
$html_overlay_row = '';
if($overlay == 'yes') {
	$html_overlay_row .= '<div class="zo-overlay-color" style="background-color: '.$overlay_color.'; "></div>';
	$css_classes[] = 'column-overlay-color';
}
/**
 * Row Arrow
 */
$html_arrow_row = '';
if($arrow == 'yes') {
	$html_overlay_row .= '<div class="zo-column-arrow" style="border-bottom-color:'.$arrow_color.'; "></div>';
	$css_classes[] = 'column-arrow-wrap';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '" '.$style.' >';
$output .= '<div class="wpb_wrapper">';
$output .= $html_overlay_row;
$output .= wpb_js_remove_wpautop( $content );
$output .= $html_arrow_row;
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo do_shortcode($output);
