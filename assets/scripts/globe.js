/* !
Globe.js
Description: contains all scripts of elements, in respect of mobile-first design.
version: 1.5
Date updated: 4th Aug 2016
Package: moran
Theme URI: https://github.com/kaeid/moran
Author: Kareem A. Eid
Author URI: http://kaeid.io
Text Domain: moran
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
(function($){
  $(document).ready(function(){
  // HEADER
  // Control menu with icons
    $closeAll = $('.menu_btn .btn_close-all');
    $showFullMenu = $('.menu_btn .btn_full-menu');
    function showFullMenu(){
      $showFullMenu.slideUp();
      $('html').addClass('is-overlay');
      $('.header_overlay').removeClass('hidden', 1000);
      return false;
    }
    function closeFullMenu(){
      $showFullMenu.slideDown();
      $('html').removeClass('is-overlay');
      $('.header_overlay').addClass('hidden', 1000);
      return false;
    }
    $showFullMenu.click(showFullMenu);
    $closeAll.click(closeFullMenu);


    /*$showFullMenu.click(function(){
      $(this).slideUp('slow');
      $('html').toggleClass('is-overlay');
      $('.header_overlay').removeClass('hidden', 1000);

    });
*/
  });
})(jQuery);
