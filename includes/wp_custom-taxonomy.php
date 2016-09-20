<?php
/**
*
* @package moran
* @subpackage Custom taxonomies
* @version v0.2-beta.5
* Description: enable custom taxonomies
*
*/

// Register Custom Taxonomy for Articles
function urban_categories() {

    $labels = array(
        'name'                       => _x( 'Urban Categories', 'Taxonomy General Name', 'moran' ),
        'singular_name'              => _x( 'Urban Category', 'Taxonomy Singular Name', 'moran' ),
        'menu_name'                  => __( 'Category', 'moran' ),
        'all_items'                  => __( 'All Items', 'moran' ),
        'parent_item'                => __( 'Parent Item', 'moran' ),
        'parent_item_colon'          => __( 'Parent Item:', 'moran' ),
        'new_item_name'              => __( 'New Item Name', 'moran' ),
        'add_new_item'               => __( 'Add New Item', 'moran' ),
        'edit_item'                  => __( 'Edit Item', 'moran' ),
        'update_item'                => __( 'Update Item', 'moran' ),
        'view_item'                  => __( 'View Item', 'moran' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'moran' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'moran' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'moran' ),
        'popular_items'              => __( 'Popular Items', 'moran' ),
        'search_items'               => __( 'Search Items', 'moran' ),
        'not_found'                  => __( 'Not Found', 'moran' ),
        'no_terms'                   => __( 'No items', 'moran' ),
        'items_list'                 => __( 'Items list', 'moran' ),
        'items_list_navigation'      => __( 'Items list navigation', 'moran' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'urban_categories', array( 'policy_analysis', 'facts_budgets', ' research', 'urban_archive' ), $args );

}
add_action( 'init', 'urban_categories', 0 );
