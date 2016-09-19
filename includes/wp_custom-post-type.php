<?php
/**
*
* @package moran
* @subpackage Custom post types
* @version v0.2-beta.1
* Description: enable custom post types
*
*/

// add policy analysis post type
function policy_analysis() {
    $labels = array(
        'name'                => _x('Policy Analysis Articles', 'General Name', 'moran'),
        'singular_name'       => _x('Policy Analysis Article', 'Singular Name', 'moran'),
        'menu_name'           => __('Policy Analysis', 'moran'),
        'all_items'           => __('All Policy Analysis Articles', 'moran'),
        'add_new'             => __('Add New', 'moran'),
        'add_new_item'        => __('Add New Article', 'moran'),
        'edit'                => __('Edit', 'moran'),
        'edit_item'           => __('Edit Article', 'moran'),
        'new_item'            => __('New Article', 'moran'),
        'view'                => __('View', 'moran'),
        'view_item'           => __('View Article', 'moran'),
        'search_items'        => __('Search Articles', 'moran'),
        'not_found'           => __('No Articles found', 'moran'),
        'not_found_in_trash'  => __('No Articles found in Trash', 'moran'),
    );
    $args = array(
        'label'                 => __('Policy Analysis', 'moran'),
        'labels'                => $labels,
        'description'           => __('Analysis of policy about urbans', 'moran'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_rest'          => false,
        'has_archive'           => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array( 'slug' => 'policy_analysis', 'with_front' => true ),
        'query_var'             => true,
        'menu_icon'             => 'dashicons-layout',
        'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'author', 'excerpt' ),
        'taxonomies'            => array( 'urban_categories', 'post_tag' ),
    );
    register_post_type( 'policy_analysis', $args );
}
add_action( 'init', 'policy_analysis' );

// add facts & budgets post type
function facts_budgets() {
    $labels = array(
        'name'                => _x('Facts & Budgets Articles', 'General Name', 'moran'),
        'singular_name'       => _x('Facts & Budgets Article', 'Singular Name', 'moran'),
        'menu_name'           => __('Facts & Budgets', 'moran'),
        'all_items'           => __('All Facts & Budgets Articles', 'moran'),
        'add_new'             => __('Add New', 'moran'),
        'add_new_item'        => __('Add New Article', 'moran'),
        'edit'                => __('Edit', 'moran'),
        'edit_item'           => __('Edit Article', 'moran'),
        'new_item'            => __('New Article', 'moran'),
        'view'                => __('View', 'moran'),
        'view_item'           => __('View Article', 'moran'),
        'search_items'        => __('Search Articles', 'moran'),
        'not_found'           => __('No Articles found', 'moran'),
        'not_found_in_trash'  => __('No Articles found in Trash', 'moran'),
        );
    $args = array(
        'label'                 => __('Facts & Budgets', 'moran'),
        'labels'                => $labels,
        'description'           => __('Fact and Budgets about urbans', 'moran'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_rest'          => false,
        'has_archive'           => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array( 'slug' => 'facts_budgets', 'with_front' => true ),
        'query_var'             => true,
        'menu_icon'             => 'dashicons-chart-line',
        'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'author', 'excerpt' ),
        'taxonomies'            => array( 'urban_categories', 'post_tag' ),
    );
    register_post_type( 'facts_budgets', $args );
}
add_action( 'init', 'facts_budgets' );

// add research post type
function research() {
    $labels = array(
        'name'                => _x('Research Articles', 'General Name', 'moran'),
        'singular_name'       => _x('Research Article', 'Singular Name', 'moran'),
        'menu_name'           => __('Research', 'moran'),
        'all_items'           => __('All Research Articles', 'moran'),
        'add_new'             => __('Add New', 'moran'),
        'add_new_item'        => __('Add New Article', 'moran'),
        'edit'                => __('Edit', 'moran'),
        'edit_item'           => __('Edit Article', 'moran'),
        'new_item'            => __('New Article', 'moran'),
        'view'                => __('View', 'moran'),
        'view_item'           => __('View Article', 'moran'),
        'search_items'        => __('Search Articles', 'moran'),
        'not_found'           => __('No Articles found', 'moran'),
        'not_found_in_trash'  => __('No Articles found in Trash', 'moran'),
    );
    $args = array(
       'label'                 => __('Research', 'moran'),
        'labels'                => $labels,
        'description'           => __('Research Papers about urbans', 'moran'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_rest'          => false,
        'has_archive'           => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array( 'slug' => 'research', 'with_front' => true ),
        'query_var'             => true,
        'menu_icon'             => 'dashicons-analytics',
        'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'author' ),
        'taxonomies'            => array( 'urban_categories', 'post_tag' ),
    );
    register_post_type( 'research', $args );
}
add_action( 'init', 'research');

// add urban archive post type
function urban_archive() {
    $labels = array(
        'name'                => _x('Urban Archive Articles', 'General Name', 'moran'),
        'singular_name'       => _x('Urban Archive Article', 'Singular Name', 'moran'),
        'menu_name'           => __('Urban Archive', 'moran'),
        'all_items'           => __('All Urban Archive Articles', 'moran'),
        'add_new'             => __('Add New', 'moran'),
        'add_new_item'        => __('Add New Article', 'moran'),
        'edit'                => __('Edit', 'moran'),
        'edit_item'           => __('Edit Article', 'moran'),
        'new_item'            => __('New Article', 'moran'),
        'view'                => __('View', 'moran'),
        'view_item'           => __('View Article', 'moran'),
        'search_items'        => __('Search Articles', 'moran'),
        'not_found'           => __('No Articles found', 'moran'),
        'not_found_in_trash'  => __('No Articles found in Trash', 'moran'),
        );
    $args = array(
     'label'                 => __('Urban Archive', 'moran'),
        'labels'                => $labels,
        'description'           => __('Archive about urbans', 'moran'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_rest'          => false,
        'has_archive'           => true,
        'show_in_menu'          => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'rewrite'               => array( 'slug' => 'urban_archive', 'with_front' => true ),
        'query_var'             => true,
        'menu_icon'             => 'dashicons-index-card',
        'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail', 'author' ),
        'taxonomies'            => array( 'urban_categories', 'post_tag' ),
    );
    register_post_type( 'urban_archive', $args );
}
add_action( 'init', 'urban_archive');
// Include CPT in loop
function cpt_query($query){
    if ($query->is_home() && $query->is_main_query() && $query->is_archive()) {
        $query->set('post_type', array('policy_analysis','facts_budgets', 'research','urban_archive'));
    }
    return $query;
}
add_filter('pre_get_posts', 'cpt_query');
