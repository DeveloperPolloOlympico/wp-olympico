<?php 


/*-----------------------------------------------------------------------------------

	Theme Setup

-----------------------------------------------------------------------------------*/
$dani_version = '1.6'; 


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width
/*-----------------------------------------------------------------------------------*/
if( ! isset( $content_width ) ) $content_width = 1200;




/*-----------------------------------------------------------------------------------*/
/*	Custom Title Output
/*-----------------------------------------------------------------------------------*/
function dani_theme_name_wp_title() {
	if ( is_feed() ) { return $title; }
	
	global $page, $paged;
	
	$titles = dani_getTitle();
	if ($titles['tax']) { $pagetitle =  $titles['tax']; } else { $pagetitle =  $titles['title']; }
	
	$title = $pagetitle;
	
	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " - " . sprintf( esc_html__( 'Page %s', 'dani' ), max( $paged, $page ) );
	}
	
	// Add the info name
	$title .= ' - '.get_bloginfo( 'name');

	// Add the description
	$title .= " - ".get_bloginfo( 'description', 'display' );

	return esc_html($title);
}
add_filter('pre_get_document_title', 'dani_theme_name_wp_title');




/*-----------------------------------------------------------------------------------*/
/*	Setup theme defaults
/*-----------------------------------------------------------------------------------*/
function dani_theme_setup() {
	
	/* Load Text Domain */
	load_theme_textdomain('dani', get_template_directory(). '/languages');

	/* Theme Supports */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
 	add_theme_support( 'title-tag' );
	
	/* Theme images sizes */
	add_image_size( 'dani-thumb-small', 420);
	add_image_size( 'dani-thumb-small-crop', 420, 280, true );
	add_image_size( 'dani-thumb-medium', 600);
	add_image_size( 'dani-thumb-medium-crop', 600, 400, true );
	add_image_size( 'dani-thumb-big', 900);
	add_image_size( 'dani-thumb-big-crop', 900, 600, true );
	add_image_size( 'dani-thumb-ultra', 1290);
	add_image_size( 'dani-thumb-ultra-crop', 1290, 820, true);

	/* Post Formats */
	add_theme_support('post-formats', array('image','gallery','video','audio','quote'));
	
	/* Add Menus */
	add_action('init', 'dani_register_menu');

}
add_action( 'after_setup_theme', 'dani_theme_setup' );




