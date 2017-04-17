<?php
/**
 * Template for displaying the search form
 *
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'neocode' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>
