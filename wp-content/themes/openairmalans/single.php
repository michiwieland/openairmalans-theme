<?php
/*
	Single News
*/

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('single.twig', $context);