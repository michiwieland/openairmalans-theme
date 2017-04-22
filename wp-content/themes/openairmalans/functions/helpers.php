<?php
namespace Neocode\Theme;

class Helpers {

	function get_template_name() {

	    // get template name (template-xxx.php)
	    $template_type = basename( get_page_template() );
	    // remove template- at start
	    $template_type = substr( $template_type, 9 );
	    // remove .php at end
	    $template_type = substr_replace( $template_type, '', -4 );

	    return $template_type;

	}

}