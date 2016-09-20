<?php
/**
* @package moran
* @subpackage Article Page
* @version v0.2-beta.5
* Template Name: Page template
* Description: a template for article which appears as single page.
* called by index.php only
*
*/
?>

<article id="article-<?php the_ID();?>" class="page_article">
  <div class="page_article-header article_header">
    <div class="single_article-text article_text">
      <h1 class="page_article-title article_title">
        <?php the_title(); ?>
      </h1>
    </div>
  </div>
  <div class="page_article-body article_body">
    <div class="article_body-main body_main">
      <?php the_content(); ?>
    </div>
    <div class="article_body-secondary body_secondary">

    </div>
  </div>
</article>
