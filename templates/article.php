<?php
/**
* @package moran
* @subpackage Article template`
* @version 1.5
* Template Name: article template
* Description: a template for articles show in loop
* called by single.php only
*
*/

//  contents for posts in loop
the_permalink();
// article title
the_title();
// article thumbnail
the_post_thumbnail();
// article content
the_excerpt();
