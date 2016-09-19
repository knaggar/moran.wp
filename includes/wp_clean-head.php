<?php
/**
*
* @package moran
* @subpackage clean head
* @version v0.2-beta.1
* Description: clean wp defaults for <HEAD>
*
*/
// Remove junk from head
   remove_action('wp_head', 'rsd_link');
   remove_action('wp_head', 'wp_generator');
   remove_action('wp_head', 'feed_links', 2);
   remove_action('wp_head', 'index_rel_link');
   remove_action('wp_head', 'wlwmanifest_link');
   remove_action('wp_head', 'feed_links_extra', 3);
   remove_action('wp_head', 'start_post_rel_link', 10, 0);
   remove_action('wp_head', 'parent_post_rel_link', 10, 0);
   remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
   remove_action('wp_head', 'print_emoji_detection_script', 7 );
   remove_action('admin_print_scripts', 'print_emoji_detection_script');
   remove_action('wp_print_styles', 'print_emoji_styles');
   remove_action('admin_print_styles', 'print_emoji_styles');

// Remove version param from scripts and styles
function wp_ver_remove( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'wp_ver_remove', 9999 );
add_filter( 'script_loader_src', 'wp_ver_remove', 9999 );
