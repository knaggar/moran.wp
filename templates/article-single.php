<?php
/**
* @package moran
* @subpackage Article single`
* @version v0.2-beta.1
* Template Name: single article template
* Description: a template for single post of article.
* called by single.php only
*
*/
  // Post type
  $post_type = get_post_type($post->ID);
  $post_object = get_post_type_object($post_type);
  // article download block (found in footer)
  $document = get_field('file_download');
  $document_url   = wp_get_attachment_url($document);
  $document_title = get_the_title($document);
  $document_size  = filesize(get_attached_file($document));
  $document_size  = size_format($document_size,2 );
  $document_info  = pathinfo(get_attached_file($document));
  $document_icon = array('pdf' => 'fa-file-pdf', 'doc' => 'fa-file-word-o'); // use to change file icon based on extension
  // post tags (if any)
  $post_tags = get_the_tags();
  // Endnotes fields
  $group = 185;
  $group_fields = acf_get_fields_by_id($group);
if (has_post_thumbnail()):
// Single post contents with post thumbnail
?>

  <article id="article-<?php the_ID(); ?>" class="single_article has-thumb">
    <div class="single_article-header article_header">
      <div class="single_article-thumbnail article_thumbnail">
        <?php the_post_thumbnail(); // thumbnail size shall be added ?>
      </div>
<?php else:
// Single post content without thubmnail ?>
  <article id="article-<?php the_ID(); ?>"  class="single_article no-thumb">
    <div class="single_article-header article_header">
<?php endif; ?>

      <div class="single_article-text article_text">
        <div class="single_article-category article_text-item">
          <h4 class="single_article-category article_category-0">
          <?php echo get_the_term_list($post->ID, 'urban_categories', '<span>', '</span>'); ?>
          </h4>
          <h4 class="single_article-category article_category-1">
          <span><?php echo $post_object->labels->menu_name; ?></span>
          </h4>
        </div>
        <h1 class="single_article-title article_text-item"><span><?php the_title(); ?></span></h1>
        <h6 class="single_article-date article_text-item"><span><?php echo _e('Published in ', 'moran'); the_date('d F Y'); ?></span></h6>
        <h5 class="single_article-author article_text-item">

            <span><?php the_field('authored_by'); ?></span>

        </h5>
      </div>
    </div><!-- end of article header -->
    <div class="single_article-body article_body">
      <div class="article_body-main"><?php the_content();?></div>
      <div class="article_body-secondary">
        <?php if(get_field('endnotes_title') && get_field('endnotes_body')): ?>
        <div class="article_endnotes">
          <h3 class="endnotes_title"><?php the_field('endnotes_title') ;?></h3>
          <div class="endnotes_body"><?php the_field('endnotes_body') ;?></div>
        </div>
        <?php endif; ?>
      </div>
    </div><!-- end of article body -->
    <div class="single_article-footer article_footer">
      <div class="row">

      <?php if ($document): ?>
	    <div class="article_footer-widget article_widget widget_download">
	       <div class="download_icon widget_download-icon widget_item">
           <i class="fa fa-file-word-o"></i><?php // change file icon based of extension ?>
         </div>
	        <div class="download_info widget_download-info widget_item">
            <?php echo $document_size . '(.' . $document_info['extension'] . ')' ;?>
          </div>
          <div class="widget_download-action widget_item">
            <h6>
              <a href="<?php echo $document_url ?>" alt="<?php echo $document_title ?>"><?php echo _e('Download', 'moran'); ?></a>
            </h6>
          </div>
      </div>
      <?php endif; ?>
	    <div class="article_footer-widget article_widget widget-modified">
	      <div class="widget_modified-icon widget_item">
	         <i class="fa fa-calendar-check-o"></i>
	      </div>
  	    <div class="widget_modified-title widget_item">
          <h6>
            <?php echo _e('Last reviewed in <br />' , 'moran'); the_modified_date('d F Y'); ?>
          </h6>
        </div>
  	  </div>
      <div class="article_footer-widget article_widget widget-share">
        <div class="widget_share-title widget_item">
          <h6><?php echo _e('Share', 'moran'); ?></h6>
  	    </div>
  	    <div class="widget_share-action widget_item">
          <?php social_share(); ?>
  	    </div>
	     </div>
       <?php if(is_array($post_tags)) :?>

       <div class="article_footer-widget article_widget widget_tags">
            <h6 class="widget_tags-title widget_item">
              <?php echo _e('Tags', 'moran'); ?>
            </h6>
            <ul class="widget_tags-list widget_item">
             <?php foreach ($post_tags as $post_tag): ?>
             <li><?php echo $post_tag->name; ?></li>
             <?php endforeach; ?>
            </ul>
 	    </div>
       <?php endif; ?>
     </div>
     </div>

   </article>
