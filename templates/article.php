<?php
/**
* @package moran
* @subpackage Article template`
* @version v0.2-beta.5
* Template Name: article template
* Description: a template for articles show in loop
* called by archive.php only
*
*/
$post_type = get_post_type_object(get_post_type());
$featured = (get_field('featured_post')) ? ' focus' : '' ;
if (has_post_thumbnail()):
// Display content for posts with thubmnail and not external
?>

  <article id="article-<?php the_ID(); ?>" class="<?php echo get_post_type($post->ID). $featured; ?> category_article has_thumb">
    <a href="<?php the_permalink(); ?>" class="category_article-thumbnail article_thumbnail">
      <?php the_post_thumbnail(); ?>
    </a>
    <div class="category_article-text article_text">
      <h6 class="category_article-category article_text-item">
        <?php echo esc_html($post_type->labels->menu_name); ?>
      </h6>
      <h3 class="category_article-title article_title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>
  	</div>
  </article>
<?php // Display content for posts with external link
elseif (in_array(get_post_type(), array('research', 'urban_archive'))): ?>

  <article id="article-<?php the_ID(); ?>" class="<?php echo get_post_type($post->ID);?> external category_article">
    <div class="category_article-text article_text">
      <div class="category_article-icon article_icon">
        <i class="fa fa-external-link"></i>
      </div>
      <h3 class="category_article-title article_title">
        <a href="<?php the_field('external_url'); ?>"><?php the_title(); ?></a>
      </h3>
      <h6 class="category_article-category article_text-item">
        <?php echo esc_html($post_type->labels->menu_name); ?>
      </h6>
    </div>
  </article>
<?php // Display content for posts with no thumbnail and not external
else: ?>
  <article id="article-<?php the_ID(); ?>" class="<?php echo get_post_type($post->ID). $featured; ?> category_article no_thumb">
    <div class="category_article-text article_text">
      <h6 class="category_article-category article_text-item">
        <?php echo esc_html($post_type->labels->menu_name); ?>
      </h6>
      <h3 class="category_article-title article_title">
        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
      </h3>
  	   <div class="category_article-body article_body"><?php the_excerpt(); ?></div>
    </div>
  </article>
<?php endif;
