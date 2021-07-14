<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'Cod produs:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

<!-- <?php 

 	$ancestor_cat_ids = get_ancestors( $product->get_id(), 'category');
	var_dump($product->get_id());
	var_dump($ancestor_cat_ids);
	$highest_ancestor = $ancestor_cat_ids[count($ancestor_cat_ids) - 1];
	var_dump($highest_ancestor);

?> -->
<!-- <?php
	$queried_object = get_queried_object();
	$parent = $queried_object->term_id;
	$prod = $product -> get_category_ids();
	var_dump($prod);
	$categories = get_term_children( $prod, 'product_cat' ); 
		if ( $categories && ! is_wp_error( $category ) ) : 
			echo '<ul>';
			foreach($categories as $category) :
				$term = get_term( $category, 'product_cat' );
				echo '<li>';
				echo '<a href="'.get_term_link($term).'" >';
				echo $term->name;
				echo '</a>';
				echo '</li>';
			endforeach;
			echo '</ul>';
		endif;
?> -->

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
