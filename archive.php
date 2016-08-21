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
  echo '<h1 class="category_title">' . $term->name . '</h1>';

  // Query custom post types to include in page header as filter for content
  $args = array('public' => true, '_builtin'=>false);
  $outs = 'objects';
  $opr = 'and';
  $post_types = get_post_types($args, $outs, $opr);

  if (have_posts()):
    echo '<ul class="main_filter">';
    foreach ($post_types as $post_type) {
      echo '<li><a href="#" data-filter="'.  $post_type->name . '">' . $post_type->labels->menu_name . '</a></li>';
    }
    echo '<li><a href="#" class="selected" data-filter="*"';
    echo _e('Show all', 'moran');
    echo '</a></li></ul>';
  endif;
  while(have_posts()): the_post();
    get_template_part('templates/article', get_post_format());
  endwhile;

get_footer();
