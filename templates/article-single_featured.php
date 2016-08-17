<?php
/**
* @package moran
* @subpackage archive template
* @version 1.5
* Template Name: Archive template
* Description: Display taxonomy queries.
*
* To be replaced with index template.
*/
echo _e('Chosen Article', 'moran');

// Query to show only featured article which has thumbnail

// Feature article contents

// article thumbnail
  /* thumbnail size shall be added */
the_post_thumbnail();
// article title
the_title();
// article content
the_excerpt();
echo _e('Read more', 'moran');
