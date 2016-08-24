<?php
/**
* @package moran
* @subpackage Article template`
* @version 1.5
* Template Name: article template
* Description: a template for articles show in loop
* called by archive.php only
*
*/
if (has_post_thumbnail()):
// Display content for posts with thubmnail and not external
?>

  <article id="article-<?php the_ID(); ?>" class="category_article has_thumb <?php echo get_post_type($post->ID);?>">
    <a href="<?php the_permalink(); ?>" class="category_article-thumbnail">
      <?php the_post_thumbnail(); // thumbnail size shall be added ?>
    </a>
    <div class="category_article-text article_text">
      <h2 class="category_article-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
  	</div>
  </article>
<?php // Display content for posts with external link
elseif (in_array(get_post_type(), array('research', 'urban_archive'))): ?>

  <article id="article-<?php the_ID(); ?>" class="category_article external">
    <div class="category_article-text article_text">
      <h2 class="category_article-title">
        <a href="<?php the_field('external_url'); ?>"><?php the_title(); ?></a>
      </h2>
    </div>
  </article>
<?php // Display content for posts with no thumbnail and not external
else: ?>
  <article id="article-<?php the_ID(); ?>" class="category_article no_thumb <?php echo get_post_type($post->ID); ?>">
    <div class="category_article-text">
      <h2 class="category_article-title">
        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
      </h2>
  	   <div class="category_article-body"><?php the_excerpt(); ?></div>
    </div>
  </article>
<?php endif;
