<?php
/*
* Main Page (Default Template)
*/

//get global prefix
$theId = dani_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

// Get title options
$showPagetitle = 1;
if (get_post_meta($theId, '_sr_showpagetitle', true) == '0') { $showPagetitle = get_post_meta($theId, '_sr_showpagetitle', true); }
$heroType = get_post_meta($theId, '_sr_herobackground', true);

if (class_exists('Woocommerce') && is_account_page()) { $showPagetitle = true; $heroType = 'default'; }
?>

<?php if (get_the_content() != '') {  ?>
		<?php if (!get_post_meta($theId, '_sr_pagebuilder_active', true)) { ?>
        <?php if (!$showPagetitle && $heroType == 'default') { ?><div class="spacer-big"></div><div class="spacer-medium"></div><?php } ?>
        <div class="wrapper">
		<?php } ?>
        
		<?php the_content(); ?>
        
        <?php if (!get_post_meta($theId, '_sr_pagebuilder_active', true)) { ?>
        </div><!-- END .wrapper -->
        <div class="spacer-big"></div> 
		<?php } ?>
<?php } // End if content ?>

<?php if (comments_open() && !post_password_required() ) { ?><div class="wrapper-small"><?php comments_template( '', true );?></div><?php } ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>