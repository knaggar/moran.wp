<?php
/**
* @package moran
* @subpackage Article single`
* @version 1.5
* Template Name: single article template
* Description: a template for single post of article.
* called by single.php only
*
*/

// Single post contents
// article title
the_title();
// article published data
the_date('d f Y');
// article thumbnail
the_post_thumbnail('single');
// article content
the_content();
