<?php
/*-----------------------------------------------------------------------------------

	PORTFOLIO SINGLE PAGE
	
-----------------------------------------------------------------------------------*/

$theId = dani_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

$singleTitle = '';
$singleMedia = '';
$wrapper = 'wrapper';
$layout = get_post_meta($theId, '_sr_singleportfoliolayout', true);
if ($layout !== 'custom') {
	
	$galleryType = get_post_meta($theId, '_sr_singlegalleryoption', true);
	$masonry = get_post_meta($theId, '_sr_singlegallerymasonry', true);
	$spacing = get_post_meta($theId, '_sr_singlegalleryspaced', true);
	$lightbox = get_post_meta($theId, '_sr_singlegallerylightbox', true);
	$unveil = get_post_meta($theId, '_sr_singlegalleryunveil', true);
	$lazy = get_post_meta($theId, '_sr_singlegallerylazy', true);
	$medias = get_post_meta($theId, '_sr_singlemedias', true);
	
	if ($medias) {
		$singleMedia .= '<div id="gallery-grid" class="isotope-grid gallery-container style-column-'.esc_attr($galleryType).' '.esc_attr($spacing).' clearfix">';
		$json = json_decode($medias);
		foreach($json->sortable as $j) {
			$singleMedia .= '<div class="isotope-item sr-gallery-item '.esc_attr($unveil).'">';
			 
			switch($j->type) {
				case 'image':
					
					if ($lightbox) {
						$lightboxCaption = get_post_meta($theId, '_sr_singlegallerycaption', true);
						$imageLightbox = wp_get_attachment_image_src( $j->id, 'dani-thumb-ultra' );
						$addToImage = ''; if ($lightboxCaption) { $addToImage = 'data-caption="'.esc_html(get_post($j->id)->post_excerpt).'"'; }
						$singleMedia .= '<a href="'.esc_url($imageLightbox[0]).'" data-rel="lightcase:folio'.esc_attr($theId).'" class="thumb-hover overlay-effect" '.$addToImage.'>';
						}
					
					if ($galleryType !== 'list') {
						if ($masonry) {
							if ($galleryType == '2') { $image = wp_get_attachment_image_src( $j->id, 'dani-thumb-medium' ); }
							else if ($galleryType == '3' || $galleryType == '4') { $image = wp_get_attachment_image_src( $j->id, 'dani-thumb-small' ); }
						} else {
							if ($galleryType == '2') { $image = wp_get_attachment_image_src( $j->id, 'dani-thumb-medium-crop' ); }
							else if ($galleryType == '3' || $galleryType == '4') { $image = wp_get_attachment_image_src( $j->id, 'dani-thumb-small-crop' ); }
						}
					}
					else { $image = wp_get_attachment_image_src( $j->id, 'dani-thumb-ultra' ); }
					if ($lazy) {
					$singleMedia .= '<img class="lazy" data-src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
					} else {
					$singleMedia .= '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
					}
					
					if ($lightbox) {
						$singleMedia .= '</a>';
						}
				break;
			} // END switch
			
			$singleMedia .= '</div>';
		} // END foreach
		$singleMedia .= '</div>';
	}
	
	$title = get_post_meta($theId, '_sr_singleprojecttitle', true);
	if ($title) {
		$main = get_post_meta($theId, '_sr_singletitlemain', true); if (!$main || $main == '') { $main = get_the_title();  }
		$mainSize = get_post_meta($theId, '_sr_singletitlemain-size', true);
		$sub = get_post_meta($theId, '_sr_singletitlesub', true);
		$subSize = get_post_meta($theId, '_sr_singletitlesub-size', true);
		$singleTitle = '	<div class="single-title">
						   <'.esc_attr($mainSize).' class="portfolio-name">'.$main.'</'.esc_attr($mainSize).'>
						   <'.esc_attr($subSize).' class="title-alt">'.$sub.'</'.esc_attr($subSize).'>
						</div>';
	}
	
	
	// Change wrapper if side + fullwidth
	if ($layout == 'side' && get_post_meta($theId, '_sr_singlesidewidth', true) == 'fullwidth') {
		$wrapper = '';
	}
	
} else { $wrapper = ''; } // ELSE IF CUSTOM SINGLE


