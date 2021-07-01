<?php

/* Define the typography */
function zoltan_woocommerce_register_styles() {
	wp_enqueue_style( 'zoltan_style', get_template_directory_uri() . "style.css", array(), '1.0', 'all');
    wp_enqueue_style( 'poppins_google_font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', array(), false);
}

add_action('wp_enqueue_scripts', 'zoltan_woocommerce_register_styles');


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


/* Move cart in Header from AFTER NAVIGATION to AFTER SEARCH */
function remove_actions_parent_theme(){
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
	/*Remove Check Out button from cart widget*/
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
	/* Remove the sale badge in shop page*/
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
};

add_action( 'init', 'remove_actions_parent_theme', 1 );
add_action( 'storefront_header', 'storefront_header_cart', 41 );


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
		

?>