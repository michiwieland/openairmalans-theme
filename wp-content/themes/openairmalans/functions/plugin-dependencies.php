<?php
namespace Neocode\Theme;

class PluginDependencies {

	function __construct() {
    require_once THEME_LIB_DIR . '/class-tgm-plugin-activation.php';
    add_action( 'tgmpa_register', array($this, 'neocode_register_required_plugins') );
	}

  /**
   * Register the required plugins for this theme.
   *
   */
  function neocode_register_required_plugins() {

  	// plugins from wordpress.org
  	$plugins = array(

  		// Social icons for wordpress menu
  		array(
  			'name'      => 'Menu Social Icons',
  			'slug'      => 'menu-social-icons',
  			'required'  => true
  		),

  		// Custom fields
  		array(
  			'name'      => 'Carbon Fields',
  			'slug'      => 'carbon-fields',
  			'required'  => true
  		),

  		// Remove special characters or language accent characters from filenames
  		array(
  			'name'      => 'Clean Image Filenames',
  			'slug'      => 'clean-image-filenames',
  			'required'  => true
  		),

  		// No comments allowed. Remove comment section from backend
  		array(
  			'name'      => 'Disable Comments',
  			'slug'      => 'disable-comments',
  			'required'  => true
  		),

  		// Resize huge image uploads down to a size that is more reasonable
  		array(
  			'name'      => 'Imsanity',
  			'slug'      => 'imsanity',
  			'required'  => true
  		),

  		// fallback if swiss german is not supported by plugins
  		array(
  			'name'      => 'Language Fallback',
  			'slug'      => 'language-fallback',
  			'required'  => true
  		),

  		// Order pages and custom post types with drag and drop
  		array(
  			'name'      => 'Simple Page Ordering',
  			'slug'      => 'simple-page-ordering',
  			'required'  => true
  		),

  		// limit login attempts
  		array(
  			'name'      => 'Limit Login Attempts Reloaded',
  			'slug'      => 'limit-login-attempts-reloaded',
  			'required'  => true
  		),

  		// Hide emails and phone numbers from spam bots
  		array(
  			'name'      => 'Email Encoder Bundle – Protect Email Address',
  			'slug'      => 'email-encoder-bundle',
  			'required'  => true
  		),

      // A faster, easier and more powerful way to build themes.
      array(
        'name'      => 'Timber',
        'slug'      => 'timber-library',
        'required'  => true
      ),

  	);

  	tgmpa( $plugins );
  }

}
