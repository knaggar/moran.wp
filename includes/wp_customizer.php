<?php
/**
*
* @package moran
* @subpackage Theme customizer
* @version v0.2-beta.5
* Description: Add custom options to handle with theme
*
*/

// Logo uploader
function theme_customizer($wp_customize){
  $wp_customize->add_section('logo_section', array(
    'title'       => __('Logo', 'moran'),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header'
  ));
  $wp_customize->add_setting('logo');
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo',
    array(
      'label'    => __( 'Logo', 'moran' ),
      'section'  => 'logo_section',
      'settings' => 'logo',
    )
  ));
}
add_action('customize_register', 'theme_customizer');
