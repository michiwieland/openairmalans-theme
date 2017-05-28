<?php
namespace Neocode\Theme;

class Setup {

	function __construct() {

		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'neocode_enqueue_assets' ) );

		add_filter('upload_mimes', array( $this, 'mime_types') );

		add_filter( 'xmlrpc_methods', array( $this, 'disable_xmlrpc' ) );

		add_action( 'init', array( $this, 'cleanup_head' ) );
		add_filter( 'show_admin_bar', '__return_false' );
		add_action( 'admin_enqueue_scripts', array( $this, 'remove_open_sans' ) );

		add_filter( 'style_loader_src', array( $this, 'remove_wp_ver_css_js' ), 9999 );
		add_filter( 'script_loader_src', array( $this, 'remove_wp_ver_css_js' ), 9999 );

		add_filter( 'storm_social_icons_type', create_function( '', 'return "icon-sign";' ) );

		add_filter( 'admin_menu', array( $this, 'remove_menus' ) );

	}

	/**
	 * Add theme support for featured image, html5-tags amd new title-tag
	 */

	function theme_support() {

		// Enable featured image
		add_theme_support( 'post-thumbnails' );

		// Basic HTML5 support
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'search-form',
			'gallery',
			'caption',
		));

		// Do not use a hard-coded title tag
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

	}


	/**
	 * Enqueue all assets
	 */
	function neocode_enqueue_assets() {
		wp_enqueue_style( 'style', THEME_DIR_URI . '/dist/css/style.css' );
		wp_enqueue_style( 'lity', THEME_DIR_URI . '/dist/css/vendors/lity.min.css' );
		wp_enqueue_script( 'script', THEME_DIR_URI . '/dist/js/script.min.js');
	}


	/**
	 *	Allow svg upload
	 */
	function mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}


	/**
	 * Add image sizes
	 */

	function image_sizes() {

		// Image sizes
		add_image_size( 'neocode-featured-image', 500, 500, true );
		add_image_size( 'neocode-thumbnail-avatar', 100, 100, true );

	}


	/**
	 * Disable XML-RPC Interface
	 */

	function disable_xmlrpc( $methods ) {
		unset( $methods['pingback.ping'] );
		return $methods;
	}


	/**
	 * Clean head
	 */

	function cleanup_head() {
		remove_action( 'wp_head', 'wp_generator');
		remove_action( 'wp_head', 'wlwmanifest_link');

		// Clean all
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3);
		remove_action( 'wp_head', 'rsd_link');
		remove_action( 'wp_head', 'rel_canonical');
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}


	/**
	 *  Remove WP Default Font and Icon
	 */

	function remove_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}


	/**
	 * Remove WP version param from any enqueued scripts and styles
	 */

	function remove_wp_ver_css_js( $src ) {

		if( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;

	}


	/**
     * Remove pages from admin menu;
     * http://codex.wordpress.org/Function_Reference/remove_menu_page
     */

    function remove_menus() {

		remove_menu_page( 'edit.php' ); // Posts

        // Remove pages for editors
        if( current_user_can( 'editor' ) ) {
            remove_submenu_page( 'themes.php', 'themes.php' ); // Appearance -> Theme
            global $submenu;
            unset( $submenu['themes.php'][6] ); // Appearance -> Customize
        }

        // Remove pages for non-administrators
        if( ! current_user_can( 'administrator' ) ) {
            remove_menu_page( 'tools.php' );
        }

    }

}
