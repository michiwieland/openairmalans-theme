<?php
namespace Neocode\Theme;

class CustomFields {

	function __construct() {
		add_action('carbon_register_fields', array( $this, 'crb_register_custom_fields' ) );
		$this->verify_custom_fields();
	}

	/**
	 * Register custom field containers
	 */

	function crb_register_custom_fields() {
		include_once( THEME_DIR . '/includes/artist-fields.php' );
	}

	/**
	 * Protect the theme code, by having a fallback functions,
	 * in case someone has deactivated the Carbon-Fields plugin
	 */

	function verify_custom_fields() {
		if ( ! function_exists( 'carbon_get_post_meta' ) ) {
	    function carbon_get_post_meta( $id, $name, $type = null ) {
	        return false;
	    }
		}

		if ( ! function_exists( 'carbon_get_the_post_meta' ) ) {
	    function carbon_get_the_post_meta( $name, $type = null ) {
	        return false;
	    }
		}

		if ( ! function_exists( 'carbon_get_theme_option' ) ) {
	    function carbon_get_theme_option( $name, $type = null ) {
	        return false;
	    }
		}

		if ( ! function_exists( 'carbon_get_term_meta' ) ) {
	    function carbon_get_term_meta( $id, $name, $type = null ) {
	        return false;
	    }
		}

		if ( ! function_exists( 'carbon_get_user_meta' ) ) {
	    function carbon_get_user_meta( $id, $name, $type = null ) {
	        return false;
	    }
		}

		if ( ! function_exists( 'carbon_get_comment_meta' ) ) {
	    function carbon_get_comment_meta( $id, $name, $type = null ) {
	        return false;
	    }
		}
	}

}
