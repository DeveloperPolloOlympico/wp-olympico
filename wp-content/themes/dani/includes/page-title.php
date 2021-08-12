<?php
/*-----------------------------------------------------------------------------------

	WRITE PAGE TITLE
	
-----------------------------------------------------------------------------------*/

$theId = dani_getId();

$heroAnimation = get_post_meta($theId, '_sr_heroanimation', true);
$titleWrapper = "wrapper";
$titleWrapper = get_post_meta($theId, '_sr_titlewidth', true);


/*************
GET PAGE TITLE OPTIONS
**************/
$titles = dani_getTitle();
if ($titles['tax']) { $maintitle =  $titles['tax']; $subtitle = $titles['title']; } else { $maintitle = $titles['title']; }

if (isset($theId) && get_post_meta($theId, '_sr_alttitle', true)) { $maintitle = get_post_meta($theId, '_sr_alttitle', true); } 
if (isset($theId) && get_post_meta($theId, '_sr_subtitle', true)) { $subtitle = get_post_meta($theId, '_sr_subtitle', true); }

if ((is_tag() || is_category() || is_search() || is_archive() || is_tax()) || 
	((is_tag() || is_category() || is_search() || is_archive() || is_tax()) && (class_exists('Woocommerce') && !is_shop()))) {
if ($titles['tax']) { $maintitle =  $titles['tax']; $subtitle =  $titles['title']; } else { $maintitle =  $titles['title']; } }

// defaults
$showPagetitle = 1;
$titleType = "default";
$titleArrangement = 'main';
$titleAlignment = 'align-center';
$titlePosition = 'title-center';
$mainSize = 'h1';
$subSize = 'h5'; 

if (get_post_meta($theId, '_sr_showpagetitle', true) == '0') { $showPagetitle = get_post_meta($theId, '_sr_showpagetitle', true); }
	if (is_tag() || is_category() || is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop())) || is_tax() ) { $showPagetitle = 1; }
if (get_post_meta($theId, '_sr_pagetitletype', true)) { $titleType = get_post_meta($theId, '_sr_pagetitletype', true); }
	if (is_tag() || is_category() || is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop())) || is_tax()) { $titleType = "default"; }
if (get_post_meta($theId, '_sr_titlearrangement', true)) { $titleArrangement = get_post_meta($theId, '_sr_titlearrangement', true); }
if (get_post_meta($theId, '_sr_titlealignment', true)) { $titleAlignment = get_post_meta($theId, '_sr_titlealignment', true); }
if (get_post_meta($theId, '_sr_titleposition', true)) { $titlePosition = get_post_meta($theId, '_sr_titleposition', true); }
if (get_post_meta($theId, '_sr_alttitle-size', true)) { $mainSize = get_post_meta($theId, '_sr_alttitle-size', true); }	
if (get_post_meta($theId, '_sr_subtitle-size', true)) { $subSize = get_post_meta($theId, '_sr_subtitle-size', true); }

$titleWrite = '';
$titleClass = '';
if ($titleType == "default") {
	if ($heroAnimation) { $addClass = "text-animation"; } else { $addClass = ""; }
	$titleClass = ' '.$titlePosition.' '.$titleAlignment;
	if (isset($subtitle) && $titleArrangement !== 'main') { 
		$titleWrite .= '<'.esc_attr($subSize).' class="title-alt '.esc_attr($addClass).'">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'><div class="spacer-small"></div>'; 
	}
	$titleWrite .= '<'.esc_attr($mainSize).' class="'.esc_attr($addClass).'">'.wp_kses_post($maintitle).'</'.esc_attr($mainSize).'>';
	if (isset($subtitle) && $titleArrangement == 'main') { 
		$titleWrite .= '<div class="spacer-small"></div><'.esc_attr($subSize).' class="title-alt '.esc_attr($addClass).'">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; 
	}
} else if ($titleType == "custom") {
	$titleClass = ' '.$titlePosition;
	$titleWrite = apply_filters('the_content',get_post_meta($theId, '_sr_customtitle', true));
	}

