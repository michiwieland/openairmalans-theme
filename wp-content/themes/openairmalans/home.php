<?php
namespace Neocode\Theme;
use Timber;

// Onepage Query
$args = array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order',
);

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery( $args, 'Neocode\Theme\OnepagePost' );

Timber::render('onepager.twig', $context);