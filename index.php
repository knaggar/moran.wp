<?php
/**
* @package moran
* @subpackage index template
* @version 1.5
* Template Name: Main template
* Description: main templates page, displays defult query.
*/

get_header();

  if(is_front_page()): ?>
  <div class="front_featured">
    <div class="featured_header header">
      <h1 class="featured_title">
        <?php echo _e('Chosen Article', 'moran');?>
      </h1>
    </div>
    <div class="featured_body body">
      <?php get_template_part('templates/article', 'featured'); ?>
    </div>
  </div>
  <?php endif

  ;get_footer();
