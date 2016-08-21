<?php
/**
* @package moran
* @subpackage header template
* @version 1.5
* Template Name: Header template
* Description: contains HTML metadata and Header block that display logo and navigation elements.
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description'): wp_title(); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime(get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="all" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <?php // Site branding (logo + language swticher) ?>
    <i class="icon-lang"><?php pll_the_languages(array('hide_current'=> 1, 'display_names_as'=> 'slug')); ?></i>
    <i class="fa fa-angle-left"></i>
    <i class="fa fa-search"></i>
    <?php // Show logo
      if(get_theme_mod('logo')):
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="logo">
          <img src="<?php echo esc_url(get_theme_mod('logo'));?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        </a>
      <?php else: ?>
        <h1>
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
            <?php echo bloginfo('name'); ?>
          </a>
        </h1>
      <?php endif; ?>
    <?php // Navigation items ?>
      <i class="fa fa-search"></i>
      <i class="fa fa-ellipsis-h"></i>
      <i class="fa fa-bars"></i>
      <i class="fa fa-close"></i>
    <?php // Show Category navigation
    wp_nav_menu(array(
      'theme_location' => 'category',
      'menu_class'     => 'header_cat-menu',
      'container_id'   => 'nav-cat'
    ));
    ?>
  </header>
  <main>
