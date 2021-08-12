<?php


/*-----------------------------------------------------------------------------------

	Option Page

-----------------------------------------------------------------------------------*/

$dani_themename = "Dani";

// Adding Option Panel
require_once( get_template_directory() . "/theme-admin/option-panel/google-fonts.php");
global $dani_googlefonts;

// Including Theme Importer function
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active( 'dani-core/dani-core.php' )) { 
	require_once( ABSPATH . 'wp-content/plugins/dani-core/importer/theme-importer.php');
}


/*-----------------------------------------------------------------------------------*/
/*	Sections & Options
/*-----------------------------------------------------------------------------------*/
$dani_sections = array (
	
	array( "name" => esc_html__("General", 'dani'),
		   "class" => "general",
		   "href" => "general"
		  ),
	
	array( "name" => esc_html__("Styling", 'dani'),
		   "class" => "styling",
		   "href" => "styling"
		  ),
	
	array( "name" => esc_html__("Header & Menu", 'dani'),
		   "class" => "header",
		   "href" => "header"
		  ),
		  
	array( "name" => esc_html__("Footer", 'dani'),
		   "class" => "footer",
		   "href" => "footer"
		  ),
	
	array( "name" => esc_html__("Blog", 'dani'),
		   "class" => "blog",
		   "href" => "blog"
		  ),
	
	array( "name" => esc_html__("Portfolio", 'dani'),
		   "class" => "portfolio",
		   "href" => "portfolio"
		  ),
	
	array( "name" => esc_html__("Typography", 'dani'),
		   "class" => "typography",
		   "href" => "typography"
		  ),
		  
	array( "name" => esc_html__("Social Networks", 'dani'),
		   "class" => "social",
		   "href" => "social"
		  ),
		  
	array( "name" => esc_html__("Demo Import", 'dani'),
		   "class" => "import",
		   "href" => "import"
		  )
	
);

if (class_exists('Woocommerce')) {
	$shop_section = array(
	array( "name" => esc_html__("Shop", 'dani'),
		   "class" => "shop",
		   "href" => "shop"
		  )
	);
	array_splice($dani_sections, 6, 0, $shop_section);
}

