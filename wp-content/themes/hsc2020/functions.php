<?php
/**
 * hsc2020 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hsc2020
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/setup.php';


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hsc2020_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hsc2020_content_width', 640 );
}
add_action( 'after_setup_theme', 'hsc2020_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */

function hsc2020_scripts() {
	// wp_enqueue_style( 'hsc2020-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'hsc2020-style', 'rtl', 'replace' );
	wp_enqueue_style(
		'hsc2020-style',
		get_stylesheet_directory_uri() . '/css/main.css',
		array(),
		filemtime( get_stylesheet_directory() . '/css/main.css' )
	 );
	// wp_enqueue_style( 'hsc2020-style', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );

	wp_enqueue_script( 'hsc2020-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hsc2020-myscripts', get_template_directory_uri() . '/js/my-scripts.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'hsc2020_scripts' );




/** ============================================================================ 
 * Add Favicon to WordPress admin
 */ 
	function favicon_admin() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('wpurl') . '/wp-content/favicon.ico" />';
	}
	add_action( 'admin_head', 'favicon_admin' ); //admin end
	function favicon_frontend() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('wpurl') . '/wp-content/themes/hsc2020/favicon.ico" />';
	}
	add_action( 'wp_head', 'favicon_frontend' ); //front end

/** ============================================================================ 
 * Custom image sizes
 */ 
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
		// Homepage "Hero Banner" image
    add_image_size( 'homepage-banner', 1200, 400, true ); // (cropped)
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';