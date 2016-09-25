<?php
/**
*
* @package moran
* @subpackage Advacned search form
* @version v0.2-beta.5
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
    'post_type'           => array(
      'policy_analysis', 'facts_budgets', 'research', 'urban_archive'
    ),
  );
  // Form options
  $args['form'] = array(
    'auto_submit'          => true,
    'name'                 => 'advanced-search',
    'class'                => 'advanced-search',
    'disable_wrappers'     => true,
  );
  $args['form']['ajax'] = array(
    'enabled'              => true,
    'button_text'          => __('Show more articles', 'moran'),
    'show_default_results' => false,
    'results_template'     => 'templates/article-search.php'
  );
  // Form fields
  $args['fields'][] = array(
    'type'                 => 'search',
    'placeholder'          => __('Enter Search here...', 'moran'),
    'attributes'           => array(
      'autocomplete'         => 'off',
    ),
    'pre_html'             => '<div class="header_top row"><div class="search_field form-field inline"><div class="branding_switch inline"><div class="search_btn ctrl-btn"><span class="btn_search btn"><i class="fa fa-search"></i></span><span class="btn_close btn"><i class="fa fa-close"></i></span></div></div>',
    'post_html'            => '</div>'
  );
  $args['fields'][] = array(
    'type'                 => 'html',
    'value'                => '<div class="search_results inline"><h6>' . __('Search found articles ', 'moran') .'<span></span></h6></div></div>',
  );
  $args['fields'][] = array(
    'type'                 => 'taxonomy',
    'taxonomy'             => 'urban_categories',
    'operator'             => 'IN',
    'format'               => 'checkbox',
    'class'                => 'field_items',
    'pre_html'             => '<div class="form_filters form-row"><div class="filters_header"><h3 class="filters_title">' . __('Filter search', 'moran') . '</h3><span class="filters_icon"><i class="fa fa-plus"></i></span></div><div class="filters_body"><div class="tax_field form-field">',
    'post_html'            => '</div>'
  );
  $args['fields'][] = array(
    'type'                 => 'post_type',
    'format'               => 'select',
    'class'                => 'field_items',
    'allow_null'           => __('Select Category', 'moran'),
    'values'               => array(
      'policy_analysis'      => __('Policy Analysis', 'moran'),
      'facts_budgets'        => __('Facts & Budgets', 'moran'),
      'research'             => __('Research', 'moran'),
      'urban_archive'        => __('Urban Archive', 'moran'),
    ),
    'pre_html'             => '<div class="type_field form-field"><span class="field_icon"><i class="fa fa-angle-down"></i></span>',
    'post_html'            => '</div>'
  );
  $args['fields'][] = array(
    'type'                 => 'orderby',
    'format'               => 'select',
    'allow_null'           => __('Order by', 'moran'),
    'values'               => array(
      'title'                => __('Title', 'moran'),
      'date'                 => __('Date', 'moran')
    ),
    'pre_html'             => '<div class="order_field form-field"><span class="field_icon"><i class="fa fa-angle-down"></i></span>',
    'post_html'            => '</div></div></div>'
  );
  register_wpas_form('advanced-search', $args);
}
add_action('init', 'advanced_search_form');
