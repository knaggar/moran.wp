<?php
/**
* @package moran
* @subpackage sidebar template
* @version v0.2-beta.1
* Template Name: Sidebar template
* Description: Display single post's table of content and alternative options.
*/
// article download block (found in footer)
$document = get_field('file_download');
$document_url   = wp_get_attachment_url($document);
$document_title = get_the_title($document);
$document_size  = filesize(get_attached_file($document));
$document_size  = size_format($document_size,2 );
$document_info  = pathinfo(get_attached_file($document));
$document_icons = array('pdf' => 'fa-file-pdf', 'doc' => 'fa-file-word-o'); // use to change file icon based on extension

?>
  <div class="article_sidebar sidebar">
    <?php if(toc_get_index()): ?>
    <div class="sidebar_toc">
      <div class="toc_header sidebar-header">
        <h5 class="toc_title sidebar-title inline">
          <?php echo _e('Contents', 'moran'); ?>
        </h5>
      </div>
      <div class="toc_body sidebar-body">
        <ul class="toc_list">
          <?php echo toc_get_index(); ?>
        </ul>
      </div>
    </div>
    <?php endif; ?>
    <div class="sidebar_options">
      <div class="option_header sidebar-header">
        <h5 class="options_title sidebar-title">
          <?php echo _e('Reading options', 'moran'); ?>
        </h5>
      </div>
      <div class="options_body sidebar-body">
        <ul class="options_list">
          <li class="option_read-mode list_item">
            <span class="read-mode_title option-title">
              <?php echo _e('Reading mode', 'moran'); ?>
            </span>
            <span class="read-mode_ctrl option-ctrl">
              <a href="#"><i class="fa fa-adjust"></i></a>
            </span>
          </li>
          <li class="option_font-size list_item">
            <span class="font-size_title option-title">
              <?php echo _e('Font size', 'moran'); ?>
            </span>
            <span class="font-size_ctrl option-ctrl">
              <a href="#" class="font-plus"><i class="fa fa-plus-square"></i></a>
              <a href="#" class="font-reset"><i class="fa fa-square"></i></a>
              <a href="#" class="font-minus"><i class="fa fa-minus-square"></i></a>
            </span>
          </li>
          <li class="option_share list_item">
            <span class="share_title option-title">
              <?php echo _e('Share', 'moran'); ?>
            </span>
            <span class="share_ctrl option-ctrl">
              <?php social_share(); ?>
            </span>
          </li>
          <?php if($document): ?>
            <li class="option_download list_item">
              <span class="download_title option-title">
                <?php echo _e('Download', 'moran'); ?>
              </span>
              <span class="download_ctrl option-ctrl">
                <span class="download_info option-info">
                  <?php echo $document_size . '(.' . $document_info['extension'] . ')' ;?>
                </span>
                <a href="<?php echo $document_url ?>" alt="<?php echo $document_title ?>"><i class="fa fa-file-word-o"></i></a>
              </span>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  <div class="top_btn ctrl-btn">
    <span class="btn_top">
      <i class="fa fa-angle-up"></i>
    </span>
  </div>
</div>
