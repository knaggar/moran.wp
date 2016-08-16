<?php
/**
* @package moran
* @subpackage functions
* @version 1.5
* Description: contains functions and definations for theme and other extra plugins (found in 'includes' folder).
*/

// Theme plugins in 'includes' folder
  // add theme customizer
  require get_template_directory() . '/includes/wp_customizer.php';
  // Clean html head
  require get_template_directory() . '/includes/wp_clean-head.php';
  // Add Custom Post Type
  require get_template_directory() . '/includes/wp_custom-post-type.php';
  // Add Custom Taxonomies
  require get_template_directory() . '/includes/wp_custom-taxonomy.php';
  // Add Share Buttons
  require get_template_directory() . '/includes/wp_social-share.php';
