<?php

/* Define the typography */
function zoltan_woocommerce_register_styles() {
	wp_enqueue_style( 'zoltan_style', get_template_directory_uri() . "style.css", array(), '1.0', 'all');
    wp_enqueue_style( 'poppins_google_font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', array(), false);
}

add_action('wp_enqueue_scripts', 'zoltan_woocommerce_register_styles');



function zoltan_woocommerce_register_script() {
	wp_enqueue_script( 'zoltan_script', get_template_directory_uri() . "/js/javascript.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'zoltan_woocommerce_register_script');




/* Define the size of the logo */
function zoltan_woocommerce_theme_support(){
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	$logo_width  = 240;
	$logo_height = 40;

	add_theme_support(
		'custom-logo',
		array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);
}

add_action( 'after_setup_theme', 'zoltan_woocommerce_theme_support' );



/* Copied from themes/storefront/inc/woocommerce/storefront-woocommerce-template-functions.php */
/* Modify cart in Header */
if ( ! function_exists( 'storefront_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" >
				<?php /* translators: %d: number of items in cart */ ?>
				<!-- <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?>  -->
				<span class="count">				
					<?php echo wp_kses_data( sprintf( WC()->cart->get_cart_contents_count() ) ); ?>
				</span>
			</a>
			<?php
	}
}



/*Copied from plugins/woocommerce/includes/wc-template-functions.php*/
if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {
	
	/**
	 * Output the view cart button.
	 */
	function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html__( 'VEZI COS', 'woocommerce' ) . '</a>';
	}
}



/*Advanced Woo Search*/
function zoltan_advanced_woo_search(){
	//copied from the Advanced Woo Search documentation
	 if ( function_exists( 'aws_get_search_form' ) ) { aws_get_search_form(); } 
}

add_action( 'storefront_header', 'zoltan_advanced_woo_search', 40 );



function zoltan_free_shipping_at_more_than_49() {
	echo '
	<div class="col-full header-before"> 
		<a href="http://localhost/webshopWoo/despre-livrare/">
			<b>TRANSPORT GRATUIT</b> LA COMEZNI DE MINIM 49 DE LEI
		</a>
	</div>
	';
}

add_action('storefront_before_header','zoltan_free_shipping_at_more_than_49' );



function zoltan_remove_actions_parent_theme(){
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
	/*Remove Check Out button from cart widget*/
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
	/* Remove the sale badge in shop page*/
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
	/*Remove result count and sorting after the product items*/
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
	/* Remove Sale! Badge in Single Product Summary Page */
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

	//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
};

add_action( 'init', 'zoltan_remove_actions_parent_theme', 1 );
add_action( 'storefront_header', 'storefront_header_cart', 41 );


/*Move stock status before the product title */

// function zoltan_move_stock_before_title(){
	
// 	global $product;

// 	if ( ! $product->is_purchasable() ) {
// 		return;
// 	}

// 	if( $product->is_type( 'simple' ) ){
		
// 		$availability = $product->get_availability();
// 		echo  ('<p class="stock_status">' . $availability['availability'] . '</p>');
	
// 	} elseif( $product->is_type( 'variable' ) ){
// 	   // Product has variations
// 	   echo 'stock-ul variantei produsului';
// 	   echo '<br>';
// 	   $variations = $product->get_available_variations();
//     	foreach($variations as $variation){
//         	$variation_id = $variation['variation_id'];
//          	$variation_obj = new WC_Product_variation($variation_id);
//          	$stock = $variation_obj->get_availability();
    	
// 			 echo ($stock['availability'] . ' ');
// 		}
// 	}

// }

// add_action('woocommerce_single_product_summary', 'zoltan_move_stock_before_title',4);




/*Social Icons section in Footer BEFORE */
function zoltan_before_footer(){
	echo 
	'<div class="footer-before">
		<ul class="col-full">
			<li>
				<a href="https://www.facebook.com" target=_blank><i class="fab fa-facebook-f"></i></a>
			</li>
			<li>
				<a href="https://youtube.com" target=_blank><i class="fab fa-youtube"></i></a>
			</li>
			<li>
				<a href="https://www.instagram.com" target=_blank><i class="fab fa-instagram"></i></a>
			</li>
		</ul>  <!-- #col-full -->
	</div> <!-- #footer-before -->';
}

add_action( 'storefront_before_footer', 'zoltan_before_footer');


/*Copied from themes/storefron/inc/storefront-template-functions.php*/
if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>
		<?php echo '<p> Numar de inregistrare in registrul general de evidenta a prelucrarii datelor cu caracter personal al ANSPDCP:....</p>'?>
		<?php echo '<p> Specificatiile tehnice au caracter informativ si nu pot fi garantate ca fiind exacte. Phone Protectors face eforturi permanente pentru a pastra acuratetea informatiilor din aceasta pagina. Rareori acestea pot contine inadvertente: fotografia are caracter informativ si poate contine accesorii neincluse in pachetele standard, unele specificatii pot fi modificate de catre producator fara preaviz sau pot contine erori de operare. Toate promotiile prezente in site sunt valabile in limita stocului disponibil.</p>'?>
		</div><!-- .site-info -->
		<?php
	}
}


