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
?>
<?php // Query to show only featured article which has thumbnail
$args = array(
 'posts_per_page' => 1,
 'post_type'      => array('policy_analysis','facts_budgets'),
 'tax_query'      => array('relation'=>'OR',
                          array('taxonomy'=>'urban_categories',
                                'field'   => 'slug',
                                'terms'   => array('housing', 'planning', 'facilities'))
                    ),
  'meta_query'    => array('relation'=>'AND',
        array('key'=>'_thumbnail_id'),
        array('key'=>'featured_post','value'=>'featured','compare'=>'LIKE')
  )
);
$featured_posts = new WP_Query($args);

while ($featured_posts->have_posts()):
$featured_posts->the_post();  ?>

  <article id="article-<?php the_ID(); ?>" class="featured_article">
    <div class="featured_article-thumbnail">
      <?php the_post_thumbnail(); // thumbnail size shall be added ?>
    </div>
    <div class="featured_article-text article_text">
      <h2 class="featured_article-title article_title">
        <a href="<?php the_permalink();?> "><?php the_title(); ?></a>
      </h2>
      <div class="featured_article-body article_body">
        <?php the_excerpt(); ?>
        <div class="btn_read-more btn">
          <a href="<?php the_permalink(); ?>"><?php echo _e('Read more', 'moran');?> </a>
        </div>
      </div>
    </div>
  </article>

<?php endwhile;
