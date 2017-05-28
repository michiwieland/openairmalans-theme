<?php
namespace Neocode\Theme;

class Helpers {

	function get_template_name( $template_type = null ) {

		// Try to grab template name when nothing is passed
		if ( !is_null($path) ) {
		    // get template name (template-xxx.php)
		    $template_type = basename( get_page_template() );
		}

	    // remove template- at start
	    $template_type = substr( $template_type, 9 );
	    // remove .php at end
	    $template_type = substr_replace( $template_type, '', -4 );

	    // Return a default template when no template is set
	    if ( !empty($template_type) ) {
	    	return $template_type;
	    } else {
	    	return 'default';
	    }

	}

}