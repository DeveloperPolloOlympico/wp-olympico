<?php

/*-----------------------------------------------------------------------------------

	Custom Post/Portfolio Meta boxes

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Add metaboxes
/*-----------------------------------------------------------------------------------*/
function dani_add_meta_boxes() { 
 
	# Single Portfolio Options
	add_meta_box(  
        'meta_portfoliosingle', // $id  
        esc_html__('Portfolio Single Settings', 'dani'), // $title  
        'dani_show_meta_portfoliosingle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority 
	
	
	
	# Portfolio Grid Settings
	/*
	add_meta_box(  
        'meta_portfoliosettings', // $id  
        esc_html__('Portfolio Settings', 'dani'), // $title  
        'dani_show_meta_portfoliosettings', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
	*/
	
		
	
	# Image post type
    add_meta_box(  
        'meta_imageposttype', // $id  
        esc_html__('Image Post Type', 'dani'), // $title  
        'dani_show_meta_imageposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
		
	# Gallery post type
    add_meta_box(  
        'meta_galleryposttype', // $id  
        esc_html__('Gallery Post Type', 'dani'), // $title  
        'dani_show_meta_galleryposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	
	# Video post type
    add_meta_box(  
        'meta_videoposttype', // $id  
        esc_html__('Video Post Type', 'dani'), // $title  
        'dani_show_meta_videoposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	# Audio post type
    add_meta_box(  
        'meta_audioposttype', // $id  
        esc_html__('Video Post Type', 'dani'), // $title  
        'dani_show_meta_audioposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
	# Quote post type
    add_meta_box(  
        'meta_quoteposttype', // $id  
        esc_html__('Quote Post Type', 'dani'), // $title  
        'dani_show_meta_quoteposttype', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority	
		
		

	# Page Title / Hero / Header
    add_meta_box(  
        'meta_subtitle', // $id  
        esc_html__('Page Settings', 'dani'), // $title  
        'dani_show_meta_subtitle', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority
	 add_meta_box(  
        'meta_subtitle', // $id  
        esc_html__('Page Settings', 'dani'), // $title  
        'dani_show_meta_subtitle', // $callback  
        'post', // $page  
        'normal', // $context  
        'high'); // $priority
	 add_meta_box(  
        'meta_subtitle', // $id  
        esc_html__('Page Settings', 'dani'), // $title  
        'dani_show_meta_subtitle', // $callback  
        'portfolio', // $page  
        'normal', // $context  
        'high'); // $priority	
	
}  
add_action('add_meta_boxes', 'dani_add_meta_boxes');





/*-----------------------------------------------------------------------------------*/
/*	Define fields
/*-----------------------------------------------------------------------------------*/


/*  REVSLIDER */
$revolutionslider = array();
$revolutionslider[0] = array( "name" => esc_html__("No Slider", 'dani'), "value" => "false");

if(class_exists('RevSlider')){
	
	$slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[] = array( "name" => $revSlider->getTitle(), "value" => $revSlider->getAlias());
	}
}
/*  REVSLIDER */

$dani_meta_subtitle = array(
	
	array( "name" => esc_html__("Page Title", 'dani'),
		   "id" => "sr-meta-tab-pagetitle",
		   "type" => "tabstart"
		  ),
		
		array( "label" => esc_html__("Show Pagetitle", 'dani'),
			   "desc" => "",
			   "id" => "_sr_showpagetitle",
			   "type" => "checkbox-hiding",
			   "option" => array( 
					array(	"name" => esc_html__("Yes", 'dani'), 
							"value" => "1"),
					array(	"name" => esc_html__("No", 'dani'), 
							"value" => "0")
					),
			   "default" => "1"
			  ),
			  
			array( 	"label" => "Yes",
					"id" => "_sr_showpagetitle",
					"hiding" => "1",	
					"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Page Title Content", 'dani'),
					   "desc" => "",
					   "id" => "_sr_pagetitletype",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Default Pagetitle", 'dani'), 
									"value" => "default"),
							array(	"name" => esc_html__("Custom Title Content (Editor)", 'dani'), 
									"value" => "custom")
							),
					   "default" => "default"
					  ),
					 
					array(  "label" => "Title Content width",
							"desc" => "",
							"id" => "_sr_titlewidth",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Small wrapper (780px)", 'dani'), 
										"value" => "wrapper-small"),
								array(	"name" => esc_html__("Wrapper (1200px)", 'dani'), 
										"value" => "wrapper"),
								array(	"name" => esc_html__("Big Wrapper (1660px)", 'dani'), 
										"value" => "wrapper-big"),
								array(	"name" => esc_html__("Fullwidth", 'dani'), 
										"value" => "no-wrapper")
								),
					   		"default" => "wrapper"
						),  
						
					array( 	"label" => "Default",
							"id" => "_sr_pagetitletype",
							"hiding" => "default",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => "Heading Title",
								"desc" => esc_html__("Takes the default post title if empty.", 'dani'),
								"id" => "_sr_alttitle",
								"type" => "title",
								"defaultsize" => "h1" 
							),
							
						array( 	"label" => "Subtitle",
								"desc" => "",
								"id" => "_sr_subtitle",
								"type" => "title",
								"defaultsize" => "h5" 
							),
							
						array(  "label" => "Title Arrangement",
								"desc" => "",
								"id" => "_sr_titlearrangement",
								"type" => "selectbox",
								"option" => array( 
									array(	"name" => esc_html__("Main Title first/top", 'dani'), 
											"value" => "main"),
									array(	"name" => esc_html__("Subtitle first/top", 'dani'), 
											"value" => "sub")
									)
							),
							
						array(  "label" => "Title Aligment",
								"desc" => "",
								"id" => "_sr_titlealignment",
								"type" => "selectbox",
								"option" => array( 
									array(	"name" => esc_html__("Left align", 'dani'), 
											"value" => "align-left"),
									array(	"name" => esc_html__("Center align", 'dani'), 
											"value" => "align-center"),
									array(	"name" => esc_html__("Right align", 'dani'), 
											"value" => "align-right")
									)
							),
							
					array( 	"label" => "Default",
							"id" => "_sr_pagetitletype",
							"hiding" => "default",	
							"type" => "hidinggroupend"
						),
						
					array( 	"label" => "custom",
							"id" => "_sr_pagetitletype",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
							
						array( 	"label" => "",
								"desc" => "",
								"id" => "_sr_customtitle",
								"type" => "editor"
							),
							
					array( 	"label" => "custom",
							"id" => "_sr_pagetitletype",
							"hiding" => "custom",	
							"type" => "hidinggroupend"
						),
						
					array(  "label" => "Title Position",
							"desc" => esc_html__("Choose a vertical position relative to your hero section", 'dani'),
							"id" => "_sr_titleposition",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Center", 'dani'), 
										"value" => "title-center"),
								array(	"name" => esc_html__("Top", 'dani'), 
										"value" => "title-top"),
								array(	"name" => esc_html__("Bottom", 'dani'), 
										"value" => "title-bottom")
								)
						),
			
			array( 	"label" => "Yes",
					"id" => "_sr_showpagetitle",
					"hiding" => "1",	
					"type" => "hidinggroupend"
				),
		  
	array( "id" => "sr-meta-tab-pagetitle",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Hero Settings", 'dani'),
		   "id" => "sr-meta-tab-hero",
		   "type" => "tabstart"
		  ),
		  
			array(  "label" => esc_html__("Hero Type", 'dani'),
					"desc" => "",
					'id'    => '_sr_herobackground',  
					'type'  => 'selectbox-hiding' ,
					'option' => array( 
						array(	"name" => esc_html__("No Background", 'dani'), 
								"value"=> "default"),
						array(	"name" => esc_html__("Color Background", 'dani'), 
								"value"=> "color"),
						array(	"name" => esc_html__("Image Background", 'dani'), 
								"value"=> "image"),
						array(	"name" => esc_html__("Selfhosted Video Background", 'dani'), 
								"value"=> "selfhosted"),
						array(	"name" => esc_html__("Youtube Video Background", 'dani'), 
								"value"=> "youtube"),
						array(	"name" => esc_html__("Vimeo Video Background", 'dani'), 
								"value"=> "vimeo"),
						array(	"name" => esc_html__("Revolution Slider", 'dani'), 
								"value"=> "slider"),
						array(	"name" => esc_html__("Google Map", 'dani'), 
								"value"=> "map")
						)
					),
									
				// COLOR BG	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "color",	
						"type" => "hidinggroupstart"
						),
									
					array(	'label' => esc_html__("Background Color", 'dani'),  
							'desc'  => esc_html__("Choose a background for your page title", 'dani'),  
							'id'    => '_sr_color_bgcolor',  
							'type'  => 'color', 
							),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
				
				// IMAGE BG	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "image",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Background Image", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_image_bgimage',  
							'type'  => 'image', 
							),
						
					array(  'label' => esc_html__("Image type (effect)", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_image_type', 
							'type'  => 'checkbox-hiding', 
							'option' => array( 
								array(	"name" => esc_html__("Parallax", 'dani'), 
										"value" => "parallax"),
								array(	"name" => esc_html__("Normal", 'dani'), 
										"value" => "normal"),
								array(	"name" => esc_html__("Pattern", 'dani'), 
										"value" => "pattern")
								),
							'default'  => 'parallax', 
							),
							
						array( 	"id" => "_sr_image_type",
								"hiding" => "pattern",	
								"type" => "hidinggroupstart"
								),
								
								array(  'label' => " ",  
										'desc'  => esc_html__("To enable retina for the pattern, you need to upload an image with '@2x' in its name.  Example: pattern@2x.jpg.  In this case, the image will be descrease by half of it size.", 'dani'),  
										'id'    => '_sr_pattern_retina', 
										'type'  => 'info'
										),
								
						array( 	"id" => "_sr_image_type",
								"hiding" => "pattern",	
								"type" => "hidinggroupend"
								),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// VIDEO Selfhosted	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "selfhosted",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("MP4 file url", 'dani'),  
							'desc'  => esc_html__("The url to the MP4 file", 'dani'),  
							'id'    => '_sr_video_mp4',  
							'type'  => 'video', 
						),
					array(  'label' => esc_html__("WEBM file url", 'dani'),  
							'desc'  => esc_html__("The url to the WEBM file", 'dani'),  
							'id'    => '_sr_video_wbm',  
							'type'  => 'video', 
						),
					array(  'label' => esc_html__("OGV file url", 'dani'),  
							'desc'  => esc_html__("The url to the OGV file", 'dani'),  
							'id'    => '_sr_video_ogv',  
							'type'  => 'video', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
				
				// VIDEO Youtube	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "youtube",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Youtube Video ID", 'dani'),  
							'desc'  => esc_html__("Enter the right of id of the youtube video", 'dani'),  
							'id'    => '_sr_video_youtube',  
							'type'  => 'text', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// VIDEO Vimeo	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "vimeo",	
						"type" => "hidinggroupstart"
						),
									
					array(  'label' => esc_html__("Vimeo Video ID", 'dani'),  
							'desc'  => esc_html__("Enter the right of id of the vimeo video", 'dani'),  
							'id'    => '_sr_video_vimeo',  
							'type'  => 'text', 
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				array( 	"id" => "_sr_herobackground",
						"hiding" => "selfhosted youtube vimeo",	
						"type" => "hidinggroupstart"
						),
						
					array(  'label' => esc_html__("Video Ratio", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_video_ratio', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => "4/3", 
										"value" => "4/3"),
								array(	"name" => "16/9", 
										"value" => "16/9"),
								array(	"name" => "21/9", 
										"value" => "21/9")
								),
							'default'  => '16/9', 
							),
							
					array(  'label' => esc_html__("Loop Video", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_video_loop', 
							'type'  => 'checkbox'
							),
							
					array(  'label' => esc_html__("Sound", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_video_mute', 
							'type'  => 'checkbox',
							'option' => array( 
								array(	"name" => "On", 
										"value" => "1"),
								array(	"name" => "Off", 
										"value" => "0")
								),
							'default'  => '0', 
							),
							
					array(  'label' => esc_html__("Video Poster Image", 'dani'),  
							'desc'  => esc_html__("This image will be displayed on mobile devices", 'dani'),  
							'id'    => '_sr_video_poster',  
							'type'  => 'image', 
							),
							
					array(	'label' => esc_html__("Video Overlay Color", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_video_overlaycolor',  
							'type'  => 'color', 
							),
							
					array(  'label' => esc_html__("Video Overlay opacity", 'dani'),  
							'desc'  => esc_html__("Choose the opacity for the overlay color", 'dani'),  
							'id'    => '_sr_video_overlayopacity', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => "0.1", 
										"value" => "0.1"),
								array(	"name" => "0.2", 
										"value" => "0.2"),
								array(	"name" => "0.3", 
										"value" => "0.3"),
								array(	"name" => "0.4", 
										"value" => "0.4"),
								array(	"name" => "0.5", 
										"value" => "0.5"),
								array(	"name" => "0.6", 
										"value" => "0.6"),
								array(	"name" => "0.7", 
										"value" => "0.7"),
								array(	"name" => "0.8", 
										"value" => "0.8"),
								array(	"name" => "0.9", 
										"value" => "0.9")	
								)
						),
						
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// Revolution Slider	
				array( 	"id" => "_sr_herobackground",
						"hiding" => "slider",	
						"type" => "hidinggroupstart"
						),
						
					array(  'label' => esc_html__("Select Slider", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_slider', 
							'type'  => 'selectbox', 
							'option' => $revolutionslider 
							),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				// Google Map
				array( 	"id" => "_sr_herobackground",
						"hiding" => "map",	
						"type" => "hidinggroupstart"
						),
						
					array(
							'label' => esc_html__("Your API Key", 'dani'),  
							'desc'  => esc_html__("Since June 2016 you need to create an API Key", 'dani'), 
							"id" => "_sr_mapapikey",
							'type' => 'text',
							'sendval' => true
						),
						
						array(
							'label' => esc_html__("Latitude & Longitude", 'dani'),  
							'desc'  => esc_html__("Enter the google map latitude & longitude 'seperated by a comma' using this tool: http://itouchmap.com/latlong.html", 'dani'), 
							"id" => "_sr_maplatlong",
							'type' => 'text',
						),
									
						array( 	"label" => "Popup Text",
								"desc" => "",
								"id" => "_sr_mappopup",
								"type" => "editor"
							),
						
						array(
							'label' => esc_html__("Pin Icon", 'dani'),  
							'desc'  => "",  
							"id" => "_sr_mappin",
							'type' => 'image',
						),
						
						array(
							'label' => esc_html__("Zoom", 'dani'),  
							'desc'  => "",  
							"id" => "_sr_mapzoom",
							'type' => 'text',
							'default' => '14'
						),
						
						array(
							'label' => esc_html__('Map Style', 'dani'),
							'desc' => '',
							"id" => "_sr_mapstyle",
							'type' => 'selectbox',
							'option' => array( 
								array(	'name' =>esc_html__('Default', 'dani'), 
										'value' => 'default'),			 	
								array(	'name' => esc_html__('Greyscale', 'dani'), 
										'value'=> 'greyscale'),
								array(	'name' => esc_html__('Satelite', 'dani'), 
										'value'=> 'satelite')
								),
							'default' => 'default'
						),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
						
						
				array( 	"id" => "_sr_herobackground",
						"hiding" => "color image selfhosted youtube vimeo",	
						"type" => "hidinggroupstart"
						),
							
					array(	'label' => esc_html__("Text Color", 'dani'),  
							'desc'  => esc_html__("Choose Text color depending on your background", 'dani'),  
							'id'    => '_sr_herotextcolor', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => esc_html__("Light", 'dani'), 
										"value" => "text-light"),
								array(	"name" => esc_html__("Dark", 'dani'), 
										"value" => "text-dark")
								)
							),
				
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
			
				
				array( 	"id" => "_sr_herobackground",
						"hiding" => "default color image selfhosted youtube vimeo map",	
						"type" => "hidinggroupstart"
						),
									
					array(	'label' => esc_html__("Hero Height", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_heroheight', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => esc_html__("Auto", 'dani'), 
										"value" => "hero-auto"),
								array(	"name" => esc_html__("Big (75%)", 'dani'), 
										"value" => "hero-big"),
								array(	"name" => esc_html__("Full Height (100%)", 'dani'), 
										"value" => "hero-full")
								)
							),
							
					array(	'label' => esc_html__("Hero Animation", 'dani'),  
							'desc'  => esc_html__("Do you want to have a 'slide in' animation as soon as the page is loaded?", 'dani'),  
							'id'    => '_sr_heroanimation', 
							'type'  => 'checkbox', 
							'option' => array( 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "0"),
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value" => "1")
								)
							),
												
				array(	"id" => "_sr_herobackground",
						"type" => "hidinggroupend"
						),
	
				array(  "label" => esc_html__("Scroll Down Button", 'dani'),
						'desc'  => esc_html__("Activate / deactivate the scroll down arrow button.", 'dani'),  
						'id'    => '_sr_heroscrolldown',  
						'type'  => 'checkbox-hiding' ,
						'option' => array( 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0"),
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value" => "1")
							)
						),
	
				array( 	"id" => "_sr_heroscrolldown",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
						),
	
					array(	'label' => esc_html__("Scroll Down Position", 'dani'),  
							'desc'  => "",  
							'id'    => '_sr_heroscrolldownpos', 
							'type'  => 'selectbox', 
							'option' => array( 
								array(	"name" => esc_html__("Center", 'dani'), 
										"value" => "center"),
								array(	"name" => esc_html__("Left", 'dani'), 
										"value" => "left"),
								array(	"name" => esc_html__("Right", 'dani'), 
										"value" => "right")
								)
							),

				array( 	"id" => "_sr_heroscrolldown",
						"hiding" => "1",	
						"type" => "hidinggroupend"
						),
		  
	array( "id" => "sr-meta-tab-hero",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Header & Footer Options", 'dani'),
		   "id" => "sr-meta-tab-header",
		   "type" => "tabstart"
		  ),
		  
		  array(  "label" => esc_html__("Header Appearance", 'dani'),
					"desc" => "",
					'id'    => '_sr_headerappearance',  
					'type'  => 'selectbox-hiding' ,
					'option' => array( 
						array(	"name" => esc_html__("Inherit from Theme Options", 'dani'), 
								"value"=> "inherit"),
						array(	"name" => esc_html__("Customize for this page", 'dani'), 
								"value"=> "custom")
						)
					),
									
				array( 	"id" => "_sr_headerappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
									
					array(	'label' => esc_html__("Header Color", 'dani'),  
							'desc'  => esc_html__("Choose a header color.  If transparent, select between dark & light related to your hero background.", 'dani'),  
							'id'    => '_sr_headercolor',  
							'type'  => 'selectbox' ,
							'option' => array( 
								array(	"name" => esc_html__("Light", 'dani'), 
										"value"=> "text-dark"),		 
								array(	"name" => esc_html__("Dark", 'dani'), 
										"value" => "text-light"),
								array(	"name" => esc_html__("Transparent Dark", 'dani'), 
										"value" => "transparent text-dark"),
								array(	"name" => esc_html__("Transparent Light", 'dani'), 
										"value" => "transparent text-light")
								)
							),
							
					array( 	"label" => esc_html__("Header Width", 'dani'),
						   	"desc" => "What width do you want for your header?",
						   	"id" => "_sr_headerwidth",
						   	"type" => "selectbox",
						   	"option" => array( 
								array(	"name" => esc_html__("Full width", 'dani'), 
										"value"=> "fullwidth"),
								array(	"name" => esc_html__("Boxed (1200px)", 'dani'), 
										"value" => "wrapper"),
								array(	"name" => esc_html__("Boxed Big (1660px)", 'dani'), 
										"value" => "wrapper-big")
								),
						   	"default" => "fullwidth"
						  ),
							
					array( "label" => esc_html__("Sticky Header", 'dani'),
						   "desc" => "Do you want your header to be sticky when scrolling?",
						   "id" => "_sr_headersticky",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "sticky"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "not-sticky")
								),
						   "default" => "sticky"
						  ),
				
				array(	"id" => "_sr_headerappearance",
						"type" => "hidinggroupend"
						),
						
			 array(  "label" => esc_html__("Footer Settings", 'dani'),
					"desc" => "",
					'id'    => '_sr_footersettings',  
					'type'  => 'selectbox-hiding' ,
					'option' => array( 
						array(	"name" => esc_html__("Inherit from Theme Options", 'dani'), 
								"value"=> "inherit"),
						array(	"name" => esc_html__("Customize for this page", 'dani'), 
								"value"=> "custom")
						)
					),
									
				array( 	"id" => "_sr_footersettings",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
						
					array( "label" => esc_html__("Show Footer", 'dani'),
						   "desc" => "",
						   "id" => "_sr_footershow",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "yes"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "no")
								),
						   "default" => "yes"
						  ),
						
				array(	"id" => "_sr_footersettings",
						"type" => "hidinggroupend"
						),
	
	array( "id" => "sr-meta-tab-header",
		   "type" => "tabend"
		  )
	
); // END $dani_meta_subtitle  



