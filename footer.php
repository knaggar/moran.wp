<?php
/**
* @package moran
* @subpackage footer template
* @version 1.5
* Template Name: Footer template
* Description: contains closing tags for global HTML elemetns. Also list blocks of navigation (not necessarily) and credits of website coding and contents licenses.
*/
?>
</main>
<footer>
  <div class="footer_menu footer_widget">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container_class' => 'footer_menu widget_item',
      'menu_class'   => 'menu_primary'
    ));
    ?>
    <div class="widget_logo-text widget_item"><?php echo  bloginfo('name'); ?> </div>
  </div>

  <div class="footer_about footer_widget">
    <div class="widget_about-text widget_item">
      <?php
      $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
      echo $page_footer[0]->post_content; ?>
    </div>
  </div>
  <div class="footer_social-profiles footer_widget">
    <div class="widget_profiles-action widget_item">
      <?php social_profile() ?>
    </div>
  </div>
  <div class="footer_credit footer_widget">
    <?php get_template_part('templates/footer', 'credit'); ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
