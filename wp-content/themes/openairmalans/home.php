<?php
namespace Neocode\Theme;
use Timber;

// Onepage Query
$args = array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order'
);

// Grab artists
$artists_args = array(
	'post_type' => 'artists',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order'
);

// Grab impressions
$impressions_args = array(
	'post_type' => 'impressions',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order'
);

// Grab infos
$infos_args = array(
	'post_type' => 'infos',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order',
);

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery( $args, 'Neocode\Theme\OnepagePost' );
$context['artists'] = Timber::get_posts( $artists_args );
$context['infos'] = Timber::get_posts( $infos_args );
$context['impressions'] = Timber::get_posts( $impressions_args );

Timber::render('onepager.twig', $context);