$dani_meta_portfoliosingle = array(
	
	array( "name" => esc_html__("Layout & Gallery", 'dani'),
		   "id" => "sr-meta-tab-singlelayout",
		   "type" => "tabstart"
		  ),
	
		array(  "label" => esc_html__("Single Portfolio Layout", 'dani'),
				"desc" => "",
				"id" => "_sr_singleportfoliolayout",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Classic", 'dani'), 
							"value" => "classic"),
					array(	"name" => esc_html__("Side", 'dani'), 
							"value" => "side"),
					array(	"name" => esc_html__("Custom", 'dani'), 
							"value" => "custom")
					)
				),
										
				array( 	"id" => "_sr_singleportfoliolayout",
						"hiding" => "side",	
						"type" => "hidinggroupstart"
						),
						
					array( "label" => esc_html__("Images / Gallery Position", 'dani'),
						   "desc" => esc_html__("Choose between left or right alignment.", 'dani'),
						   "id" => "_sr_singlesideposition",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => esc_html__("Left", 'dani'), 
										"value"=> "left"),		 
								array(	"name" => esc_html__("Right", 'dani'), 
										"value" => "right")
								)
						  ),	
						  
					array( "label" => esc_html__("Page Layout Width", 'dani'),
						   "desc" => "",
						   "id" => "_sr_singlesidewidth",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => esc_html__("Boxed", 'dani'), 
										"value"=> "boxed"),		 
								array(	"name" => esc_html__("Fullwidth", 'dani'), 
										"value" => "fullwidth")
								)
						  ),
						  
					array( "label" => esc_html__("Sticky Description", 'dani'),
						   "desc" => esc_html__("Make the description sticky on scroll.", 'dani'),
						   "id" => "_sr_singlesidesticky",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "col-sticky"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "col-not-sticky")
								)
						  ),	
						
				array( 	"id" => "_sr_singleportfoliolayout",
						"type" => "hidinggroupend"
						),
						
				
				array( 	"id" => "_sr_singleportfoliolayout",
						"hiding" => "classic side",	
						"type" => "hidinggroupstart"
						),
										
					array( "label" => esc_html__("Gallery Option", 'dani'),
						   "desc" => "",
						   "id" => "_sr_singlegalleryoption",
						   "type" => "selectbox-hiding",
						   "option" => array( 
								array(	"name" => esc_html__("List (1 image per row)", 'dani'), 
										"value"=> "list"),		 
								array(	"name" => esc_html__("Gallery with 2 columns", 'dani'), 
										"value" => "2"),
								array(	"name" => esc_html__("Gallery with 3 columns", 'dani'), 
										"value" => "3"),
								array(	"name" => esc_html__("Gallery with 4 columns", 'dani'), 
										"value" => "4")
								)
						  ),
						  
							array( 	"id" => "_sr_singlegalleryoption",
									"hiding" => "2 3 4",	
									"type" => "hidinggroupstart"
									),
									
								array( "label" => esc_html__("Masonry", 'dani'),
									   "desc" => esc_html__("Images will be showed with original ratios.", 'dani'),
									   "id" => "_sr_singlegallerymasonry",
									   "type" => "checkbox",
									   "option" => array( 
											array(	"name" => esc_html__("Yes", 'dani'), 
													"value"=> "1"),		 
											array(	"name" => esc_html__("No", 'dani'), 
													"value" => "0")
											)
									  ),
									
							array( 	"id" => "_sr_singlegalleryoption",
									"type" => "hidinggroupend"
									),
						  
					array( "label" => esc_html__("Spacing", 'dani'),
						   "desc" => esc_html__("Do you want the image to be spaced?", 'dani'),
						   "id" => "_sr_singlegalleryspaced",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "isotope-spaced"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "isotope-not-spaced")
								)
						  ),
						  
					array( "label" => esc_html__("Lightbox", 'dani'),
						   "desc" => esc_html__("Do you want to enable the lightbox?", 'dani'),
						   "id" => "_sr_singlegallerylightbox",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "1"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "0")
								),
						   "default" => "0"
						  ),
						  
							array( 	"id" => "_sr_singlegallerylightbox",
									"hiding" => "1",	
									"type" => "hidinggroupstart"
									),
									
								array( "label" => esc_html__("Show Caption", 'dani'),
						   			   "desc" => esc_html__("Lightbox will show the caption.  Go to your media library and edit/add the caption.", 'dani'),
									   "id" => "_sr_singlegallerycaption",
									   "type" => "checkbox",
									   "option" => array( 
											array(	"name" => esc_html__("Yes", 'dani'), 
													"value"=> "1"),		 
											array(	"name" => esc_html__("No", 'dani'), 
													"value" => "0")
											),
						   				"default" => "0"
									  ),
									
							array( 	"id" => "_sr_singlegalleryoption",
									"type" => "hidinggroupend"
									),
						  
					array( "label" => esc_html__("Unveil Effect", 'dani'),
						   "desc" => esc_html__("Enable the slide/fade in effect.", 'dani'),
						   "id" => "_sr_singlegalleryunveil",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "do-anim"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "no-anim")
								)
						  ),
						  
					array( "label" => esc_html__("Lazy Load", 'dani'),
						   "desc" => esc_html__("Activate the lazy load for these images.", 'dani'),
						   "id" => "_sr_singlegallerylazy",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "1"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "0")
								)
						  ),
						  
					array(  "label" => esc_html__("Gallery", 'dani'),
							"desc" => esc_html__("Add your Images.", 'dani'),
							"id" => "_sr_singlemedias",  
							"type"  => "medias"  
						),
						
					array( "label" => esc_html__("Project Title", 'dani'),
						   "desc" => "",
						   "id" => "_sr_singleprojecttitle",
						   "type" => "checkbox-hiding",
						   "option" => array( 
								array(	"name" => esc_html__("Hide", 'dani'), 
										"value"=> "0"),		 
								array(	"name" => esc_html__("Show", 'dani'), 
										"value" => "1")
								)
						  ),
						
							array( 	"id" => "_sr_singleprojecttitle",
									"hiding" => "1",	
									"type" => "hidinggroupstart"
									),
									
								array(  "label" => "",
										"desc" => esc_html__("You may disable the 'Page Title' & 'Hero Settings' below to prevend double content.", 'dani'),
										"id" => "",  
										"type"  => "info"  
									),
									
								array( 	"label" => "Main Title",
										"desc" => esc_html__("Takes the default post title if empty.", 'dani'),
										"id" => "_sr_singletitlemain",
										"type" => "title",
										"defaultsize" => "h1" 
									),
									
								array( 	"label" => "Subtitle",
										"desc" => "",
										"id" => "_sr_singletitlesub",
										"type" => "title",
										"defaultsize" => "h5" 
									),
									
							array( 	"id" => "_sr_singlegalleryoption",
									"type" => "hidinggroupend"
									),
						
				array(	"id" => "_sr_singleportfoliolayout",
						"type" => "hidinggroupend"
						),
						
				
				array( 	"id" => "_sr_singleportfoliolayout",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => "",
							"desc" => esc_html__("Use the default Editor or Pagebuilder above to create your custom layout.", 'dani'),
							"id" => "",  
							"type"  => "info"  
						),
					
				array(	"id" => "_sr_singleportfoliolayout",
						"type" => "hidinggroupend"
						),
	
	array( "name" => esc_html__("Layout & Gallery", 'dani'),
		   "id" => "sr-meta-tab-singlelayout",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Link Option", 'dani'),
		   "id" => "sr-meta-tab-projectlink",
		   "type" => "tabstart"
		  ),
		  
		array(  "label" => esc_html__("Link to?", 'dani'),
				"desc" => esc_html__("Where should the thumbnail in the grid link to?", 'dani'),
				"id" => "_sr_linktype",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Single Project (default)", 'dani'), 
							"value" => "default"),
					array(	"name" => esc_html__("Custom URL", 'dani'), 
							"value" => "url"),
					array(	"name" => esc_html__("Open Lightbox", 'dani'), 
							"value" => "lightbox")
					)
				),
				
				array( 	"id" => "_sr_linktype",
						"hiding" => "url",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => esc_html__("Url", 'dani'),
							"desc" => esc_html__("Start with http://", 'dani'),
							"id" => "_sr_linkurl",  
							"type"  => "text" 
						),
						
					array(  "label" => esc_html__("Target", 'dani'),
							"desc" => "",
							"id" => "_sr_linktarget",  
							"type" => "checkbox",
							"option" => array( 
								array(	"name" => esc_html__("Same Window", 'dani'), 
										"value" => "_self"),
								array(	"name" => esc_html__("New Window", 'dani'), 
										"value" => "_blank")
								)
						),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "url",	
						"type" => "hidinggroupend"
						),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "lightbox",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => esc_html__("Lightbox type", 'dani'),
							"desc" => "",
							"id" => "_sr_lightboxtype",
							"type" => "selectbox-hiding",
							"option" => array( 
								array(	"name" => esc_html__("Image", 'dani'), 
										"value" => "image"),
								array(	"name" => esc_html__("Selfhosted Video", 'dani'), 
										"value" => "selfhosted"),
								array(	"name" => esc_html__("Youtube Video", 'dani'), 
										"value" => "youtube"),
								array(	"name" => esc_html__("Vimeo Video", 'dani'), 
										"value" => "vimeo")
								)
							),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "image",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Image", 'dani'),
									"desc" => "",
									"id" => "_sr_lightboximage",  
									"type"  => "image"  
								),
								
							array(  "label" => esc_html__("Show Caption", 'dani'),
									"desc" => esc_html__("Lightbox will show the caption.  Go to your media library and edit/add the caption.", 'dani'),
									"id" => "_sr_lightboxcaption",  
									"type"  => "checkbox" ,
									"option" => 	array(
										array(	"name" => esc_html__("Yes", 'dani'), 
												"value" => "1"),
										array(	"name" => esc_html__("No", 'dani'), 
												"value" => "0")
										),
									"default" => "0"
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "image",	
								"type" => "hidinggroupend"
								),
								
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "selfhosted",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Video", 'dani'),
									"desc" => esc_html__("Select your mp4 video file", 'dani'),
									"id" => "_sr_lightboxmp4",  
									"type"  => "video"  
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "selfhosted",	
								"type" => "hidinggroupend"
								),
								
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "youtube vimeo",	
								"type" => "hidinggroupstart"
								),
								
							array(  "label" => esc_html__("Video ID", 'dani'),
									"desc" => esc_html__("Enter your youtube or vimeo ID", 'dani'),
									"id" => "_sr_lightboxvideo",  
									"type"  => "text"  
								),
						
						array( 	"id" => "_sr_lightboxtype",
								"hiding" => "youtube vimeo",	
								"type" => "hidinggroupend"
								),
						
				array( 	"id" => "_sr_linktype",
						"hiding" => "lightbox",	
						"type" => "hidinggroupend"
						),
		  
	array( "name" => esc_html__("Project Link", 'dani'),
		   "id" => "sr-meta-tab-projectlink",
		   "type" => "tabend"
		  ),
		  
	array( "name" => esc_html__("Caption & Hover", 'dani'),
		   "id" => "sr-meta-tab-singlegrid",
		   "type" => "tabstart"
		  ),
				  		  
		array(  "label" => esc_html__("Caption & Hover Settings", 'dani'),
				"desc" => "",
				"id" => "_sr_singlehoverappearance",
				"type" => "selectbox-hiding",
				"option" => array( 
					array(	"name" => esc_html__("Use default from grid settings", 'dani'), 
							"value" => "inherit"),
					array(	"name" => esc_html__("Custom caption & hover settings", 'dani'), 
							"value" => "custom")
					)
				),
										
				array( 	"id" => "_sr_singlehoverappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
						
					array(  "label" => "",
							"desc" => '<div class="important"><strong>Note</strong>: '.esc_html__("If these settings don't have any effect on your item, you probably forced the caption grid settings.  Please check your grid settings.", 'dani').'</div>',
							"id" => "",  
							"type"  => "info"  
						),	
												
					array( "label" => esc_html__("Caption Option", 'dani'),
						   "desc" => "",
						   "id" => "_sr_customhovercaption",
						   "type" => "selectbox-hiding",
						   "option" => array( 
								array(	"name" => esc_html__("Show caption on hover", 'dani'), 
										"value"=> "onhover"),
								array(	"name" => esc_html__("Always show caption", 'dani'), 
										"value" => "onstart"),
								array(	"name" => esc_html__("Display caption below the thumb", 'dani'), 
										"value" => "belowthumb"),
								array(	"name" => esc_html__("Hide caption", 'dani'), 
										"value" => "hide")
								)
						  ),
						  						  
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onhover onstart",	
								"type" => "hidinggroupstart"
								),
								
								array(  "label" => esc_html__("Caption Position", 'dani'),
										"desc" => esc_html__("Choose a vertical caption position.", 'dani'),
										"id" => "_sr_customcaptionposition",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Top", 'dani'), 
													"value" => "top"),
											array(	"name" => esc_html__("Center", 'dani'), 
													"value" => "center"),
											array(	"name" => esc_html__("Bottom", 'dani'), 
													"value" => "bottom")
											),
										"default" => "bottom"
									),
									  
								array(  "label" => esc_html__("Caption Alignment", 'dani'),
										"desc" => "",
										"id" => "_sr_customcaptionalignment",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Left align", 'dani'), 
													"value" => "align-left"),
											array(	"name" => esc_html__("Center align", 'dani'), 
													"value" => "align-center"),
											array(	"name" => esc_html__("Right align", 'dani'), 
													"value" => "align-right")
											)
									),
									
								array(  "label" => esc_html__("Display category", 'dani'),
										"desc" => "",
										"id" => "_sr_customcaptioncategory",
										"type" => "checkbox",
										"option" => array( 
											array(	"name" => esc_html__("Show", 'dani'), 
													"value" => "1"),
											array(	"name" => esc_html__("Hide", 'dani'), 
													"value" => "0")
											)
									),
								
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onhover onstart",
								"type" => "hidinggroupend"
								),
													
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onstart",	
								"type" => "hidinggroupstart"
								),
														  
								array(  "label" => esc_html__("Caption text color", 'dani'),
										"desc" => "",
										"id" => "_sr_customcaptioncolor",
										"type" => "selectbox",
										"option" => array( 
											array(	"name" => esc_html__("Light", 'dani'), 
													"value"=> "caption-light"),
											array(	"name" => esc_html__("Dark", 'dani'), 
													"value" => "caption-dark"),
											)
									),
														
						array( 	"id" => "_sr_customhovercaption",
								"hiding" => "onstart",
								"type" => "hidinggroupend"
								),
								
						array( "label" => esc_html__("Hover Type / Color", 'dani'),
							   "desc" => "",
							   "id" => "_sr_customhovercolor",
							   "type" => "selectbox-hiding",
							   "option" => array( 
									array(	"name" => esc_html__("Light", 'dani'), 
											"value"=> "overlay-effect"),
									array(	"name" => esc_html__("Dark", 'dani'), 
											"value" => "overlay-effect text-light"),
									/*array(	"name" => esc_html__("Custom Color", 'dani'), 
											"value" => "custom text-light"),*/
									array(	"name" => esc_html__("Video Hover", 'dani'), 
											"value" => "video"),
									array(	"name" => esc_html__("Image hover (gif)", 'dani'), 
											"value" => "image"),
									array(	"name" => esc_html__("No hover color", 'dani'), 
											"value" => "no-overlay")
									)
							  ),
							  
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "overlay-effect",	
									"type" => "hidinggroupstart"
									),
									array(  "label" => esc_html__("Show arrow", 'dani'),
											"desc" => "",
											"id" => "_sr_customcaptionarrow",
											"type" => "checkbox",
											"option" => array( 
												array(	"name" => esc_html__("Yes", 'dani'), 
														"value" => "1"),
												array(	"name" => esc_html__("No", 'dani'), 
														"value" => "0")
												)
										),
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "overlay-effect",
									"type" => "hidinggroupend"
									),
									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "video",	
									"type" => "hidinggroupstart"
									),
									
									array(  "label" => esc_html__("Video type", 'dani'),
											"desc" => "",
											"id" => "_sr_videohover",
											"type" => "selectbox-hiding",
											"option" => array( 
												array(	"name" => esc_html__("Selfhosted", 'dani'), 
														"value" => "html5"),
												array(	"name" => esc_html__("Youtube", 'dani'), 
														"value" => "youtube"),
												array(	"name" => esc_html__("Vimeo", 'dani'), 
														"value" => "vimeo")
												)
										),
									
										// VIDEO Selfhosted	
										array( 	"id" => "_sr_videohover",
												"hiding" => "html5",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("MP4 file url", 'dani'),  
													'desc'  => esc_html__("The url to the MP4 file", 'dani'),  
													'id'    => '_sr_videohovermp4',  
													'type'  => 'video', 
												),
											array(  'label' => esc_html__("WEBM file url", 'dani'),  
													'desc'  => esc_html__("The url to the WEBM file", 'dani'),  
													'id'    => '_sr_videohoverwebm',  
													'type'  => 'video', 
												),
											array(  'label' => esc_html__("OGV file url", 'dani'),  
													'desc'  => esc_html__("The url to the OGV file", 'dani'),  
													'id'    => '_sr_videohoverogv',  
													'type'  => 'video', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
										
										// VIDEO Youtube	
										array( 	"id" => "_sr_videohover",
												"hiding" => "youtube",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("Youtube Video ID", 'dani'),  
													'desc'  => esc_html__("Enter the right of id of the youtube video", 'dani'),  
													'id'    => '_sr_videohoveryoutube',  
													'type'  => 'text', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
												
										// VIDEO Vimeo	
										array( 	"id" => "_sr_videohover",
												"hiding" => "vimeo",	
												"type" => "hidinggroupstart"
												),
															
											array(  'label' => esc_html__("Vimeo Video ID", 'dani'),  
													'desc'  => esc_html__("Enter the right of id of the vimeo video", 'dani'),  
													'id'    => '_sr_videohovervimeo',  
													'type'  => 'text', 
												),
										
										array(	"id" => "_sr_videohover",
												"type" => "hidinggroupend"
												),
												
										array(  'label' => esc_html__("Video Ratio", 'dani'),  
												'desc'  => "",  
												'id'    => '_sr_videohoverratio', 
												'type'  => 'selectbox', 
												'option' => array( 
													array(	"name" => "4/3", 
															"value" => "4/3"),
													array(	"name" => "16/9", 
															"value" => "16/9"),
													array(	"name" => "21/9", 
															"value" => "21/9")
													),
												'default'  => '16/9', 
												),
															
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "video",
									"type" => "hidinggroupend"
									),
									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "image",	
									"type" => "hidinggroupstart"
									),
									
									array(  "label" => esc_html__("Select Image (gif)", 'dani'),
											"desc" => esc_html__("It is recommended that this image has the exact same px dimensions as your featured image.", 'dani'),
											"id" => "_sr_imagehover",
											"type" => "image"
										),
									
							array( 	"id" => "_sr_customhovercolor",
									"hiding" => "image",	
									"type" => "hidinggroupend"
									),
						
				array( 	"id" => "_sr_singlehoverappearance",
						"hiding" => "custom",	
						"type" => "hidinggroupend"
						),
		  
	array( "name" => esc_html__("Grid Options", 'dani'),
		   "id" => "sr-meta-tab-singlegrid",
		   "type" => "tabend"
		  ),
	
); // END $dani_meta_portfoliosingle



