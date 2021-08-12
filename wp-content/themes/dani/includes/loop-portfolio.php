<?php 
/*-----------------------------------------------------------------------------------

	PORTFOLIO LOOP
	
-----------------------------------------------------------------------------------*/

// GET CUSTOM CAPTIONS OPTIONS
$hovercaptionval = $hovercaption;
$captionsizeval = $captionsize;
$captionpositionval = $captionposition;
$captionalignmentval = $captionalignment;
$captioncategoryval = $captioncategory;
$captioncolorval = $captioncolor;
$hovercolorval = $hovercolor;
$captionarrowval = $captionarrow;
if (get_post_meta(get_the_ID(), '_sr_singlehoverappearance', true) == 'custom' && !$captionforce) {
$hovercaptionval = get_post_meta(get_the_ID(), '_sr_customhovercaption', true);
$captionpositionval = get_post_meta(get_the_ID(), '_sr_customcaptionposition', true);
$captionalignmentval = get_post_meta(get_the_ID(), '_sr_customcaptionalignment', true);
$captioncategoryval = get_post_meta(get_the_ID(), '_sr_customcaptioncategory', true);
$captioncolorval = get_post_meta(get_the_ID(), '_sr_customcaptioncolor', true);
$hovercolorval = get_post_meta(get_the_ID(), '_sr_customhovercolor', true);
$captionarrowval = get_post_meta(get_the_ID(), '_sr_customcaptionarrow', true);
}

// GET ITEM CATEGORIES
$categories = wp_get_object_terms(get_the_ID(), 'portfolio_category');
$itemCats = ''; $filterCats = '';
foreach($categories as $cat){ $itemCats .= $cat->name.', '; $filterCats .= 'cat-'.$cat->term_id.' '; }
$itemCats = substr($itemCats, 0, -2);

// CAPTION CLASSES
$anim = '';
if (isset($gridunveil) && $gridunveil == 'portfolio-animation') { $anim = 'text-animation'; }
$captionClass = 'overlay-caption '.$captionpositionval.' '.$captionalignmentval;
if ($hovercaptionval == 'onhover') { $captionClass .= ' hidden'; }
$captionClass .= ' '.$captioncolorval;

// LINK OPTIONS
$link = get_the_permalink();
$linkAdd = '';
if (get_post_meta(get_the_ID(), '_sr_linktype', true) == 'url') {
	$link = get_post_meta(get_the_ID(), '_sr_linkurl', true);
	$linkAdd .= 'target='.get_post_meta(get_the_ID(), '_sr_linktarget', true);
} else if (get_post_meta(get_the_ID(), '_sr_linktype', true) == 'lightbox') {
	if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'image') { 
		$link = get_post_meta(get_the_ID(), '_sr_lightboximage', true);
		if (get_post_meta(get_the_ID(), '_sr_lightboxcaption', true)) {
			$iId = dani_get_attachment_id_from_src(get_post_meta(get_the_ID(), '_sr_lightboximage', true)); 
			$linkAdd = 'data-caption="'.esc_html(get_post($iId)->post_excerpt).'" '; } 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'selfhosted') { 
		$link = get_post_meta(get_the_ID(), '_sr_lightboxmp4', true); 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'youtube') { 
		$link = '//www.youtube.com/embed/'.get_post_meta(get_the_ID(), '_sr_lightboxvideo', true); 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'vimeo') { 
		$link = '//player.vimeo.com/video/'.get_post_meta(get_the_ID(), '_sr_lightboxvideo', true); 
	}
	$linkAdd .= 'data-rel="lightcase:singlefolio"';
}

