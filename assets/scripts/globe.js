/* !
Globe.js
Description: contains all scripts of elements, in respect of mobile-first design.
Version: v0.2-beta.5
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
  // Show/hide full Menu
    $('.menu_btn span').click(function(){
      if (!$('html').hasClass('is-overlay') || !$('body').hasClass('has-search')) {
        $('html').toggleClass('is-overlay ');
        $('body').toggleClass('has-full');
      }
      return false;
    });
  // Show/hide full Search
  $('.search_btn span').click(function(){
    if (!$('html').hasClass('is-overlay') || !$('body').hasClass('has-full')) {
      $('html').toggleClass('is-overlay ');
      $('body').toggleClass('has-search');
    }
    return false;
  });
  // Close all overlay with ESC key
  $(document).keyup(function(e){
    if (e.keyCode == 27 ){
      if ($('body').hasClass('has-full')){
        $('body').removeClass('has-full');
        $('html').removeClass('is-overlay');
      } else if ($('body').hasClass('has-search')){
        $('body').removeClass('has-search');
        $('html').removeClass('is-overlay');
      }

    }
  });
  // Show/hide filters
  $('.filters_header').click(function(){
    $(this).toggleClass('opened');
    $('.filters_body').slideToggle();
    $(this).find('i').toggleClass('fa-plus fa-minus');
    $('body').toggleClass('filter-opened');
  });
  // Add class for selected category
  $('.form_filters input:checkbox').change(function(){
    if($(this).is(':checked')) {
      $(this).parent().addClass('selected');
    }else{
      $(this).parent().removeClass('selected');
    }
  });
  // Count articles results
  articlesNum = $('#wpas-results article').length;
  $('.search_results span').text(articlesNum);
  $('.advanced-search').on('select', function(){

    console.log(articlesNum);
  });
  // Change AR icon
  if($('.btn_lang a').attr('lang') == 'ar'){
    $('.btn_lang a').text('ع');
  }

  // CONTENT
  // Featured Article Thumbnail height
  thumbHeight();
  $(window).resize(thumbHeight);
  function thumbHeight(){
    $containerMargin = $('.main_container').css('marginTop');
    $articleHeight = $('.article_featured').height();
    $thumbTop = $('.featured_article-thumbnail').css('top');
    $thumbHeight = parseInt($articleHeight) + parseInt($containerMargin) - parseInt($thumbTop);
    $('.featured_article-thumbnail, .main_categories').css({'height': $thumbHeight + 'px'});
  }

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
    numArticles = $('.body_main.grid article:visible').length;
    console.log(numArticles);
    if(numArticles === 0) {
    console.log('No Items FOUND!');
    }
  }
   // Filter articles by category
   $optionSets = $('.category_filter');
   $optionLinks = $optionSets.find('a');
   $optionLinks.on('click', function(){
     $this = $(this);
     if ( $this.hasClass('selected') ){
       return false;
     }
    $optionSet = $this.parents('.category_filter');
    $optionSets.find('.selected').removeAttr('class');
    $this.addClass('selected');
    selector = $(this).attr('data-filter');

    $grid.isotope({ filter: selector });
    $grid.on('arrangeComplete',noResults);
    return false;
  });
  // Clean post from attributes and elements (added by copying from Word)
    // Remove table width
    $('table, td').removeAttr('width');
    // Remove empty paragraphs from <p> and additional <u> and <strong> elements
    $('article').find('u, strong').contents().unwrap();
    $('article p').each(function(){
      $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length === 0)
      this.remove();
    });
  // Wrap endnotes with <sup> element
  $endnotes = $('.single_article a[href^="#_edn"]');
  $endnotes.each(function(){
    $(this).wrap('<sup class="article_endnote" />');
  });
  $endnotes = $endnotes.text().replace(/[\[\]']+/g, '');
  // Single article header-related icons
    // Show/hide table of content
    if ($('.has-sidebar .toc_show-hide .show-hide_btn').css('width') == '35px'){
      $('body').toggleClass('has-sidebar hidden-sidebar');
    }
    $('.toc_show-hide span').click(function(){
      if (!$('html').hasClass('is-overlay')) {
        $('body').toggleClass('has-sidebar hidden-sidebar');

      }
    });
    // Show/hide options
    sidebarOptions = $('.sidebar_options');
    $('.options_show-hide span').click(function(e){
      if (!$('html').hasClass('is-overlay')) {
        $('body').toggleClass('options-opened');
        $(sidebarOptions).toggle();
        $(window).click(function(){
          $(sidebarOptions).hide();
          $('body').removeClass('options-opened');
        });
      }
      e.stopPropagation();
    });
  // Article reading options
    // Dark mode
		$('.read-mode_ctrl a').click(function(){
			$('body').toggleClass('dark-mode_active');
			$(this).toggleClass('selected');
			return false;
		});
		// Increase/decrease/reset font size
		$contentTarget = $('.single_article-body');
		$currentSize = 1;
		$('.font-plus').click(function(){
			if($currentSize <= 1.5)
				$contentTarget.css('zoom', $currentSize += 0.10);
			return false;
		});
		$('.font-minus').click(function(){
			if($currentSize >= 0.6)
				$contentTarget.css('zoom', $currentSize -= 0.10);
			return false;
		});
		$('.font-reset').click(function(){
			$contentTarget.removeAttr('style');
			return false;
		});
  // show button to scroll to top while clicking
  previousScroll = 0;
  $(window).scroll(function(){
    $windowScroll = $(window).scrollTop();
    if ($windowScroll > 0 && $windowScroll < $(document).height() - $(window).height()) {
      if ($windowScroll > previousScroll){
        $('.top_btn').slideUp();
      } else if ($windowScroll < previousScroll ) {
        $('.top_btn').slideDown();
      }
      previousScroll = $windowScroll;
    } else {
      $('.top_btn').slideToggle();
    }
  });
  $('.btn_top').click(function(){
    $('html, body').animate({scrollTop:0}, 'slow');
  });

  });
})(jQuery);