$dani_meta_imageposttype = array(

	array( "label" => esc_html__("Show Image", 'dani'),
		   "desc" => esc_html__("This image will be displayed above the content.", 'dani'),
		   "id" => "_sr_imageshow",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Featured Image", 'dani'), 
						"value"=> "featured"),		 
				array(	"name" => esc_html__("Custom Image", 'dani'), 
						"value" => "custom")
				)
		  ),
		  
		array( 	"id" => "_sr_imageshow",
				"hiding" => "custom",	
				"type" => "hidinggroupstart"
				),
				
			array(  "label" => esc_html__("Custom Image", 'dani'),
					"desc" => "",
					"id" => "_sr_imageimage",  
					"type"  => "image"  
				),
		
		array( 	"id" => "_sr_imageshow",
				"hiding" => "custom",	
				"type" => "hidinggroupend"
				)
				
); // END $dani_meta_imageposttype



$dani_meta_galleryposttype = array(
	
	array(  "label" => esc_html__("Your Gallery Images", 'dani'),
			"desc" => esc_html__("Add your Images.", 'dani'),
			"id" => "_sr_gallerymedias",  
			"type"  => "medias"  
		),
		
		
	array( "label" => esc_html__("Gallery Type", 'dani'),
		   "desc" => "",
		   "id" => "_sr_gallerytype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("List (1 image per row)", 'dani'), 
						"value"=> "list"),		 
				array(	"name" => esc_html__("Slider", 'dani'), 
						"value" => "slider")
				)
		  ),
		  
		  
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "list",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Spacing", 'dani'),
					   "desc" => esc_html__("Do you want the image to be spaced?", 'dani'),
					   "id" => "_sr_galleryspaced",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "gallery-spaced"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "gallery-not-spaced")
							)
					  ),
				
				array( "label" => esc_html__("Unveil Effect", 'dani'),
					   "desc" => esc_html__("Enable the slide/fade in effect.", 'dani'),
					   "id" => "_sr_galleryunveil",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "do-anim"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "no-anim")
							)
					  ),
					  
				array( "label" => esc_html__("Lazy Load", 'dani'),
					   "desc" => esc_html__("Activate the lazy load for these images.", 'dani'),
					   "id" => "_sr_gallerylazy",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							)
					  ),
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "2 3 4",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "slider",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Navigation Appearance", 'dani'),
					   "desc" => "",
					   "id" => "_sr_galleryslidernav",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Dark", 'dani'), 
									"value"=> "dark"),		 
							array(	"name" => esc_html__("Light", 'dani'), 
									"value" => "light")
							)
					  ),
					  
				array( "label" => esc_html__("Arrows", 'dani'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderarrows",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Bullets / Dots", 'dani'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderdots",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
					  
				array( "label" => esc_html__("Loop Slider", 'dani'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderloop",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Autoplay Slider", 'dani'),
					   "desc" => "",
					   "id" => "_sr_gallerysliderautoplay",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
				
		array( 	"id" => "_sr_gallerytype",
				"hiding" => "slider",	
				"type" => "hidinggroupend"
				),
		
); // END $dani_meta_galleryposttype


$dani_meta_videoposttype = array(
	
	array( "label" => esc_html__("Video Type", 'dani'),
		   "desc" => "",
		   "id" => "_sr_videotype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Classic Embed", 'dani'), 
						"value"=> "classic"),		 
				array(	"name" => esc_html__("Inline Video", 'dani'), 
						"value" => "inline"),
				array(	"name" => esc_html__("Selfhosted Video", 'dani'), 
						"value" => "selfhosted")
				)
		  ),
		  
		array( 	"id" => "_sr_videotype",
				"hiding" => "classic",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Embed Code", 'dani'),
					   "desc" => esc_html__("Put the embed code (iframe) here.", 'dani'),
					   "id" => "_sr_videoembed",
					   "type" => "textarea"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "classic",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Youtube or Vimeo", 'dani'),
					   "desc" => "",
					   "id" => "_sr_videooption",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Youtube", 'dani'), 
									"value"=> "youtube"),		 
							array(	"name" => esc_html__("Vimeo", 'dani'), 
									"value" => "vimeo")
							)
					  ),
					  
				array( "label" => esc_html__("Video ID", 'dani'),
					   "desc" => esc_html__("Enter the ID of the youtube or vimeo video depending on your selection above.", 'dani'),
					   "id" => "_sr_videoid",
					   "type" => "text"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline",	
				"type" => "hidinggroupend"
				),
				
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
				),
									  
				array( "label" => esc_html__("MP4 url", 'dani'),
					   "desc" => "",
					   "id" => "_sr_videomp4",
					   "type" => "video"
					  ),
					  
				array( "label" => esc_html__("WEBM url", 'dani'),
					   "desc" => "",
					   "id" => "_sr_videowebm",
					   "type" => "video"
					  ),
					  
				array( "label" => esc_html__("OGV url", 'dani'),
					   "desc" => "",
					   "id" => "_sr_videoogv",
					   "type" => "video"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupend"
				),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupstart"
				),
					  
				array( "label" => esc_html__("Poster Image", 'dani'),
					   "desc" => esc_html__("Add a poster image", 'dani'),
					   "id" => "_sr_videoimage",
					   "type" => "image"
					  ),
				
		array( 	"id" => "_sr_videotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupend"
				),

); // END $dani_meta_videoposttype


