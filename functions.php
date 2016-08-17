<?php
/**
*
* @package moran
* @subpackage functions
* @version 1.5
* Description: contains functions and definations for theme and other extra plugins (found in 'includes' folder).
*
*/

// Theme defaults and registers support
if (!function_exists('moran_setup')){
  function moran_setup(){
    // Load language text domain
    load_theme_textdomain('moran', get_template_directory() . '/languages');
    // Add post Formats
    add_theme_support('post-formats', array('image', 'video', 'audio', 'gallery'));
    // switch core markup
    add_theme_support('automatic-feed-links', 'html5', array('search-form', 'gallery', 'caption'));
    // Add navigation
    register_nav_menus(array(
      'primary' => __('Primary Naviation', 'moran'),
      'category'=> __('Category Navigation', 'moran')
    ));
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    // Post thumbnails sizes
    add_image_size('focus', 550, 200, true);
    add_image_size('normal', 265, 200, true);
    add_image_size('single', 1120, 415, true);
  }
}
add_action('after_setup_theme', 'moran_setup');
// Add theme styles and scripts
function style_script_enqueue(){
  // update jquery version
  function jquery_update(){
    if(!is_admin()){
      wp_deregister_script('jquery');
      wp_register_script('jquery', get_template_directory_uri(). '/assets/scripts/jquery-3.1.0.min.js');
      wp_enqueue_script('jquery');
    }
  }
  add_action('init', 'jquery_update');
  /* Styles */
  // RESET.css
  wp_register_style('reset', get_template_directory_uri(). '/assets/styles/reset.css','', filemtime(get_stylesheet_directory(). '/assets/styles/reset.css'));
  wp_enqueue_style('reset');
  // GLOBE.css
  wp_register_style('theme', get_template_directory_uri(). '/assets/styles/globe.css','', filemtime(get_stylesheet_directory(). '/assets/styles/globe.css'));
  wp_enqueue_style('theme');
  // RTL.css
  wp_register_style('rtl', get_template_directory_uri(). '/assets/styles/rtl.css','', filemtime(get_stylesheet_directory(). '/assets/styles/rtl.css'));
  wp_enqueue_style('rtl');
  // RESPONSIVE.css
  wp_register_style('responsive', get_template_directory_uri(). '/assets/styles/responsive.css','', filemtime(get_stylesheet_directory(). '/assets/styles/responsive.css'));
  wp_enqueue_style('responsive');
  /* Scripts */
  // imagesLoaded
  wp_register_script('imagesLoaded', get_template_directory_uri(). '/assets/scripts/imagesloaded.pkgd.min.js' );
  wp_enqueue_script('imagesLoaded');
  // isotope
  wp_register_script('isotope', get_template_directory_uri(). '/assets/scripts/isotope.pkgd.min.js' );
  wp_enqueue_script('isotope');
  // GLOBE.js
  wp_register_script('theme', get_template_directory_uri(). '/assets/scripts/globe.js' );
  wp_enqueue_script('theme');
}
add_action('init', 'style_script_enqueue');

// Theme plugins in 'includes' folder
  // add theme customizer
  require get_template_directory() . '/includes/wp_customizer.php';
  // Clean html HEAD
  require get_template_directory() . '/includes/wp_clean-head.php';
  // Add Custom Post Type
  require get_template_directory() . '/includes/wp_custom-post-type.php';
  // Add Custom Taxonomies
  require get_template_directory() . '/includes/wp_custom-taxonomy.php';
  // Add Share Buttons
  require get_template_directory() . '/includes/wp_social-share.php';
  // Add WP Advanced Search framework
  require get_template_directory() . '/includes/wpas_advanced-search.php';
