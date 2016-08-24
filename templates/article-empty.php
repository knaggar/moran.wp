<?php
/**
* @package moran
* @subpackage Article Empty
* @version 1.5
* Template Name: Empty Archive template
* Description: Display message if no article found, even in search.
* called by archive.php
*
*/
?>
  <article id="article-00" class="emtpy_article">
    <div class="empty_article-header article_header">
      <i class="fa fa-stop-circle"></i>
      <h2 class="empty_article-title article_title">
        <?php echo _e('Error.'); // change text here ?>
      </h2>
    </div>
    <div class="empty_article-body article_body">
      <?php // message display for no search resaults
      if(is_search()): ?>
        <h6 class="body_message-title"><?php echo _e('Your search for %s return 0 results', 'moran'); // change text here ?></h6>
        <p class="body_message-text"><?php echo _e('Try %s again', 'moran'); // change text here ?></p>
      <?php else: ?>
        <p class="body_message-text">
          <?php echo _e('There is no content here, please try again later', 'moran'); // change text here?>
        </p>
      <?php endif; ?>
    </div>
  </article>
<p>
</p>
