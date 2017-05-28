<?php
namespace Neocode\Theme;

/*
	OnePage Timber Object
 */

class OnepagePost extends \TimberPost {

	var $_template;

	// Add template property to Twig Object
	public function template() {
		return Helpers::get_template_name( $this->custom['_wp_page_template'] );
	}
}