$dani_meta_audioposttype = array(
	
	array( "label" => esc_html__("Audio Type", 'dani'),
		   "desc" => "",
		   "id" => "_sr_audiotype",
		   "type" => "selectbox-hiding",
		   "option" => array( 
				array(	"name" => esc_html__("Classic Embed", 'dani'), 
						"value"=> "classic"),
				array(	"name" => esc_html__("Selfhosted Audio", 'dani'), 
						"value" => "selfhosted")
				)
		  ),
		  
		array( 	"id" => "_sr_audiotype",
				"hiding" => "classic",	
				"type" => "hidinggroupstart"
				),
				
				array( "label" => esc_html__("Embed Code", 'dani'),
					   "desc" => esc_html__("Put the embed code (iframe) here.", 'dani'),
					   "id" => "_sr_audioembed",
					   "type" => "textarea"
					  ),
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "classic",	
				"type" => "hidinggroupend"
				),
		
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "selfhosted",	
				"type" => "hidinggroupstart"
				),
									  
				array( "label" => esc_html__("MP3 url", 'dani'),
					   "desc" => "",
					   "id" => "_sr_audiomp3",
					   "type" => "audio"
					  ),
	
				array( "label" => esc_html__("Poster Image", 'dani'),
					   "desc" => esc_html__("Add a poster image", 'dani'),
					   "id" => "_sr_audioimage",
					   "type" => "image"
					  ),
				
		array( 	"id" => "_sr_audiotype",
				"hiding" => "inline selfhosted",	
				"type" => "hidinggroupend"
				),

); // END $dani_meta_audioposttype