/* Change the breadcrumb home text from 'Home' to PhoneProtectors */
 function zoltan_change_breadcrumb_home_text() {
	
 	return array(
 		'delimiter'   => ' &#47; ',
 		'wrap_before' => '<div class="col-full"><div class="col-full"><nav class="woocommerce-breadcrumb" aria-label="breadcrumbs">',
 		'wrap_after'  => '</nav></div></div>',
 		'before'      => '',
 		'after'       => '',
 		'home'        => 'PhoneProtectors'
 	);
	
 }

 add_filter( 'woocommerce_breadcrumb_defaults', 'zoltan_change_breadcrumb_home_text',20);

 
 
/* Added wishlist plugin position*/
function zoltan_add_to_wishlist_button_position(){
	 echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
	
add_action('woocommerce_before_shop_loop_item','zoltan_add_to_wishlist_button_position',10);



/*Copied from plugins/woocommerce/include/wc-template-functions.php*/
/*Modify the input for sorting items */
if ( ! function_exists( 'woocommerce_catalog_ordering' ) ) {

	/**
	 * Output the product sorting options.
	 */
	function woocommerce_catalog_ordering() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}
		$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
		$catalog_orderby_options = apply_filters(
			'woocommerce_catalog_orderby',
			array(
				'menu_order' => __( 'implicit', 'woocommerce' ),
				'popularity' => __( 'popularitate', 'woocommerce' ),
				'rating'     => __( 'evaluare medie', 'woocommerce' ),
				'date'       => __( 'recent', 'woocommerce' ),
				'price'      => __( 'preț ascendent', 'woocommerce' ),
				'price-desc' => __( 'preț descendent', 'woocommerce' ),
			)
		);

		$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		$orderby = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;
		// phpcs:enable WordPress.Security.NonceVerification.Recommended

		if ( wc_get_loop_prop( 'is_search' ) ) {
			$catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( ! $show_default_orderby ) {
			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( ! wc_review_ratings_enabled() ) {
			unset( $catalog_orderby_options['rating'] );
		}

		if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
			$orderby = current( array_keys( $catalog_orderby_options ) );
		}

		wc_get_template(
			'loop/orderby.php',
			array(
				'catalog_orderby_options' => $catalog_orderby_options,
				'orderby'                 => $orderby,
				'show_default_orderby'    => $show_default_orderby,
			)
		);
	}
}


/*  Hide other shipping methods when free shipping is active.*/
function zoltan_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'zoltan_hide_shipping_when_free_is_available', 100 );


/*Show Sidebar only on the SHOP page*/
function zoltan_remove_storefront_sidebar_in_single_product(){
	if ( ! is_shop() ) {
		remove_action('storefront_sidebar','storefront_get_sidebar');
	}
}

add_action( 'get_header', 'zoltan_remove_storefront_sidebar_in_single_product', 10 );





// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
