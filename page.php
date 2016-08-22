<?php
/**
* @package moran
* @subpackage page template
* @version 1.5
* Template Name: page template
* Description: Display single pages's content, thumbnails and/or any other attachements (such as custom fields).
*/

get_header();
while(have_posts()): the_post();
  get_template_part('templates/article', 'page');
endwhile;
get_footer();
