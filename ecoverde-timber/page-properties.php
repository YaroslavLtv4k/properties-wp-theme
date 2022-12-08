<?php
// Template Name: Properties

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$args = [
'post_type'        => 'property',
'order' => 'ASC',
'tax_query' => array(
  array (
      'taxonomy' => 'property_type',
      'field' => 'slug',
      'terms' => ['rent', 'sale'],
      )
  ),
'paged' => $paged,     
];
$context['properties'] = Timber::get_posts( $args );
$context['tax_name'] = $term->slug;

$posts = Timber::get_posts();

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page-properties.twig' ), $context );
