<?php

/*-----------------------------------------------------------------------------------

	General Frontend theme features

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Ajax Loader (Isotope)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_load_more_callback' ) ) {
	function sr_load_more_callback() {
		global $wpdb;
		
		$options =  str_replace('|', '" ', $_POST['o']);
		$options =  str_replace('=', '="', $options);
		$options =  str_replace('+', ' ', $options);
		
		//echo $_POST['o'];
		
		// Check which shortcode to do
		if (strpos($_POST['o'], 'showprice') !== false) {
			$shortcode = "sr-shopitems";
		} else {
			$shortcode = "sr-portfolioitems";
		}
        echo do_shortcode('['.$shortcode.' '.$options.']');
		
		die(); // this is required to return a proper result
	}
}
add_action('wp_ajax_nopriv_sr_load_more', 'sr_load_more_callback'); 
add_action('wp_ajax_sr_load_more', 'sr_load_more_callback');



/*-----------------------------------------------------------------------------------*/
/*	Blog Metas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_getBlogMeta' ) ) {
	function dani_getBlogMeta() {
		global $wp_query;		
		
		// AUTHOR AVATAR
		$metaavatar = '';
		if ( !get_option('_sr_blogpostsdisableavatar') ) { 
			$metaavatar .= '<figure class="meta-avatar">';
			$metaavatar .= '<a href="'.esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))).'">'.get_avatar( get_the_author_meta('user_email'), '80', '' ).'</a>';
			$metaavatar .= '</figure>';
		}
		
		// AUTHOR NAME
		$metaauthor = '';
		if ( !get_option('_sr_blogpostsdisableauthor') ) { 
			$metaauthor .= '<div class="meta-author"><span>'.esc_html__('written by', 'dani').'</span> ';
			$metaauthor .= '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a>';
			$metaauthor .= '</div>';
		}
		
		// TAGS
		$metatags = '';
		if ( !get_option('_sr_blogpostsdisabletags')) { 
			$metatags .= '<div class="meta-tags">';
			$tags = get_the_tags();
			$tagoutput = '';
			if ($tags) {
				$tagoutput .= '<span>tags</span> ';
				foreach (get_the_tags() as $tag)
				{
					//echo "<option value=\"";
					//echo get_tag_link($tags->term_id);
					$tagoutput .= '<a class="tag-link" href="'.esc_url(get_tag_link($tag->term_id)).'" >'.esc_html($tag->name).'</a>'.$separator;
				}
				$metatags .= trim($tagoutput, $separator);
			}
           	$metatags .= '</div>';
		}
				
		
		if ($metaavatar || $metaauthor || $metatags ) {
		return $metaavatar.$metaauthor.$metatags;
		}
				
		
	}						
}



if( !function_exists( 'dani_getCategory' ) ) {
	function dani_getCategory() {
		
		// CATEGORY
		$metacategory = '';
		$metacategory .= '<span class="post-cat">';
		$categories = get_the_category();
		$separator = ', ';
		$catoutput = '';
		if($categories){
			$catoutput .= esc_html__('in', 'dani').' ';
			foreach($categories as $category) {
				$catoutput .= 	'<a class="cat-link" href="'.esc_url(get_category_link($category->term_id )).'" title="' . esc_html( sprintf( esc_html__( "View all posts in %s", 'dani' ), $category->name ) ) . '">'.esc_html($category->cat_name).'</a>'.$separator;
			}
			$metacategory .= trim($catoutput, $separator);
		} 
	   	$metacategory .= '</span>';
		return $metacategory;
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Pagination for pages
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_pagination' ) ) {
	function dani_pagination($type,$prevtext = 'Previous', $nexttext = 'Next', $query = null )
	{
		global $wp_query;
		$return = '';
		if (!$query) { $query = $wp_query; }
		
		// No pagination on single sites
		if(!is_single())	
		{	
					
			if ( get_option( 'page_on_front' ) == get_the_ID() ) { $current = get_query_var('page') == 0 ? 1 : get_query_var('page'); } 
			else { $current = get_query_var('paged') == 0 ? 1 : get_query_var('paged'); }
			// echo $current;
			$total = $query->max_num_pages;																
			
			// If there are more than 1 page
			if($total > 1)	
			{				
				$return .= '<ul class="pagination">';
				
				// Future-Button
				if ($current == 1) { $prevdisable = 'inactive'; } else { $prevdisable = '';  }
				$return .= '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url(get_pagenum_link($current-1)).'">'.esc_html($prevtext).'<span class="icon"></span></a></li>';	
				
				if ($type == 'post' || $type == 'shop') {
					for($i=1;$i<=$total;$i++) {
						if (($i < $current && $i > $current-3) || ($i > $current && $i < $current+3) || $current == $i /*|| $i == 1 || $i == $total*/) {
						if ($current == $i) { $return .= '<li class="page"><span class="current">'.$i.'</span></li>'; }
						/*else if ($i == 1 && $i < $cur-3) { 
							echo '<li class="page"><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>'; 
							echo '<li class="page"><span class=""></span></li>'; 
						}*/
						else { $return .= '<li class="page"><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>'; }
						}
					}	
				}
				
				// Past-Button
				if ($current == $total) { $nextdisable = 'inactive'; } else { $nextdisable = '';  }
				$return .= '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url(get_pagenum_link($current+1)).'">'.esc_html($nexttext).'<span class="icon"></span></a></li>';
				
				$return .= '</ul> <!-- END #entries-pagination -->';
			} 
		}
		
		return $return;
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination on single item view
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_singlepagination' ) ) {
	function dani_singlepagination($type,$id,$class,$prevtext = 'Previous', $nexttext = 'Next', $backbutton = false, $style = false ) {
		
		$prev_item = get_adjacent_post(false,'',false) ; 
		$next_item = get_adjacent_post(false,'',true) ;
		
			$idAdd = '';
			if ($id && $id !== '') { $idAdd = ' id="'.esc_attr($id).'"'; }
			if ($style == 'image') { $imageAdd = 'image-'; $class .= ' image'; } else { $imageAdd = ''; $class .= ''; }
			echo '<div'.$idAdd.' class="'.esc_attr($class).'">';
			echo '<ul class="'.esc_attr($imageAdd).'pagination">';
				
			if ($prev_item && $prev_item->ID) { 
				$prev_post = get_post($prev_item->ID);
				$prevdisable = ''; 
				$prevlink = get_permalink( $prev_item->ID ); 
				$prevtitle = $prev_post->post_title; 
				$prevslug = $prev_item->post_name; 
				$previd = $prev_item->ID;
				$prevdata = '';
				if ($type == 'post') { $prevdata = 'data-title="'.esc_html($prevtitle).'"'; }
			} else { 
				$prevdisable = 'inactive'; 
				$prevlink = '#'; 
				$prevtitle = ''; 
				$prevslug = ''; 
				$previd = ''; 
				$prevdata = '';
			}
				if ($style !== 'image') {
					// normal style
					echo '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url($prevlink).'" '.$prevdata.'>'.esc_html($prevtext).'<span class="icon"></span></a></li>'; 
				} else {
					// image style
					if ($prevdisable !== 'inactive') {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_item->ID ), 'dani-thumb-ultra-crop' );		
						$titleSize = get_option('_sr_portfolioimagepaginationsize');
						echo '	<li class="do-anim '.esc_attr($prevdisable).'"><a href="'.esc_url($prevlink).'" class="thumb-hover text-light">
								<span class="image-bg"><span style="background-image:url('.esc_url($image[0]).');"></span></span>
								<div class="overlay-caption bottom align-left">
									<span class="prev caption-sub">'.esc_html($prevtext).'<span class="icon"></span></span>
									<'.esc_attr($titleSize).' class="caption-name portfolio-name">'.esc_html($prevtitle).'</'.esc_attr($titleSize).'>
								</div>
							</a></li>';
					} else {
						echo '<li class="'.esc_attr($prevdisable).'"></li>';
					}
				}
			
			if ($type == 'portfolio' && get_option('_sr_portfoliopage')) {
				echo '<li class="back"><a href="'.esc_url(get_permalink(apply_filters( 'wpml_object_id', get_option('_sr_portfoliopage'), 'post', true ))).'"><span class="icon"></span></a></li>';	
			}	
			
			if ($next_item && $next_item->ID) { 
				$next_post = get_post($next_item->ID);
				$nextdisable = ''; 
				$nextlink = get_permalink( $next_item->ID ); 
				$nexttitle = $next_post->post_title; 
				$nextslug = $next_item->post_name; 
				$nextid = $next_item->ID; 
				$nextdata = '';
				if ($type == 'post') { $nextdata = 'data-title="'.esc_html($nexttitle).'"'; }
			} else { 
				$nextdisable = 'inactive'; 
				$nextlink = '#'; 
				$nexttitle = ''; 
				$nextslug = ''; 
				$nextid =''; 
				$nextdata = '';
			}
				if ($style !== 'image') {
					// normal style
					echo '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url($nextlink).'" '.$nextdata.'>'.esc_html($nexttext).'<span class="icon"></span></a></li>'; 
				} else {
					// image style
					if ($nextdisable !== 'inactive') {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_item->ID ), 'dani-thumb-ultra-crop' );		
						$titleSize = get_option('_sr_portfolioimagepaginationsize');
						echo '	<li class="do-anim '.esc_attr($nextdisable).'"><a href="'.esc_url($nextlink).'" class="thumb-hover text-light">
								<span class="image-bg"><span style="background-image:url('.esc_url($image[0]).');"></span></span>
								<div class="overlay-caption bottom align-right">
									<span class="next caption-sub">'.esc_html($prevtext).'<span class="icon"></span></span>
									<'.esc_attr($titleSize).' class="caption-name portfolio-name">'.esc_html($nexttitle).'</'.esc_attr($titleSize).'>
								</div>
							</a></li>';
					} else {
						echo '<li class="'.esc_attr($nextdisable).'"></li>';
					}
				}
			
				
			echo '</ul></div>';
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Share
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_Share' ) ) {
	function dani_Share($type,$title,$align=null,$style="normal") {
		global $wp_query;	
		
		if (!is_admin())	{
		$postid = $wp_query->post->ID;
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium' );;
		$og_img = $og_img[0];
		
		if ($type == 'post') {
			$fb = get_option('_sr_blogpostshare_fb');
			$tw = get_option('_sr_blogpostshare_tw');
			$gplus = get_option('_sr_blogpostshare_gplus');
			$pt = get_option('_sr_blogpostshare_pt');
		} else if ($type == 'portfolio') {
			$fb = get_option('_sr_portfolioshare_fb');
			$tw = get_option('_sr_portfolioshare_tw');
			$gplus = get_option('_sr_portfolioshare_gplus');
			$pt = get_option('_sr_portfolioshare_pt');
		} else if ($type == 'product') {
			$fb = get_option('_sr_shopsingleshare_fb');
			$tw = get_option('_sr_shopsingleshare_tw');
			$gplus = get_option('_sr_shopsingleshare_gplus');
			$pt = get_option('_sr_shopsingleshare_pt');
		}
		
		
		$output = '';
		
		if ($title) {
			$title = html_entity_decode($title);
			$output .= '<h5 class="title-alt align-'.esc_attr($align).'">'.$title.'</h5>';
		}
		
		if ($style == "text") {
			$fbName = 'Facebook';
			$twName = 'Twitter';
			$gName = 'Google +';
			$ptName = 'Pinterest';
		} else {
			$fbName = '';
			$twName = '';
			$gName = '';
			$ptName = '';
		}
		
		$output .= '<ul class="socialmedia-widget align-'.esc_attr($align).' '.esc_attr($style).'-style">';
		if ($fb) {
			$output .= '<li class="facebook"><a href="" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink()).'\',\'\',\'width=900, height=500, toolbar=no, status=no\'); return(false);">'.$fbName.'</a></li>';
		}
		
		if ($tw) {
			$output .= '<li class="twitter"><a href="" onclick="window.open(\'https://twitter.com/intent/tweet?text=Tweet%20this&amp;url='.esc_url(get_the_permalink()).'\',\'\',\'width=650, height=350, toolbar=no, status=no\'); return(false);">'.$twName.'</a></li>';
		}
		
		if ($gplus) {
			$output .= '<li class="googleplus"><a href="" onclick="window.open(\'https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url='.esc_url(get_the_permalink()).'&amp;image='.esc_url($og_img).'\',\'\',\'width=900, height=500, toolbar=no, status=no\'); return(false);">'.$gName.'</a></li>';
		}
		
		if ($pt) {
			$output .= '<li class="pinterest"><a href="" onclick="window.open(\'http://pinterest.com/pin/create/bookmarklet/?media='.esc_url($og_img).'&amp;url='.esc_url(get_the_permalink()).'\',\'\',\'width=650, height=350, toolbar=no, status=no\'); return(false);">'.$ptName.'</a></li>';
		}
		$output .= '</ul>';
        
		return $output;
		
		} else { // for admin pages (pagebuilder text content preview)
			return '<h5 class="title-alt align-'.esc_attr($align).'">Share</h5>';
		}
		
	}						
}





