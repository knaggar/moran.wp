<?php
/**
* @package moran
* @subpackage index template
* @version v0.2-beta.5
* Template Name: Main template
* Description: main templates page, displays defult query.
*/

get_header();

  if(is_front_page()): ?>
  <div class="main_categories">
    <?php // Show Category navigation
    wp_nav_menu(array(
      'theme_location' => 'category',
      'container_id'   => 'categories_nav',
      'container_class'   => 'categories_nav',
      'menu_class'     => 'nav-cat_menu',
      'link_before' => '<span>',
      'link_after' => '</span>'
    ));
    ?>
  </div>
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
