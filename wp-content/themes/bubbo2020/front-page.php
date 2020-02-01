<?php
/**
* Template Name: Front Page

 */

$context = Timber::get_context();
$context['post'] = new Timber\Post();

// get latest portfolio items
$args = array(
	'post_type' => 'portfolio',
	'posts_per_page' => 8,
);
$context['portfolio'] = Timber::get_posts($args);

Timber::render( 'front-page.twig', $context );