/*-----------------------------------------------------------------------------------*/
/*	FILTER
/*-----------------------------------------------------------------------------------*/
if( !function_exists('dani_filter')) {
	function dani_filter($id,$class,$rel,$terms) {
		if (count($terms) > 1) {
			echo '<ul id="'.esc_attr($id).'" class="filter '.esc_attr($class).'" data-related-grid="'.esc_attr($rel).'">
				<li class="active" ><a data-filter="*">'.esc_html__('Show All', 'dani').'</a></li>';
			foreach ($terms as $t) {
			$t = intval($t);
			$term = get_term_by('term_id', $t, 'portfolio_category');
			$termlink = get_term_link($t, 'portfolio_category');
			echo '<li><a data-filter=".cat-'.esc_attr($t).'" data-slug="'.esc_attr($term->slug).'" href="'.esc_url($termlink).'" title="'.esc_html($term->name).'">'.esc_html($term->name).'</a></li>';
			} 
			echo '</ul>';
		}
	}						
}



/*-----------------------------------------------------------------------------------*/
/*	GET THE RALATED ID
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_getId' ) ) {
	function dani_getId() {
		if (is_home() && is_front_page()) { $theId = get_option('_sr_blogpage'); } 
		else if (is_home()) { $theId = get_option( 'page_for_posts' );  } 
		else if (class_exists('Woocommerce') && is_shop()) { $theId = get_option('woocommerce_shop_page_id'); } 
		else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } 
		else { $theId = get_option( 'page_for_posts' ); }
		return $theId;
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Custom WPML Switcher
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'dani_wpml_switcher' ) ) {
	function dani_wpml_switcher() {
	  if (get_option('_sr_wpmlswitcher') == '1' || (current_user_can('administrator') && get_option('_sr_wpmlswitcher') == '2')) {
	  $languages = icl_get_languages('skip_missing=0');
	  if(1 < count($languages)){
		$acitveLang = '';
		$selectLang = '';
		foreach($languages as $l){
		  if($l['active']) { $acitveLang = '<a href="#" class="show-language">'.esc_html($l['language_code']).'</a>'; }
		  else { $selectLang .= '<li><a href="'.esc_url($l['url']).'">'.esc_html($l['language_code']).'</a></li>';}
		}
		?>
        <div class="menu-language">
        	<?php echo $acitveLang; ?>
            <div class="menu-language-content">
                <ul class="lang-select">
                    <?php echo $selectLang; ?>
                </ul>
            </div>
        </div>
        <?php
	  }
	  } // if option switcher
	}
}


?>