$dani_options = array(
	
	array( "name" => esc_html__("General", 'dani'),
		   "id" => "general",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Branding", 'dani'),
				   "id" => "_sr_general_branding",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Dark Logo", 'dani'),
					   "desc" => esc_html__("Upload your logo with dark appearence.", 'dani'),
					   "id" => "_sr_logo",
					   "type" => "image"
					  ),
					  
				array( "label" => esc_html__("Light Logo", 'dani'),
					   "desc" => esc_html__("Make sure to uplaod your light logo in the same size than the dark one.", 'dani'),
					   "id" => "_sr_logo_light",
					   "type" => "image"
					  ),
					  
				array( "label" => esc_html__("Logo Height", 'dani'),
					   "desc" => esc_html__("Auto: The logo will display in it original size.", 'dani'),
					   "id" => "_sr_logo_height",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Auto", 'dani'), 
									"value"=> "auto"),
							array(	"name" => esc_html__("Custom", 'dani'), 
									"value"=> "custom")
							),
					   "default" => "auto"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_logo_height",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Desktop logo height", 'dani'),
							   "desc" => esc_html__("Enter a custom height for your logo in desktop mode", 'dani').'<br><strong>'.esc_html__("Unit is PX.", 'dani').'</strong>',
							   "id" => "_sr_customlogoheight",
							   "type" => "number",
							   "default" => "30"
							  ),
							  
						array( "label" => esc_html__("Responsive logo height", 'dani'),
							   "desc" => esc_html__("Choose a different height (smaller) for the responsive view of your site.", 'dani').'<br><strong>'.esc_html__("Unit is PX.", 'dani').'</strong>',
							   "id" => "_sr_customlogoheightresponsive",
							   "type" => "number",
							   "default" => "25"
							  ),
							  
					array( 	"label" => "",
							"id" => "_sr_logo_height",
							"hiding" => "custom",	
							"type" => "hidinggroupend"
						),
				
				array( "label" => esc_html__("Favicon", 'dani'),
					   "desc" => esc_html__("Add a 32px x 32px Png/Gif image that will represent your website's favicon.", 'dani'),
					   "id" => "_sr_favicon",
					   "type" => "image"
					  ),
				
				array( "label" => esc_html__("Custom Login Logo", 'dani'),
					   "desc" => esc_html__("Add a custom logo for the Wordpress login screen.", 'dani'),
					   "id" => "_sr_loginlogo",
					   "type" => "image"
					  ),
				
			array( "label" => "",
				   "id" => "_sr_general_branding",
				   "type" => "groupend"
				  ),
				  
				  
			array( "label" => esc_html__("Preloader", 'dani'),
				   "id" => "_sr_general_preloader",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Preloader Screen", 'dani'),
					   "desc" => esc_html__("Do you want the preloading effect on start of each page?", 'dani'),
					   "id" => "_sr_preloader",
					   "type" => "checkbox-hiding",
					    "option" => array( 
							array(	"name" => esc_html__("Show", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("Hide", 'dani'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
					
					array( 	"label" => "",
							"id" => "_sr_preloader",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Custom Preloader Logo", 'dani'),
							   "desc" => esc_html__("Choose a custom logo for the preloader screen.", 'dani'),
							   "id" => "_sr_preloaderlogo",
							   "type" => "image"
							  ),
						
					array( 	"label" => "",
							"id" => "_sr_preloader",
							"hiding" => "1",	
							"type" => "hidinggroupend"
						),
				  
			array( "label" => "",
				   "id" => "_sr_general_preloader",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	
	array( "name" => esc_html__("Styling", 'dani'),
		   "id" => "styling",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		
			array( "label" => esc_html__("Appearance & Layout", 'dani'),
				   "id" => "_sr_styling_layout",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Appearance (Skin)", 'dani'),
					   "desc" => esc_html__("Choose a global appearance style (light or dark). ", 'dani').'<br>'.esc_html__("For custom background, use the customize option in Appearance > Customize.", 'dani'),
					   "id" => "_sr_appearance",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Light", 'dani'), 
									"value"=> "light"),
							array(	"name" => esc_html__("Dark", 'dani'), 
									"value"=> "dark")
							),
					   "default" => "light"
					  ),
					  
				array( "label" => esc_html__("Color", 'dani'),
					   "desc" => esc_html__("Add a custom color if wanted", 'dani'),
					   "id" => "_sr_color_style",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Black & White (default)", 'dani'), 
									"value"=> "default"),
							array(	"name" => esc_html__("Accent Color", 'dani'), 
									"value"=> "color")
							),
					   "default" => "default"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_color_style",
							"hiding" => "color",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Accent Color", 'dani'),
							   "desc" => esc_html__("This color will have impact on some elements (links, menu, etc.). Add the class 'colored' to text elements you want to take this color", 'dani'),
							   "id" => "_sr_customcolor",
							   "type" => "color",
							   "default" => "#d19b4f"
							  ),
							  
					array( 	"label" => "",
							"id" => "_sr_color_style",
							"hiding" => "color",	
							"type" => "hidinggroupend"
						),	  
					  
				array( "label" => esc_html__("Responsive Layout", 'dani'),
					   "desc" => esc_html__("This activates the responsive layout for mobile devices.", 'dani'),
					   "id" => "_sr_responsive",
					   "type" => "checkbox",
					  ),
							
			array( "label" => "",
				   "id" => "_sr_styling_layout",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("Custom", 'dani'),
				   "id" => "_sr_styling_custom",
				   "type" => "groupstart"
				  ),
			
				array( "label" => esc_html__("Custom CSS", 'dani'),
					   "desc" => esc_html__("Write your own CSS-Code.", 'dani'),
					   "id" => "_sr_customcss",
					   "type" => "textarea"
					  ),
			
			array( "label" => "",
				   "id" => "_sr_styling_custom",
				   "type" => "groupend"
				  ),
			
				
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),

	
	
	array( "name" => esc_html__("Header & Menu", 'dani'),
		   "id" => "header",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => esc_html__("Header Settings", 'dani'),
				   "id" => "_sr_headersettings",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Header Color", 'dani'),
					   "desc" => esc_html__("Choose between light,dark and transparent", 'dani').'',
					   "id" => "_sr_headercolor",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Light", 'dani'), 
									"value"=> "text-dark"),		 
							array(	"name" => esc_html__("Dark", 'dani'), 
									"value" => "text-light"),
							array(	"name" => esc_html__("Transparent", 'dani'), 
									"value" => "transparent")
							),
					   "default" => "text-dark"
					  ),
					  
				  					  
				array( "label" => esc_html__("Header Width", 'dani'),
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
					  
				array( "label" => esc_html__("Logo Position", 'dani'),
					   "desc" => "If center is choosed, you may add some info text or social networks below.",
					   "id" => "_sr_logoposition",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Left", 'dani'), 
									"value"=> "logo-left"),		 
							array(	"name" => esc_html__("Center", 'dani'), 
									"value" => "logo-centered")
							),
					   "default" => "logo-left"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_logoposition",
							"hiding" => "logo-centered",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Header Left", 'dani'),
							   "desc" => esc_html__("Enter some text or social networks to display on the left part of the header", 'dani').' <br><code>[sr-social]</code>',
							   "id" => "_sr_headerwidget",
							   "type" => "text"
							  ),	
							  
					array( 	"label" => "",
							"id" => "_sr_logoposition",
							"hiding" => "logo-centered",	
							"type" => "hidinggroupend"
						),
					
			array( "label" => "",
				   "id" => "_sr_headersettings",
				   "type" => "groupend"
				  ),
					  
			array( "label" => esc_html__("Menu Settings", 'dani'),
				   "id" => "_sr_menusettings",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Menu Layout", 'dani'),
					   "desc" => esc_html__("Choose a layout & appearence for your menu. Widgets: Add optional widgets to the menu area such as social links, ...", 'dani').'',
					   "id" => "_sr_menulayout",
					   "type" => "selectbox-hiding",
					   "option" => array(		 
							array(	"name" => esc_html__("Default", 'dani'), 
									"value" => "menu-default"),
							array(	"name" => esc_html__("Open Menu (classic menu)", 'dani'), 
									"value" => "menu-open"),
							array(	"name" => esc_html__("Full Menu with center alignment", 'dani'), 
									"value" => "menu-full-center"),
							array(	"name" => esc_html__("Full Menu with column alignment", 'dani'), 
									"value" => "menu-full-columns")
							),
					   "default" => "menu-default"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_menulayout",
							"hiding" => "menu-open",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Underline on hover", 'dani'),
							   "desc" => esc_html__("This will add an underline effect when hovering and active", 'dani'),
							   "id" => "_sr_menuunderlinehover",
							   "type" => "checkbox",
							   "option" => array( 
									array(	"name" => esc_html__("Yes", 'dani'), 
											"value"=> "1"),		 
									array(	"name" => esc_html__("No", 'dani'), 
											"value" => "0")
									),
							   "default" => "0"
							  ),
							  
					array( 	"label" => "",
							"id" => "_sr_menulayout",
							"hiding" => "menu-open",	
							"type" => "hidinggroupend"
						),
						
					array( "label" => esc_html__("Menu background", 'dani'),
						   "desc" => esc_html__("What background would you like for your menu?  If you go for a 'open menu (classic)' this will apply on mobile devices.", 'dani'),
						   "id" => "_sr_menubackground",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Light", 'dani'), 
										"value"=> "menu-light"),		 
								array(	"name" => esc_html__("Dark", 'dani'), 
										"value" => "menu-dark")
								),
						   "default" => "menu-light"
						  ),
				
			array( "label" => "",
				   "id" => "_sr_menusettings",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("WPML", 'dani'),
				   "id" => "_sr_wpmlsettings",
				   "type" => "groupstart",
				   "condition" => "wpml"
				  ),
				
					array( "label" => esc_html__("Show Language Switcher", 'dani'),
						   "desc" => esc_html__("Show the Language Switcher on the menu area?", 'dani').'<br><b>Sandbox:</b>'.esc_html__("Sandbox will display the switcher only for admin users, your visitors won't see it (testing mode)", 'dani'),
						   "id" => "_sr_wpmlswitcher",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "1"),
								array(	"name" => esc_html__("Sandbox", 'dani'), 
										"value" => "2"),		 
								array(	"name" => esc_html__("No", 'dani'), 
										"value" => "0")
								),
						   "default" => "1"
						  ),
				
			array( "label" => "",
				   "id" => "_sr_wpmlsettings",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),
			
			
			
			
	array( "name" => esc_html__("Footer", 'dani'),
		   "id" => "footer",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => esc_html__("Footer Settings", 'dani'),
				   "id" => "_sr_footersettings",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => esc_html__("Show Footer", 'dani'),
					   "desc" => esc_html__("Do you want to display the footer?", 'dani').'',
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
					  
				array( "label" => esc_html__("Footer Color", 'dani'),
					   "desc" => esc_html__("Light or Dark", 'dani').'',
					   "id" => "_sr_footercolor",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Light", 'dani'), 
									"value"=> "text-dark"),		 
							array(	"name" => esc_html__("Dark", 'dani'), 
									"value" => "text-light")
							),
					   "default" => "text-dark"
					  ),
					  
				array( "label" => esc_html__("Back to top", 'dani'),
					   "desc" => esc_html__("Do you want to enable the back to top arrow on the bottom tight?", 'dani').'',
					   "id" => "_sr_footerbacktotop",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'dani'), 
									"value" => "0")
							),
					   "default" => "1"
					  ),
					  					  
				array( "label" => esc_html__("Footer Layout", 'dani'),
					   "desc" => esc_html__('The Footer works with widgets.  Go to the Appearance > Widgets and enter your wanted widgets for the footer area.', 'dani'),
					   "id" => "_sr_footerlayout",
					   "type" => "selectbox-hiding",
					   "option" => array(
					   		array(	"name" => esc_html__("Columned (3 Columns)", 'dani'), 
									"value" => "column") ,
							array(	"name" => esc_html__("Center", 'dani'), 
									"value"=> "center")	 
							
							),
					   "default" => "align-column"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_footerlayout",
							"hiding" => "column",	
							"type" => "hidinggroupstart"
						),
							  
						array( "label" => esc_html__("Footer Width", 'dani'),
							   "desc" => "",
							   "id" => "_sr_footerwidth",
							   "type" => "selectbox",
							   "option" => array(
									array(	"name" => esc_html__("Default (1200px)", 'dani'), 
											"value" => "wrapper"),
									array(	"name" => esc_html__("Big (1660px)", 'dani'), 
											"value"=> "wrapper-big")	 
									),
							   "default" => "wrapper"
							  ),
							  
					array( 	"label" => "",
							"id" => "_sr_footerlayout",
							"hiding" => "column",	
							"type" => "hidinggroupend"
						),
					  
				array( "label" => esc_html__("Footer Bottom Text (left)", 'dani'),
					   "desc" => esc_html__("Bottom footer  text for the left site", 'dani'),
					   "id" => "_sr_copyrightleft",
					   "type" => "textarea"
					  ),
					  
				array( "label" => esc_html__("Footer Bottom Text (right)", 'dani'),
					   "desc" => esc_html__("Bottom footer  text for the right site", 'dani'),
					   "id" => "_sr_copyrightright",
					   "type" => "textarea"
					  ),
				
			array( "label" => "",
				   "id" => "_sr_footersettings",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),		

	
	
	
	array( "name" => esc_html__("Blog", 'dani'),
		   "id" => "blog",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),	 
	
			array( "label" => esc_html__("Blog Grid", 'dani'),
				   "id" => "_sr_blogentriesgroup",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => esc_html__("Blog Style", 'dani'),
					   "desc" => esc_html__("What style do you want for your general blog page.", 'dani').'',
					   "id" => "_sr_bloggridstyle",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Classic", 'dani'), 
									"value"=> "classic"),
							array(	"name" => esc_html__("Masonry", 'dani'), 
									"value"=> "masonry"),
							array(	"name" => esc_html__("Minimal Grid", 'dani'), 
									"value"=> "minimal-grid"),
							array(	"name" => esc_html__("Minimal List", 'dani'), 
									"value"=> "minimal-list")
							),
					   "default" => "masonry"
					  ),
					  
					array( 	"label" => "Masonry",
							"id" => "_sr_bloggridstyle",
							"hiding" => "masonry minimal-grid",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Columns", 'dani'),
							   "desc" => esc_html__("Select a column size for the blog grid.", 'dani').'',
							   "id" => "_sr_bloggridcolumns",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => "2", 
											"value"=> "2"),
									array(	"name" => "3", 
											"value"=> "3"),
									array(	"name" => "4", 
											"value"=> "4")
									),
							   "default" => "3"
							  ),	
							  
					array( 	"label" => "Masonry",
							"id" => "_sr_bloggridstyle",
							"hiding" => "masonry",	
							"type" => "hidinggroupend"
						),
						
					array( "label" => esc_html__("Sidebar", 'dani'),
					   "desc" => esc_html__("Do you want enable the sidebar for the blog page?  If yes, add your widgets to the sidebar.", 'dani'),
					   "id" => "_sr_bloggridsidebar",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("No Sidebar", 'dani'), 
									"value"=> "false"),
							array(	"name" => esc_html__("Left Sidebar", 'dani'), 
									"value"=> "left"),
							array(	"name" => esc_html__("Right Sidebar", 'dani'), 
									"value"=> "right")
							),
					   "default" => "false"
					  ),	
									
					array( "label" => esc_html__("Read More Button", 'dani'),
					   "desc" => esc_html__("Enable or disable the read more button on blog entries.", 'dani'),
					   "id" => "_sr_bloggridreadmore",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),	
					  
					array( "label" => esc_html__("Show Date", 'dani'),
					   "desc" => esc_html__("Show / Hide the date for your blog grid items.", 'dani'),
					   "id" => "_sr_bloggriddate",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),	
					  
					array( "label" => esc_html__("Show Category", 'dani'),
					   "desc" => esc_html__("Show or Hide the category for your blog grid items.", 'dani'),
					   "id" => "_sr_bloggridcategory",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),	
																
			array( "label" => "",
				   "id" => "_sr_blogentriesgroup",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("Single Post View", 'dani'),
				   "id" => "_sr_blogpostsgroup",
				   "type" => "groupstart"
				  ),
				   
				array( "label" => esc_html__("Show Date", 'dani'),
					   "desc" => esc_html__("Do you want to show the date in the page title", 'dani'),
					   "id" => "_sr_blogpostdate",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Show Categories", 'dani'),
					   "desc" => esc_html__("Do you want to show the related categories in the page title", 'dani'),
					   "id" => "_sr_blogpostcat",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Single Pagination", 'dani'),
					   "desc" => esc_html__("Do you want to activate the pagination between posts", 'dani'),
					   "id" => "_sr_blogpostpagination",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  					  
				array( "label" => esc_html__("Blog Posts Comments", 'dani'),
				   	   "desc" => esc_html__("Make sure 'Allow comments' are also checked in the post discussion option.", 'dani'),
					   "id" => "_sr_blogcomments",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Share", 'dani'),
					   "desc" => esc_html__("Enable the share feature.", 'dani'),
					   "id" => "_sr_blogpostshare",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
					array( 	"label" => "Share Yes",
							"id" => "_sr_blogpostshare",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => esc_html__("Facebook", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_fb",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Twitter", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_tw",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Google +", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_gplus",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Pinterest", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_pt",
					   			"type" => "check"
					   			),	
						
					array( 	"id" => "_sr_blogpostshare",
							"type" => "hidinggroupend"
						),
						
				array( "label" => esc_html__("Sidebar for single post", 'dani'),
				   	   "desc" => esc_html__("Activate the sidebar for your single posts.", 'dani'),
					   "id" => "_sr_blogpostsidebar",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("No Sidebar", 'dani'), 
									"value"=> "false"),
							array(	"name" => esc_html__("Left Sidebar", 'dani'), 
									"value"=> "left"),
							array(	"name" => esc_html__("Right Sidebar", 'dani'), 
									"value"=> "right")
							),
					   "default" => "false"
					  ),
				  														
			array( "label" => "",
				   "id" => "_sr_blogpostsgroup",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	array( "name" => esc_html__("Portfolio", 'dani'),
		   "id" => "portfolio",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
					  
			array( "label" => esc_html__("Portfolio Single Item", 'dani'),
				   "id" => "_sr_portfolio-single",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Custom URL name", 'dani'),
					   "desc" => esc_html__("This is the name/word which will appear in your url (if your permalink settings are set to post name)", 'dani').'<br><br><strong>ATTENTION</strong>:'.esc_html__("When changing you probably need to resave your permalinks in Settings > Permalinks.", 'dani'),
					   "id" => "_sr_portfoliourl",
					   "type" => "text",
					   "default" => "portfolio",
					  ),		  
					  
				array( "label" => esc_html__("Single Pagination", 'dani'),
					   "desc" => esc_html__("Enable the pagination between the portfolio posts.", 'dani'),
					   "id" => "_sr_portfoliopagination",
					   "type" => "checkbox-hiding",
					   "option" => array(
					   		array(	"name" => esc_html__("Hide", 'dani'), 
									"value"=> "0"), 
							array(	"name" => esc_html__("Normal", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("With Image", 'dani'), 
									"value"=> "image")
							),
					   "default" => "1"
					  ),
					  
					array( 	"label" => "Portfolio Page",
							"id" => "_sr_portfoliopagination",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Back to works (Portfolio) page", 'dani'),
							   "desc" => esc_html__("Select the Page where the 'back to works' button should lead to.", 'dani'),
							   "id" => "_sr_portfoliopage",
							   "type" => "pagelist"
							  ),
						
					array( 	"id" => "_sr_portfoliopagination",
							"type" => "hidinggroupend"
						),
						
					array( 	"label" => "Portfolio Page",
							"id" => "_sr_portfoliopagination",
							"hiding" => "image",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Title size", 'dani'),
							   "desc" => esc_html__("What size do you want to display the portfolio title in the image pagination?", 'dani'),
							   "id" => "_sr_portfolioimagepaginationsize",
							   "type" => "selectbox",
							   "option" => array(
									array(	"name" => "H1", 
											"value"=> "h1"), 
									array(	"name" => "H2", 
											"value"=> "h2"),
									array(	"name" => "H3", 
											"value"=> "h3"),
									array(	"name" => "H4", 
											"value"=> "h4"),
									array(	"name" => "H5", 
											"value"=> "h5"),
									array(	"name" => "H6", 
											"value"=> "h6"),
									),
							   "default" => "h3"
							  ),
						
					array( 	"id" => "_sr_portfoliopagination",
							"type" => "hidinggroupend"
						),
					  
				array( "label" => esc_html__("Share", 'dani'),
					   "desc" => esc_html__("Enable the share feature.", 'dani'),
					   "id" => "_sr_portfolioshare",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
					array( 	"label" => "Share Yes",
							"id" => "_sr_portfolioshare",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => "",
					   			"desc" => esc_html__("By default the share buttons are place at the bottom of your content. To place the sharing anywhere else in your content just use this shortcode: ", 'dani').' <code>[dani-share]</code>',
					   			"id" => "_sr_portfolioshare_info",
					   			"type" => "info"
					   			),
						
						array( 	"label" => esc_html__("Facebook", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_fb",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Twitter", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_tw",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Google +", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_gplus",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Pinterest", 'dani'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_pt",
					   			"type" => "check"
					   			),	
						
					array( 	"id" => "_sr_portfolioshare",
							"type" => "hidinggroupend"
						),
				
						
			array( "label" => esc_html__("Portfolio Comments", 'dani'),
				   	   "desc" => "Disable/Enable Comments for Portfolio items",
					   "id" => "_sr_portfoliocomments",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'dani'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'dani'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
					  
					  				
			array( "label" => "",
				   "id" => "_sr_portfolio-single",
				   "type" => "groupend"
				  ),
				
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	array( "name" => esc_html__("Typography", 'dani'),
		   "id" => "typography",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
	
			array( "label" => esc_html__("Body", 'dani'),
				   "id" => "_sr_typography-body",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Body Font", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_bodyfont",
					   "type" => "typo-body",
					   "option" => array( 
							array(	"id" => "_sr_bodyfont-font" ),
							array(	"id" => "_sr_bodyfont-weight" ),
							array(	"id" => "_sr_bodyfont-boldweight" ),
							array(	"id" => "_sr_bodyfont-size" ),
							array(	"id" => "_sr_bodyfont-height" ),
							array(	"id" => "_sr_bodyfont-spacing" ),
							array(	"id" => "_sr_bodyfont-1024" ),
							array(	"id" => "_sr_bodyfont-1024-height" ),
							array(	"id" => "_sr_bodyfont-768" ),
							array(	"id" => "_sr_bodyfont-768-height" ),
							array(	"id" => "_sr_bodyfont-480"),
							array(	"id" => "_sr_bodyfont-480-height")
							),
					   "default" => array('Hind','300','500','16px','25px','0','16px','25px','16px','25px','15px','24px')
					  ),
			
			array( "label" => "",
				   "id" => "_sr_typography-body",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("General Headings", 'dani'),
				   "id" => "_sr_typography-headings",
				   "type" => "groupstart"
				  ),
				
				array( "label" => "H1 Font",
				   	   "desc" => "",
					   "id" => "_sr_h1font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h1font-font" ),
							array(	"id" => "_sr_h1font-weight" ),
							array(	"id" => "_sr_h1font-boldweight" ),
							array(	"id" => "_sr_h1font-size" ),
							array(	"id" => "_sr_h1font-height" ),
							array(	"id" => "_sr_h1font-spacing" ),
							array(	"id" => "_sr_h1font-transform" ),
							array(	"id" => "_sr_h1font-1024" ),
							array(	"id" => "_sr_h1font-1024-height" ),
							array(	"id" => "_sr_h1font-768" ),
							array(	"id" => "_sr_h1font-768-height" ),
							array(	"id" => "_sr_h1font-480" ),
							array(	"id" => "_sr_h1font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','66px','80px','0','none','58px','71px','46px','56px','44px','54px')
					  ),
				
				array( "label" => "H2 Font",
				   	   "desc" => "",
					   "id" => "_sr_h2font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h2font-font" ),
							array(	"id" => "_sr_h2font-weight" ),
							array(	"id" => "_sr_h2font-boldweight" ),
							array(	"id" => "_sr_h2font-size" ),
							array(	"id" => "_sr_h2font-height" ),
							array(	"id" => "_sr_h2font-spacing" ),
							array(	"id" => "_sr_h2font-transform" ),
							array(	"id" => "_sr_h2font-1024" ),
							array(	"id" => "_sr_h2font-1024-height" ),
							array(	"id" => "_sr_h2font-768" ),
							array(	"id" => "_sr_h2font-768-height" ),
							array(	"id" => "_sr_h2font-480" ),
							array(	"id" => "_sr_h2font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','48px','61px','0','none','40px','53px','35px','44px','34px','44px')
					  ),
				
				array( "label" => "H3 Font",
				   	   "desc" => "",
					   "id" => "_sr_h3font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h3font-font" ),
							array(	"id" => "_sr_h3font-weight" ),
							array(	"id" => "_sr_h3font-boldweight" ),
							array(	"id" => "_sr_h3font-size" ),
							array(	"id" => "_sr_h3font-height" ),
							array(	"id" => "_sr_h3font-spacing" ),
							array(	"id" => "_sr_h3font-transform" ),
							array(	"id" => "_sr_h3font-1024" ),
							array(	"id" => "_sr_h3font-1024-height" ),
							array(	"id" => "_sr_h3font-768" ),
							array(	"id" => "_sr_h3font-768-height" ),
							array(	"id" => "_sr_h3font-480" ),
							array(	"id" => "_sr_h3font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','34px','46px','0','none','29px','41px','25px','34px','25px','34px')
					  ),
				
				array( "label" => "H4 Font",
				   	   "desc" => "",
					   "id" => "_sr_h4font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h4font-font" ),
							array(	"id" => "_sr_h4font-weight" ),
							array(	"id" => "_sr_h4font-boldweight" ),
							array(	"id" => "_sr_h4font-size" ),
							array(	"id" => "_sr_h4font-height" ),
							array(	"id" => "_sr_h4font-spacing" ),
							array(	"id" => "_sr_h4font-transform" ),
							array(	"id" => "_sr_h4font-1024" ),
							array(	"id" => "_sr_h4font-1024-height" ),
							array(	"id" => "_sr_h4font-768" ),
							array(	"id" => "_sr_h4font-768-height" ),
							array(	"id" => "_sr_h4font-480" ),
							array(	"id" => "_sr_h4font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','24px','35px','0','none','21px','32px','21px','30px','21px','30px')
					  ),
				
				array( "label" => "H5 Font",
				   	   "desc" => "",
					   "id" => "_sr_h5font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h5font-font" ),
							array(	"id" => "_sr_h5font-weight" ),
							array(	"id" => "_sr_h5font-boldweight" ),
							array(	"id" => "_sr_h5font-size" ),
							array(	"id" => "_sr_h5font-height" ),
							array(	"id" => "_sr_h5font-spacing" ),
							array(	"id" => "_sr_h5font-transform" ),
							array(	"id" => "_sr_h5font-1024" ),
							array(	"id" => "_sr_h5font-1024-height" ),
							array(	"id" => "_sr_h5font-768" ),
							array(	"id" => "_sr_h5font-768-height" ),
							array(	"id" => "_sr_h5font-480" ),
							array(	"id" => "_sr_h5font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','20px','31px','0','none','18px','29px','18px','27px','18px','27px')
					  ),
				
				array( "label" => "H6 Font",
				   	   "desc" => "",
					   "id" => "_sr_h6font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h6font-font" ),
							array(	"id" => "_sr_h6font-weight" ),
							array(	"id" => "_sr_h6font-boldweight" ),
							array(	"id" => "_sr_h6font-size" ),
							array(	"id" => "_sr_h6font-height" ),
							array(	"id" => "_sr_h6font-spacing" ),
							array(	"id" => "_sr_h6font-transform" ),
							array(	"id" => "_sr_h6font-1024" ),
							array(	"id" => "_sr_h6font-1024-height" ),
							array(	"id" => "_sr_h6font-768" ),
							array(	"id" => "_sr_h6font-768-height" ),
							array(	"id" => "_sr_h6font-480" ),
							array(	"id" => "_sr_h6font-480-height" )
							),
					   "default" => array('Playfair Display','400italic','700italic','16px','25px','0','none','16px','25px','16px','24px','16px','24px')
					  ),
				
			array( "label" => "",
				   "id" => "_sr_typography-headings",
				   "type" => "groupend"
				  ),
				  
				  
			array( "label" => esc_html__("Misc Headings", 'dani'),
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Subtitle", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_subtitle",
					   "type" => "typo-sub",
					   "option" => array( 
							array(	"id" => "_sr_subtitle-font" ),
							array(	"id" => "_sr_subtitle-weight" ),
							array(	"id" => "_sr_subtitle-boldweight" ),
							array(	"id" => "_sr_subtitle-spacing" ),
							array(	"id" => "_sr_subtitle-transform" ),
							),
					   "default" => array('Hind','300','500','0.02','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupend"
				  ),
			
						
			array( "label" => esc_html__("Navigation", 'dani'),
				   "id" => "_sr_typography-navigation",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Root Menu", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_navigationfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_navigationfont-font" ),
							array(	"id" => "_sr_navigationfont-weight" ),
							array(	"id" => "_sr_navigationfont-size" ),
							array(	"id" => "_sr_navigationfont-spacing" ),
							array(	"id" => "_sr_navigationfont-transform" )
							),
					   "default" => array('Playfair Display','700','40px','0','none')
					  ),
					  
				array( "label" => esc_html__("Sub Menu", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_navigationsubfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_navigationsubfont-font" ),
							array(	"id" => "_sr_navigationsubfont-weight" ),
							array(	"id" => "_sr_navigationsubfont-size" ),
							array(	"id" => "_sr_navigationsubfont-spacing" ),
							array(	"id" => "_sr_navigationsubfont-transform" )
							),
					   "default" => array('Hind','400','14px','0.02','uppercase')
					  ),
											
			array( "label" => "",
				   "id" => "_sr_typography-navigation",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Portfolio", 'dani'),
				   "id" => "_sr_typography-portfolio",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Portfolio Title", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_portfoliotitle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_portfoliotitle-font" ),
							array(	"id" => "_sr_portfoliotitle-weight" ),
							array(	"id" => "_sr_portfoliotitle-spacing" ),
							array(	"id" => "_sr_portfoliotitle-transform" ),
							),
					   "default" => array('Playfair Display','400','0','none')
					  ),
					  
				array( "label" => esc_html__("Portfolio Category (for grid)", 'dani'),
					   "desc" => "",
					   "id" => "_sr_portfoliocategoryfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_portfoliocategoryfont-font" ),
							array(	"id" => "_sr_portfoliocategoryfont-weight" ),
							array(	"id" => "_sr_portfoliocategoryfont-size" ),
							array(	"id" => "_sr_portfoliocategoryfont-spacing" ),
							array(	"id" => "_sr_portfoliocategoryfont-transform" ),
							),
					   "default" => array('Hind','300','14px','0.18','uppercase')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-portfolio",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("Buttons", 'dani'),
				   "id" => "_sr_typography-button",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Button Font", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_buttonfont",
					   "type" => "typo-button",
					   "option" => array( 
							array(	"id" => "_sr_buttonfont-font" ),
							array(	"id" => "_sr_buttonfont-weight" ),
							array(	"id" => "_sr_buttonfont-boldweight" ),
							array(	"id" => "_sr_buttonfont-spacing" ),
							array(	"id" => "_sr_buttonfont-transform" )
							),
					   "default" => array('Hind','400','500','0.06','uppercase')
					  ),
				
			array( "label" => "",
				   "id" => "_sr_typography-button",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Misc Typography", 'dani'),
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Widget Titles", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_widgettitlefont",
					   "type" => "typo-misc",
					   "option" => array( 
							array(	"id" => "_sr_widgettitlefont-font" ),
							array(	"id" => "_sr_widgettitlefont-weight" ),
							array(	"id" => "_sr_widgettitlefont-size" ),
							array(	"id" => "_sr_widgettitlefont-spacing" ),
							array(	"id" => "_sr_widgettitlefont-transform" )
							),
					   "default" => array('Hind','500','h5','0','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Font manager", 'dani'),
				   "id" => "_sr_typography-fontmanager",
				   "type" => "groupstart"
				  ),
				  				
				array( "label" => esc_html__("Add Font", 'dani'),
				   	   "desc" => "",
					   "id" => "_sr_fontmanager",
					   "type" => "fontmanager"
					   ),
					   
				array( "label" => esc_html__("Typekit", 'dani'),
					   "desc" => esc_html__('If you plan to add typekit fonts, please enter the javascript code here.', 'dani'),
					   "id" => "_sr_typekit",
					   "type" => "textarea",
					   "rows" => "7"
					  ),	  
				
			array( "label" => "",
				   "id" => "_sr_typography-fontmanager",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
	
	array( "name" => esc_html__("Social Networks", 'dani'),
		   "id" => "social",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Social Networks", 'dani'),
				   "id" => "_sr_social_networks",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => "",
					   "desc" => esc_html__('You can use this shortcode in any of your pages, widgets or footer textarea to display the link to your social profiles.  Choose between "normal" & "text style".', 'dani').'<code>[sr-social style="normal"]</code>',
					   "id" => "_sr_social_facebook",
					   "type" => "info"
					  ),
				  
				array( "label" => esc_html__("Facebook", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_facebook",
					   "type" => "text"
					  ),
				
				array( "label" => esc_html__("Twitter", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_twitter",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Google +", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_googleplus",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Vimeo", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_vimeo",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Instagram", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_instagram",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Dribbble", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_dribbble",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Youtube", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_youtube",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Deviantart", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_deviantart",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Behance", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_behance",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Flickr", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_flickr",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("LinkedIn", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_linkedin",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Rss", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_rss",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Pinterest", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_pinterest",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Xing", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_xing",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Dropbox", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_dropbox",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Stumbleupon", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_stumbleupon",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Delicious", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_delicious",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Soundcloud", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_soundcloud",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Spotify", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_spotify",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Codepen", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_codepen",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Github", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_github",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Lastfm", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_lastfm",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("jsfiddle", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_jsfiddle",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Mixcloud", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_mixcloud",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Skype", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_skype",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("VK", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_vk",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Your Email", 'dani'),
					   "desc" => "",
					   "id" => "_sr_social_mail",
					   "type" => "text"
					  ),
			
			array( "label" => "",
				   "id" => "_sr_social_networks",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
			
	array( "name" => esc_html__("Demo Import", 'dani'),
		   "id" => "import",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
				array( "label" => esc_html__("Demo Choose", 'dani'),
					   "desc" => "",
					   "id" => "",
					   "type" => "import"
					  ),				 
			
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
			
			
	array( "name" => esc_html__("Shop Settings", 'dani'),
		   "id" => "shop",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Item / Product Options", 'dani'),
				   "id" => "_sr_shop-grid",
				   "type" => "groupstart"
				  ),
				  
				array( 	"label" => "",
						"desc" => esc_html__("These are the general item options (main shop page, archive pages, Related Products, Up-Sells, ...)", 'dani'),
						"id" => "_sr_shopiteminfo",
						"type" => "info"
						),		  
				  									  
				array( "label" => esc_html__("Item Layout", 'dani'),
					   "desc" => "",
					   "id" => "_sr_shopitemlayout",
					   "type" => "selectbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Infos below image", 'dani'), 
									"value"=> "below"),
					   		array(	"name" => esc_html__("Infos across Image (bottom)", 'dani'), 
									"value"=> "across-bottom"),
							array(	"name" => esc_html__("Infos across Image (top)", 'dani'), 
									"value"=> "across-top"),
							array(	"name" => esc_html__("Infos across Image (center)", 'dani'), 
									"value"=> "across-center")
							),
					   "default" => "below"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_shopitemlayout",
							"hiding" => "across-bottom across-top across-center",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Show Infos", 'dani'),
							   "desc" => esc_html__("Do you want to show the infos (Item title, Price, etc.) on start, or only display them when hovering the image?", 'dani'),
							   "id" => "_sr_shopitemshowinfos",
							  	"type" => "selectbox",
							   "option" => array(
									array(	"name" => esc_html__("Always show infos", 'dani'), 
											"value"=> "onstart"),
									array(	"name" => esc_html__("Show infos on hover", 'dani'), 
											"value"=> "onhover")
									),
							   "default" => "onstart"
							  ),
						
					array( 	"id" => "_sr_shopitemlayout",
							"type" => "hidinggroupend"
						),
					  
				array( "label" => esc_html__("Hover Color", 'dani'),
					   "desc" => esc_html__("What hover effect do you would like to have when hovering the image?", 'dani'),
					   "id" => "_sr_shopitemhover",
					   "type" => "selectbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Light", 'dani'), 
									"value"=> "text-dark"),
					   		array(	"name" => esc_html__("Dark", 'dani'), 
									"value"=> "text-light"),
							array(	"name" => esc_html__("Custom", 'dani'), 
									"value"=> "custom"),
							array(	"name" => esc_html__("No hover color", 'dani'), 
									"value"=> "0")
							),
					   "default" => "text-dark"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_shopitemhover",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Custom Color", 'dani'),
							   "desc" => "",
							   "id" => "_sr_shopitemhovercustom",
							   "type" => "color"
							  ),
						
					array( 	"id" => "_sr_shopitemhover",
							"type" => "hidinggroupend"
						),
					  
				array( "label" => esc_html__("Title Font Size", 'dani'),
					   "desc" => "",
					   "id" => "_sr_shopitemtitlesize",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "h1",
									"value" => "h1"),
							array(	"name" => "h2",
									"value" => "h2"),
							array(	"name" => "h3",
									"value" => "h3"),
							array(	"name" => "h4",
									"value" => "h4"),
							array(	"name" => "h5",
									"value" => "h5"),
							array(	"name" => "h6",
									"value" => "h6")
							),
					   "default" => "h5"
					  ),
					  
				array( 	"label" => esc_html__("Show Item Price", 'dani'),
					   "desc" => esc_html__('Want to display the price?', 'dani'),
						"id" => "_sr_shopgridshowprice",
						"type" => "check"
						),
						
				array( 	"label" => esc_html__("Add to cart", 'dani'),
					   "desc" => esc_html__('Show the "Add to cart" button in the grid items.', 'dani'),
						"id" => "_sr_shopgridshowaddtocart",
						"type" => "check"
						),
						
				array( 	"label" => esc_html__("Show Sale Badge", 'dani'),
					   "desc" => esc_html__('Enable the sale badge', 'dani'),
						"id" => "_sr_shopgridshowsale",
						"type" => "check"
						),
						
				array( "label" => esc_html__("Sale Badge Color", 'dani'),
					   "desc" => esc_html__("Choose a color for the Sale badge", 'dani'),
					   "id" => "_sr_shopgridsalecolor",
						"type" => "selectbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("White", 'dani'), 
									"value"=> "text-dark"),
							array(	"name" => esc_html__("Black", 'dani'), 
									"value"=> "text-light"),
							array(	"name" => esc_html__("Custom", 'dani'), 
									"value"=> "custom")
							),
					   "default" => "text-dark"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_shopgridsalecolor",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
						
						array( "label" => esc_html__("Custom Color", 'dani'),
							   "desc" => "",
							   "id" => "_sr_shopgridsalecolorcustom",
							   "type" => "color"
							  ),
						
					array( 	"id" => "_sr_shopgridsalecolor",
							"type" => "hidinggroupend"
						),
											  
			array( "label" => "",
				   "id" => "_sr_shop-grid",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Grid Options", 'dani'),
				   "id" => "_sr_shop-options",
				   "type" => "groupstart"
				  ),
				  				  
				array( "label" => esc_html__("Grid Width", 'dani'),
					   "desc" => "",
					   "id" => "_sr_shopgridwidth",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Default (1200px)", 'dani'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Big (1660px)", 'dani'), 
									"value"=> "wrapper-big")
							),
						"default" => "wrapper"
					  ),
				
				array( "label" => esc_html__("Products per Page", 'dani'),
					   "desc" => esc_html__('How many items per page? Enter "-1" to show all.', 'dani'),
					   "id" => "_sr_shopgridcount",
					   "type" => "text",
					   "default" => "12"
					  ),		  
				  
				array( "label" => esc_html__("Columns", 'dani'),
					   "desc" => esc_html__("How many columns of items do you want to show per row?", 'dani').'',
					   "id" => "_sr_shopgridcol",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "2",
									"value" => "2"),
							array(	"name" => "3",
									"value" => "3"),
							array(	"name" => "4",
									"value" => "4"),
							array(	"name" => "5",
									"value" => "5")
							),
					   "default" => "3"
					  ),
					  					  					  						
				array( 	"label" => esc_html__("Result Count", 'dani'),
					   	"desc" => esc_html__("Do you want to show the results count on the top of the grid? ", 'dani'),
						"id" => "_sr_shopgridshowresults",
						"type" => "check"
						),
						
				array( 	"label" => esc_html__("Sorting Option", 'dani'),
					   	"desc" => esc_html__("Enable the sorting option", 'dani'),
						"id" => "_sr_shopgridshowsorting",
						"type" => "check"
						),
						
				array( "label" => esc_html__("Sidebar", 'dani'),
					   "desc" => esc_html__("Do you want enable the sidebar for the shop archive page? If yes, add your widgets to the sidebar.", 'dani'),
					   "id" => "_sr_shopgridsidebar",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("No Sidebar", 'dani'), 
									"value"=> "false"),
							array(	"name" => esc_html__("Left Sidebar", 'dani'), 
									"value"=> "left"),
							array(	"name" => esc_html__("Right Sidebar", 'dani'), 
									"value"=> "right")
							),
					   "default" => "false"
					  ),	
					  
				array( 	"label" => esc_html__("Pagination / Load More", 'dani'),
						"desc" => esc_html__('Choose your pagination option.', 'dani'),
						"id" => "_sr_shopgridpagination",
						"type" => "selectbox",
						"option" => array( 
							array(	"name" => esc_html__("Default Pagination", 'dani'), 
									"value" => "pagination"),
							array(	"name" => esc_html__("Load More", 'dani'), 
									"value" => "loadonclick"),
							array(	"name" => esc_html__("Infinity Load", 'dani'), 
									"value" => "infiniteload")
							),
						"default" => "pagination"
					  ),
					  
			array( "label" => "",
				   "id" => "_sr_shop-options",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Single Product", 'dani'),
				   "id" => "_sr_shop-single",
				   "type" => "groupstart"
				  ),
				  
			array( "label" => esc_html__("Title Font Size", 'dani'),
					   "desc" => "",
					   "id" => "_sr_shopsingletitlesize",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "h1",
									"value" => "h1"),
							array(	"name" => "h2",
									"value" => "h2"),
							array(	"name" => "h3",
									"value" => "h3"),
							array(	"name" => "h4",
									"value" => "h4"),
							array(	"name" => "h5",
									"value" => "h5"),
							array(	"name" => "h6",
									"value" => "h6")
							),
					   "default" => "h1"
					  ),
				  
			array( "label" => esc_html__("Share", 'dani'),
				   "desc" => esc_html__("Enable the share feature.", 'dani'),
				   "id" => "_sr_shopsingleshare",
				   "type" => "checkbox-hiding",
				   "option" => array( 
						array(	"name" => esc_html__("Enable", 'dani'), 
								"value"=> "1"),
						array(	"name" => esc_html__("Disable", 'dani'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),
				  
				array( 	"label" => "Share Yes",
						"id" => "_sr_shopsingleshare",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( 	"label" => esc_html__("Facebook", 'dani'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_fb",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Twitter", 'dani'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_tw",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Google +", 'dani'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_gplus",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Pinterest", 'dani'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_pt",
							"type" => "check"
							),	
					
				array( 	"id" => "_sr_blogpostshare",
						"type" => "hidinggroupend"
					),
				  
			array( "label" => esc_html__("Reviews", 'dani'),
				   "desc" => esc_html__("Enable / Disable the review option", 'dani'),
				   "id" => "_sr_shopsinglereviews",
				   "type" => "checkbox",
				   "option" => array(
						array(	"name" => esc_html__("Enable", 'dani'), 
								"value"=> "1"),
						array(	"name" => esc_html__("Disable", 'dani'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),	
				  
			array( "label" => esc_html__("Related Products", 'dani'),
				   "desc" => esc_html__("Show the related products on the bottom of the page?", 'dani'),
				   "id" => "_sr_shopsinglerelated",
				   "type" => "checkbox-hiding",
				   "option" => array(
						array(	"name" => esc_html__("Yes", 'dani'), 
								"value"=> "1"),
						array(	"name" => esc_html__("No", 'dani'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),	
				  
				array( 	"id" => "_sr_shopsinglerelated",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( "label" => esc_html__("Columns", 'dani').' ('.esc_html__("Related Products", 'dani').')',
						   "desc" => esc_html__("How many columns for the related posts?", 'dani').'',
						   "id" => "_sr_shopsinglerelatedcol",
						   "type" => "selectbox",
						   "option" => array(		 
								array(	"name" => "2",
										"value" => "2"),
								array(	"name" => "3",
										"value" => "3"),
								array(	"name" => "4",
										"value" => "4"),
								array(	"name" => "5",
										"value" => "5")
								),
						   "default" => "4"
						  ),	
					
				array( 	"id" => "_sr_shopsinglerelated",
						"type" => "hidinggroupend"
					),
				  
			array( "label" => esc_html__("You may also like... (Up-Sells)", 'dani'),
				   "desc" => esc_html__("Do you want to show the Up-Sells and Cross-Sells?", 'dani'),
				   "id" => "_sr_shopsingleupsells",
				   "type" => "checkbox-hiding",
				   "option" => array(
						array(	"name" => esc_html__("Yes", 'dani'), 
								"value"=> "1"),
						array(	"name" => esc_html__("No", 'dani'), 
								"value"=> "0")
						),
				   "default" => "0"
				  ),	 
				  
				array( 	"id" => "_sr_shopsingleupsells",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( "label" => esc_html__("Columns", 'dani').' ('.esc_html__("Up-Sells", 'dani').')',
						   "desc" => esc_html__("How many columns for the Up-Sells?", 'dani').'',
						   "id" => "_sr_shopsingleupsellscol",
						   "type" => "selectbox",
						   "option" => array(		 
								array(	"name" => "2",
										"value" => "2"),
								array(	"name" => "3",
										"value" => "3"),
								array(	"name" => "4",
										"value" => "4"),
								array(	"name" => "5",
										"value" => "5")
								),
						   "default" => "4"
						  ),	
					
				array( 	"id" => "_sr_shopsingleupsells",
						"type" => "hidinggroupend"
					),
				  
			array( 	"label" => esc_html__("Show SKU meta", 'dani'),
				    "desc" => "",
					"id" => "_sr_shopsinglesku",
					"type" => "check"
					),
					
			array( 	"label" => esc_html__("Show Categories meta", 'dani'),
				    "desc" => "",
					"id" => "_sr_shopsinglecategories",
					"type" => "check"
					),
					
			array( 	"label" => esc_html__("Show Tags meta", 'dani'),
				    "desc" => "",
					"id" => "_sr_shopsingletags",
					"type" => "check"
					), 
				  				
			array( "label" => "",
				   "id" => "_sr_shop-single",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Cart", 'dani'),
				   "id" => "_sr_shop-cart",
				   "type" => "groupstart"
				  ),
				  				
				array( "label" => esc_html__("Minicart", 'dani'),
					   "desc" => esc_html__("Show the mini cart on the menu", 'dani'),
					   "id" => "_sr_shopminicart",
					   "type" => "checkbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Yes", 'dani'), 
									"value"=> "1"),
					   		array(	"name" => esc_html__("No", 'dani'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( 	"id" => "_sr_shopminicart",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( 	"label" => esc_html__("Enable Ajax", 'dani'),
							"desc" => esc_html__("This will automatically open the minicart if you enabled the AJAX feature in your add to cart behaviour. (woocommerce settings)", 'dani'),
							"id" => "_sr_shopminicartajax",
					   		"type" => "checkbox",
							"option" => array(
								array(	"name" => esc_html__("Yes", 'dani'), 
										"value"=> "1"),
								array(	"name" => esc_html__("No", 'dani'), 
										"value"=> "0")
								),
						   "default" => "1"
							),
												
				array( 	"id" => "_sr_blogpostshare",
						"type" => "hidinggroupend"
					),
				
			array( "label" => "",
				   "id" => "_sr_shop-cart",
				   "type" => "groupend"
				  ),
		  
	array ( "type" => "sectionend",
		   	"id" => "sectionend")
		
);


/*-----------------------------------------------------------------------------------*/
/*	Add Page/Subpage & generate save/reset
/*-----------------------------------------------------------------------------------*/

function dani_theme_add_admin() {
 
global $dani_themename, $dani_options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'save' ) {
		$optiontree = '';		
		foreach ($dani_options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { 
				update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				$o_val = str_replace(home_url(),'dani_SITE_URL',$_REQUEST[$value['id']]);;
				$optiontree .= $value['id'].';:;'.$o_val.'|:|'; 
			} 
			else { delete_option( $value['id'] ); }
			
			if( isset(  $value['option'] ) && $value['option'] ) {
				foreach ($value['option'] as $var) {
					if ( isset(  $var['id']) ) {
						if ( isset( $_REQUEST[ $var['id'] ] ) ) { 
							update_option( $var['id'], $_REQUEST[ $var['id'] ]  );
							$o_val = str_replace(home_url(),'dani_SITE_URL',$_REQUEST[$var['id']]);;
							$optiontree .= $var['id'].';:;'.$o_val.'|:|'; 
						} 
						else { delete_option( $var['id'] ); }
					}
				}
			}
			
		}
		$optiontree = substr($optiontree, 0, -3);
		update_option( '_sr_optiontree', $optiontree );
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&saved=true' ) );
		die;
	} 
	else if( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'reset' ) {
		foreach ($dani_options as $value) {
			delete_option( $value['id'] ); 
			
			foreach ($value['option'] as $var) {
				delete_option( $var['id'] ); 
			}
		}
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&reset=true' ) );
		die;
	}
	else if( isset($_REQUEST['importdemo'])  &&  $_REQUEST['importdemo'] !== '' ) {
		dani_theme_importoptions($_REQUEST['importdemo'],$_REQUEST['xml']);
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=true' ) );
		die;
	}
}
 
add_theme_page($dani_themename, 'Theme Options', 'administrator', basename(__FILE__), 'dani_theme_interface');
}

add_action('admin_menu', 'dani_theme_add_admin');



/*-----------------------------------------------------------------------------------*/
/*	Building interface
/*-----------------------------------------------------------------------------------*/
function dani_theme_interface() {
 
global $dani_themename, $dani_options, $dani_sections, $dani_googlefonts;
$i=0;
 
echo '	<div class="sr_wrap">
		<form method="post">
		
		<div class="sr_header clear">
			<h1>'.$dani_themename.'</h1> <div class="icon32" id="icon-options-general"></div>
			<input name="save" type="submit" value="Save all changes" class="submit-option"/>
		</div>
		';
    
	if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] != "") { echo '<div class="message_ok fade"><p><strong>'.$dani_themename.' '.esc_html__("settings saved", 'dani').'.</strong></p></div>'; }
	if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] != "") { echo '<div class="message_ok fade"><p><strong>'.$dani_themename.' '.esc_html__("settings reset", 'dani').'.</strong></p></div>'; }
	
	if ( isset($_REQUEST['blogreset']) && $_REQUEST['blogreset'] != "") {
		echo '<div class="message_ok fade"><p><strong>"'.$_REQUEST['blogreset'].'" '.esc_html__("for blog settings reset", 'dani').'.</strong></p></div>';
		if ($_REQUEST['blogreset'] == 'views') { dani_resetPostMeta('views','post'); }
		if ($_REQUEST['blogreset'] == 'likes') { dani_resetPostMeta('likes','post'); }
	}
	
	if ( isset($_REQUEST['portfolioreset']) && $_REQUEST['portfolioreset'] != "") {
		echo '<div class="message_ok fade"><p><strong>"'.$_REQUEST['portfolioreset'].'" '.esc_html__("for portfolio settings reset", 'dani').'.</strong></p></div>';
		if ($_REQUEST['portfolioreset'] == 'views') { dani_resetPostMeta('views','portfolio'); }
		if ($_REQUEST['portfolioreset'] == 'likes') { dani_resetPostMeta('likes','portfolio'); }
	}
	
	if ( isset($_REQUEST['import']) && $_REQUEST['import'] !== "") {
		echo '<div class="message_ok fade message_import"><p><strong>'.esc_html__("The Demo has been imported", 'dani').'.</strong></p></div>';
		dani_theme_import_updatepagebuilder();
	}
	
	
	echo '<div id="sr_body" class="sr-style clear">';
    
	//  Add the sections
	echo '<ul id="section-list">';
	foreach ($dani_sections as $section) {
	
		echo '<li class="'.$section['class'].'"><a href="'.$section['href'].'">'.$section['name'].'</a></li>';
	
	} 
	echo '</ul>';
	
	
	echo '<div class="section-tab">';
	
	$dani_fontsize = array('9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','29px','30px','31px','32px','33px','34px','35px','36px','37px','38px','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px','51px','52px','53px','54px','55px','56px','57px','58px','59px','60px','61px','62px','63px','64px','65px','66px','67px','68px','69px','70px','71px','72px','73px','74px','75px','76px','77px','78px','79px','80px','81px','82px','83px','84px','85px','86px','87px','88px','89px','90px','91px','92px','93px','94px','95px','96px','97px','98px','99px','100px');
	
	$dani_fontspacing = array('-0.2','-0.15','-0.12','-0.1','-0.08','-0.04','-0.02','0','0.02','0.04','0.06','0.08','0.1','0.12','0.15','0.2','0.25','0.3','0.35','0.4',);
	
	$customfonts = stripslashes(get_option('_sr_fontmanager'));
	
	//  Add the options
	foreach ($dani_options as $option) {
		
		$value = stripslashes(get_option( $option['id'])  );
		if ($value == '' && (isset($option['default']) && $option['default'] !== '')) { $value = $option['default']; }
		
		switch ( $option['type'] ) {
		
		//sectionstart
		case "sectionstart":
			echo '	<div id="'.$option['id'].'" class="section-content">';
			if ($option['desc'] && $option['desc'] !== '') { echo '<div class="section-desc"><i>'.$option['desc'].'</i></div>'; }
			
			if (($option['id'] == 'portfolio' || $option['id'] == 'import') && !is_plugin_active( 'dani-core/dani-core.php' )) { 
				echo '<div class="sr-import-message">ATTENTION<br>Please install and activate the required Dani Core plugin.</div>';
				echo '<div class="hide-content">'; 
			} else {
				echo '<div>'; 
			}
		break;
		
		
		//sectionend
		case "sectionend":
			echo '</div>';
			echo '</div>';
		break;
		
		
		//groupstart
		case "groupstart":
			// condition firstly added for wpml check
			$groupClass = '';
			if (isset($option['condition']) && $option['condition'] == 'wpml' && !function_exists('icl_object_id')) { $groupClass = ' groupdisable'; }
			echo '<div id="'.$option['id'].'" class="optiongroup '.$groupClass.'">';
			echo '<div class="optiongroup-title"><h4>'.$option['label'].'</h4></div>';
			echo '<div class="optiongroup-content">';
		break;
		
		
		//groupend
		case "groupend":
			echo '	</div>'; // END optiongroup-content
			echo '	</div>'; // END optiongroup
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
			echo '	</div>'; // END hidinggroup
		break;
		
		
		//info
		case "info":
			echo '<div class="option option-info clear">';
				echo '	<i>'.$option['desc'].'</i>';		
			echo '</div>';
		break;
		
		
		//text
		case "text":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;		
			echo '</div>';
		break;
		
		
		//number
		case "number":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">
								<input type="number" name="'.$option['id'].'" id="'.$option['id'].'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
							</div>';	
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
							</div>';
					echo '	<div class="option_value">
								<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" class="sr-color-field" />
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
			
		
		//textarea
		case "textarea":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					$rows = 14;		
					if (isset($option['rows'])) { $rows = $option['rows']; }
					echo '	<div class="option_value">
								<textarea name="'.$option['id'].'" id="'.$option['id'].'" cols="54" rows="'.$rows.'">'.$value.'</textarea>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
			
		//checkbox
		case 'check':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					if ($value) { $checkClass = "checked"; } else { $checkClass = ""; }
					echo '	<div class="option_name">
								<input type="checkbox" value="1" name="'.$option['id'].'" id="'.$option['id'].'" '.$checkClass.'/> 
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		//checkbox
		case 'checkbox':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
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
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		//checkbox
		case 'checkbox-hiding':  
			echo '<div class="option clear hiding'.$option['id'].' hiding">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
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
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		//radio
		case "radio":
			echo '<div class="option clear" id="sr_radio">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $checked = 'checked="checked"'; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; } else { $checked = '';  } }
						echo '<div><input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' /> '.$var['name'].'</div>';
					$i++;	
					}
	
					echo '	</div>';	
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// selectbox  
		case 'selectbox':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
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
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// selectbox-hiding  
		case 'selectbox-hiding':  
			echo '<div class="option clear hiding'.$option['id'].' hiding">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
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
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
				
		// typo-body  
		case 'typo-body': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Line Height</i><br>';
					$valueheight = stripslashes(get_option( $option['id'].'-height')  );
					if ($valueheight == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valueheight = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-height" id="'.$option['id'].'-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($valueheight == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuespacing = $option['default'][5]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
					
					echo '<div class="value_third"><i>Size for 1024 Screen</i><br>';
					$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
					if ($value1024 == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $value1024 = $option['default'][6]; }
					echo '<select name="'.$option['id'].'-1024" id="'.$option['id'].'-1024">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height1024 = stripslashes(get_option( $option['id'].'-1024-height')  );
					if ($height1024 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $height1024 = $option['default'][7]; }
					echo '<select name="'.$option['id'].'-1024-height" id="'.$option['id'].'-1024-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>Size for 768 Screen</i><br>';
					$value768 = stripslashes(get_option( $option['id'].'-768')  );
					if ($value768 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $value768 = $option['default'][8]; }
					echo '<select name="'.$option['id'].'-768" id="'.$option['id'].'-768">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height768 = stripslashes(get_option( $option['id'].'-768-height')  );
					if ($height768 == '' && (isset($option['default'][9]) && $option['default'][9] !== '')) { $height768 = $option['default'][9]; }
					echo '<select name="'.$option['id'].'-768-height" id="'.$option['id'].'-768-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>Size for 480 Screen</i><br>';
					$value480 = stripslashes(get_option( $option['id'].'-480')  );
					if ($value480 == '' && (isset($option['default'][10]) && $option['default'][10] !== '')) { $value480 = $option['default'][10]; }
					echo '<select name="'.$option['id'].'-480" id="'.$option['id'].'-480">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height480 = stripslashes(get_option( $option['id'].'-480-height')  );
					if ($height480 == '' && (isset($option['default'][11]) && $option['default'][11] !== '')) { $height480 = $option['default'][11]; }
					echo '<select name="'.$option['id'].'-480-height" id="'.$option['id'].'-480-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// typo-header  
		case 'typo-header': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Line Height</i><br>';
					$valueheight = stripslashes(get_option( $option['id'].'-height')  );
					if ($valueheight == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valueheight = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-height" id="'.$option['id'].'-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($valueheight == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuespacing = $option['default'][5]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $valuetransform = $option['default'][6]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
					
					
					
					echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
										
					echo '<div class="value_third"><i>1024 Screen</i><br>';
					$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
					if ($value1024 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $value1024 = $option['default'][7]; }
					echo '<select name="'.$option['id'].'-1024" id="'.$option['id'].'-1024">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height1024 = stripslashes(get_option( $option['id'].'-1024-height')  );
					if ($height1024 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $height1024 = $option['default'][8]; }
					echo '<select name="'.$option['id'].'-1024-height" id="'.$option['id'].'-1024-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>768 Screen</i><br>';
					$value768 = stripslashes(get_option( $option['id'].'-768')  );
					if ($value768 == '' && (isset($option['default'][9]) && $option['default'][9] !== '')) { $value768 = $option['default'][9]; }
					echo '<select name="'.$option['id'].'-768" id="'.$option['id'].'-768">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height768 = stripslashes(get_option( $option['id'].'-768-height')  );
					if ($height768 == '' && (isset($option['default'][10]) && $option['default'][10] !== '')) { $height768 = $option['default'][10]; }
					echo '<select name="'.$option['id'].'-768-height" id="'.$option['id'].'-768-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>480 Screen</i><br>';
					$value480 = stripslashes(get_option( $option['id'].'-480')  );
					if ($value480 == '' && (isset($option['default'][11]) && $option['default'][11] !== '')) { $value480 = $option['default'][11]; }
					echo '<select name="'.$option['id'].'-480" id="'.$option['id'].'-480">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height480 = stripslashes(get_option( $option['id'].'-480-height')  );
					if ($height480 == '' && (isset($option['default'][12]) && $option['default'][12] !== '')) { $height480 = $option['default'][12]; }
					echo '<select name="'.$option['id'].'-480-height" id="'.$option['id'].'-480-height">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($height480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
									
				echo '	</div>';		
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		
		
		// typo-sub  
		case 'typo-sub': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
									
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-simple  
		case 'typo-simple': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
									
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuespacing = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuetransform = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-nav  
		case 'typo-nav': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuesize = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
					$i = 0;
					foreach ($dani_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
					
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		
		// 	  
		case 'typo-button': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-boldweight" id="'.$option['id'].'-boldweight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
													
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
				echo '	</div>';	
					
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-misc  
		case 'typo-misc': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.$option['id'].'-font" id="'.$option['id'].'-font" class="font-change-weight">';
					
					$dani_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.$option['id'].'-weight" id="'.$option['id'].'-weight" class="weight">';
					$i = 0;
					foreach ($dani_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuesize = $option['default'][2]; }
					echo '<select name="'.$option['id'].'-size" id="'.$option['id'].'-size">';
					$i = 0;
					$headingSizes = array('h1','h2','h3','h4','h5','h6');
					foreach ($headingSizes as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.$option['id'].'-spacing" id="'.$option['id'].'-spacing">';
					$i = 0;
					foreach ($dani_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.$option['id'].'-transform" id="'.$option['id'].'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'dani').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'dani').'</option>';
					echo '</select></div>';
					
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		
		
		//radiocustom
		case "radiocustom":
			echo '<div class="option clear" id="sr_radiocustom">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $checked = 'checked="checked"'; $active = "active"; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; $active = "active"; } else { $checked = ''; $active = ""; } }
						echo '<input type="radio" name="'.$option['id'].'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' />
						<a class="customradio '.$var['value'].' '.$active.'" href="'.$var['value'].'"><span>'.$var['name'].'</span></a>';
					$i++;	
					}
					echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// image  
		case 'image':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					$removeClass = 'hide'; if ($value) { $removeClass = ''; }
					echo '	<div class="option_value">
								<input class="upload_image" type="hidden" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$value.'" size="30" />
								<input class="sr_upload_image_button sr-button" type="button" value="Upload Image" />
								<input class="sr_remove_image_button sr-button button-remove '.$removeClass.'" type="button" value="Remove Image" /><br />
								<span class="preview_image"><img class="'.$option['id'].'"  src="'.esc_url($value).'" alt="" /></span>
							</div>';		
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		// imagegroup  
		case 'imagegroup':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">
								<input class="add_image_button sr-button" type="button" value="Add Slide" /><br />
								<textarea name="'.$option['id'].'" class="groupvalue" style="display:none;">'.$value.'</textarea><br />
								<ul id="imagegroup_preview" class="preview">';
							if ($value) {
								$value = substr($value, 3);
								$value = explode('~~~', $value);
								foreach($value as $row) {
									$object = explode('|~|', $row);
									$id = $object[0];
									$caption = $object[1];
									$image = wp_get_attachment_image_src($id, 'full');
									echo '<li><a id="image-remove"  class="image-remove button" href="#" rel="'.$id.'">-</a><span class="image"><img src="'.esc_url($image[0]).'"></span><textarea id="caption">'.$caption.'</textarea><textarea id="hidden-value" style="display:none;">~~~'.$id.'|~|'.$caption.'</textarea><a id="image-moveup"  class="button" href="#" rel="'.$id.'">&uarr;</a><a id="image-movedown"  class="button" href="#" rel="'.$id.'">&darr;</a></li>';
								}  
							} 		
					echo '			</ul>
							</div>';	
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		// pagelist  
		case 'pagelist':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">
								<select name="'.$option['id'].'" id="'.$option['id'].'">
								  <option value="0">Hide Back to Works button</option>';
								  $pages = get_pages(); 
								  foreach ( $pages as $page ) {
									if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									$opt = '<option value="' . $page->ID . '" '.$active.'>';
									$opt .= $page->post_title;
									$opt .= '</option>';
									echo $opt;
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>'; 
		break;
		
		
		// organize  
		case 'organize':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
				
					echo '	<div class="option_name">
								<label for="'.$option['id'].'">'.$option['label'].'</label>
							</div>';
					echo '	<div class="option_value">';
						echo '<div class="organize-option">';
						
						if ($value) {
							echo '<ul id="sortable" class="organize-list">';
							$tempvalue = substr($value, 0, -3);
							$tempvalue = explode('|||', $tempvalue);
							foreach ($tempvalue as $var) {
								$varvalue = explode('|', $var);
								if ($varvalue[2] == 'active') { $active = 'active'; } else { $active = ''; }
								echo '	<li class="ui-state-default '.$active.'">'.$varvalue[0].'<a class="status" href="" title="'.$varvalue[0].'"></a><input type="checkbox" name="'.$varvalue[1].'"/></li>';
							}
							echo '</ul>';
							echo '<textarea name="'.$option['id'].'" class="organize-value" style="display:none;">'.$value.'</textarea><br />';
						} else {
							echo '<ul id="sortable" class="organize-list">';
							$valueoutput = '';
							$i = 0;
							foreach ($option['option'] as $var) {
								echo '	<li class="ui-state-default">'.$var['name'].'<a class="status" href="" title="'.$var['name'].'"></a><input type="checkbox" name="'.$var['value'].'"/></li>';
								$valueoutput .= $var['name'].'|'.$var['value'].'|nonactive|||';
							$i++;	
							}
							echo '</ul>';
							echo '<textarea name="'.$option['id'].'" class="organize-value" style="display:none;">'.$valueoutput.'</textarea><br />';
						}
						echo '</div>';
					echo ' 	</div>';	
					
				echo '</div>';
				echo '<div class="option_desc"><i>'.$option['desc'].'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// import
		case 'import':  
			echo '<div class="sr-import-option">';
						
			//echo '<div class="sr-demo-title">Choose a demo to import</div>';
			
			// CHECK IF DEMO HAS BEEN DONE ALREADY
			if (get_option('_sr_import_state') == 'true') {
				echo '<div class="sr-import-message">ATTENTION<br>You already imported a demo.  Import another one will create double content. If you want to install another one, I recommend to reset the wordpress installtion first using the plugin "Wordpress reset".  This delete/resets all your content,settings, etc.</div>'; }
		
			$demos = array(
				array( "name" => "Main Agency",
					   "xml" => "dani-demo",
					   "id" => "demo-agency"
					   ),
				array( "name" => "Portfolio",
					   "xml" => "dani-demo",
					   "id" => "demo-portfolio"
					   ),
				array( "name" => "Clean",
					   "xml" => "dani-demo",
					   "id" => "demo-clean"
					   ),
				array( "name" => "Freelancer",
					   "xml" => "dani-demo",
					   "id" => "demo-freelancer"
					   ),
				array( "name" => "Videographer",
					   "xml" => "dani-demo-video",
					   "id" => "demo-video"
					   ),
				array( "name" => "Photography",
					   "xml" => "dani-demo-photography",
					   "id" => "demo-photography"
					   ),
				array( "name" => "Architecture",
					   "xml" => "dani-demo-architecture",
					   "id" => "demo-architecture"
					   ),
				array( "name" => "Shop / WooCommerce",
					   "xml" => "dani-demo-shop",
					   "id" => "demo-shop"
					   )	   
				
				);
			
			echo '<div class="sr-import-demos">';
			foreach ($demos as $d) {
				echo '<div class="sr-demo"><a href="themes.php?page=option-panel.php&importdemo=dani-'.$d['id'].'&xml='.$d['xml'].'" class="'.$d['id'].'">
				<img src="'.esc_url(get_template_directory_uri() . '/theme-admin/option-panel/images/').$d['id'].'.jpg">
				<span class="demo-install"><span>import</span></span>
				</a>
				<span class="demo-name">'.$d['name'].'</span></div>';
			}
			echo '</div>';
			echo '<i>*Note that the import process can take some time.  Don\'t refresh the page during the import.</i>';	
						
			/*echo '<div class="sr-maximum-message">NOTE<br>Make sure your maximum upload size is at least 32GB (Check it here: Media > Add new)<br> Otherwhise it will lead to a internal server error.</div>';*/
			echo '<div class="sr-import-loader"><div class="importing-text">importing ...</div></div>';
						
			echo '</div>';	
			
		break;
		
		
		
		//fontmanager
		case "fontmanager":
								$typearray = array('Typekit','Custom Font','Google Font');
		
			echo '<div class="option fontmanager clear">';
				echo '<div class="customfontcontainer">';
				
				echo '	<div class="font hidden edit clear">		
							<div class="one-third">
								<label>Family Name:</label>
								<input type="text" name="font" class="input-font" placeholder="Family Name"><br>
								<span class="desc"><em>Example: <strong>Open Sans</strong></em></span>
							</div> 
							<div class="one-third">
								<label>Weights & Styles:</label>
								<input type="text" name="styles" class="input-styles" placeholder="Weights & Styles (seperated by semicolon)"><br>
								<span class="desc"><em>Example: <strong>400;400italic;700;700italic</strong></em></span>
							</div>
							<div class="one-third last-col">
								<a href="#" class="save-font sr-button">Save</a>
								<a href="#" class="edit-font sr-button">Edit</a>
								<a href="#" class="delete-font sr-button">Delete</a>
							</div>
							<div style="clear:both"></div>
							<div class="radios">
								<label>Type:</label>';
								foreach ($typearray as $t) {
									echo '<span><input type="radio" name="type" value="'.$t.'"><span>'.$t.'</span></span>';	
								}
							echo'</div>
						</div>';
				
				$json = json_decode($value);		
				if($json) {
				$i = 1;	
				foreach($json->fonts as $f) {
				echo '	<div class="font clear" data-id="'.$i.'">		
							<div class="one-third">
								<label>Family Name:</label>
								<input type="text" name="font" class="input-font" placeholder="Family Name" value="'.$f->name.'" readonly><br>
								<span class="desc"><em>Example: <strong>Open Sans</strong></em></span>
							</div> 
							<div class="one-third">
								<label>Weights & Styles:</label>
								<input type="text" name="styles" class="input-styles" value="'.$f->styles.'" placeholder="Weights & Styles (seperated by semicolon)" readonly><br>
								<span class="desc"><em>Example: <strong>400;400italic;700;700italic</strong></em></span>
							</div>
							<div class="one-third last-col">
								<a href="#" class="save-font sr-button">Save</a>
								<a href="#" class="edit-font sr-button">Edit</a>
								<a href="#" class="delete-font sr-button">Delete</a>
							</div>
							<div style="clear:both"></div>
							<div class="radios">
								<label>Type:</label>';
								foreach ($typearray as $t) {
									$checked = ''; if ($f->type == $t) { $checked = 'checked="checked"'; }
									echo '<span><input type="radio" name="type-'.$i.'" value="'.$t.'" '.$checked.'><span>'.$t.'</span></span>';	
								}
							echo'</div>
						</div>';
					$i++;
				}
				}		
						
				echo '	</div>';	
							
			echo '<a href="#" class="add-font sr-button style-2">Add Font</a>';
			echo '<textarea name="'.$option['id'].'" id="'.$option['id'].'" rows="5" style="display:none;">'.$value.'</textarea>';
			echo '</div>';
		break;
		
		
		} // END switch ( $option['type'] ) {
	} // END foreach ($dani_options_new as $option) {
	
	
	echo '</div>'; // END section-content
	echo '</div>'; // END section



echo '	
		<div class="sr_footer clear">
		<input name="save" type="submit" value="Save all changes" class="submit-option"/> 
		<input type="hidden" name="action" value="save" />
		</div>
		</form>
		<form method="post">
		<!--<input name="reset" type="submit" value="Reset" class="reset-option" />
		<input type="hidden" name="action" value="reset" />-->
		</form>
		</div> ';
 

} // END function dani_theme_interface() {




/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue admin javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'dani_admin_js' ) ) {
    function dani_admin_js($hook) {
		global $dani_version;
		
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		
		wp_enqueue_script('media-upload');
		wp_enqueue_style('thickbox');
		
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );
		
		wp_register_script('dani-admin-script', get_template_directory_uri().'/theme-admin/assets/sr-admin.js', array( 'wp-color-picker' ), $dani_version, true);
		wp_enqueue_script('dani-admin-script');
		
		wp_register_style('dani-admin-style', get_template_directory_uri() . '/theme-admin/assets/sr-admin.css','',$dani_version);
		wp_enqueue_style('dani-admin-style');
			
		wp_enqueue_media();
    }
    
    add_action('admin_enqueue_scripts','dani_admin_js',10,1);
}


/*-----------------------------------------------------------------------------------*/
/* Output Custom CSS from theme options
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'dani_head_css' ) ) {
    function dani_head_css() {
        $output = '';
        $output = get_option('_sr_color');
    }

    add_action('wp_head', 'dani_head_css');
}
?>