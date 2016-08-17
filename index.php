<?php
/**
* @package moran
* @subpackage index template
* @version 1.5
* Template Name: Main template
* Description: main templates page, displays defult query.
*/

get_header();
if(have_posts()): while (have_posts()):
  the_post();

  if(is_front_page()):
    get_template_part('templates/article-single_featured');
  endif;
endwhile; endif;
get_footer();
