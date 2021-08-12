<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<!-- DEFAULT META TAGS -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php dani_get_social_metas(); ?>
<?php wp_head(); ?>
</head>

<?php 
$appearance = get_option('_sr_appearance');
$bodyClass = '';
if ($appearance) { $bodyClass = $appearance.'-style'; }
?>
<body <?php body_class($bodyClass); ?>>

<?php  
$theId = dani_getId();

// get logos
$logoDark = dani_get_attachment_id_from_src( get_option('_sr_logo') );
$logoLight = dani_get_attachment_id_from_src( get_option('_sr_logo_light') );
if ($logoDark) { $logoDarkUrl = wp_get_attachment_image_src( $logoDark, 'full' ); }
if ($logoLight) { $logoLightUrl = wp_get_attachment_image_src( $logoLight, 'full' ); }
?>

<?php if (get_option('_sr_preloader')) { 
$logoLoader = dani_get_attachment_id_from_src( get_option('_sr_preloaderlogo') );
if ($logoLoader) { $logoLoaderUrl = wp_get_attachment_image_src( $logoLoader, 'full' ); }
?>
<!-- PAGE LOADER -->
<div id="page-loader" class="pulsing">
	<div class="loader-name">
    <?php if ($logoLoader) { ?><img src="<?php echo esc_url($logoLoaderUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoLoader)); ?>">
    <?php } else if ($appearance == 'light' && $logoDark) { ?><img src="<?php echo esc_url($logoDarkUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoDark)); ?>">
    <?php } else if ($appearance == 'dark' && $logoLight) { ?><img src="<?php echo esc_url($logoLightUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoLight)); ?>"><?php } else { ?>
    <img src="<?php echo esc_url($logoDarkUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoDark)); ?>">
    <?php }  ?>
    </div>
    <div class="loader-circle">
    	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 253.4 253.4" style="enable-background:new 0 0 253.4 253.4;" xml:space="preserve"><circle cx="126.7" cy="126.7" r="124.2"/>
		</svg>
   	</div>
</div>
<!-- PAGE LOADER -->
<?php } ?>

