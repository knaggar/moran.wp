<?php
/**
* @package moran
* @subpackage Article Page
* @version 1.5
* Template Name: Page template
* Description: a template for article which appears as single page.
* called by index.php only
*
*/
echo '<article id="article-'; the_ID(); echo '" class="page_article">
<div class="single_article-header header">';
echo '<div class="single_article-text">';
// article title
echo '<h1 class="page_article-title">';
the_title();
echo '</h1>';
echo '</div></div>'; // end of article header
// article content
echo '<div class="page_article-body body">';
echo '<div class="article_body-main">';
the_content();
echo '</div>';
echo '<div class="article_body-secondary"></div>';
echo '</div>'; // end of article body
echo '</article>'; // end of article wrap
