<?php 

//register menu
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
    function mytheme_register_nav_menu(){
        register_nav_menus( array(
            /* 'main_menu' => __( 'Main Menu', 'text_domain' ),
            'footer_menu'  => __( 'Footer Menu', 'text_domain' ), */
        ) );
    }
    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

//ACF options 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Layouts Settings',
		'menu_title'	=> 'Layouts',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    $mime_types['ttf'] = 'application/x-font-ttf';
    $mime_types['woff'] = 'application/x-font-woff';
    $mime_types['woff2'] = 'application/x-font-woff';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

//include others
require_once('includes/advanced-custom-fields-nav-menu-field/fz-acf-nav-menu.php');
require_once('includes/acf-Google-Fonts/acf-Google-Fonts.php');