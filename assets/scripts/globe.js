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
  // CONTENT
  // Show articles in grid
    $grid = $('.rtl .body_main.grid').isotope({
      originLeft: false,
    });
    $grid = $('.body_main.grid').isotope({
      itemSelector: 'article',
      layoutMode: 'packery',
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
  // Show no results message
    function noResults(){
    /*  numArticles = $('.grid article:visible').length;
      noResult = $('.grid-results');
      if(numArticles === 0) {
        noResult.show(400);
      } else {
        noResult.removeAttr('style');
      }*/
    }
  // Filter articles by category
    $optionSets = $('.category_filter');
    $optionLinks = $optionSets.find('a');
    $optionLinks.click(function(){
      $this = $(this);
      if ( $this.hasClass('selected') ) {
        return false;
      }
    $optionSet = $this.parents('.category_filter');
    $optionSets.find('.selected').removeAttr('class');
    $this.addClass('selected');
    selector = $(this).attr('data-filter');

    $grid.isotope({ filter: selector });
    /*$grid.on('arrangeComplete',noResults);*/
    return false;
    });
  // Clean post from attributes and elements (added by copying from Word)
    // Remove table width
    $('table, td').removeAttr('width');
    // Remove empty paragraphs <p>
    $('article p').each(function(){
      $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length === 0)
      this.remove();
    });
  // Deattach footnote and put in secondary body
  $('.endnotes').appendTo('.article_body-secondary');

  });
})(jQuery);
