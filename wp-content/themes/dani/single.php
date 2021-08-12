<?php

//get global prefix
$theId = dani_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }

/*************
GET OPTIONS
**************/
$dani_pagination = get_option('_sr_blogpostpagination');
$dani_share = get_option('_sr_blogpostshare');
$heroType = get_post_meta($theId, '_sr_herobackground', true);

// Sidebar
$dani_sidebar = get_option('_sr_blogpostsidebar');
$cPos = ''; 
$sPos = '';
$wrapper = 'wrapper-small';
if ($dani_sidebar == 'left') { $cPos = 'right-float'; $sPos = 'left-float'; $wrapper = ''; }
else if ($dani_sidebar == 'right') { $cPos = 'left-float'; $sPos = 'right-float'; $wrapper = ''; }

?>
		
        <?php if ($heroType !== 'default') { ?><div class="spacer-medium"></div><?php } ?>
        
        <?php if ($dani_sidebar == 'left' || $dani_sidebar == 'right') { ?>
        <div class="wrapper">
            <div class="main-content <?php echo esc_attr($cPos); ?>">
		<?php } ?>
        
        <div id="blog-single" <?php post_class(); ?>>
           	    	
			<?php if ($format && $format !== 'quote' && $format !== 'standard') { get_template_part( 'includes/post-type', $format ); } ?> 
                           
            <div class="blog-content <?php echo esc_attr($wrapper); ?>">
                <?php the_content(); wp_link_pages(); ?>
            </div> <!-- END .blog-content -->
            
            <?php if ($dani_share) { ?>
            <div class="spacer-medium"></div>
            <div id="share" class="blog-share <?php echo esc_attr($wrapper); ?>">
               	<?php echo dani_Share(get_post_type(),'<strong>'.esc_html__( 'Share', 'dani' ).'</strong>','left'); ?>
            </div>
            <?php } ?>
            
            <div class="spacer-medium"></div>
            <div class="<?php echo esc_attr($wrapper); ?>">
            	
            	<?php 
					if ($dani_pagination) { dani_singlepagination(get_post_type(),'single-pagination','blog-pagination ',esc_html__( 'Previous Post', 'dani' ),esc_html__( 'Next Post', 'dani' ));
					}
				?>
                                            
            	<?php if (get_option('_sr_blogcomments') && comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
                
            </div>
            
		</div>
        
        
        <?php if ($dani_sidebar == 'left' || $dani_sidebar == 'right') { ?>
        	</div>
            
            <aside class="sidebar <?php echo esc_attr($sPos); ?>">
            	<?php get_sidebar(); ?>
            </aside>
            
        </div> <!-- END .wrapper -->
		<?php } ?>
        
<?php endwhile; endif; ?>
<?php get_footer(); ?>