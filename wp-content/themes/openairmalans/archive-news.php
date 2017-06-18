<?php
/*
global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}
*/
/*
$args = array(
    'post_type' => 'news',
    'posts_per_page' => 1,
    'paged' => $paged
);
// THIS LINE IS CRUCIAL
// in order for WordPress to know what to paginate
// your args have to be the defualt query
    query_posts($args);
// make sure you've got query_posts in your .php file
*/

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();

Timber::render('archive-news.twig', $context);
