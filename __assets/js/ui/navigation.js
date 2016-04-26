'use strict';

var FTBBarclays = window.FTBBarclays || {};

FTBBarclays.ftbNavigation = (function() {

  // IE 8 Fun!
  function stopEvent(e) {
    if (!e) {
      e = window.event;
    }
    e.cancelBubble = true;
    e.returnValue = false;
    if (e.stopPropagation) {
      e.stopPropagation();
    }
    if (e.preventDefault) {
      e.preventDefault();
    }
    return false;
  }

  var searchBarToggle = $('#search-toggle'),
      searchBar = $('#search-bar'),
      navigationBar = $('#main-navigation-menu'),
      navLinks = navigationBar.find('ul[class^=menu-]').prev();

  $('.menu-2deep').each(function(index) {
    var cols = $(this).find(' > li:not(.important-information)');
    if (cols.length < 4) {
      cols.addClass('menu-item-wider');
    }
  });

  // Common functions
  function openSearchBar() {
    searchBar.addClass('active');
    $('#q').focus();
  }

  function closeSearchBar() {
    searchBar.removeClass('active');
    $('#q').blur();
  }

  var navigation = {};
  navigation.init = function() {

    // Toggle and click/tap events
    $(document).on('click touchstart', function(e) {

      // Click outside of active search bar
      if ($(e.target).closest('#search-bar.active').length === 0 && $(e.target).closest('#search-toggle').length === 0) {
        closeSearchBar();
      }
    });

    searchBarToggle.on('click', function(event) {
      if (!searchBar.hasClass('active')) {
        openSearchBar();
      } else {
        closeSearchBar();
      }
      stopEvent(event);
    });

    searchBar.find('.close').on('click', function() {
      closeSearchBar();
      stopEvent(event);
    });
  
//navigation on tab

    $('body').on('click', function(){
        navLinks.parent().removeClass('hover-on');
    });

    //primary link hover class controll by JS
    navLinks.hover(
      function(){
        $(this).parent().addClass('hover-on');
      },
      function(){
         $(this).parent().removeClass('hover-on');
      }
    );

    //key on primary link on nav
    navLinks.keydown(function(e){
        
        var thisParent = $(this).parent();
        
        switch ( e.which ) {
          case 13:
            thisParent.toggleClass('hover-on');
            break;

        }
    });

    //close the flyout menu if no links are on focus on it
    navigationBar.find('.menu-2deep a').keydown(function(){
      
      var settime = setTimeout(function(){ 
        if($('.menu-2deep').find(document.activeElement).length === 0){
            navLinks.parent().removeClass('hover-on');
        }
      }, 100);
      
    });     

//end


  };

  return navigation;

}());

$(document).ready(function() {
  FTBBarclays.ftbNavigation.init();
});