$dani_meta_quoteposttype = array(
	
	array( "label" => esc_html__("Quote", 'dani'),
		   "desc" => "",
		   "id" => "_sr_quote",
		   "type" => "textarea"
		  ),
	
); // END $dani_meta_quoteposttype


$dani_meta_portfoliosettings = array(
	
	array( "name" => esc_html__("Grid Options", 'dani'),
		   "id" => "sr-meta-tab-gridoptions",
		   "type" => "tabstart"
		  ),
	
		array( "label" => esc_html__("Grid Width", 'dani'),
			   "desc" => "",
			   "id" => "_sr_gridwidth",
			   "type" => "selectbox",
			   "option" => array( 
					array(	"name" => esc_html__("Content width (wrapper)", 'dani'), 
							"value"=> "wrapper"),
					array(	"name" => esc_html__("Fullwidth", 'dani'), 
							"value" => "no-wrapper")
					)
			  ),
			  
		array( "label" => esc_html__("Grid Type", 'dani'),
			   "desc" => "",
			   "id" => "_sr_gridtype",
			   "type" => "selectbox-hiding",
			   "option" => array( 
					array(	"name" => esc_html__("Masonry / Grid", 'dani'), 
							"value"=> "isotope"),
					array(	"name" => esc_html__("Smart Scroll", 'dani'), 
							"value" => "smartscroll")
					)
			  ),
			  
			array( 	"id" => "_sr_gridtype",
					"hiding" => "isotope",	
					"type" => "hidinggroupstart"
					),
											  
					array( "label" => esc_html__("Columns", 'dani'),
						   "desc" => "",
						   "id" => "_sr_gridmasonrycol",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => "2", 
										"value"=> "2"),
								array(	"name" => "3", 
										"value" => "3"),
								array(	"name" => "4", 
										"value" => "4")
								),
						   "default" => "3"
						  ),
						  
					array( "label" => esc_html__("Masonry", 'dani'),
						   "desc" => esc_html__("Images will be showed with original ratios.", 'dani'),
						   "id" => "_sr_gridmasonry",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "1"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "0")
								)
						  ),
						  					
			array( 	"id" => "_sr_gridtype",
					"hiding" => "isotope",	
					"type" => "hidinggroupend"
					),
					
			array( 	"id" => "_sr_gridtype",
					"hiding" => "smartscroll",	
					"type" => "hidinggroupstart"
					),
					
					array( "label" => esc_html__("Columns", 'dani'),
						   "desc" => "",
						   "id" => "_sr_gridsmartcol",
						   "type" => "selectbox-hiding",
						   "option" => array( 
								array(	"name" => "2", 
										"value"=> "2"),
								array(	"name" => "3", 
										"value" => "3")
								),
						   "default" => "2"
						  ),
					
			array( 	"id" => "_sr_gridtype",
					"hiding" => "smartscroll",	
					"type" => "hidinggroupend"
					),
										
			array( "label" => esc_html__("Spacing", 'dani'),
				   "desc" => esc_html__("Do you want the items to be spaced?", 'dani'),
				   "id" => "_sr_gridspaced",
				   "type" => "checkbox",
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'dani'), 
								"value"=> "spaced"),		 
						array(	"name" => esc_html__("No", 'dani'), 
								"value" => "not-spaced")
						)
				  ),
				  
			array( "label" => esc_html__("Slide In Effect", 'dani'),
				   "desc" => esc_html__("Enable the slide in effect.", 'dani'),
				   "id" => "_sr_gridunveil",
				   "type" => "checkbox",
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'dani'), 
								"value"=> "portfolio-animation"),		 
						array(	"name" => esc_html__("No", 'dani'), 
								"value" => "no-anim")
						)
				  ),
				  
			array( "label" => esc_html__("Content Position", 'dani'),
				   "desc" => esc_html__("Do you want the content (Editor or Pagebuilder) to be placed on top or bottom of the portfolio grid.", 'dani'),
				   "id" => "_sr_gridcontent",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => esc_html__("Content above grid", 'dani'), 
								"value"=> "above"),		 
						array(	"name" => esc_html__("Content below grid", 'dani'), 
								"value" => "below")
						)
				  ),
				  
			/*	  
			array( "label" => esc_html__("Pagination", 'dani'),
				   "desc" => "",
				   "id" => "_sr_gridpagination",
				   "type" => "selectbox",
				   "option" => array( 
						array(	"name" => esc_html__("Classic Pagination", 'dani'), 
								"value"=> "classic"),
						array(	"name" => esc_html__("Load more button", 'dani'), 
								"value"=> "loadmore"),
						array(	"name" => esc_html__("Infinite loading", 'dani'), 
								"value"=> "infinite"),
						array(	"name" => esc_html__("Hide Pagination", 'dani'), 
								"value"=> "hide")
						)
				  ),
			*/
				  
	array( "id" => "sr-meta-tab-gridoptions",
		   "type" => "tabend"
		  ),
		  
		  
		  
	array( "name" => esc_html__("Filter", 'dani'),
		   "id" => "sr-meta-tab-filtergrid",
		   "type" => "tabstart"
		  ),
		  
		  	array( "label" => esc_html__("Show Items", 'dani'),
				   "desc" => "",
				   "id" => "_sr_filtershow",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => esc_html__("Show All items", 'dani'), 
								"value"=> "all"),
						array(	"name" => esc_html__("Select by category", 'dani'), 
								"value"=> "cat")
						)
				  ),
				  
			array( 	"id" => "_sr_filtershow",
					"hiding" => "cat",	
					"type" => "hidinggroupstart"
					),
					
					array( "label" => esc_html__("Categories", 'dani'),
						   "desc" => esc_html__("Select the categories you want to display. Select multiple by holding/pressing 'cmd' or 'ctrl'", 'dani'),
						   "id" => "_sr_filtercategory",
						   "type" => "category",
						   "option" => "portfolio"
						  ),
					
			array( 	"id" => "_sr_filtershow",
					"hiding" => "cat",	
					"type" => "hidinggroupend"
					),
					
			array( 	"label" => esc_html__("Items per page", 'dani'),
				   	"desc" => esc_html__('How many items to show per page? Enter "-1" to show all.', 'dani'),
				   	"id" => "_sr_filtercount",
				   	"type" => "text",
					"default" => "-1"
				  ),
				  
			array( "label" => esc_html__("Enable Live Filter", 'dani'),
				   "desc" => '<span class="important">'.esc_html__("The filter is only possible with 'Masonry / Grid' type.  It won't work with 'Smart Scroll' Grid type!", 'dani').'</span>',
				   "id" => "_sr_filterenable",
				   "type" => "checkbox-hiding",
				   "option" => array( 
						array(	"name" => esc_html__("Yes", 'dani'), 
								"value"=> "1"),		 
						array(	"name" => esc_html__("No", 'dani'), 
								"value" => "0")
						)
				  ),
				array( 	"id" => "_sr_filterenable",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
						),
						array( "label" => esc_html__("Filter Alignment", 'dani'),
							   "desc" => "",
							   "id" => "_sr_filteralignment",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => esc_html__("Left", 'dani'), 
											"value"=> "align-left"),		 
									array(	"name" => esc_html__("Center", 'dani'), 
											"value" => "align-center"),
									array(	"name" => esc_html__("Right", 'dani'), 
											"value" => "align-right")
									)
							  ),
				array( 	"id" => "_sr_filterenable",
						"hiding" => "1",	
						"type" => "hidinggroupend"
						),
		  
	array( "id" => "sr-meta-tab-filtergrid",
		   "type" => "tabend"
		  ),
		  
		  
		  
	array( "name" => esc_html__("Caption & Hover", 'dani'),
		   "id" => "sr-meta-tab-hovereffect",
		   "type" => "tabstart"
		  ),
		  
		array(  "label" => "",
			"desc" => '<strong>Note</strong>'.esc_html__("If these settings don't have any effect on your grid items (or some of them), you probably have activated some custom settings for these items.  Please check your portfolio items.", 'dani'),
			"id" => "",  
			"type"  => "info"  
		),	  
		  
		  array( "label" => esc_html__("Caption Option", 'dani'),
			   "desc" => "",
			   "id" => "_sr_hovercaption",
			   "type" => "selectbox-hiding",
			   "option" => array( 
					array(	"name" => esc_html__("Show caption on hover", 'dani'), 
							"value"=> "onhover"),
					array(	"name" => esc_html__("Always show caption", 'dani'), 
							"value" => "onstart"),
					array(	"name" => esc_html__("Display caption below the thumb", 'dani'), 
							"value" => "belowthumb"),
					array(	"name" => esc_html__("Hide caption", 'dani'), 
							"value" => "hide")
					)
			  ),
			  
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onhover onstart belowthumb",	
					"type" => "hidinggroupstart"
					),
					
					array(  "label" => esc_html__("Title Font Size", 'dani'),
							"desc" => "",
							"id" => "_sr_captionsize",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("h1", 'dani'), 
										"value" => "h1"),
								array(	"name" => esc_html__("h2", 'dani'), 
										"value" => "h2"),
								array(	"name" => esc_html__("h3", 'dani'), 
										"value" => "h3"),
								array(	"name" => esc_html__("h4", 'dani'), 
										"value" => "h4"),
								array(	"name" => esc_html__("h5", 'dani'), 
										"value" => "h5"),
								array(	"name" => esc_html__("h6", 'dani'), 
										"value" => "h6")
								),
							"default" => "h4"
						),
						
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onhover onstart belowthumb",	
					"type" => "hidinggroupend"
					),
					
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onhover onstart",	
					"type" => "hidinggroupstart"
					),
					
					array(  "label" => esc_html__("Caption Position", 'dani'),
							"desc" => esc_html__("Choose a vertical caption position.", 'dani'),
							"id" => "_sr_captionposition",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Top", 'dani'), 
										"value" => "top"),
								array(	"name" => esc_html__("Center", 'dani'), 
										"value" => "center"),
								array(	"name" => esc_html__("Bottom", 'dani'), 
										"value" => "bottom")
								),
							"default" => "bottom"
						),
						  
					array(  "label" => esc_html__("Caption Alignment", 'dani'),
							"desc" => "",
							"id" => "_sr_captionalignment",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Left align", 'dani'), 
										"value" => "align-left"),
								array(	"name" => esc_html__("Center align", 'dani'), 
										"value" => "align-center"),
								array(	"name" => esc_html__("Right align", 'dani'), 
										"value" => "align-right")
								)
						),
						
					array(  "label" => esc_html__("Display category", 'dani'),
							"desc" => "",
							"id" => "_sr_captioncategory",
							"type" => "checkbox",
							"option" => array( 
								array(	"name" => esc_html__("Show", 'dani'), 
										"value" => "1"),
								array(	"name" => esc_html__("Hide", 'dani'), 
										"value" => "0")
								)
						),
					
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onhover onstart",
					"type" => "hidinggroupend"
					),
										
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onstart",	
					"type" => "hidinggroupstart"
					),
											  
					array(  "label" => esc_html__("Caption text color", 'dani'),
							"desc" => "",
							"id" => "_sr_captioncolor",
							"type" => "selectbox",
							"option" => array( 
								array(	"name" => esc_html__("Light", 'dani'), 
										"value"=> "caption-light"),
								array(	"name" => esc_html__("Dark", 'dani'), 
										"value" => "caption-dark"),
								)
						),
											
			array( 	"id" => "_sr_hovercaption",
					"hiding" => "onstart",
					"type" => "hidinggroupend"
					),
					
			array( "label" => esc_html__("Hover Color", 'dani'),
				   "desc" => "",
				   "id" => "_sr_hovercolor",
				   "type" => "selectbox-hiding",
				   "option" => array( 
						array(	"name" => esc_html__("Light", 'dani'), 
								"value"=> "overlay-effect"),
						array(	"name" => esc_html__("Dark", 'dani'), 
								"value" => "overlay-effect text-light"),
						/*array(	"name" => esc_html__("Custom Color", 'dani'), 
								"value" => "custom text-light"),*/
						array(	"name" => esc_html__("No hover color", 'dani'), 
								"value" => "no-overlay")
						)
				  ),
				  
				array( 	"id" => "_sr_hovercolor",
						"hiding" => "overlay-effect",	
						"type" => "hidinggroupstart"
						),
						array(  "label" => esc_html__("Show arrow", 'dani'),
								"desc" => "",
								"id" => "_sr_captionarrow",
								"type" => "checkbox",
								"option" => array( 
									array(	"name" => esc_html__("Yes", 'dani'), 
											"value" => "1"),
									array(	"name" => esc_html__("No", 'dani'), 
											"value" => "0")
									)
							),
												
				array( 	"id" => "_sr_hovercolor",
						"hiding" => "overlay-effect",
						"type" => "hidinggroupend"
						),
				  
				/*array( 	"id" => "_sr_hovercolor",
						"hiding" => "custom",	
						"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Custom hover color", 'dani'),
							   "desc" => "",
							   "id" => "_sr_hovercustom",
							   "type" => "color"
							  ),
						
				array( 	"id" => "_sr_hovercolor",
						"hiding" => "custom",	
						"type" => "hidinggroupend"
						),*/
							  
	array( "id" => "sr-meta-tab-hovereffect",
		   "type" => "tabend"
		  ),
	
); // END $dani_meta_portfoliosettings



 
/*-----------------------------------------------------------------------------------*/
/*	Callback Show fields
/*-----------------------------------------------------------------------------------*/

