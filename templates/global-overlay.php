<?php
/**
* @package moran
* @subpackage overlay template
* @version 1.5
* Template Name: Overlay template
* Description: a global template which contains full menu or search results
*
*/
?>
<div class="overlay_container">
  <div class="overlay_full-menu">
  <div class="overlay_row row">

    <?php  // Show Category navigation
        wp_nav_menu(array(
        'theme_location' => 'category',
        'container_id'   => 'overlay_nav-cat',
        'container_class'=> 'overlay_nav-cat overlay_item',
        'menu_class'     => 'nav-cat-menu',
        )); ?>
    <div class="overlay_full-about overlay_item">
      <?php $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
      echo $page_footer[0]->post_content; ?>
    </div>
    <div class="overlay_full-credit widget_credit overlay_item">
      <?php  get_template_part('templates/footer', 'credit'); ?>
    </div>
    </div>
  </div>
<div class="overlay_full-search">

</div>
</div>
