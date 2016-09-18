<?php
/**
*
* @package moran
* @subpackage Advacned search form
* @version 1.5
* Description: form functions and options for WP advanced search framework
*
*/

// Include WPAS
require_once('wp-advanced-search/wpas.php');

// advanced search form
function advanced_search_form(){
  $args = array();
  // Query for custom post types
  $args['wp_query'] = array(
    'post_type' => array('policy_analysis', 'facts_budgets', 'research', 'urban_archive'),

  );
  // Form options
  /*$args['debug'] = true;*/

  $args['form'] = array(
    'auto_submit' => true
  );
  $args['form']['ajax'] = array(
    'enabled' => true,
    'show_default_results' => true,
    /*'loading_img' => '<i class="fa fa-circle-o-notch fa-spin"></i>',*/
    'results_template' => 'templates/article-search.php'
  );
  // Form fields
  $args['fields'][] = array(
    'type' => 'search',
    'placeholder' => __('Enter Search here...', 'moran'),
    'pre_html' => '<div class="search_field field-search field-item">',
    'post_html' => '</div>'
  );
  $args['fields'][] = array(
    'type' => 'taxonomy',
    'taxonomy' => 'urban_categories',
    'format' => 'checkbox',
    'class' => 'tax_items',
    'pre_html' => '<div id="form_advanced-options" class="form_advanced-options"><div class="search_tax field-item">',
    'post_html' => '</div>'
  );
  $args['fields'][] = array(
    'type' => 'post_type',
    'format' => 'select',
    'class' => 'type_items',
    'values' => array(
      '' => 'Select Category',
      'policy_analysis' => __('Policy Analysis', 'moran'),
      'facts_budgets' => __('Facts & Budgets', 'moran'),
      'research' => __('Research', 'moran'),
      'urban_archive' => __('Urban Archive', 'moran'),
    ),
    'pre_html' => '<div class="search_type field-item">',
    'post_html' => '</div>'
  );
  $args['fields'][] = array(
    'type' => 'orderby',
    'format' => 'select',
    'values' => array(
      '' => 'Order by',
      'title' => __('Title', 'moran'),
      'date' => __('Date', 'moran')
    ),
    'pre_html' => '<div class="search_order field-item">',
    'post_html' => '</div></div>'
  );


  register_wpas_form('advanced-search', $args);
}
add_action('init', 'advanced_search_form');
