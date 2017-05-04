<?php
namespace Neocode\Theme;

class Template {

    function __construct() {

    	// Check if Timber exist
		if ( ! class_exists( 'Timber' ) ) {
			add_action( 'admin_notices', array( $this, 'twig_message' ) );

			add_filter('template_include', array( $this, 'no_timber' ) );

			return;
		}

		// Set default twig directory
		\Timber::$dirname = 'templates';

	}

	// Twig Error Message
    function twig_message() {

    	echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';

    }

    // Timber Error Screen on frontpage
    function no_timber($template) {

		return get_stylesheet_directory() . '/static/no-timber.html';

	}

}