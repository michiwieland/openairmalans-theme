<?php
namespace Neocode\Theme;
use Timber;

require_once ( THEME_FUNCTIONS_DIR . '/twig-extend.php' );


// Onepage Query
$args = array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'meta_query' => array(
        array(
            'key' => '_wp_page_template',
            'value' => 'template-impressum.php',
            'compare' => '!='
        )
    )
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
	'posts_per_page' => 3,
	'order' => 'DESC',
	'orderby' => 'title'
);

// Grab infos
$infos_args = array(
	'post_type' => 'infos',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order',
);

// Grab latest news
$news_args = array(
	'post_type' => 'news',
	'posts_per_page' => 3,
	'order' => 'DESC',
	'orderby' => 'date',
);


// Grab impressum
$impressum_object = get_page_by_title( 'Impressum' );
$impressum_args = array(
    'post_type'  => 'page',
    'p' => $impressum_object->id
);

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery( $args, 'Neocode\Theme\OnepagePost' );
$context['artists'] = Timber::get_posts( $artists_args );
$context['infos'] = Timber::get_posts( $infos_args );
$context['impressions'] = Timber::get_posts( $impressions_args );
$context['news'] = Timber::get_posts( $news_args );
$context['impressum'] = Timber::get_posts( $impressum_args );

Timber::render('onepager.twig', $context);
