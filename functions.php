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

if ( ! function_exists( 'hsc2020_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hsc2020_setup() {
		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'hsc2020' ),
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'hsc2020_setup' );


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
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * ============================================================================ 
 * */ 




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


/** ============================================================================ 
 * ACF Options page
 */ 
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Custom Data',
			'menu_title'	=> 'My Custom Data',
			'menu_slug' 	=> 'my-custom-data',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
	}

/** ============================================================================ 
 * Enqueue scripts and styles.
 */

function hsc2020_scripts() {
	// Stylesheet (CSS)
	wp_enqueue_style(
		'hsc2020-style',
		get_stylesheet_directory_uri() . 'style.css',
		array(),
		filemtime( get_stylesheet_directory() . 'style.css' )
	 );
	// Scripts (JavaScript)
	wp_enqueue_script( 'hsc2020-myscripts', get_template_directory_uri() . '/js/my-scripts.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'hsc2020_scripts' );