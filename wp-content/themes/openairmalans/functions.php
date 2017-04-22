<?php
/**
 * Openair Malans functions and definitions
 *
 */


/**
 * Sets up theme defaults
 */
function neocode_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Do not use a hard-coded title tag
	add_theme_support( 'title-tag' );

	// Add excerpt support
	add_post_type_support( 'page', 'excerpt' );

	// Enable featured image
	add_theme_support( 'post-thumbnails' );

	// Image sizes
	add_image_size( 'neocode-featured-image', 500, 500, true );
	add_image_size( 'neocode-thumbnail-avatar', 100, 100, true );

	// Register navigation
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'neocode' )
	));

	// Basic HTML5 support
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

}
add_action( 'after_setup_theme', 'neocode_setup' );


/**
 * Enqueue all assets
 */
function neocode_enqueue_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'lity', get_template_directory_uri() . '/dist/css/vendors/lity.min.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/js/script.min.js');
}
add_action( 'wp_enqueue_scripts', 'neocode_enqueue_assets' );


add_filter( 'storm_social_icons_type', create_function( '', 'return "icon-sign";' ) );
