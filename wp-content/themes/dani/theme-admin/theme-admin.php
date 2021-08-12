<?php

/*-----------------------------------------------------------------------------------

	Theme Admin

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Includes
/*-----------------------------------------------------------------------------------*/

// Adding Option Panel
require_once( get_template_directory() . "/theme-admin/option-panel/option-panel.php");

// Adding post/work meta boxes
require_once( get_template_directory() . "/theme-admin/functions/theme-postmeta.php");

// Theme general frontend features
require_once( get_template_directory() . "/theme-admin/functions/theme-general-features.php");

// Get the custom style
require_once( get_template_directory() . "/theme-admin/functions/theme-custom-styling.php");

// Get the custom fonts
require_once( get_template_directory() . "/theme-admin/functions/theme-custom-fonts.php");




/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_widgets_init' ) ) {
	function dani_widgets_init() {
		
		$titleSize = 'h5';
		if (get_option('_sr_widgettitlefont-size')) { $titleSize = get_option('_sr_widgettitlefont-size'); }
		
		register_sidebar( array(
			'name' => esc_html__( 'Footer', 'dani' ),
			'id' => 'footer-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => "</div>",
			'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
			'after_title' => '</'.$titleSize.'>'
		) );
		
		if(get_option('_sr_footerlayout') == 'column') {
			register_sidebar( array(
				'name' => esc_html__( 'Footer (center)', 'dani' ),
				'id' => 'footer-center',
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
		
			register_sidebar( array(
				'name' => esc_html__( 'Footer (right)', 'dani' ),
				'id' => 'footer-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
		}
		
		if(get_option('_sr_blogsidebar') || get_option('_sr_blogpostsidebar')) {
			register_sidebar( array(
				'name' => esc_html__( 'Blog Sidebar', 'dani' ),
				'id' => 'blog-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
		}
		
		if (get_option('_sr_headerposition') !== 'header-top' && get_option('_sr_menulayout') !== 'menu-open') {
			register_sidebar( array(
				'name' => esc_html__( 'Menu Widgets', 'dani' ),
				'id' => 'menu-widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
		}
	}
	
}
add_action( 'widgets_init', 'dani_widgets_init' );



/*-----------------------------------------------------------------------------------*/
/*	Custom Wordpress Login Logo
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_custom_login_logo' ) ) {
	function dani_custom_login_logo() {
	   if (get_option('_sr_loginlogo')) {
		echo '<style type="text/css">
			h1 a { 
				background-image: url('.esc_url(get_option('_sr_loginlogo')).') !important;
				background-position: center center !important;
			}
		</style>';
		}
	} 
}
add_action('login_head', 'dani_custom_login_logo');



/*-----------------------------------------------------------------------------------*/
/*	Comment Function
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_comment' ) ) {
    function dani_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        		
            <div class="comment-inner">
                <div class="user"><?php echo get_avatar( $comment, $size = '50'); ?></div>
                <div class="comment-content">
                	<div class="name"><h5 class="comment-name"><?php comment_author(); ?></h5><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
                    <span class="time"><?php comment_date('F j, Y'); ?></span>
                    <?php comment_text() ?>
                </div>
            </div>
            
            
        
    <?php
    }
}



/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_favicon' ) ) {
    function dani_favicon() {
    	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			if (get_option('_sr_favicon') != '') {
			echo '<link rel="shortcut icon" href="'. esc_url(get_option('_sr_favicon')) .'"/>'."\n";
			}
			else { ?>
			<link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/favicon.ico" />
			<?php }
		}
    }
    add_action('wp_head', 'dani_favicon');
}



/*-----------------------------------------------------------------------------------*/
/*	Passwort protection
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_password_form' ) ) {
	function dani_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<form class="protected-post-form" action="' . esc_html(get_option( 'siteurl' )) . '/wp-login.php?action=postpass" method="post">
		<div class="form-row clearfix">
			<label for="comment_form" class="req">'.esc_html__( "To view this protected post, enter the password below:", "dani" ).'</label>
			<div class="form-value"><input name="post_password" id="' . esc_attr($label) . '" type="password" size="20" /></div>
		</div>
		<div class="form-row clearfix"><input type="submit" name="Submit" value="' . esc_html__( "Submit", "dani" ) . '" /></div>
		</form>
		';
		echo $o;
	}
}
add_filter( 'the_password_form', 'dani_password_form' );




/*-----------------------------------------------------------------------------------*/
/*	Remove "Protected" from Title
/*-----------------------------------------------------------------------------------*/
function dani_title_trim($title) {
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'dani_title_trim');





/*-----------------------------------------------------------------------------------*/
/*	Custom function to limit the content
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_content' ) ) {
	function dani_content($contenttype,$limit,$readmore) {
		global $post;
		if ($contenttype == 'content') { $content = get_the_content(); }
		if ($contenttype == 'excerpt') { $content = get_the_excerpt(); }
		$content = preg_replace('/<img[^>]+./','', $content);
		$content = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $content );
		
		if ($readmore) { $redmorelink = '<a href="'.esc_url(get_permalink()).'" class="loadcontent color readmore" data-id="'.esc_attr(get_the_ID()).'" data-slug="'.esc__attr($post->post_name).'" data-type="post">'.esc_html($readmore).'</a>'; } else { $redmorelink = ''; }
		
		$content = explode(' ', $content, $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'... ';
		} else {
			$content = implode(" ",$content);
		}	
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		
		return $content.$redmorelink;
	}
}



/*-----------------------------------------------------------------------------------*/
/* Add meta datas for social share
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_get_social_metas' ) ) {
    function dani_get_social_metas() {
        
		$customcss = '';
        
        // get post id
		$postid = dani_getId();
		
		$og_title = get_the_title( $postid );
		$og_desc = get_post($postid);
		$og_desc = dani_content('excerpt', 30, '');
		$og_desc = strip_tags($og_desc);
		$og_url = get_permalink( $postid );
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'dani-thumb-big' );;
		
		if ($og_title) { echo '<meta property="og:title" content="'.esc_html($og_title).' - '.esc_html(get_bloginfo('name')).'" />'; echo "\n"; }
		echo '<meta property="og:type" content="website" />'; echo "\n";
		if ($og_url) { echo '<meta property="og:url" content="'.esc_url($og_url).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image" content="'.esc_url($og_img[0]).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image:width" content="'.esc_attr($og_img[1]).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image:height" content="'.esc_attr($og_img[2]).'" />'; echo "\n"; }
		if ($og_desc) { echo '<meta property="og:description" content="'.esc_html($og_desc).'" />'; echo "\n"; }
		echo "\n";
			
	
    }

}




/*-----------------------------------------------------------------------------------*/
/* Get Current title
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_getTitle' ) ) {
	function dani_getTitle() {
		
		$dani_titles = array();
		
		if (is_404()) {
			$dani_titles['tax'] = false;
			$dani_titles['title'] = esc_html__("Page not found", 'dani');
		} else if (is_tag()) {
			$dani_titles['tax'] = single_tag_title('', false);
			$dani_titles['title'] = esc_html__("Tag", 'dani');
		} else if (is_category()) {
			$dani_titles['tax'] = single_cat_title('', false);
			$dani_titles['title'] = esc_html__("Category", 'dani');
		} else if (is_search()) {
			$dani_titles['tax'] = get_search_query();
			$dani_titles['title'] = esc_html__("Search for", 'dani');
		} else if (is_tax('portfolio_category')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_category' ) , 'portfolio_category');
			$dani_titles['tax'] = $the_tax->name;
			$dani_titles['title'] = esc_html__("Portfolio", 'dani');
		} else if (is_tax('portfolio_tags')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_tags' ) , 'portfolio_tags');
			$dani_titles['tax'] = $the_tax->name;
			$dani_titles['title'] = esc_html__("Portfolio", 'dani');
		} else if (is_author()) {
			$dani_titles['tax'] = get_query_var('author_name');
			$dani_titles['title'] = esc_html__("Author", 'dani');
		} else if (class_exists('Woocommerce') && is_shop()) {
			$dani_titles['tax'] = false;
			$shopPage = get_post(get_option('woocommerce_shop_page_id'));
			$title = $shopPage->post_title;
			$dani_titles['title'] = $title;
		} else if (is_archive()) {
			$dani_titles['tax'] = single_month_title(' ', false);
			$dani_titles['title'] = esc_html__("Archive", 'dani');
		} else if (is_home()) {
			if (get_option('page_for_posts') > 0) {
				$blog = get_post(get_option('page_for_posts'));
				$title = $blog->post_title;
			} else {
				$title = esc_html__("Home", 'dani');
			}
			$dani_titles['tax'] = false;
			$dani_titles['title'] = $title;
		} else {
			$dani_titles['tax'] = false;
			$dani_titles['title'] = get_the_title();
		}
		
		return $dani_titles;
	}
}





/*-----------------------------------------------------------------------------------*/
/*	Customize Comment form
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'dani_comment_fields' ) ) {
	function dani_comment_fields($fields) {
		$fields =  array(
			'author' => '<div class="form-row column one-third">
						<label for="author" class="req">'.esc_html__('Name', 'dani').' <abbr title="required" class="required">*</abbr></label>
						<input type="text" name="author" class="author" id="author" value="" />
						</div>
						 ',
			'email'  => '<div class="form-row column one-third">
						 <label for="email" class="req">'.esc_html__('Email', 'dani').' <abbr title="required" class="required">*</abbr></label>
						 <input type="text" name="email" class="email" id="email" value="" />
						 </div>',
			'url'    => '<div class="form-row column one-third last-col">
						 <label for="url">'.esc_html__('Website', 'dani').'</label>
						 <input type="text" name="url" class="url" id="url" value=""/>
						 </div>
						 <div class="clear"></div>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields','dani_comment_fields');

$dani_comments_defaults = array( 
	'comment_field' => '<div class="form-row">
						<label for="comment_form">'.esc_html__('Your Comment', 'dani').' <abbr title="required" class="required">*</abbr></label>
						<textarea name="comment" class="comment_form" id="comment_form" rows="15" cols="50"></textarea>
						</div>',
	'comment_notes_before'  => '',
	'comment_notes_after'  => '',
	'title_reply'          => '<strong>'.esc_html__( 'Leave a comment', 'dani' ).'</strong>',
	'title_reply_to'       => esc_html__( 'Leave a Comment to %s', 'dani' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'dani' ),
	'label_submit'         => esc_html__( 'Post Comment', 'dani' )
);
	



/*-----------------------------------------------------------------------------------*/
/*	Get attachement id from src
/*-----------------------------------------------------------------------------------*/
function dani_get_attachment_id_from_src( $url ) {
    $post_id = attachment_url_to_postid( $url );

    if ( ! $post_id ){
        $dir = wp_upload_dir();
        $path = $url;
        if ( 0 === strpos( $path, $dir['baseurl'] . '/' ) ) {
            $path = substr( $path, strlen( $dir['baseurl'] . '/' ) );
        }

        if ( preg_match( '/^(.*)(\-\d*x\d*)(\.\w{1,})/i', $path, $matches ) ){
            $url = $dir['baseurl'] . '/' . $matches[1] . $matches[3];
            $post_id = attachment_url_to_postid( $url );
        }
    }

    return (int) $post_id;
}


/*-----------------------------------------------------------------------------------*/
/*	Attachement Infos
/*-----------------------------------------------------------------------------------*/
function dani_get_attachment_infos( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}




/*-----------------------------------------------------------------------------------*/
/*	Google Map  
/*-----------------------------------------------------------------------------------*/
function dani_googleMap($latlong, $text, $pin, $style, $id, $class, $color=null, $apikey, $zoom) {
    	
		static $mapId = 1;
		if (!$latlong) { $latlong = '-33.86938,151.204834'; }
		if (!$pin) { $pin = get_template_directory_uri().'/files/images/map-pin.png'; }
		if (!$id) { $id = $mapId; }
		
		$mapTypeId = "mapTypeId: google.maps.MapTypeId.ROADMAP";
		$mapcolor = '';	
		if ($color == 'greyscale') {
			$mapcolor = 'styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],';	
		} else if ($color == 'satelite') {
			$mapTypeId = "mapTypeControl: false,mapTypeId: google.maps.MapTypeId.SATELLITE";
		}
		
		if (!defined('map_check')) {
		  // first time code
		  if ($apikey) { $mapAdd = "?key=".$apikey; } else { $mapAdd = ''; }
		  $incScript = '<script type="text/javascript" src="//maps.google.com/maps/api/js'.esc_js($mapAdd).'"></script>';
		  define('map_check',true);
		} else {
		  // not the first time code
		  $incScript = '';
		}
		
		if ($text && $text !== '') {
			$text = str_replace(chr(13),'<br>',$text);
        	$text = str_replace(chr(10),'',$text);
			$text = "var contentString = '".addslashes($text)."'; var infowindow = new google.maps.InfoWindow({ content: contentString });";
		} else {
			$text = '';	
		}
		
		if (strpos($pin, '@2x') !== false) {
			$imageInfo = wp_get_attachment_image_src( dani_get_attachment_id_from_src($pin), 'full' );	
			$w = $imageInfo[1]/2;
			$h = $imageInfo[2]/2;
			$pinOutput = 'var image = new google.maps.MarkerImage("'.esc_html($pin).'", null, null, null, new google.maps.Size('.$w.','.$h.'));';
		} else { 
			$pinOutput = 'var image = "'.esc_html($pin).'";';
		}
	
		return '<div id="map'.esc_attr($id).'" class="google-map '.esc_attr($class).'" style="'.$style.'"></div>
        '.$incScript.'
        <script type="text/javascript">
			function mapinitialize'.esc_js($id).'() {
				
				var latlng = new google.maps.LatLng('.$latlong.');
				var myOptions = {
					zoom: '.esc_js($zoom).',
					center: latlng,
					scrollwheel: false,
					scaleControl: false,
					disableDefaultUI: false,
					streetViewControl: false,
					overviewMapControl: false,
					panControl: false,
					'.$mapcolor.'
					'.$mapTypeId.'
				};
				var map = new google.maps.Map(document.getElementById("map'.$id.'"),myOptions);
				
				'.$pinOutput.'
				var marker = new google.maps.Marker({
					map: map, 
					icon: image,
					position: map.getCenter()
				});
				
				'.$text.'
							
				google.maps.event.addListener(marker, "click", function() {
				  infowindow.open(map,marker);
				});
								
					
			}
			mapinitialize'.esc_js($id).'();
		</script>';
		
	$mapId++;
}

?>