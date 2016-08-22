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
  <div class="footer_menu footer_block">
    <?php // Show Primary menu
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container_class'     => 'footer_menu',
      'menu_class'   => 'menu_primary'
    ));
    // Show Footer logo as text ?>
    <div class="footer_logo logo-text">
      <?php echo  bloginfo('name'); ?>
    </div>
  </div><!-- End of block -->

  <div class="footer_about footer_block">
    <?php // Show page content of project
    $page_footer = get_posts(array('name'=>'tooba','post_type'=>'page'));
    echo $page_footer[0]->post_content; ?>
  </div><!-- End of block -->
  <div class="footer_social-profiles footer_block">
      <?php // social profiles for project
      social_profile() ?>
  </div><!-- End of block -->
  <div class="footer_credit footer_block">
    <?php // show credit of project
     get_template_part('templates/footer', 'credit'); ?>
  </div><!-- End of block -->
</footer>
<?php wp_footer(); ?>
</body>
</html>
