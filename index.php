<?php
/**
* @package moran
* @subpackage index template
* @version 1.5
* Template Name: Main template
* Description: main templates page, displays defult query.
*/

get_header();
  if(is_front_page()):
    get_template_part('templates/article', 'featured');
  endif;
get_footer();
