<?php
/**
* @package moran
* @subpackage single template
* @version 1.5
* Template Name: Single template
* Description: Display single post's content, thumbnails and/or any other attachements (such as custom fields).
*/
get_header();
  // loop for posts
  echo 'hello';
  while(have_posts()): the_post();
    get_template_part('templates/article', 'single');
  endwhile;

get_footer();
