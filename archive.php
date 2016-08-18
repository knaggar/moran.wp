<?php
/**
* @package moran
* @subpackage archive template
* @version 1.5
* Template Name: Archive template
* Description: Display taxonomy queries.
*
* To be replaced with index template.
*/
get_header();
  // Show title of custom taxonomy
  $term = get_term_by( 'slug', get_query_var( 'term' ),   get_query_var( 'taxonomy' ) );
  echo $term->name;

  while(have_posts()): the_post();
    get_template_part('templates/article', get_post_format());
  endwhile;

get_footer();
