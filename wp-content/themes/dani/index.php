<?php
/*
* Main Blog page
*/

//get global prefix
global $wp_query;
$theId = dani_getId();

//get template header
get_header();

/*************
GET OPTIONS
**************/
$gridStyle = get_option('_sr_bloggridstyle');
$gridColumns = get_option('_sr_bloggridcolumns');
$dani_sidebar = get_option('_sr_bloggridsidebar');
$heroType = get_post_meta($theId, '_sr_herobackground', true);

$gridClass = 'blog-container classic-blog';
$gridTemplate = 'default';
if ($gridStyle == 'masonry') { $gridClass = 'isotope-grid style-column-'.$gridColumns.' isotope-spaced-big'; $gridTemplate = 'default'; } else
if ($gridStyle == 'minimal-grid') { $gridClass = 'isotope-grid minimal-grid-blog style-column-'.$gridColumns.' fitrows'; $gridTemplate=$gridStyle;} else
if ($gridStyle == 'minimal-list') { $gridClass = 'minimal-list-blog'; $gridTemplate=$gridStyle; }


// Sidebar
$cPos = ''; 
$sPos = '';
if ($dani_sidebar == 'left') { $cPos = 'right-float'; $sPos = 'left-float'; }
else if ($dani_sidebar == 'right') { $cPos = 'left-float'; $sPos = 'right-float'; }

$wrapper = 'wrapper';
if ($dani_sidebar == 'false' && ($gridStyle == 'classic' || $gridStyle == 'minimal-list') ) { $wrapper = 'wrapper-small'; }

?>
		
        <?php if ($heroType !== 'default') { ?><div class="spacer-big"></div><?php } ?>
            
      	<?php
		//** NO POST INFO
		if (!have_posts()) { 
			echo '<div class="wrapper nopost"><h3 class="alttitle">'.esc_html__("No posts has been found!", 'dani').'</h3></div>'; 
			echo '<div class="spacer spacer-big"></div>';
		} else {
		?>
        	
            <div class="<?php echo esc_attr($wrapper); ?>">
            
            	<?php if ($dani_sidebar == 'left' || $dani_sidebar == 'right') { ?>
                <div class="main-content <?php echo esc_attr($cPos); ?>">
                <?php } ?>
                      
                <div id="blog-grid" class="<?php echo esc_attr($gridClass); ?>">
                    <?php while ( have_posts() ) { the_post(); get_template_part( 'includes/loop', 'blog-'.$gridTemplate); } ?>
                </div>
            
                <div id="page-pagination">
                <?php echo dani_pagination('post',esc_html__( 'Previous Page', 'dani' ), esc_html__( 'Next Page', 'dani' )); ?>
                </div>
                
                <?php if ($dani_sidebar == 'left' || $dani_sidebar == 'right') { ?>
                </div>
                <aside class="sidebar <?php echo esc_attr($sPos); ?>">
                    <?php get_sidebar(); ?>
                </aside>
                <?php } ?>
                
                <?php /*Required for theme check*/ echo '<div style="display:none;">'; the_posts_pagination(); echo '</div>'; ?>
                
        	</div> <!-- END .wrapper -->
            
        <?php } // END else have_post ?>

<?php get_footer(); ?>