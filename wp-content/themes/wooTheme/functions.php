<?php

/* Define the typography */
function zoltan_woocommerce_add_styles() {
    wp_enqueue_style( 'poppins_google_font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', array(), false);
}

add_action('wp_enqueue_scripts', 'zoltan_woocommerce_add_styles');

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

function remove_actions_parent_theme(){
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
};

add_action( 'init', 'remove_actions_parent_theme', 1 );

add_action( 'storefront_header', 'storefront_header_cart', 41 );
?>