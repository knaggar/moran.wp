<?php
/**
*
* @package moran
* @subpackage Advacned search form
* @version 1.5
* Description: form functions and options for WP advanced search framework
*
*/
// advanced search form
function advanced_search_form(){
  $args = array();
  // Query for custom post types
  $args['wp_query'] = array(
    'post_type' => array('policy_analysis', 'facts_budgets', 'research', 'urban_archive');
    'orderby'   => 'title',
    'order'     => 'ASC'
  );
  // Form options
  $args['form'] = array('auto_submit' => true);
  $args['form']['ajax'] = array('enabled' => true);
  // Form fields
  $args['fields'][] = array(

  );
  $args['fields'][] = array(

  );
  $args['fields'][] = array(

  );
  register_wpas_form('advanced-search', $args);
}
add_action('init', 'advanced_search_form');
