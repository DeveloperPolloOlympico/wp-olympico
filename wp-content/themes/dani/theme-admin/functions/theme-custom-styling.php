<?php

/*-----------------------------------------------------------------------------------

	CUSTOM STYLING OPTIONS

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Logo Height Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_custom_style_logo' ) ) {
	function dani_custom_style_logo() {
		
		$return = '';
		
		$logoDark = get_option('_sr_logo');
		$logoLight = get_option('_sr_logo_light');
		
		if ($logoDark || $logoLight) {
			$logoId =  dani_get_attachment_id_from_src($logoDark);
			$logodata = wp_get_attachment_image_src( $logoId, "full" );
			$logoHeight = $logodata[2];
			
			if (get_option('_sr_logo_height') == 'custom' && get_option('_sr_customlogoheight')) {
				$logoHeight = intval(get_option('_sr_customlogoheight'));
			}
				
			$return .= 'header #logo { height: '.$logoHeight.'px; }
header #logo img#light-logo, header #logo img#dark-logo { max-height: '.$logoHeight.'px; }
header.menu-open:not(.transparent) nav#main-nav > ul > li > a { height: '.$logoHeight.'px; line-height: '.$logoHeight.'px; }
header:not(.transparent) .menu-toggle,
header:not(.transparent) .menu-cart,
header:not(.transparent) .menu-language { height: calc(50px + '.$logoHeight.'px); }
header.wrapper:not(.small-header):not(.transparent) .menu-toggle,
header.wrapper:not(.small-header):not(.transparent) .menu-cart,
header.wrapper:not(.small-header):not(.transparent) .menu-language { height: calc(100px + '.$logoHeight.'px); }
header:not(.transparent) + #hero, header:not(.transparent) + #page-body { margin-top: calc(50px + '.$logoHeight.'px); }
header[class*="wrapper"]:not(.transparent) + #hero, header[class*="wrapper"]:not(.transparent) + #page-body { margin-top: calc(100px + '.$logoHeight.'px); }
header:not(.transparent) + #hero.hero-full { min-height: calc(100vh - 50px - '.$logoHeight.'px); }
header:not(.transparent) + #hero.hero-big { min-height: calc(75vh - 50px - '.$logoHeight.'px); }
header[class*="wrapper"]:not(.transparent) + #hero.hero-full { min-height: calc(100vh - 100px - '.$logoHeight.'px); }
header[class*="wrapper"]:not(.transparent) + #hero.hero-big { min-height: calc(75vh - 100px - '.$logoHeight.'px); }
/*header.menu-open nav#main-nav > ul > li > ul.sub-menu { top: calc(50px + '.$logoHeight.'px); }*/
header.transparent + #hero.hero-auto #page-title,
header.transparent + #hero #page-title.title-top { padding-top: calc(125px + '.$logoHeight.'px); }
header[class*="wrapper"].transparent + #hero.hero-auto #page-title,
header[class*="wrapper"].transparent + #hero #page-title.title-top { padding-top: calc(150px + '.$logoHeight.'px); }

/* New since 1.4 */
header:not(.wrapper) ~ #page-body .header-spacer { height: calc(100px + '.$logoHeight.'px); }
header.wrapper ~ #page-body .header-spacer { height: calc(150px + '.$logoHeight.'px); }

.single-content.col-not-sticky { padding-top: calc(100px + '.$logoHeight.'px); }

