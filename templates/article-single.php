<?php
/**
* @package moran
* @subpackage Article single`
* @version 1.5
* Template Name: single article template
* Description: a template for single post of article.
* called by single.php only
*
*/
// Single post contents with post thumbnail
if (has_post_thumbnail()):
  echo '<article id="article-'; the_ID(); echo '" class="single_article has-thumb"><div class="single_article-header header">';
  // article thumbnail
  echo '<div class="single_article-thumbnail">';
    the_post_thumbnail('single'); // thumbnail size shall be added
  echo '</div>';
else:
  echo '<article id="article-'; the_ID(); echo '" class="single_article no-thumb"><div class="single_article-header header">';
endif;
// article contents
echo '<div class="single_article-text">';
// article categories
echo '<div class="single_article-category">';
echo '<h4 class="single_article-category article_category-0">';
echo get_the_term_list($post->ID, 'urban_categories', '<span>','</span>');
echo '</h4>';
$post_type = get_post_type($post->ID);
$post_object = get_post_type_object($post_type);
echo '<h4 class="single_article-category article_category-1"><span>';
echo $post_object->labels->menu_name;
echo '</span></h4>';
echo '</div>';
// article title
echo '<h1 class="single_article-title">';
the_title();
echo '</h1>';
// article published data
echo '<div class="single_article-date">';
the_date('d F Y');
echo '</div>';
echo '</div></div>'; // end of article header
// article content
echo '<div class="single_article-body body">';
echo '<div class="article_body-main">';
the_content();
echo '</div>';
echo '<div class="article_body-secondary"></div>';
echo '</div>'; // end of article body
// article footer
echo '<div class="single_article-footer footer">';
// article download block
$document = get_field('file_download');
$document_url   = wp_get_attachment_url($document);
$document_title = get_the_title($document);
$document_size  = filesize(get_attached_file($document));
$document_size  = size_format($document_size,2 );
$document_info  = pathinfo(get_attached_file($document));
$document_icon = array('pdf' => 'fa-file-pdf', 'doc' => 'fa-file-word-o'); // use to change file icon based on extension
if ($document):
echo '<div class="article_footer-block-unnammed">';
echo '<div class="block_unnammed-item"><i class="fa fa-file-word-o"></i></div>'; // change file icon based of extension
echo '<div class="block_unnammed-item">';
echo $document_size . '(.' . $document_info['extension'] . ')';
echo '</div><div class="block_unnammed-item">';
echo '<a href="'. $document_url . '" alt="'. $document_title .'">';
echo _e('Download', 'moran');
echo '</div></a>';
echo '</div>';
endif;
// article tag block
$post_tags = get_the_tags();
echo '<div class="article_footer-block-unnammed">';
echo '<div class="block_unnammed-item">';
echo _e('Tags', 'moran');
echo '</div>';
echo '<ul class="block_unnammed-item">';
foreach ($post_tags as $post_tag):
echo '<li>'. $post_tag->name . '</li>';
endforeach;
echo '</ul>';
echo '</div>';
// article reviewed block
echo '<div class="article_footer-block-unnammed">';
echo '<div class="block_unnammed-item">';
echo '<i class="fa fa-calendar-check-o"></i>';
echo '</div>';
  echo '<div class="block_unnammed-item">';
  echo _e('Last reviewed in ' , 'moran'); the_modified_date('d F Y');
  echo '</div>';
echo '</div>';
// article social share
echo '<div class="article_footer-block-unnammed">';
  echo '<div class="block_unnammed-item">';
  echo _e('Share', 'moran');
  echo '</div>';
  echo '<div class="block_unnammed-item">';
  social_share();
  echo '</div>';


echo '</div>';

echo '</div>'; // end of article footer
echo '</article>'; // end of article wrap
