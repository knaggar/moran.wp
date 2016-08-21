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
  <div class="footer_block-unnammed">
    <?php // Show Primary navigation
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container_class'     => 'footer_primary-menu',
      'menu_class'   => 'nav-primary'
    ));
    echo '<div class="footer_logo logo-text">';
    echo  bloginfo('name');
    echo  '</div>'; ?>
    </div>
  </div>
  <div class="footer_block-unnammed">
    <div class="footer-about_project">
    <?php // Show page content of project
          $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
          echo $page_footer[0]->post_content; ?>
    </div>
  </div>
  <div class="footer_block-unnammed">
    <div class="footer_social-profiles">
      <?php social_profile() ?>
    </div>
  </div>
  <div class="footer_block-unnammed">
    <div class="footer_credit">
      <?php get_template_part('templates/footer', 'credit'); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
