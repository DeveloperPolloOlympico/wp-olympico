<?php

$theId = dani_getId();

$medias = get_post_meta($theId, '_sr_gallerymedias', true);
$galleryType = get_post_meta($theId, '_sr_gallerytype', true);

if($medias) {
	
	// LIST STYLE
	if ($galleryType == 'list') {
		$spacing = get_post_meta($theId, '_sr_galleryspaced', true);
		$unveil = get_post_meta($theId, '_sr_galleryunveil', true);
		$lazy = get_post_meta($theId, '_sr_gallerylazy', true);
		
		$output = '<ul class="sr-vertical-gallery '.esc_attr($spacing).'">';
		$json = json_decode($medias);
		foreach($json->sortable as $j) {
			$output .= '<li class="'.esc_attr($unveil).'">';
			$image = wp_get_attachment_image_src( $j->id, 'dani-thumb-big' );	
			if ($lazy) {
				$output .= '<img class="lazy" data-src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
			} else {
				$output .= '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
			}	
			$output .= '</li>';
		}
		$output .= '</ul>';
	} else
	
	// SLIDER STYLE
	if ($galleryType == 'slider') {
		$nav = get_post_meta($theId, '_sr_galleryslidernav', true);
		$arrow = get_post_meta($theId, '_sr_gallerysliderarrows', true); if ($arrow) { $arrow = 'true'; } else { $arrow = 'false'; }
		$dots = get_post_meta($theId, '_sr_gallerysliderdots', true); if ($dots) { $dots = 'true'; } else { $dots = 'false'; }
		$loop = get_post_meta($theId, '_sr_gallerysliderloop', true); if ($loop) { $loop = 'true'; } else { $loop = 'false'; }
		$auto = get_post_meta($theId, '_sr_gallerysliderautoplay', true); if ($auto) { $auto = 'true'; } else { $auto = 'false'; }
		
		$output = '<div class="owl-slider nav-'.esc_attr($nav).'" 
			data-nav="'.esc_attr($arrow).'" 
			data-dots="'.esc_attr($dots).'" 
			data-loop="'.esc_attr($loop).'"
			data-autoplay="'.esc_attr($auto).'">';
		$json = json_decode($medias);
		foreach($json->sortable as $j) {
			$image = wp_get_attachment_image_src( $j->id, 'dani-thumb-big' );	
			$output .= '<div><img src="'.esc_url($image[0]).'" alt="'.esc_html(get_the_title($j->id)).'"></div>';
		}
		$output .= '</div>';
	}
	
	echo '<div class="blog-media">'.$output.'</div>';
} ?>