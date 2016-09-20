<?php
/**
*
* @package moran
* @subpackage Read options
* @version v0.2-beta.5
* Description: add reading options to single post.
*
*/
function read_opt(){
  $options = array(
    'mode' => array(
      'title' => _x('Reading mode', 'moran'),
      'function' => array(
        'name' => 'option_mode',
        'icon' => '<i class="fa fa-adjust"></i>',
      ),
    ),
    'font-size' => array(
      'title' => _x('Font size', 'moran'),
      'function' => array(
        '1' => array(
          'name' => 'font_plus',
          'icon'  => '<i class="fa fa-plus-square"></i>'
        ),
        '2' => array(
          'name' => 'font_reset',
          'icon' => '<i class="fa fa-square"></i>'
        ),
        '3' => array(
          'name' => 'font_minus',
          'icon'  => '<i class="fa fa-minus-square"></i>'
        ),
      ),
    ),
    'download' => array(
      'title' => _x('Download', 'moran'),
      'icon'  => '<i class="fa fa-file-word-o"></i>'
    )
  );

  echo '<ul class="options_list">';
  foreach ($options as $name => $option) {
    
    $class = $option['function'['name']];

    echo '<li class="'. $class . '">';

    echo '</li>';
  }
  echo '</ul>';
}
