<?php 



/*-----------------------------------------------------------------------------------

	WooCommerce Configuration

-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_woo_minicart_callback' ) ) {
	function sr_woo_minicart_callback() {
		global $wpdb;
		
		if ($_POST['wpml']) {
			global $sitepress;
			$sitepress->switch_lang($_POST['wpml'], true);
			//load_theme_textdomain( $domain, $path );
		}
		?>
       	<div class="menu-cart-content <?php echo esc_attr($style); ?>">
			<div class="cart-top">
				<h5 class="title-alt cart-title"><strong><?php _e( 'Your Cart', 'woocommerce' ); ?></strong></h5>
				<a href="#" class="close-cart"></a>
			</div>
			<?php woocommerce_mini_cart(); ?>
    	</div>
        <?php
		die(); // this is required to return a proper result
	}
}
add_action('wp_ajax_nopriv_sr_woo_minicart', 'sr_woo_minicart_callback'); 
add_action('wp_ajax_sr_woo_minicart', 'sr_woo_minicart_callback');



/*-----------------------------------------------------------------------------------

	WooCommerce Configuration

-----------------------------------------------------------------------------------*/
// Adds theme support for woocommerce 
add_theme_support('woocommerce');

// Disbale default woo css
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



/*-----------------------------------------------------------------------------------

	Register Shop Sidebar

-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_shop_sidebar' ) ) {
	function dani_shop_sidebar() {
		
		$titleSize = 'h5';
		if (get_option('_sr_widgettitlefont-size')) { $titleSize = get_option('_sr_widgettitlefont-size'); }
		
		register_sidebar( array(
			'name' => esc_html__( 'Shop Sidebar', 'dani' ),
			'id' => 'shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => "</div>",
			'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
			'after_title' => '</'.$titleSize.'>'
		) );
		
	}
	
}
add_action( 'widgets_init', 'dani_shop_sidebar' );



/*-----------------------------------------------------------------------------------*/

/*	Remove some default elements

/*-----------------------------------------------------------------------------------*/

// Remove Breadcrumb
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

//remove "Add to Cart" button on product listing page in WooCommerce 
function remove_add_to_cart_buttons() {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}
//add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );


// Remove "You may also like..." from cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10, 1 );


// Edit Price Output on loop
function sr_price_html( $price, $product ){
    $return = str_replace( '<ins>', '', $price );
    $return = str_replace( '</ins>', '', $return );
	return $return;
}
add_filter( 'woocommerce_get_price_html', 'sr_price_html', 100, 2 );


// Products per page
$shopcount = 12;
if (get_option('_sr_shopgridcount')) { $shopcount = intval(get_option('_sr_shopgridcount')); }
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$shopcount.';' ), 20 );

// Remove realted products
if (!get_option('_sr_shopsinglerelated')) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

// Remove Upsells "You may also like..."
if (!get_option('_sr_shopsingleupsells')) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
}

// Disable Reviews
if (!get_option('_sr_shopsinglereviews')) {
	add_filter( 'woocommerce_product_tabs', 'dani_woo_disablereviews', 98 );
		function dani_woo_disablereviews($tabs) {
		unset($tabs['reviews']);
		return $tabs;
	}
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
}


// grid options (result count + ordering)
add_action( 'woocommerce_before_shop_loop', 'dani_woo_wrapgridoptions_start', 2 );
if ( ! function_exists( 'dani_woo_wrapgridoptions_start' ) ) {
	function dani_woo_wrapgridoptions_start() { echo '<div class="grid-options clearfix">'; } 
}
add_action( 'woocommerce_before_shop_loop', 'dani_woo_wrapgridoptions_end', 52 );
if ( ! function_exists( 'dani_woo_wrapgridoptions_end' ) ) {
	function dani_woo_wrapgridoptions_end() { echo '</div>'; } 
}


// move meta on single product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 22 );


// wrap the info messages 
add_action( 'woocommerce_before_checkout_form', 'dani_wrap_forms_start', 1 );
function dani_wrap_forms_start() { echo '<div class="before-checkout clearfix">'; }
add_action( 'woocommerce_before_checkout_form', 'dani_wrap_forms_end', 12 );
function dani_wrap_forms_end() { echo '</div>'; }



/*-----------------------------------------------------------------------------------*/

/*	Mini Cart

/*-----------------------------------------------------------------------------------*/
function dani_woo_minicart_menu() {
	if (get_option('_sr_shopminicart')) {
	?>
    <div class="menu-cart">
    	<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="open-cart">
        	<span class="minicart-icon"></span>
            <span class="minicart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
      	</a>
    </div>
	<?php
	}
	}
	
function dani_woo_minicart_content($style) {
	if (get_option('_sr_shopminicart')) {
	
	if (get_option('_sr_shopminicartajax')) { $style .= ' ajax-cart'; }	
	?>
    <div class="menu-cart-content <?php echo esc_attr($style); ?>">
		<div class="cart-top">
        	<!--<h5 class="title-alt cart-title"><strong><?php _e( 'Your Cart', 'woocommerce' ); ?></strong></h5>-->
            <a href="#" class="close-cart"></a>
        </div>
		<?php woocommerce_mini_cart(); ?>
    </div>
	<?php
	}
	}
	
	
	

/*-----------------------------------------------------------------------------------*/

/*	SPACER FUNCTION

/*-----------------------------------------------------------------------------------*/
function dani_woo_getSpacer($pos) {
	$theId = dani_getId();
	$headerColor = 'text-light';
	if (get_post_meta($theId, '_sr_headerappearance', true) == 'custom') { $headerColor = get_post_meta($theId, '_sr_headercolor', true);
	} else { if (get_option('_sr_headercolor') ) { $headerColor = get_option('_sr_headercolor'); } }
	
	$showPagetitle = 1;
	if (get_post_meta($theId, '_sr_showpagetitle', true) == '0') { $showPagetitle = get_post_meta($theId, '_sr_showpagetitle', true); }
	
	$heroType = 'default';
	$heroType = get_post_meta($theId, '_sr_herobackground', true);
	
	if (is_account_page()) {
		$heroClass = 'account-hero';		
		$heroType = 'default';
		$showPagetitle = true;
	} else if (is_product_category() || is_product_tag() || is_product()) {
		$showPagetitle = false;
		$heroType = 'default';
	}
	
	
	/* TOP SPACER */
	$spacerTop = '<div class="spacer-big shop-spacer-top"></div>';
	if ( ($headerColor == 'text-light' || $headerColor == 'text-dark')) {
	} else {
		if (!$showPagetitle && $heroType == 'default') { $spacerTop = '<div class="spacer-big shop-spacer-top header-spacer"></div>'; }
	}
	if ($showPagetitle && $heroType == 'default') { $spacerTop = false; }
	if ($spacerTop && $pos == 'top') { echo $spacerTop; }
	/* TOP SPACER */
	
	/* BOTTOM SPACER */
	$spacerBottom = '<div class="spacer-big shop-spacer-bottom"></div>';
	
	if ($spacerBottom && $pos == 'bottom') { echo $spacerBottom; }
	/* BOTTOM SPACER */
	
}
	 
?>