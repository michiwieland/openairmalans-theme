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

		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
    add_filter( 'timber_context', array( $this, 'add_to_context') );
	}

  function add_to_context($data) {
    $data['menu'] = new \TimberMenu();
    return $data;
  }

	// Twig Error Message
    function twig_message() {

    	echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';

    }

    // Timber Error Screen on frontpage
    function no_timber($template) {

		return get_stylesheet_directory() . '/static/no-timber.html';

	}


	function twg_get_template_name() {

	    # edit this according to the implementation of your class:
	    return Helpers::get_template_name();
	    //return get_the_ID();
	    //return 'sdfgs';
	}

	function add_to_twig($twig) {
	    // this is where you can add your own fuctions to twig
	    $twig->addExtension(new \Twig_Extension_StringLoader());
	    $twig->addFilter('twg_get_template_name', new \Twig_Filter_Function( array( $this, 'twg_get_template_name' ) ));
	    return $twig;
	}

}