/*-----------------------------------------------------------------------------------*/
/*	Register Custom Menus 
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_register_menu' ) ) {
    function dani_register_menu() {
		register_nav_menus(
			array(
				'primary-menu' => esc_html__('Primary Menu', 'dani' )
			)
		);	
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue front-end scripts
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_enqueue_scripts' ) ) {
    function dani_enqueue_scripts() {
		global $dani_version;


		// Register scripts
		wp_register_script('dani-plugins', get_template_directory_uri() . '/files/js/plugins.js', array('jquery'), $dani_version, true);
		wp_register_script('isotope', get_template_directory_uri() . '/files/js/jquery.isotope.min.js', array('jquery'), '2.2', true);
		wp_register_script('imagesloaded', get_template_directory_uri() . '/files/js/jquery.imagesloaded.min.js', array('jquery'), '3.1.8', true);
		wp_register_script('tweenmax', get_template_directory_uri() . '/files/js/tweenMax.js', array('jquery'), '1.16.1', true);
		wp_register_script('lightcase', get_template_directory_uri() . '/files/js/jquery.lightcase.min.js', array('jquery'), '1.4.5', true);
		wp_register_script('mediaelement', get_template_directory_uri() . '/files/js/mediaelement-and-player.min.js', array('jquery'), '2.1.0', true);
		wp_register_script('phatvideo', get_template_directory_uri() . '/files/js/jquery.min.phatvideobg.js', array('jquery'), '1.0', true);
		wp_register_script('fitvids', get_template_directory_uri() . '/files/js/jquery.fitvids.min.js', array('jquery'), '1.0', true);
		wp_register_script('bgparallax', get_template_directory_uri() . '/files/js/jquery.backgroundparallax.min.js', array('jquery'), '2.3', true);
		wp_register_script('owlcarousel', get_template_directory_uri() . '/files/js/jquery.owl.carousel.min.js', array('jquery'), '2.0', true);
		wp_register_script('smartscroll', get_template_directory_uri() . '/files/js/jquery.smartscroll.min.js', array('jquery'), '1.0', true);
		wp_register_script('stickykit', get_template_directory_uri() . '/files/js/jquery.sticky-kit.min.js', array('jquery'), '1.1.2', true);
		wp_register_script('dani-script', get_template_directory_uri() . '/files/js/script.js', array('jquery'), $dani_version, true);
		
		// Register style
		wp_register_style('dani-wp-style', get_stylesheet_uri() , 'theme-style', $dani_version);
		wp_register_style('dani-default-style', get_template_directory_uri() . '/files/css/style.css', 'default-style', $dani_version);
		wp_register_style('isotope', get_template_directory_uri() . '/files/css/isotope.css', 'isotope-style', '1.0');
		wp_register_style('lightcase', get_template_directory_uri() . '/files/css/lightcase.css', 'lightcase-style', '1.0');
		wp_register_style('mediaelement', get_template_directory_uri() . '/files/css/mediaelementplayer.css', 'mediaelement-style', '1.0');
		wp_register_style('owlcarousel', get_template_directory_uri() . '/files/css/owl.carousel.css', 'owlcarousel-style', '1.0');
		wp_register_style('fontawesome', get_template_directory_uri() . '/files/css/font-awesome.min.css', 'fontawesome-style', '3.2.1');
		wp_register_style('ionicons', get_template_directory_uri() . '/files/css/ionicons.css', 'ionicons-style', '3.2.1');
		wp_register_style('dani-mqueries-style', get_template_directory_uri() . '/files/css/mqueries.css', 'mqueries-style', $dani_version);


		// Enqueue scripts
    	wp_enqueue_script('dani-plugins');
    	wp_enqueue_script('tweenmax');
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('isotope');
		wp_enqueue_script('mediaelement'); 
    	wp_enqueue_script('phatvideo');
    	wp_enqueue_script('fitvids');
    	wp_enqueue_script('lightcase');
    	wp_enqueue_script('bgparallax');
    	wp_enqueue_script('owlcarousel');
		wp_enqueue_script('smartscroll');
		wp_enqueue_script('stickykit');
		wp_enqueue_script('comment-reply');
		
		// add variables to script
		$settings_vars = array('ajaxurl' => admin_url('admin-ajax.php'));
		// add current lang for ajax requests
		if (function_exists('icl_object_id')) { 
			global $sitepress;
			$settings_vars["wpml"] = $sitepress->get_current_language();
		}
		wp_localize_script( 'dani-script', 'srvars', $settings_vars );
    	wp_enqueue_script('dani-script');
		
		// Enqueue styles
		wp_enqueue_style('dani-default-style');
		wp_enqueue_style('lightcase');
		wp_enqueue_style('owlcarousel');
		wp_enqueue_style('fontawesome');
		wp_enqueue_style('ionicons');
		wp_enqueue_style('mediaelement');
		wp_enqueue_style('isotope');
		
		// include custom woocommerce style if woocommerce is activated
		if (class_exists('Woocommerce')) {
			wp_register_style('dani-woo-style', get_template_directory_uri() . '/woocommerce/files/css/woocommerce-dani.css', 'woo-style', $dani_version);
			wp_register_script('dani-woo-js', get_template_directory_uri() . '/woocommerce/files/js/woocommerce-dani.js', 'jquery', $dani_version, true);  
			wp_enqueue_style('dani-woo-style'); 
			wp_enqueue_script('dani-woo-js'); 
		}
		
		if (get_option('_sr_appearance') == 'dark') { 
			wp_register_style('dani-dark-style', get_template_directory_uri() . '/files/css/dark-style.css', 'dark-style', $dani_version);
			wp_enqueue_style('dani-dark-style');
			if (class_exists('Woocommerce')) {
			wp_register_style('dani-woo-dark', get_template_directory_uri() . '/woocommerce/files/css/woocommerce-dani-dark.css', 'woo-style', $dani_version);
			wp_enqueue_style('dani-woo-dark'); 
			}
		}
		
		wp_enqueue_style('dani-wp-style');
				
		// include mqueries if true
		if (get_option('_sr_responsive')) { 
			wp_enqueue_style('dani-mqueries-style');
		}
				
		// add custom css comming from individual settings/options
		$customCss = dani_custom_style_logo().dani_custom_style_typography().dani_custom_style_color().stripslashes(get_option('_sr_customcss'));
		wp_add_inline_style( 'dani-wp-style', $customCss );
		    	
    }
}
add_action('wp_enqueue_scripts', 'dani_enqueue_scripts');





/*-----------------------------------------------------------------------------------*/
/*	Include Theme Admin & WooCommerce support
/*-----------------------------------------------------------------------------------*/
// Adding Theme Admin
require_once( get_template_directory() . "/theme-admin/theme-admin.php");

// Adding WooComemrce Support
if (class_exists('Woocommerce')) { require_once( get_template_directory() . "/woocommerce/woo-config.php"); }





/*-----------------------------------------------------------------------------------*/
/*	Plugin Activation
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/plugin-activation/plugin-activation.php');

add_action( 'tgmpa_register', 'dani_plugin_activation' );
function dani_plugin_activation() {
	
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> esc_html__('Dani Core', 'dani' ), // The plugin name
			'slug'     				=> 'dani-core', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugin-activation/plugins/dani-core.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Revolution Slider', 'dani' ), // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugin-activation/plugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'      => esc_html__('Contact Form 7', 'dani' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce', 'dani' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		)
	);
	
	
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'dani',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug' 		=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'dani' ),
			'menu_title'                       			=> esc_html__( 'Install Plugins', 'dani' ),
			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'dani' ), // %1$s = plugin name
			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'dani' ),
			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'dani' ),
			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'dani' ),
			'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'dani' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}



/*-----------------------------------------------------------------------------------*/
/*	NEEDED SCRIPTS
/*-----------------------------------------------------------------------------------*/
function dani_theme_scripts() {
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'dani_theme_scripts');



/*-----------------------------------------------------------------------------------*/

/* Your Custom Functions
/* Place your custom functions below

/*-----------------------------------------------------------------------------------*/



function exclude_category_home( $query ) {
if ( $query->is_home ) {
$query->set( 'cat', '-41' );
}
return $query;
}
 
add_filter( 'pre_get_posts', 'exclude_category_home' );


add_shortcode('searchform', 'rlv_search_form'); 
function rlv_search_form() {
    $url = get_site_url();
    $form = <<<EOH
<form role="search" method="get" id="searchform" class="searchform" action="https://polloolympico.com/web/puntos-de-venta/">
<label class="screen-reader-text" for="s">Search for:</label>
<input type="text" value="Haz tu busqueda aquí" onfocus='if(this.value=="Haz tu busqueda aquí"){this.value="";}' />



</form>
EOH;
    return $form;
}


?>