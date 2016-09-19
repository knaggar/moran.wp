<?php
/**
* @package moran
* @subpackage archive template
* @version v0.2-beta.1
* Template Name: Archive template
* Description: Display taxonomy queries.
*
*/
get_header(); ?>
  <div class="articles_category">
    <div class="category_header header">
    <?php
    // Show title of custom taxonomy
    $term = get_term_by( 'slug', get_query_var( 'term' ),   get_query_var( 'taxonomy' ) );
    // Query custom post types to include in page header as filter for content
    $args = array('public' => true, '_builtin'=>false);
    $outs = 'objects';
    $opr = 'and';
    $post_types = get_post_types($args, $outs, $opr);
    ?>
      <h1 class="category_title">
        <?php echo $term->name ?>
      </h1>
    <?php if (have_posts()): ?>
      <div class="category_filter">
        <span class="filter-title"><?php echo _e('Categories Filter:', 'moran'); ?></span>
        <ul>
        <?php foreach ($post_types as $post_type): ?>
          <li>
            <a href="#" data-filter="<?php echo '.' . $post_type->name ?>">
              <?php echo $post_type->labels->menu_name ?>
            </a>
          </li>
        <?php endforeach; ?>
          <li>
            <a href="#" class="selected" data-filter="*">
              <?php echo _e('Show all', 'moran'); ?>
            </a>
          </li>
        </ul>
      </div>

    <?php endif; ?>
    </div> <!-- End of Category Header -->
    <div class="category_body body">
      <?php if(have_posts()): ?>
      <div class="body_main grid">
        <?php // show category articles
        while(have_posts()): the_post();
          get_template_part('templates/article', get_post_format());
        endwhile;
        ?>
      </div>
      <?php else: ?>
      <div class="body_main empty">
        <?php // show message if no articles found
        get_template_part('templates/article', 'empty');
        ?>
      </div>
      <?php endif;?>
    </div><!-- End of Category Body -->
  </div>
<?php get_footer();