function dani_show_meta_subtitle() {  
 	global $dani_meta_subtitle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_subtitle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_subtitle);  
}


function dani_show_meta_portfoliosingle() {  
 	global $dani_meta_portfoliosingle, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliosingle_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_portfoliosingle);  
}


function dani_show_meta_imageposttype() {  
 	global $dani_meta_imageposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_imageposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_imageposttype);  
}


function dani_show_meta_galleryposttype() {  
 	global $dani_meta_galleryposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_galleryposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_galleryposttype);  
}


function dani_show_meta_videoposttype() {  
 	global $dani_meta_videoposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_videoposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_videoposttype);  
}


function dani_show_meta_audioposttype() {  
 	global $dani_meta_audioposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_audioposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_audioposttype);  
}


function dani_show_meta_quoteposttype() {  
 	global $dani_meta_quoteposttype, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_quoteposttype_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_quoteposttype);  
}

function dani_show_meta_portfoliosettings() {  
 	global $dani_meta_portfoliosettings, $post;  
 	// Use nonce for verification  
 	echo '<input type="hidden" name="meta_portfoliosettings_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   	dani_show_fields($dani_meta_portfoliosettings);  
}



/*-----------------------------------------------------------------------------------*/
/*	Show fields
/*-----------------------------------------------------------------------------------*/
function dani_show_fields($a,$side=null) {
 	global $post; 
	
	echo '<div class="sr-post-meta sr-style">';
	
	// Loop tabs
	$tabCounter = 0;
    foreach ($a as $tab) {
		if ($tab['type'] == 'tabstart') {
			if ($tabCounter == 0) { echo '<ul class="sr-tab-list clearfix">'; $active = "active"; } else { $active = ""; }
			echo '<li class="'.$active.'"><a href="'.esc_attr($tab['id']).'">'.$tab['name'].'</a></li>';
			$tabCounter++;	
		}
	}
	if ($tabCounter !== 0) { echo '</ul>'; }
		
		
	// Loop options
	$tabCounter = 0;
    foreach ($a as $option) {	
		
		// get the value
		$value = get_post_meta($post->ID, $option['id'], true);  
		if ($value == '' && (isset($option['default']) && $option['default'] !== '')) { $value = $option['default']; }
			
		switch($option['type']) {  
									
			// tabstart
			case 'tabstart':
				if ($tabCounter == 0) { $active = "active"; } else { $active = ""; }
				echo '<div class="sr-tab-content '.$active.'" data-tab="'.$option['id'].'">';
				$tabCounter++;	
			break;
			
			// tabend
			case 'tabend':
				echo '</div>';
			break;
			
			
			// hidinggroupstart
			case "hidinggroupstart":
				$relatedArray = explode(' ',$option['hiding']);
				$hideClass = '';
				foreach ($relatedArray as $r) { $hideClass .= $option['id'].'_'.$r.' '; }
				echo '<div class="hidinggroup hide'.$option['id'].' '.$hideClass.'">';
			break;
			
			// hidinggroupend
			case "hidinggroupend":
				echo '	</div>';
			break;
			
			
			
			// info
			case 'info':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						if (isset($option['label']) && $option['label'] !== '') {
							echo '	<div class="option_name">
										<label for="'.$option['id'].'">'.$option['label'].'</label>
									</div>';
							echo '	<div class="option_value">';
						}
						echo '	<div class="sr-message-info"><i>'.$option['desc'].'</i></div>';	
						if (isset($option['label']) && $option['label'] !== '') {
							echo '	</div>';	
						}
					echo '</div>';
				echo '</div>';
			break;
			
			
			// text
			case 'text':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">
									<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			
			// textarea
			case 'textarea':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">
									<textarea name="'.$option['id'].'" id="'.$option['id'].'">'.htmlspecialchars($value, ENT_QUOTES).'</textarea>
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			// title
			case 'title':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						
						if ($option['id'] == '_sr_alttitle' || $option['id'] == '_sr_singletitlemain' && !$value) {
							$ph = 'placeholder="'.get_the_title().'"'; } else { $ph = ''; }
								
						echo '	<div class="option_value">
									<input '.$ph.' type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />';
						$defaultSize = get_post_meta($post->ID, $option['id'].'-size', true);
						if ($defaultSize == '' && isset($option['defaultsize'])) { $defaultSize = $option['defaultsize']; }
						echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size" style="margin-left:10px;top:-2px;position:relative;">';
						for ($i=1;$i<7;$i++) {
							if ($defaultSize == 'h'.$i) { $selected = 'selected="selected"'; } else { $selected = ''; }
							echo '<option value="h'.$i.'" '.$selected.'>H'.$i.'</option>';
						}
						echo '</select>';
						echo '</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			// editor
			case 'editor':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						if ($option['label']) {
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">';
						}
						wp_editor( $value, $option['id'],array('textarea_rows' => 13));
						if ($option['label']) {
						echo '</div>';
						}
					echo '</div>';
					echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;		
				echo '</div>';
			break;
			
			//color
			case "color":
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">
									<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" class="sr-color-field" />
								</div>';	
					echo '</div>';
				echo '</div>';
			break;
			
			//checkbox
			case 'checkbox':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						
						// default options
						$options = array(array(	"name" => esc_html__("On", 'dani'), 
												"value" => "1"),
										 array(	"name" => esc_html__("Off", 'dani'), 
												"value"=> "0"));
						if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
						$i = 0;
						$pseudo = '';
						$select = '';
						foreach ($options as $var) {
							if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
							$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.$active.'"> '.$var['name'].'</a>';
							$select .= '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
						$i++;	
						}
								
						echo '	<div class="option_value">
									<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
									<select name="'.$option['id'].'" id="'.$option['id'].'" style="display: none;">'.$select.'</select>
								</div>';		
					echo '</div>';
				echo '</div>';
			break;
			
			
			//checkbox-hiding
			case 'checkbox-hiding':  
				echo '<div class="option clear hiding'.$option['id'].' hiding">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						
						// default options
						$options = array(array(	"name" => esc_html__("On", 'dani'), "value" => "1"),
										 array(	"name" => esc_html__("Off", 'dani'), "value"=> "0"));
						if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
						$i = 0;
						$pseudo = '';
						$select = '';
						foreach ($options as $var) {
							if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
							$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.$active.'"> '.$var['name'].'</a>';
							$select .= '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
						$i++;	
						}
								
						echo '	<div class="option_value">
									<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
									<select name="'.$option['id'].'" id="'.$option['id'].'" style="display: none;">'.$select.'</select>
								</div>';		
					echo '</div>';
				echo '</div>';
			break;
			
			// selectbox  
			case 'selectbox':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">';
						
						// MESSAGE IF SLIDER
						if ($option['id'] == '_sr_slider' && count($option['option']) < 2) {
							echo '<div class="sr-message-note"><strong>No Slider exists</strong>.<br><em>Make sure the Revolution Slider plugin is installed and you have created a slider.</em></div>';
							$hidden= 'style="display:none;"';	
						} else { $hidden = ''; }
						
						// DIFFERENT default for blog post alignment
						if ($option['id'] == '_sr_titlealignment' && get_post_type() == 'post' && !get_post_meta($post->ID, $option['id'], true)) {
							$value = 'align-center';
						}
						
						echo '<select name="'.$option['id'].'" id="'.$option['id'].'" '.$hidden.'>';
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
						$i++;	
						}			  
						echo '</select>';
						
					echo '	</div>';	
					
					echo '</div>';
				echo '</div>';
			break;
			
			
			// selectbox-hiding  
			case 'selectbox-hiding':  
				echo '<div class="option clear hiding'.$option['id'].' hiding">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">';
						
						echo '<select name="'.$option['id'].'" id="'.$option['id'].'">';
						$i = 0;
						foreach ($option['option'] as $var) {
							if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
							echo '<option value="'.$var['value'].'" '.$selected.'> '.$var['name'].'</option>';
						$i++;	
						}			  
						echo '</select>'; 
					echo '	</div>';		
				
					echo '</div>';
				echo '</div>';
			break;
			
			// image  
			case 'image':  
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_image" type="hidden" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" size="30" />
									<input class="sr_upload_image_button sr-button" type="button" value="Upload Image" />
									<input class="sr_remove_image_button sr-button button-remove '.$removeClass.'" type="button" value="Remove Image" /><br />
									<span class="preview_image"><img class="'.$option['id'].'"  src="'.esc_url($value).'" alt="" /></span>
								</div>';		
					echo '</div>';
				echo '</div>';		
			break;
			
			// video  
			case 'video': 
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_video" type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" size="30" />
									<input class="upload_video_button sr-button" type="button" value="Add Video" />
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
			
			// audio  
			case 'audio': 
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						$removeClass = 'hide'; if ($value) { $removeClass = ''; }
						echo '	<div class="option_value">
									<input class="upload_audio" type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" size="30" />
									<input class="upload_audio_button sr-button" type="button" value="Add Audio" />
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
			
			// medias  
			case 'medias':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">';
							
							echo '<div id="sortable'.$option['id'].'" class="sortable-list">';
							echo '<textarea name="'.$option['id'].'" class="sortable-value" style="display:none;">'.$value.'</textarea>';
							echo '<ul id="sortable-'.$option['id'].'" class="sortable-container sortable-media clear">';
							
							$json = json_decode($value);
							if($json) {
							foreach($json->sortable as $j) {
								echo '<li>';
								echo '<input type="hidden" name="type" value="'.$j->type.'" class="to-json">';
								 
								switch($j->type) {
			
									// text
									case 'image':
										echo '<input type="hidden" name="id" value="'.$j->id.'" class="to-json">';
										echo '<div class="image-preview">'.wp_get_attachment_image( $j->id, 'thumbnail' ).'</div>';
									break;
								
								} // END switch
								
								echo '<a href="#" class="delete-sortable">delete</a></li>';
							} // END foreach
							} // END if()
							
							echo '</ul>';
							echo '<a class="add-to-sortable-media add-sortable-button sr-button" data-type="image">Add Image</a>';		
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
				echo '</div>';
			break;
			
			// category
			case 'category':
				echo '<div class="option clear">';
					echo '<div class="option-inner">';
						echo '	<div class="option_name">
									<label for="'.$option['id'].'">'.$option['label'].'</label>
									<div class="option_desc"><i>'.$option['desc'].'</i></div>
								</div>';
						echo '	<div class="option_value">
									<select name="'.$option['id'].'[]" id="'.$option['id'].'" size="5" multiple>';
									if ($option['option'] == 'portfolio') { $term = 'portfolio_category'; } else { $term = 'category'; }
									$categories = get_terms($term);
									foreach ($categories as $cat) {
										if (in_array($cat->term_id, $value)) { $selected = 'selected="selected"'; } else { $selected = ''; }
										echo '<option value="'.$cat->term_id.'" '.$selected.'>'.$cat->name.'</option>';
									}
						echo '		</select>
								</div>';		
					echo '</div>';
				echo '</div>'; 
			break;
							
		}
		
	} // end foreach  
	
	
	echo '</div>';
}



