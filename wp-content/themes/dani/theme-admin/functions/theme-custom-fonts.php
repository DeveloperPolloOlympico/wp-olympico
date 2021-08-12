<?php

/*-----------------------------------------------------------------------------------

	CUSTOM FONTS

-----------------------------------------------------------------------------------*/
function dani_theme_fonts_register($checkTypekit = false) {
	global $dani_googlefonts;
	$fontmanager = stripslashes(get_option('_sr_fontmanager')); 
	$dani_fonts = array( 'bodyfont','h1font','h2font','h3font','h4font','h5font','h6font','subtitle','navigationfont','navigationsubfont','portfoliotitle','portfoliocategoryfont','buttonfont','widgettitlefont');
    $fonts_url = '';
 
	$dani_font_families = array();
	
	$dani_active_googlefonts = array();
	$dani_active_googleweights = array();
	$displayTypekitScript = false;
	foreach($dani_fonts as $font) {
		$family = get_option('_sr_'.$font.'-font');	
		$weight = get_option('_sr_'.$font.'-weight');	
		$boldweight = get_option('_sr_'.$font.'-boldweight');
		
		if ($family) {
			
			$typekit = false;
			$customF = false;
			if (strpos($fontmanager, $family)) {
				$json = json_decode($fontmanager);
				foreach($json->fonts as $f) {
					if ($family == $f->name && $f->type == 'Google Font') {
						$typekit = false;
						$customF = false;
					} else if ($family == $f->name && $f->type == 'Typekit') {
						$typekit = true;
						$displayTypekitScript = true;
					} else {
						$customF = true;
					}
				} 
			}
			
			if (!$typekit && !$customF) {
				if(!in_array($family, $dani_active_googlefonts) && $family ) {
					$dani_active_googlefonts[] = $family;
				}
				if (!array_key_exists($family, $dani_active_googleweights)) {
					if (strpos($weight, 'italic') !== false) { $dani_active_googleweights[$family] = str_replace("italic", "", $weight).','.$weight; }
					else { $dani_active_googleweights[$family] = $weight; }
					if($weight !== $boldweight && $boldweight) {
						if (strpos($boldweight, 'italic') !== false) { $dani_active_googleweights[$family] .= ','.str_replace("italic", "", $boldweight).','.$boldweight; }
						else { $dani_active_googleweights[$family] .= ','.$boldweight; }
					} 
				} else {
					$check = $dani_active_googleweights[$family];
					if(strpos($check,$weight) === false) {
						if (strpos($weight, 'italic') !== false) { $dani_active_googleweights[$family] .= ','.str_replace("italic", "", $weight).','.$weight; }
						else { $dani_active_googleweights[$family] .= ','.$weight; }
					}
					if(strpos($check,$boldweight) === false && $boldweight) {
						if (strpos($weight, 'italic') !== false) { $dani_active_googleweights[$family] .= ','.str_replace("italic", "", $boldweight).','.$boldweight; }
						else { $dani_active_googleweights[$family] .= ','.$boldweight; }
					} 
				}
			} // END id $typekitorcustom
		}
	} // END foreach
			
	foreach($dani_active_googlefonts as $f) {
		$dani_font_families[] = $f.':'.$dani_active_googleweights[$f];
	} 

	$query_args = array(
		'family' => urlencode( implode( '|', $dani_font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	if ($displayTypekitScript && $checkTypekit) {
		return true;	
	} else if (count($dani_active_googlefonts) && !$checkTypekit) {
		return $fonts_url;
	}
		
}



function dani_theme_fonts_enqueue() {
    wp_enqueue_style( 'dani-fonts', dani_theme_fonts_register(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'dani_theme_fonts_enqueue' );


function add_typekit_script() {
	if (dani_theme_fonts_register(true)) {
		$typekitScript = stripslashes(get_option('_sr_typekit'));
		echo $typekitScript;
	}
}
add_action('wp_head', 'add_typekit_script'); 


?>