/* !
Globe.js
Description: contains all scripts of elements, in respect of mobile-first design.
Version: v0.2-beta.1
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
  // Show/hide full menu
    $('.menu_btn span').click(function(){
      if (!$('html').hasClass('is-overlay') || !$('body').hasClass('has-search')) {
        $('html').toggleClass('is-overlay ');
        $('body').toggleClass('has-full');
      }
      return false;
    });
  // Show/hide Search
    $('.search_btn span').click(function(){
      if (!$('html').hasClass('is-overlay') || !$('body').hasClass('has-full')) {
        $('html').toggleClass('is-overlay ');
        $('body').toggleClass('has-search');
      }
      return false;
    });

    // Search advanced form
    /*$('#form_advanced-options').prependTo($('.search-header form'));*/

		$('.field-search input').keypress(function() {
		    $('.search-header').slideDown('slow');
		});
		if( $('.drawer-container input').val() ) {
	          $('.search-header').show();
	    }
    $('input:checkbox').change(function(){
      if($(this).is(':checked')) {
        $(this).parent().addClass('selected');
      }else{
        $(this).parent().removeClass('selected');
      }
    });
    $select = $('.field-item select').dropdown({
    });

    /*$closeAll = $('.menu_btn .btn_close-all');
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
  // Featured Article Thumbnail height
  thumbHeight();
  $(window).resize(thumbHeight);
  function thumbHeight(){
    $containerMargin = $('.main_container').css('marginTop');
    $articleHeight = $('.article_featured').height();
    $thumbTop = $('.featured_article-thumbnail').css('top');
    $thumbHeight = parseInt($articleHeight) + parseInt($containerMargin) - parseInt($thumbTop);
    $('.featured_article-thumbnail').css({'max-height': $thumbHeight + 'px'});
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
    if(numArticles === 0) {
    console.log('No Items FOUND!');
    }
  }
    /*function noResults(){
      numArticles = $('.grid article:visible').length;
      noResult = $('.grid-results');
      if(numArticles === 0) {
        noResult.show(400);
      } else {
        noResult.removeAttr('style');
      }
    }*/
   // Filter articles by category
   $optionSets = $('.category_filter');
   $optionLinks = $optionSets.find('a');
   $optionLinks.on('mousedown', function(){
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
    if ($('.has-sidebar .toc_show-hide .btn_close').css('marginTop') == '-35px'){
      $('body').toggleClass('has-sidebar hidden-sidebar');
    }
    $('.toc_show-hide span').click(function(){
      if (!$('html').hasClass('is-overlay')) {
        $('body').toggleClass('has-sidebar hidden-sidebar');
        $(this).parents('.toc_show-hide').toggleClass('toc_close');
      }
    });
    // Show/hide options
    sidebarOptions = $('.sidebar_options');
    $('.options_show-hide span').click(function(e){
      if (!$('html').hasClass('is-overlay')) {
        $(sidebarOptions).toggle();
        e.stopPropagation();
      }
    });

    $(window).click(function(){
      $(sidebarOptions).hide();
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
  // Devel debug
  hljs.configure({useBR: true});
  $('#wpas-debug pre').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  });
})(jQuery);
