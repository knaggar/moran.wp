<?php
/**
* @package moran
* @subpackage overlay template
* @version v0.2-beta.5
* Template Name: Overlay template
* Description: a global template which contains full menu or search results
*
*/
?>
<div class="overlay_container">
  <div class="overlay_full-menu">
  <div class="overlay_row row">
    <div class="col-overlay inline">
      <div class="overlay_nav-img overlay_item">
        <ul>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/cat-menu_plan.jpg" alt="" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/cat-menu_house.jpg" alt="" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/cat-menu_service.jpg" alt="" />
          </li>
        </ul>
      </div>
      <?php  // Show Category navigation
      wp_nav_menu(array(
        'theme_location' => 'category',
        'container_id'   => 'overlay_nav-cat',
        'container_class'=> 'overlay_nav-cat overlay_item',
        'menu_class'     => 'nav-cat_menu',
      )); ?>
    </div>
    <div class="col-overlay inline">
      <div class="overlay_full-social overlay_item">
        <?php social_profile(); ?>
      </div>
      <div class="overlay_full-about overlay_item">
        <?php $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
        echo $page_footer[0]->post_content; ?>
      </div>
      <div class="overlay_full-credit widget_credit overlay_item">
        <?php  get_template_part('templates/footer', 'credit'); ?>
      </div>

    </div>
    </div>
  </div>
<div class="overlay_full-search">

  <div class="search-header header">
    <?php echo $wp_query->found_posts; ?>
  </div>
  <div class="search-body body">
      <div id="wpas-results"></div>
  </div>

</div>
</div>
