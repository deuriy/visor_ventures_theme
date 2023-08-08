<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	// $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// // Grab asset urls.
	// $theme_styles  = "/css/child-theme{$suffix}.css";
	// $theme_scripts = "/js/child-theme{$suffix}.js";

	// wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	// wp_enqueue_script( 'jquery' );
	// wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	wp_enqueue_style( 'theme-vendor-styles', get_stylesheet_directory_uri() . '/assets/css/vendor.css' );
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/assets/css/styles.css' );

	wp_enqueue_script( 'theme-vendor-scripts', get_stylesheet_directory_uri() . '/assets/js/vendor.js', array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/assets/js/app.js', array(), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function render_page_layouts($layouts) {
	if ($layouts) {
		foreach ($layouts as $key => $layout) {
			$layout_name = str_replace('_', '-', $layout['acf_fc_layout']);
			$template = locate_template('page-blocks/'.$layout_name.'.php', false, false);
			if ($template) {
				$field = $layout; // Change layout to a friendly name.
				$field_key = $key;
				include($template); // if locate_template returns false, include(false) will throw an error
			}
		}
	}
}

function print_arr($arr) {
	print '<pre>';
	print_r($arr);
	print '</pre>';
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'update_button'   => 'Update Site Settings',
				'updated_message' => 'Site settings updated.',
    ));
    
}
