<?php
global $product;
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<h3 itemprop="name" class="product_title entry-title"><?php the_title(); ?><?php echo ' - '.$product->get_price_html(); ?></h3>
