<?php
/**
*
* @package moran
* @subpackage Social network share
* @version v0.2-beta.5
* Description: share single article with different services. Also show social profiles of project.
*
*/
// Share Articles
function social_share(){

  $url =  get_post_permalink() ;
  $title = str_replace('', '%20', get_the_title());
  $source = get_bloginfo('name');

  $services = array (
      'facebook' => array(
          'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url . '&redirect_uri='. $url,
          'i'   => '<i class="fa fa-facebook"></i>',
          't'   => esc_attr(__('Share on Facebook', 'moran'))
      ),
      'twitter' => array(
          'url' => 'https://twitter.com/intent/tweet?text=' . $source . ' - ' . $title . '&amp;url='. $url,
          'i'   => '<i class="fa fa-twitter"></i>',
          't'   => esc_attr(__('Tweet this', 'moran'))
      ),

  );

  echo '<ul class="social-share">';

  foreach ($services as $name => $service) {
    echo '<li class="' . $name . '">';
    $href = sprintf( $service['url'], $url, urlencode($title) );
    $icon = $service['i'];
    echo '<a href="' . $href . '" title="'. $service['t'] . '" target="_blank">'. $icon . '</a>';
    echo '</li>';

      }

  echo '</ul>';
}
// Social profiles
function social_profile(){
  $social_profiles = array(
      'facebook' => array(
          'url' => 'https://www.facebook.com/10Tooba',
          'icon'=> '<i class="fa fa-facebook"></i>'
        ),
      'twitter'  => array(
          'url' => 'https://twitter.com/10Tooba',
          'icon'=> '<i class="fa fa-twitter"></i>'
        )
  );
  echo '<ul class="social-profile">';
  foreach ($social_profiles as $name => $social_profile){
    echo '<li class="'. $name .'">';
    $href = sprintf($social_profile['url']);
    $icon = $social_profile['icon'];
    echo '<a href="'. $href .'" target="_blank">' . $icon . '</a>';
    echo '</li>';
  }
  echo '</ul>';
}