// VIDEO HOVER
$videoAdd = '';
if ($hovercolorval == 'video') {
	$videohover = get_post_meta(get_the_ID(), '_sr_videohover', true);
	$videohovermp4 = get_post_meta(get_the_ID(), '_sr_videohovermp4', true);
	$videohoverwebm = get_post_meta(get_the_ID(), '_sr_videohoverwebm', true);
	$videohoverogv = get_post_meta(get_the_ID(), '_sr_videohoverogv', true);
	$videohoveryoutube = get_post_meta(get_the_ID(), '_sr_videohoveryoutube', true);
	$videohovervimeo = get_post_meta(get_the_ID(), '_sr_videohovervimeo', true);
	$videohoverratio = get_post_meta(get_the_ID(), '_sr_videohoverratio', true);
	$hovercolorval = 'videobg-section';
	$videoAdd = 'data-phattype="'.esc_attr($videohover).'" data-phatratio="'.esc_attr($videohoverratio).'" data-phatplayonhover="true"';
	if ($videohover=='html5'){ $videoAdd .=' data-phatmp4="'.esc_html($videohovermp4).'" data-phatwebm="'.esc_html($videohoverwebm).'" data-phatogv="'.esc_html($videohoverogv).'"'; }
	else if ($videohover == 'youtube') { $videoAdd .= ' data-phatvideoid="'.esc_attr($videohoveryoutube).'"'; }
	else if ($videohover == 'vimeo') { $videoAdd .= ' data-phatvideoid="'.esc_attr($videohovervimeo).'"'; }
}
?>

    <div class="<?php echo esc_attr($gridtype); ?>-item portfolio-item <?php echo esc_attr($filterCats); ?>">
        <div class="portfolio-item-inner item-inner">
            <a href="<?php echo esc_url($link); ?>" class="thumb-hover <?php echo esc_attr($hovercolorval); ?>" <?php echo $linkAdd; ?> <?php echo $videoAdd; ?>>
                <?php 
				// THUMBNAIL
				$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-medium');
				$thumbhover = false;
				if ($hovercolorval == 'image') { $thumbhover = dani_get_attachment_id_from_src(get_post_meta(get_the_ID(), '_sr_imagehover', true)); }
				
				if ($gridwidth == 'wrapper') {
					// Wrapper	
					if (	$gridtype == 'isotope' && $gridmasonrycol == '2' && !$gridmasonry) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-medium-crop'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-medium-crop' ); }	
					} else if ($gridtype == 'isotope' && $gridmasonrycol !== '2' && !$gridmasonry) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-small-crop'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-small-crop' ); }	
					} 
						
					if (		($gridtype == 'isotope' && $gridmasonrycol == '2' && $gridmasonry) ||
						 	($gridtype == 'smartscroll' && $gridsmartcol == '2')) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-medium'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-medium' ); }	
					} else if ( 	($gridtype == 'isotope' && $gridmasonrycol !== '2' && $gridmasonry) &&
								($gridtype == 'smartscroll' && $gridsmartcol !== '2')) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-small'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-small' ); }	
					} 
				} else {
					// Fullwidth	
					if (	$gridtype == 'isotope' && $gridmasonrycol == '2' && !$gridmasonry) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-ultra-crop'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-ultra-crop' ); }	
					} else if ($gridtype == 'isotope' && $gridmasonrycol !== '2' && !$gridmasonry) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-big-crop'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-big-crop' ); }	
					} 
						
					if (		($gridtype == 'isotope' && $gridmasonrycol == '2' && $gridmasonry) ||
						 	($gridtype == 'smartscroll' && $gridsmartcol == '2')) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-ultra'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-ultra' ); }	
					} else if ( 	($gridtype == 'isotope' && $gridmasonrycol !== '2' && $gridmasonry) &&
								($gridtype == 'smartscroll' && $gridsmartcol !== '2')) { 
						$thumb = get_the_post_thumbnail(get_the_ID(),'dani-thumb-big'); 
						if ($thumbhover) { $imagehover = wp_get_attachment_image_src($thumbhover, 'dani-thumb-big' ); }	
					} 
				}
				echo $thumb;
				?>
                
                <?php 
				// IMAGE HOVER
				if ($hovercolorval == 'image' && $thumbhover) {
					if (strpos(get_post_meta(get_the_ID(), '_sr_imagehover', true), '.gif') !== false) {
						$imagehover = wp_get_attachment_image_src($thumbhover, 'full' );
					}
					echo '<div class="hover-image"><img src="'.$imagehover[0].'" width="'.$imagehover[1].'" height="'.$imagehover[2].'" class="hover"/></div>';
				}
				?>
                
                <?php if ($hovercaptionval !== 'hide' && $hovercaptionval !== 'belowthumb') { ?>
                <div class="overlay-caption <?php echo esc_attr($captionClass); ?>">
                    <?php if ($captioncategoryval) { ?><span class="caption-sub portfolio-category <?php echo esc_attr($anim);?>"><?php echo $itemCats; ?></span><?php } ?>
                    <h3 class="caption-name portfolio-name <?php echo esc_attr($anim);?> <?php echo esc_attr($captionsizeval);?>"><?php the_title(); ?></h3>
                </div>
                <?php } ?>
                <?php if ($captionarrowval && $hovercolorval !=='no-overlay'&&$hovercolorval!=='videobg-section') { ?>
                <span class="thumb-arrow"></span>
				<?php } ?>
            </a>
            <?php if ($hovercaptionval == 'belowthumb') { ?>
            <div class="portfolio-info">
                <?php if ($captioncategoryval) { ?><span class="portfolio-category <?php echo esc_attr($anim);?>"><?php echo $itemCats; ?></span><?php } ?>
                <h3 class="portfolio-name <?php echo esc_attr($anim);?> <?php echo esc_attr($captionsizeval);?>">
                    <a href="<?php echo esc_url($link); ?>" <?php echo $linkAdd; ?>><?php the_title(); ?></a>
                </h3>
            </div>
            <?php } ?>
        </div>
    </div>