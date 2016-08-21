<?php
/**
* @package moran
* @subpackage Credit
* @version 1.5
* Template Name: credit template
* Description: credit for license of content and website.
* called by footer.php only
*
*/

$github = 'https://github.com/kaeid/moran.wp';
$credit = sprintf(wp_kses( __('except for <a href="%s">theme design & develop</a>, or mentioned elsewhere,<br /> This work is provided under a Creative Commons License', 'moran'),
array ('a' => array('href' => array()), 'br' => array() )), esc_url($github)); ?>

<i class="fa fa-creative-commons"></i>
<i class="fa fa-github"></i>
<?php echo $credit;