// generate Title for Blog posts
if (is_single() && get_post_type() == 'post') {
	if ($heroAnimation) { $addClass = "text-animation"; } else { $addClass = ""; }
		$titleWrite = ''; 
		$titleClass = ' '.$titlePosition.' '.$titleAlignment;
		if (get_option('_sr_blogpostdate')) { $titleWrite .= '<div class="post-meta"><span class="post-date">'.get_the_date().'</span></div>'; 
	}
	$titleWrite .= '<div class="post-name">';
	if (isset($subtitle) && $titleArrangement !== 'main') { $titleWrite .= '<'.esc_attr($subSize).' class="title-alt '.esc_attr($addClass).'">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; }
	$titleWrite .= '<'.esc_attr($mainSize).' class="'.esc_attr($addClass).'">'.wp_kses_post($maintitle).'</'.esc_attr($mainSize).'>';
	if (isset($subtitle) && $titleArrangement == 'main') { $titleWrite .= '<'.esc_attr($subSize).' class="title-alt '.esc_attr($addClass).'">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; } 
	$titleWrite .= '</div>';
	if (dani_getCategory() && get_option('_sr_blogpostcat')) { $titleWrite .= '<div class="post-meta">'.dani_getCategory().'</div>'; }
	
	$format = get_post_format();
	if ($format  == 'quote' && get_post_meta($theId, '_sr_quote', true)) {  
		$titleWrite = ' <blockquote><p>'.get_post_meta($theId, '_sr_quote', true).'</p><cite>'.get_the_title().'</cite></blockquote>';
		$titleWrapper = "wrapper-small";
		$showPagetitle = true;
	}
}
/*************
GET PAGE TITLE OPTIONS
**************/




/*************
GET HERO OPTIONS
**************/
$heroClass = '';		
$heroAdd = '';
$heroHeight = get_post_meta($theId, '_sr_heroheight', true);
$heroType = get_post_meta($theId, '_sr_herobackground', true);
$heroTextColor = get_post_meta($theId, '_sr_herotextcolor', true);
$heroScrollDown = get_post_meta($theId, '_sr_heroscrolldown', true);

if ($heroType == 'color') {
	$colorBg = get_post_meta($theId, '_sr_color_bgcolor', true);		
	$heroAdd = 'style="background-color:'.esc_attr($colorBg).'"';	
	$heroClass = $heroTextColor;
} else if ($heroType == 'image') {
	$image = get_post_meta($theId, '_sr_image_bgimage', true);
	$imageType = get_post_meta($theId, '_sr_image_type', true);
	
	if ($imageType == 'normal') {
		$heroClass = $heroTextColor;
		$heroAdd = 'style="background:url('.esc_url($image).') center center;background-size:cover;"';	
	} else if ($imageType == 'parallax') {
		$heroClass = 'parallax-section '.$heroTextColor;
		$heroAdd = 'data-parallax-image="'.esc_url($image).'"';	
	} else if ($imageType == 'pattern') {
		if (strpos($image, '@2x') !== false) {
			$imageInfo = wp_get_attachment_image_src( dani_get_attachment_id_from_src($image), 'full' );	
			$w = $imageInfo[1]/2;
			$h = $imageInfo[2]/2;
			$styleAdd = "-webkit-background-size:".esc_attr($w)."px ".esc_attr($h)."px; -moz-background-size:".esc_attr($w)."px ".esc_attr($h)."px; -o-background-size:".esc_attr($w)."px ".esc_attr($h)."px; background-size:".esc_attr($w)."px ".esc_attr($h)."px;";
		} else { $styleAdd = ""; }
		$heroClass = $heroTextColor;
		$heroAdd = 'style="background:url('.esc_url($image).') center center;'.$styleAdd.'"';	
		
	}
} else if ($heroType == 'selfhosted' || $heroType == 'youtube' || $heroType == 'vimeo') {
		
	if ($heroType == 'selfhosted') {
		$mp4 = get_post_meta($theId, '_sr_video_mp4', true);
		$webm = get_post_meta($theId, '_sr_video_webm', true);
		$oga = get_post_meta($theId, '_sr_video_oga', true);
		$heroAdd = '		data-phattype="html5" 
						data-phatmp4="'.esc_attr($mp4).'" 
						data-phatwebm="'.esc_attr($webm).'" 
						data-phatogv="'.esc_attr($oga).'"';	
	} else if ($heroType == 'youtube') {
		$youtube = get_post_meta($theId, '_sr_video_youtube', true);
		$heroAdd = '		data-phattype="youtube" 
						data-phatvideoid="'.esc_attr($youtube).'"' ;
	} else if ($heroType == 'vimeo') {
		$vimeo = get_post_meta($theId, '_sr_video_vimeo', true);
		$heroAdd = '		data-phattype="vimeo" 
						data-phatvideoid="'.esc_attr($vimeo).'"' ;
	}
	
	$ratio = get_post_meta($theId, '_sr_video_ratio', true);
	$poster = get_post_meta($theId, '_sr_video_poster', true);
	$loop = get_post_meta($theId, '_sr_video_loop', true);
	if (!$loop) { $loop = "false"; } else {$loop = "true"; }
	$mute = get_post_meta($theId, '_sr_video_mute', true);
	if ($mute) { $mute = "false"; } else {$mute = "true"; }
	$oColor = get_post_meta($theId, '_sr_video_overlaycolor', true);
	$oOpacity = get_post_meta($theId, '_sr_video_overlayopacity', true);
	if ($oColor == '') { $oColor = "#ffffff"; $oOpacity = 0; }
	
	$heroClass = 'videobg-section '.esc_attr($heroTextColor);
	$heroAdd .= '		data-phatratio="'.esc_attr($ratio).'"
						data-phatposter="'.esc_attr($poster).'"
						data-phatloop="'.esc_attr($loop).'"
						data-phatmute="'.esc_attr($mute).'"
						data-phatoverlaycolor="'.esc_attr($oColor).'"
						data-phatoverlayopacity="'.esc_attr($oOpacity).'"';
} else if ($heroType == 'slider') { 
	$revslider = get_post_meta($theId, '_sr_slider', true);
	$heroHeight = 'hero-auto';
	$showPagetitle = false;
} else if ($heroType == 'map') {
	$apikey = get_post_meta($theId, '_sr_mapapikey', true);
	$latlong = get_post_meta($theId, '_sr_maplatlong', true);
	$text = get_post_meta($theId, '_sr_mappopup', true);
	$pin = get_post_meta($theId, '_sr_mappin', true);
	$zoom = get_post_meta($theId, '_sr_mapzoom', true);
	$style = get_post_meta($theId, '_sr_mapstyle', true);
	
	$mapStyle = "height:50vh;";
	if ($heroHeight == 'hero-big') { $mapStyle = "height:75vh;"; } else
	if ($heroHeight == 'hero-full') { $mapStyle = "height:100vh;"; }
	$googleMap = dani_googleMap($latlong, $text, $pin, $mapStyle, 'heromap', '', $style, $apikey, $zoom);
	$heroHeight = 'hero-auto';
	$showPagetitle = false;
}

if ($heroAnimation && !isset($revslider)) { $heroClass .= " hero-animation"; }


// Conditions for different account pages
if (class_exists('Woocommerce')) {
	if (is_account_page()) {
		global $subtitle;
		
		$heroClass = 'account-hero';		
		$heroAdd = '';
		$heroHeight = 'auto';
		$heroType = 'default';
		$showPagetitle = true;
		$titleWrapper = 'wrapper';
		$titleClass = '';
		
		if (!is_user_logged_in()) {
			if( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) { $titleWrite = '<h2>'.__( 'Login or Register', 'dani' ).'</h2>';
			} else { $titleWrite = '<h2>'.__( 'Login', 'dani' ).'</h2>'; }
			$titleWrite .= '<h5 class="title-alt">'.__( 'Quick checkout, see your orders and manage your account', 'dani' ).'</h5>';
		} else {
			$titleWrite = '<h2>'.wp_kses_post($maintitle).'</h2>';
			if ($subtitle) { $titleWrite .= '<h5 class="title-alt">'.wp_kses_post($subtitle).'</h5>'; }
		}
		if (is_wc_endpoint_url( 'lost-password' )) { $titleWrite = '<h2>'.__( 'Lost Password', 'dani' ).'</h2>'; }
		
	} else if (is_product_category() || is_product_tag() || is_product()) {
		$showPagetitle = false;
		$heroType = 'default';
	}
}  

?>
				
    <!-- HERO  -->
    <?php if (!$showPagetitle && $heroType == 'default') { } else { ?>
    <section id="hero" class="<?php echo esc_attr($heroHeight); ?> <?php echo esc_attr($heroClass); ?>" <?php echo $heroAdd; ?>>
    	
        <?php 
		if (isset($revslider) && $revslider) { 
			if(class_exists('RevSlider')){ 
				echo putRevSlider($revslider); 
			}
		}
        ?>
        
    	<?php if ($showPagetitle) { ?>
        <div id="page-title" class="<?php echo esc_attr($titleWrapper); ?> <?php echo esc_attr($titleClass); ?>">
             <?php if ($titleWrite && $titleWrite !== '') { echo do_shortcode($titleWrite); } ?>
        </div> <!-- END #page-title -->
        <?php } ?>
        
        <?php if (isset($googleMap)) { echo $googleMap; } ?>
        
        <?php if($heroScrollDown){?><a href="#" id="scrolldown" class="<?php echo esc_attr(get_post_meta($theId, '_sr_heroscrolldownpos', true));?>"></a><?php }?>
        
    </section>
    <?php } ?>
    <!-- HERO -->