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

// article contents
echo '<article id="article-'; the_ID(); echo '" class="category_article">';
// article thumbnail
echo '<div class="category_article-thumbnail">';
  the_post_thumbnail(); // thumbnail size shall be added
echo '</div>';
// article title
echo '<h2 class="category_article-title"><a href="';
  the_permalink();
echo '">';
  the_title();
echo '</a></h2>';
// article content
echo '<div class="category_article-body">';
the_excerpt();
echo '</div></article>'; // end of article-body
