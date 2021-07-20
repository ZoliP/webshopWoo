<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="price-with-text">
<span>A fost </span>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>" >
	<del>
	 <?php echo wc_price(wc_get_price_to_display($product, array('price' => $product->get_regular_price())));?> 		
	</del>
</p>
<span>| Reducere 
	<?php echo wc_price(wc_get_price_to_display($product, array('price' => (float)$product->get_regular_price() - (float)$product->get_sale_price())));?> 	
</span>
</div>

<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>" >
	<ins>
		<?php echo wc_price(wc_get_price_to_display($product, array('price' => $product->get_sale_price())));?>
	</ins>
</p>
