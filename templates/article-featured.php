<?php
/**
* @package moran
* @subpackage Article featured`
* @version 1.5
* Template Name: feature article template
* Description: a template for featured article which appears on front page.
* called by index.php only
*
*/
echo '<h1 class="featured_title">';
echo _e('Chosen Article', 'moran');
echo '</h1>';
// Query to show only featured article which has thumbnail
$args = array(
 'posts_per_page' => 1,
 'post_type'      => array('policy_analysis','facts_budgets'),
 'tax_query'      => array('relation'=>'OR',
                          array('taxonomy'=>'urban_categories',
                                'field'   => 'slug',
                                'terms'   => array('housing', 'planning', 'facilities'))
                    ),
                    'meta_query' => array('relation'=>'AND',
                          array('key'=>'_thumbnail_id'),
                          array('key'=>'featured_post','value'=>'featured','compare'=>'LIKE')
                          )
  );
  $featured_posts = new WP_Query($args);
  while ($featured_posts->have_posts()): $featured_posts->the_post();
  // Feature article contents
  echo '<article id="article-'; the_ID(); echo '" class="featured_article">';
// article thumbnail
  echo '<div class="featured_article-thumbnail">';
    the_post_thumbnail(); // thumbnail size shall be added
  echo '</div>';
  echo '<div class="featured_article-text">'
// article title
  echo '<h2 class="featured_article-title"><a href="';
    the_permalink();
  echo '">';
    the_title();
  echo '</a></h2>';
// article content
 echo '<div class="featured_article-body">';
  the_excerpt();
 echo '<div class="btn_read-more"><a href="';
  the_permalink();
  echo '">';
  echo _e('Read more', 'moran');
 echo '</a></div></div></div></article>'; // end of article-body
endwhile;
