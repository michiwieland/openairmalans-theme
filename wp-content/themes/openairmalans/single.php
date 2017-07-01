<?php
$context = Timber::get_context();

// Grab impressum
$impressum_object = get_page_by_title( 'Impressum' );
$impressum_args = array(
    'post_type'  => 'page',
    'p' => $impressum_object->id
);

$context['posts'] = Timber::get_posts();
Timber::render('single.twig', $context);
