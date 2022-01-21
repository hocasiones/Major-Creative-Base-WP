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
		'menu_title'	=> 'General',
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
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

//include others
require_once('includes/advanced-custom-fields-nav-menu-field/fz-acf-nav-menu.php');
require_once('includes/acf-typography-field/acf-typography.php');