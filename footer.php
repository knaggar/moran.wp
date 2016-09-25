<?php
/**
* @package moran
* @subpackage footer template
* @version v0.2-beta.5
* Template Name: Footer template
* Description: contains closing tags for global HTML elemetns. Also list blocks of navigation (not necessarily) and credits of website coding and contents licenses.
*/
?>
</div>
</main>
</div>
<footer>
  <div class="footer-container container">
    <div class="row">
      <div class="widget_menu footer_widget col-widget">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container_class' => 'footer_menu widget_item',
          'menu_class'   => 'menu_primary'
        ));
        ?>
        <div class="widget_logo-text widget_item"><?php echo  bloginfo('name'); ?> </div>
      </div>
      <div class="widget_container col-widget">
        <div class="widget_about footer_widget">
          <div class="widget_about-text widget_item">
            <?php
            $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
            echo $page_footer[0]->post_content; ?>
          </div>
        </div>
        <div class="widget_social-profiles footer_widget">
          <h6 class="widget_profiles-title widget_item">
            <?php echo _e('Contact Us', 'moran'); ?>
          </h6>
          <div class="widget_profiles-action widget_item">
            <?php social_profile() ?>
          </div>
        </div>
      </div>
      <div class="widget_credit footer_widget col-widget">
        <?php get_template_part('templates/footer', 'credit'); ?>
      </div>

    </div>
  </div>
</footer>
<section class="search_overlay">
  <div class="overlay_full-search">
    <?php $advanced_search = new WP_Advanced_Search('advanced-search');
    $search_query = $advanced_search->query();
    ?>
    <div class="search-header header">
      <div class="search_form">
        <?php $advanced_search->the_form(); ?>
      </div>
    </div>
    <div class="search-body body">
      <div id="wpas-results" class="row"></div>

    </div>
  </div>
</section>
<?php wp_footer(); ?>
</body>
</html>