/*-----------------------------------------------------------------------------------*/
/*	Save Datas
/*-----------------------------------------------------------------------------------*/

function dani_save_meta_subtitle($post_id) {  
    global $dani_meta_subtitle;  
  
    // verify nonce  
    if (!isset($_POST['meta_subtitle_nonce']) || !wp_verify_nonce($_POST['meta_subtitle_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_subtitle as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_subtitle');


function dani_save_meta_portfoliosingle($post_id) {  
    global $dani_meta_portfoliosingle;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliosingle_nonce']) || !wp_verify_nonce($_POST['meta_portfoliosingle_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_portfoliosingle as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_portfoliosingle');



function dani_save_meta_imageposttype($post_id) {  
    global $dani_meta_imageposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_imageposttype_nonce']) || !wp_verify_nonce($_POST['meta_imageposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_imageposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_imageposttype');



function dani_save_meta_galleryposttype($post_id) {  
    global $dani_meta_galleryposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_galleryposttype_nonce']) || !wp_verify_nonce($_POST['meta_galleryposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_galleryposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_galleryposttype');



function dani_save_meta_videoposttype($post_id) {  
    global $dani_meta_videoposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_videoposttype_nonce']) || !wp_verify_nonce($_POST['meta_videoposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_videoposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_videoposttype');



function dani_save_meta_audioposttype($post_id) {  
    global $dani_meta_audioposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_audioposttype_nonce']) || !wp_verify_nonce($_POST['meta_audioposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_audioposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_audioposttype');



function dani_save_meta_quoteposttype($post_id) {  
    global $dani_meta_quoteposttype;  
  
    // verify nonce  
    if (!isset($_POST['meta_quoteposttype_nonce']) || !wp_verify_nonce($_POST['meta_quoteposttype_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_quoteposttype as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			} 
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_quoteposttype');


function dani_save_meta_portfoliosettings($post_id) {  
    global $dani_meta_portfoliosettings;  
  
    // verify nonce  
    if (!isset($_POST['meta_portfoliosettings_nonce']) || !wp_verify_nonce($_POST['meta_portfoliosettings_nonce'], basename(__FILE__))) 
        return $post_id; 
		
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;
		
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
     foreach ($dani_meta_portfoliosettings as $field) {  
        if (	$field['type'] !== 'info' && $field['type'] !== 'tabstart' && $field['type'] !== 'tabend' && 
			$field['type'] !== 'hidinggroupstart' && $field['type'] !== 'hidinggroupend') {
			$old = get_post_meta($post_id, $field['id'], true);  
			if (isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}
			}
			
			if ($field['type'] == 'category') { 
			//print_r($new);
			}
			
			// Size type
			if ($field['type'] == 'title') { 
				$old = get_post_meta($post_id, $field['id'].'-size', true);  
				$new = $_POST[$field['id'].'-size'];  
				if ($new !== '' && $new != $old) {  
					update_post_meta($post_id, $field['id'].'-size', $new);  
				} elseif ('' == $new && $old) {  
					delete_post_meta($post_id, $field['id'].'-size', $old);  
				} 
			}
		}  
    } // end foreach  
}  
add_action('save_post', 'dani_save_meta_portfoliosettings');

?>