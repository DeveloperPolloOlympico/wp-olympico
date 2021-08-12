<?php 

$theId = dani_getId();

/* FOOTER SETTINGS */
$classFooter = ''; 
if (get_option('_sr_footercolor')) { $classFooter .= get_option('_sr_footercolor'); }
$classFooterInner = 'wrapper';
$classFooteBottom = 'wrapper';
if(get_option('_sr_footerlayout') == 'center') { $classFooterInner = 'wrapper-small align-center'; }
else if(get_option('_sr_footerwidth')) { $classFooterInner = get_option('_sr_footerwidth'); $classFooteBottom = get_option('_sr_footerwidth'); }

$hideFooter = false;
if(get_option('_sr_footershow') == 'no') { $hideFooter = true; }
if(get_post_meta($theId, '_sr_footersettings', true) == 'custom') {
	if (get_post_meta($theId, '_sr_footershow', true) == 'no') { $hideFooter = true; } else { $hideFooter = false; }	
}
/* FOOTER SETTINGS */

?>
	<?php if ( !is_404() ) { ?>
    
	</section>
	<!-- PAGEBODY -->
    
    <?php } ?>
       
       
	<?php if (!$hideFooter) { ?>
    <!-- FOOTER -->  
    <footer id="footer" class="<?php echo esc_attr($classFooter); ?>"> 
       	<div class="footer-inner <?php echo esc_attr($classFooterInner); ?>"> 
            <?php if(get_option('_sr_footerlayout') == 'center') { ?>
            <?php if ( is_active_sidebar( 'footer-left' ) ) { dynamic_sidebar('Footer'); } ?>
            <?php } else { ?>
            <div class="column-section clearfix">
            	<div class="column one-third">
                <?php if ( is_active_sidebar( 'footer-left' ) ) { dynamic_sidebar('Footer'); } ?>
              	</div>
              	<div class="column one-third">
                <?php if ( is_active_sidebar( 'footer-center' ) ) { dynamic_sidebar('Footer (center)'); } ?>
              	</div>
                <div class="column one-third last-col">
                <?php if ( is_active_sidebar( 'footer-right' ) ) { dynamic_sidebar('Footer (right)'); } ?>
              	</div>
            </div>
            <?php } ?>
        </div>
        
        <?php if (get_option('_sr_copyrightleft') || get_option('_sr_copyrightright')) { ?>
        <div class="footer-bottom <?php echo esc_attr($classFooteBottom); ?>">
        	<div class="column-section clearfix">
            	<div class="column one-half">
                	<?php if (get_option('_sr_copyrightleft')) { echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_copyrightleft'))));} ?>
                </div>
                
                <div class="column one-half last-col copyright">
                 	<?php if (get_option('_sr_copyrightright')) { echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_copyrightright'))));} ?>
                </div>
            </div>
        </div>
        <?php } // END if copyright text exist ?>
        
        <?php if (get_option('_sr_footerbacktotop')) { ?>
        <a id="backtotop" href="#"></a>
        <?php } ?>
        
    </footer>
    <!-- FOOTER --> 
    <?php } ?>
    
</div> <!-- END #page-content -->
<!-- PAGE CONTENT -->

<?php wp_footer(); ?>

</body>
</html>