<!-- PAGE CONTENT -->
<div id="page-content">
	
	<?php
		/* HEADER SETTINGS */
		$classHeader = ''; 
		$classMenu = ''; 
		$headerAppearance = get_post_meta($theId, '_sr_headerappearance', true);
		if ($headerAppearance == 'custom') {
			$classHeader .= get_post_meta($theId, '_sr_headerwidth', true);
			$classHeader .= ' '.get_post_meta($theId, '_sr_headercolor', true);
			$classHeader .= ' '.get_post_meta($theId, '_sr_headersticky', true);
		} else {
			if (get_option('_sr_headerwidth')) { $classHeader .= get_option('_sr_headerwidth'); }
			if (get_option('_sr_headercolor') ) { $classHeader .= ' '.get_option('_sr_headercolor'); }
			if (get_option('_sr_headersticky') ) { $classHeader .= ' '.get_option('_sr_headersticky'); }
			$heroType = get_post_meta($theId, '_sr_herobackground', true);
			if ($heroType !== 'default' && $heroType !== 'slider') { 
				if (get_option('_sr_headercolor') == 'transparent') { $classHeader .= ' '.get_post_meta($theId, '_sr_herotextcolor', true); } 
			}
			else if ($appearance == 'dark' && get_option('_sr_headercolor') == 'transparent') { $classHeader .= ' text-light'; }
		}
		if (is_404()) { $classHeader = "transparent wrapper not-sticky"; if ($appearance == 'dark') { $classHeader .= ' text-light'; } }
		if (get_option('_sr_menulayout')) { 
			$classHeader .= ' '.get_option('_sr_menulayout');
			if (get_option('_sr_menulayout') == "menu-open" && get_option('_sr_menuunderlinehover')) { $classMenu = 'underline'; }
		}
		if (get_option('_sr_menubackground')) { 
			$classHeader .= ' '.get_option('_sr_menubackground');
		}
		
		$classLogo = '';
		if (get_option('_sr_logoposition')) { $classLogo = get_option('_sr_logoposition'); }
		/* HEADER SETTINGS */
	?>
	
	<!-- HEADER -->
	<header id="header" class="<?php echo esc_attr($classHeader); ?>">        
		<div class="header-inner clearfix">
			
            <!-- LOGO -->
            <div id="logo" class="<?php echo esc_attr($classLogo); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                	<?php if ($logoDark) { ?>
                    	<img id="dark-logo" src="<?php echo esc_url($logoDarkUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoDark));?>"><?php } ?>
                	<?php if ($logoLight) { ?>
                    	<img id="light-logo" src="<?php echo esc_url($logoLightUrl[0]); ?>" alt="<?php echo esc_html(get_the_title($logoLight));?>"><?php } ?>
                  	<?php if (!get_option('_sr_logo') && !get_option('_sr_logo_light')) { ?>
                    	<span class="text-logo"><?php echo get_bloginfo( ); ?></span>
                    <?php } ?>
                </a>
            </div>
                           
			
            <!-- MAIN NAVIGATION -->
            <div id="menu" class="clearfix">            
                <?php if (class_exists('Woocommerce')) { dani_woo_minicart_content(get_option('_sr_menubackground')); } ?>
               	
                <div class="menu-actions clearfix">
                	<?php if (function_exists('icl_object_id')) { dani_wpml_switcher(); } ?>
					<?php if (class_exists('Woocommerce')) { dani_woo_minicart_menu(); } ?>
                    <?php if(has_nav_menu('primary-menu')) {  ?>
                    <div class="menu-toggle"><span class="hamburger"></span><span class="cross"></span></div>
                    <?php } // END if has_nav_menu ?>
                </div> <!-- END .menu-actions -->
            	
				<?php if(has_nav_menu('primary-menu')) {  ?>
                <?php if ( is_active_sidebar( 'menu-widgets' ) ) { $menuClass = ''; } else { $menuClass = 'no-widget'; }?>
                <div id="menu-inner" class="<?php echo $menuClass; ?>">
                    <?php	
						wp_nav_menu( array(  
								'theme_location'  => 'primary-menu', 
								'container'       => 'nav',  			        
								'container_id'    => 'main-nav',  
								'container_class' => '',  
								'menu_class'      => $classMenu, 
								'menu_id'         => 'primary' ,
								'before'          => '',
								'after'           => ''
						) );  
					?>
                    <?php if ( is_active_sidebar( 'menu-widgets' ) ) {  ?>
                    <div id="menu-widget" class="<?php if (get_option('_sr_menubackground') == 'menu-dark') { ?>text-light<?php } ?>">
                    	 <?php if (get_option('_sr_logoposition') == 'logo-centered' && get_option('_sr_headerwidget')) {  ?>
                        <div class="widget">
                            <?php echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_headerwidget')))); ?>
                        </div>
                        <?php } ?>
						<?php dynamic_sidebar('Menu Widgets'); ?>
                    </div>
                    <?php } ?>
               	</div>
                <?php } // END if has_nav_menu ?>
          	</div>
            
            <?php if (get_option('_sr_logoposition') == 'logo-centered' && get_option('_sr_headerwidget')) {  ?>
            <div id="header-widget">
            	<div class="widget">
                	<?php echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_headerwidget')))); ?>
                </div>
            </div>
            <?php } ?>
                    
		</div> <!-- END .header-inner -->
	</header> <!-- END header -->
	<!-- HEADER -->
	
    <?php if ( !is_404() ) { ?>
    
	<?php $inHeader = true; include(locate_template('includes/page-title.php')); $inHeader = false; ?>
    
	<!-- PAGEBODY -->
	<section id="page-body">
    	
    <?php } ?>