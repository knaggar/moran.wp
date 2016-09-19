<?php
/**
* @package moran
* @subpackage page template
* @version v0.2-beta.1
* Template Name: page template
* Description: Display single pages's content, thumbnails and/or any other attachements (such as custom fields).
*/

get_header();?>

<div class="article_page">
  <div class="page_body body">
  <?php while(have_posts()): the_post();
    get_template_part('templates/article', 'page');
  endwhile; ?>
  </div>
</div>

<?php get_footer();