@media only screen and (max-width: 768px) { 
header:not(.wrapper) ~ #page-body .header-spacer { height: calc(60px + 25px); }
header.wrapper ~ #page-body .header-spacer { height: calc(60px + 25px); }
}
';


			if (get_option('_sr_logo_height') == 'custom' && get_option('_sr_customlogoheightresponsive')) {
				$responsiveHeight = intval(get_option('_sr_customlogoheightresponsive'));
				$return .= '@media only screen and (max-width: 768px) { 
				header .header-inner #logo { height: '.$responsiveHeight.'px !important; }
				header .header-inner #logo img { max-height: '.$responsiveHeight.'px !important; }
				
				header:not(.wrapper) ~ #page-body .header-spacer { height: calc(60px + '.$responsiveHeight.'px); }
				header.wrapper ~ #page-body .header-spacer { height: calc(60px + '.$responsiveHeight.'px); }
				 
				}';
			}
			
		} 
		
		return $return;
	}
}
		
		
		
		
/*-----------------------------------------------------------------------------------*/
/*	Color Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_custom_style_color' ) ) {
	function dani_custom_style_color() {
			
		$return = '';
				
		if (get_option('_sr_color_style') == 'color' && get_option('_sr_customcolor')){ 
		
			$main_color = get_option('_sr_customcolor');
			$appearance = get_option('_sr_appearance');
			
			$return .= '
			.colored,
a, .text-dark a,
blockquote > p a:hover,
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
nav#main-nav ul:not(.underline) > li > a:hover, nav#main-nav ul:not(.underline) > li.current-menu-item > a,	nav#main-nav ul:not(.underline) > li:hover > a,
.text-light nav#main-nav ul:not(.underline) > li > a:hover, .text-light nav#main-nav ul:not(.underline) > li.current-menu-item > a,	.text-light nav#main-nav ul:not(.underline) > li:hover > a,  
.filter li a:hover, .filter li.active a,
.pagination li a:hover,
.pagination li.back a:hover:after, .pagination li.back a:hover:before, 
.pagination li.back a:hover .icon:after, .pagination li.back a:hover .icon:before,
.pagination li a[data-title]:not([data-title=\'\']),
#page-pagination .pagination li.page a:hover,
.comments .comment-reply-link, .comments #cancel-comment-reply-link,
.tabs ul.tab-nav li.active a,
header.text-light.transparent.menu-is-open[class*=\'menu-full\'] #menu-widget a 
{ color: '.$main_color.'; }

.sr-button:hover,
.sr-button-icon:hover { border-color: '.$main_color.'; }

mark { background-color: '.$main_color.'; color: #ffffff; }

.sr-button.style-2 { background: '.$main_color.'; color: #ffffff !important; }
.sr-button.style-2:hover { background: #000000; }
.text-light .sr-button.style-2 { background: '.$main_color.'; color: #ffffff !important; }
.text-light .sr-button.style-2:hover { background: #ffffff; color: #ffffff !important; }

input[type=submit], input[type=button], .button, button { background: '.$main_color.'; color: #ffffff; }
input[type=submit]:hover, input[type=button]:hover, .button:hover, button:hover { background: #000000; }

.quantity span:hover::before, .quantity span:hover::after { background-color: '.$main_color.'; }
.woocommerce .star-rating span,
p.stars span:hover a::before, p.stars.selected span:hover a::before, p.stars.selected a::before { color: '.$main_color.'; }
.menu-cart a.open-cart:hover .minicart-icon, .menu-cart a.open-cart:hover .minicart-icon::before { opacity: 1; border-color: '.$main_color.'; }

.menu-cart-content ul.cart_list li .item-name a:hover,
.menu-cart-content.menu-dark ul.cart_list li .item-name a:hover { color: '.$main_color.'; }

.menu-cart-content .cart-bottom .buttons .sr-button.style-2 { background: '.$main_color.'; color: #ffffff !important; }
.menu-cart-content .cart-bottom .buttons .sr-button.style-2:hover { background: #000000; }
	.menu-cart-content.menu-dark .cart-bottom .buttons .sr-button.style-2 { background: '.$main_color.'; color: #ffffff !important; }
	.menu-cart-content.menu-dark .cart-bottom .buttons .sr-button.style-2:hover { background: #ffffff; color: #000000 !important; }
	
.woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-MyAccount-navigation ul li.is-active a { color: '.$main_color.'; }

.woocommerce .woocommerce-message {
	background: '.$main_color.';
	color: #ffffff;
	}
.woocommerce .woocommerce-message a:not(.button) {
	color: rgba(255,255,255,0.7);
	border-bottom: 1px solid rgba(255,255,255,0.24);
	}
	.woocommerce .woocommerce-message a:not(.button):hover { color: #ffffff; }
	
';

if ($appearance !== 'dark') {
$return .= 'a:hover,
header.text-light.transparent.menu-is-open[class*=\'menu-full\'] #menu-widget a:hover { color: #000000; }
.text-light a:not(.show-language):hover { color: rgba(255,255,255,0.7); }	';
} else {
$return .= 'a:hover,
header.text-light.transparent.menu-is-open[class*=\'menu-full\'] #menu-widget a:hover { color: #ffffff; }
.text-dark a:hover { color: #000000; }	

input[type=submit]:hover, input[type=button]:hover, .button:hover, button:hover { background: #ffffff; color: #000000; }

.woocommerce span.onsale { color: #ffffff; }
';
}
		
		} 	 // END if custom color	
		
		
		// Sale Badge color		
		if (get_option('_sr_shopgridsalecolor') == 'custom' && get_option('_sr_shopgridsalecolorcustom')){
			$saleColor = get_option('_sr_shopgridsalecolorcustom');
			$return .= 'span.onsale.custom { background: '.$saleColor.'; }';
		}
		
		// Item hover color		
		if (get_option('_sr_shopitemhovercustom')){
			$hoverColor = get_option('_sr_shopitemhovercustom');
			$return .= '.thumb-hover.overlay-effect.custom::before { background: '.$hoverColor.'; }
			.thumb-hover.custom.overlay-effect:hover::before, .image-block:hover .custom.overlay-effect::before { 
			opacity: 0.85;
			filter: alpha(opacity=85);
			-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=85)";
			}';
		}
		
		
		return $return;

		
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Typorgraphy Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_custom_style_typography' ) ) {
	function dani_custom_style_typography() {
		
		$defaultfonts = array('body','h1','h2','h3','h4','h5','h6');
		
		// DEFAULT FONTS
		$return = '';
		$return1024 = '';
		$return768 = '';
		$return480 = '';
		foreach($defaultfonts as $font) {
			$family = get_option('_sr_'.$font.'font-font');
			$weight = get_option('_sr_'.$font.'font-weight');
			$boldweight = get_option('_sr_'.$font.'font-boldweight');
			$size = get_option('_sr_'.$font.'font-size');
			$lineheight = get_option('_sr_'.$font.'font-height');
			if (!$lineheight) $lineheight = intval(intval($size)*1.25).'px';
			$spacing = get_option('_sr_'.$font.'font-spacing');
			$transform = get_option('_sr_'.$font.'font-transform');
			
			if ($font !== 'body') { $fontClass = ', .'.$font; } else { $fontClass = ''; }
			$return .= $font.$fontClass.' {';
				if ($family) { $return .= 'font-family: "'.$family.'";'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($boldweight) { $return .= $font.' strong,'.$font.' b { font-weight: '.str_replace("italic", "", $boldweight).'; }'; }
			
			if ($font == "body") {
				$return .= '.socialmedia-widget.text-style li a { ';
					// if ($size) { $thisSize = intval(intval($size)*0.95).'px'; }
					// if (isset($thisSize)) $thisLineheight = intval(intval($thisSize)*1.22).'px';
					// if ($size) { $return .= 'font-size: '.$thisSize.';line-height: '.$thisLineheight.';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';	
			
				$return .= '#lightcase-info #lightcase-caption { ';
					if ($family) { $return .= 'font-family: "'.$family.'";'; }
					if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
					if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';	
								
				$return .= '	select, input[type=text], input[type=password], input[type=email], input[type=number], input[type=tel], input[type=search], textarea, .select2-container .select2-choice .select2-chosen  { ';
					if ($family) { $return .= 'font-family: "'.$family.'";'; }
					if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				$return .= '}';	
			}
			
			if ($font == "h1") {
				$return .= 'blockquote, .post-cat, .pagination li a[data-title]:after, .widget_recent_entries li a, .widget_recent_comments li span.comment-author-link a { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';	
			}
			
			if ($font == "h6") {
				$return .= '.product_list_widget li  > a { ';
					if ($family) { $return .= 'font-family: '.$family.';'; }
					if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
					if ($size) { $return .= 'font-size: '.$size.'; line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				
				$return .= '#reply-title { ';
					if ($size) { $return .= 'font-size: '.$size.'; line-height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
				
				$return .= '.woocommerce-MyAccount-navigation ul li a { ';
					if ($size) { $return .= 'font-size: '.$size.'; line-height: '.$lineheight.';'; }
				$return .= '}';	
			}
			
			
			// Responsiveness
			$size1024 = get_option('_sr_'.$font.'font-1024');
			$height1024 = get_option('_sr_'.$font.'font-1024-height');
			if ($size1024) { $return1024 .= $font.' { font-size: '.$size1024.' !important;'; 
				if ($height1024) { $return1024 .= 'line-height: '.$height1024.' !important;'; } 
				else { $return1024 .= 'line-height: '.intval(intval($size1024)*1.25).'px !important;'; }
				$return1024 .= '}'; 
			}
			
			$size768 = get_option('_sr_'.$font.'font-768');
			$height768 = get_option('_sr_'.$font.'font-768-height');
			if ($size768) { $return768 .= $font.' { font-size: '.$size768.' !important;'; 
				if ($height768) { $return768 .= 'line-height: '.$height768.' !important;'; } 
				else { $return768 .= 'line-height: '.intval(intval($size768)*1.25).'px !important;'; }
				$return768 .= '}'; 
			}
			
			$size480 = get_option('_sr_'.$font.'font-480');
			$height480 = get_option('_sr_'.$font.'font-480-height');
			if ($size480) { $return480 .= $font.' { font-size: '.$size480.' !important;'; 
				if ($height480) { $return480 .= 'line-height: '.$height480.' !important;'; } 
				else { $return480 .= 'line-height: '.intval(intval($size480)*1.25).'px !important;'; }
				$return480 .= '}'; 
			}
			
		}
		
		if ($return1024) { $return .= '@media only screen and (max-width: 1024px) { '.$return1024.' }'; }
		if ($return768) { $return .= '@media only screen and (max-width: 768px) { '.$return768.' }'; }
		if ($return480) { $return .= '@media only screen and (max-width: 480px) { '.$return480.' }'; }
		// DEFAULT FONTS
		
		
		// SUB TITLE
			$family = get_option('_sr_subtitle-font');
			$weight = get_option('_sr_subtitle-weight');
			$boldweight = get_option('_sr_subtitle-boldweight');
			$spacing = get_option('_sr_subtitle-spacing');
			$transform = get_option('_sr_subtitle-transform');
			
			$return .= '.title-alt, #reply-title {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($boldweight) { $return .= '.alttitle b, .alttitle strong, #reply-title b, #reply-title strong { font-weight: '.str_replace("italic", "", $boldweight).'; }'; }
			
			$return .= 'blockquote cite, .portfolio-category, .filter li a, .post-date, .team-role {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
			$return .= '}';
			
			$return .= 'table th, .woocommerce-MyAccount-navigation ul li a { ';
				if ($family) { $return .= 'font-family: "'.$family.'";'; }
				if ($boldweight) { $return .= 'font-weight: '.str_replace("italic", "", $boldweight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';	
		// SUB TITLE
		
				
		// ROOT NAVIGATION
			$family = get_option('_sr_navigationfont-font');
			$weight = get_option('_sr_navigationfont-weight');
			$size = get_option('_sr_navigationfont-size');
			$spacing = get_option('_sr_navigationfont-spacing');
			$transform = get_option('_sr_navigationfont-transform');
			
			$return .= 'nav#main-nav > ul > li > a, header.menu-open nav#main-nav > ul > li > a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= "header[class*='menu-full'] nav#main-nav > ul > li > a { 
				line-height: ".intval(intval($size)*1.3)."px;
				height: ".intval(intval($size)*1.3)."px; }";
			
			$size1024 = intval($size);
			$size780 = intval($size);
			$size480 = intval($size);
			if (intval($size) > 40) { $size1024 = intval(intval($size)*0.8); $size780 = intval(intval($size)*0.6); }	
			if (intval($size) > 30) { $size780 = intval(intval($size)*0.8); $size480 = intval(intval($size)*0.7); }
			$return .= "
				@media only screen and (max-width: 1024px) {
				header:not(.menu-open) nav#main-nav ul:not(.sub-menu) > li > a { 
					font-size: ".$size1024."px !important;
					line-height: ".intval(intval($size1024)*1.3)."px !important;
					height: ".intval(intval($size1024)*1.3)."px !important;
				}}
				@media only screen and (max-width: 768px) {
				header:not(.menu-open) nav#main-nav ul:not(.sub-menu) > li > a {
					font-size: ".$size780."px !important;
					line-height: ".intval(intval($size780)*1.3)."px !important;
					height: ".intval(intval($size780)*1.3)."px !important;
				}}
				@media only screen and (max-width: 480px) {
				header:not(.menu-open) nav#main-nav > ul:not(.sub-menu) > li > a {
					font-size: ".$size480."px !important;
					line-height: ".intval(intval($size480)*1.3)."px !important;
					height: ".intval(intval($size480)*1.3)."px !important;
				}}";	
		// ROOT NAVIGATION
		
		
		// SUB NAVIGATION
			$family = get_option('_sr_navigationsubfont-font');
			$weight = get_option('_sr_navigationsubfont-weight');
			$size = get_option('_sr_navigationsubfont-size');
			$spacing = get_option('_sr_navigationsubfont-spacing');
			
			$return .= 'nav#main-nav ul.sub-menu > li > a, header.menu-open nav#main-nav ul.sub-menu > li > a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
		// SUB NAVIGATION
		
		
		// PORTFOLIO 
			$family = get_option('_sr_portfoliotitle-font');
			$weight = get_option('_sr_portfoliotitle-weight');
			$spacing = get_option('_sr_portfoliotitle-spacing');
			$transform = get_option('_sr_portfoliotitle-transform');
			
			$return .= '.portfolio-container .portfolio-name:not(.title-alt), #portfolio-single .single-title .portfolio-name {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			// category
			$family = get_option('_sr_portfoliocategoryfont-font');
			$weight = get_option('_sr_portfoliocategoryfont-weight');
			$size = get_option('_sr_portfoliocategoryfont-size');
			$spacing = get_option('_sr_portfoliocategoryfont-spacing');
			$transform = get_option('_sr_portfoliocategoryfont-transform');
			
			$return .= '.portfolio-category, .image-pagination li span.next, .image-pagination li span.prev {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.'; line-height: '.intval(intval($size)*1.25).'px;'; }
				if ($spacing && $spacing !== '0') { $spacing = 0; }
				$return .= 'letter-spacing: '.$spacing.'em;';
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// PORTFOLIO 
		
		
		// BUTTON
			$family = get_option('_sr_buttonfont-font');
			$weight = get_option('_sr_buttonfont-weight');
			$boldweight = get_option('_sr_buttonfont-boldweight');
			$spacing = get_option('_sr_buttonfont-spacing');
			$transform = get_option('_sr_buttonfont-transform');
			
			$return .= '.sr-button, input[type=submit], input[type=button], button, .phatvideo-bg .mute-video,.button {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '.filter li a { ';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
			$return .= '}';
			
			$return .= '.sr-button-with-arrow, .sr-button-with-arrow strong, .pagination li a,#page-pagination .pagination li.page span,#page-pagination .pagination li.page a, , .menu-language a
			.woocommerce span.onsale, .price, .amount, .widget_price_filter .price_slider_wrapper .price_slider_amount .price_label span {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($boldweight) { $return .= 'font-weight: '.str_replace("italic", "", $boldweight).';'; }
			$return .= '}';
		// BUTTON
		
		
		// MISC (widget title)
			$family = get_option('_sr_widgettitlefont-font');
			$weight = get_option('_sr_widgettitlefont-weight');
			$spacing = get_option('_sr_widgettitlefont-spacing');
			$transform = get_option('_sr_widgettitlefont-transform');
			
			$return .= '.widget-title, .woocommerce .product table.variations label {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// MISC (widget title)
				
		return $return;
		
	}
}

?>