// Add spacings depending header & hero
$showPagetitle = get_post_meta($theId, '_sr_showpagetitle', true); 
$heroType = get_post_meta($theId, '_sr_herobackground', true);
$headerColor = get_option('_sr_headercolor');
if (get_post_meta($theId, '_sr_headerappearance', true) == 'custom') { $headerColor = get_post_meta($theId, '_sr_headercolor', true); }

// General Options

$dani_pagination = get_option('_sr_portfoliopagination');
$comments = get_option('_sr_portfoliocomments');


?>
        
	<?php if (($layout == 'side' && get_post_meta($theId, '_sr_singlesidewidth', true) == 'fullwidth') || $layout == 'custom') {} else { ?>
        <?php if ($heroType !== 'default') { ?>
		<div class="spacer-big"></div>
		<?php } else if (strpos($headerColor, 'transparent') !== false && !$showPagetitle) { ?>
		<div class="spacer-big"></div>
		<div class="spacer-medium"></div>
        <?php } ?>
	<?php } ?>
        
		<!-- SINGLE PORTFOLIO -->
		<div id="portfolio-single" class="single-portfolio <?php echo esc_attr($wrapper); ?>">
           	
       	<?php if ($layout == 'classic') { ?>
            
            <?php if ($singleTitle) { ?>	
           	<div class="column-section clearfix">
            	<div class="column one-third">
            		<?php echo $singleTitle; ?>
                </div>
                <div class="column two-third last-col">
            		<?php the_content(); ?>
                    <?php if ($dani_shareOutput) { echo $dani_shareOutput; } ?>
                </div>
            </div>
            <?php } else { ?>
			<?php the_content(); ?>
            <?php if ($dani_shareOutput) { echo $dani_shareOutput; } ?>
            <?php } ?>
            
            <?php if ($singleMedia) { ?>
            	<?php if ($singleTitle) { ?><div class="spacer-big"></div><?php } ?>
                <?php echo $singleMedia; ?>	
            <?php } ?>
                
       	<?php } else if ($layout == 'side') { 
			$position = get_post_meta($theId, '_sr_singlesideposition', true);
			$sticky = get_post_meta($theId, '_sr_singlesidesticky', true);
			
			$galPos = 'left'; $contentPos = 'right';
			if ($position == 'right') { $galPos = 'right'; $contentPos = 'left';  }
		?>
        	
            <div class="single-content <?php echo esc_attr($sticky); ?> <?php echo esc_attr($contentPos); ?>-float">
            	<?php if ($heroType !== 'default') { echo '<div class="spacer-small"></div>'; } ?>
               	<?php if ($singleTitle) { echo $singleTitle; } ?>	
               	<?php the_content();  wp_link_pages();?>
                <?php if ($dani_pagination == 'image' && get_post_meta($theId, '_sr_singlesidewidth', true) == 'fullwidth') { ?>
                <div class="spacer-medium"></div>
				<?php } ?>
            </div> <!-- END .single-content -->
           	
            <?php if ($singleMedia) { ?>     
        	<div class="single-media <?php echo esc_attr($galPos); ?>-float">
                <?php echo $singleMedia; ?>	
            </div> <!-- END .single-media -->
            <?php } ?>
        	
       	<?php } else if ($layout == 'custom') { ?>
        	<?php the_content(); ?>
            <?php if ($dani_shareOutput) { echo $dani_shareOutput; } ?>
       	<?php } ?>
                   
		</div>
		<!-- SINGLE PORTFOLIO -->
        
        <?php if ($comments && comments_open() && !post_password_required()) {echo '<div class="wrapper">';comments_template('',true);echo '</div>';}?>
                 
		<?php if ($dani_pagination) {
            if ($dani_pagination !== 'image' ) { echo '<div class="wrapper">'; } 
			if (($dani_pagination == 'image' && $layout == 'side' && get_post_meta($theId, '_sr_singlesidewidth', true) !== 'fullwidth')) { echo '<div class="spacer-big"></div>'; } 
            dani_singlepagination(get_post_type(),'single-pagination','portfolio-pagination ',esc_html__( 'Previous Project', 'dani' ),esc_html__( 'Next Project', 'dani' ), '', $dani_pagination);
            if ($dani_pagination !== 'image' ) { echo '</div>'; }
        } else {
			echo '<div class="spacer-big"></div>';	
		}?>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>