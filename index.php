<?php
/**
* @package moran
* @subpackage index template
* @version v0.2-beta.1
* Template Name: Main template
* Description: main templates page, displays defult query.
*/

get_header();

  if(is_front_page()): ?>
  <div class="article_featured">
    <div class="featured_header header">
      <h1 class="featured_title">
        <span><?php echo _e('Chosen Article', 'moran');?></span>
      </h1>
    </div>
    <div class="featured_body body">
      <?php get_template_part('templates/article', 'featured'); ?>
    </div>
  </div>
  <?php endif

  ;get_footer();
