<?php
/*
// Grab news
$news_args = array(
	'post_type' => 'news',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'date'
);
*/ ?>

<?php
$context = Timber::get_context();
//$context['posts'] = Timber::get_posts( $news_args );
$context['posts'] = Timber::get_posts();

Timber::render('archive-news.twig', $context);