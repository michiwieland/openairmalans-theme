<?php
$impressions_args = array(
	'post_type' => 'impressions',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'orderby' => 'title'
);

$context = Timber::get_context();
$context['posts'] = Timber::get_posts($impressions_args);

Timber::render('archive-impressions.twig', $context);
