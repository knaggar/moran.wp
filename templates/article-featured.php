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
echo _e('Chosen Article', 'moran');

// Query to show only featured article which has thumbnail
$posts = get_posts(array(
   'numberposts'=> 1,
   'post_type'  => array('policy_analysis','facts_budgets'),
   'tax_query'  => array('relation'=>'OR',
                        array('taxonomy'=>'urban_categories',
                              'field'   => 'slug',
                              'terms'   => array('housing', 'planning', 'facilities'))
                    ),
   'meta_query' => array('relation'=>'AND',
                        array('key'=>'_thumbnail_id'),
                        array('key'=>'featured_post','value'=>'featured','compare'=>'LIKE')
                        )
));
// Feature article contents
foreach ($posts as $post):
  setup_postdata($post);
// article thumbnail
  /* thumbnail size shall be added */
the_post_thumbnail();
// article title
the_title();
// article content
the_excerpt();
echo _e('Read more', 'moran');

wp_reset_postdata();
endforeach;
