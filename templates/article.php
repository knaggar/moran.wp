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
// Display content for posts with thubmnail and not external
if (has_post_thumbnail()):
  // article contents
  echo '<article id="article-'; the_ID(); echo '" class="category_article has_thumb ';
  echo get_post_type($post->ID);
  echo '">';
  // article thumbnail
  echo '<a href="';
  the_permalink();
  echo '" class="category_article-thumbnail">';
    the_post_thumbnail(); // thumbnail size shall be added
  echo '</div>';
  echo '<div class="category_article-text">';
  // article title
  echo '<h2 class="category_article-title"><a href="';
    the_permalink();
  echo '">';
    the_title();
  echo '</a></h2>';
  echo '</div></article>'; // end of article-body
// Display content for posts with external link
elseif (in_array(get_post_type(), array('research', 'urban_archive'))):
  // article contents
  echo '<article id="article-'; the_ID(); echo '" class="category_article external">';
  echo '<div class="category_article-text">';
  // article title
  echo '<h2 class="category_article-title"><a href="';
    the_field('external_url');
  echo '">';
    the_title();
  echo '</a></h2></div></article>'; // end of article-body
// Display content for posts with no thumbnail and not external
else:
  // article contents
  echo '<article id="article-'; the_ID(); echo '" class="category_article no_thumb ';
  echo get_post_type($post->ID);
  echo '">';
  echo '<div class="category_article-text">';
  // article title
  echo '<h2 class="category_article-title"><a href="';
    the_permalink();
  echo '">';
    the_title();
  echo '</a></h2>';
  // article content
  echo '<div class="category_article-body">';
  the_excerpt();
  echo '</div></div></article>'; // end of article-body
endif;
