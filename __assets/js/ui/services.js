/*global $, s*/
'use strict';
var footerModule = (function () {
	var footer = {};

	function initFooterHeight() {
		var items = $('#bottomBoxesInfoServicesWrapper .bottomBoxInfoServices'),
			heights = [],
			tallest;

			if (items.length) {
				items.each(function() {
				heights.push($(this).height());
			});
			tallest = Math.max.apply(null, heights);
			items.css('height',tallest + 'px');
		}
	}

	footer.init = function () {
		var pageWidth = 754,
			smallBoxesWidth,
			smallBoxesNum = $('#bottomBoxesInfoServicesWrapper .bottomBoxInfoServices').length;
		if (smallBoxesNum < 5) {
			smallBoxesWidth = pageWidth/smallBoxesNum;
			$('#bottomBoxesInfoServicesWrapper .bottomBoxInfoServices:last-child').css('border-right', '0px solid #CCC');
		} else {
			smallBoxesWidth = pageWidth/4;
			$('#bottomBoxesInfoServicesWrapper .bottomBoxInfoServices:nth-child(4n)').css('border-right', '0px solid #CCC');
		}
		$('#bottomBoxesInfoServicesWrapper .bottomBoxInfoServices').css('width', smallBoxesWidth+'px');
		initFooterHeight();
	};
	return footer;
}());

//variables for SiteCatalyst tracking
var stepNumber = 1;

var carouselModule = (function () {
	var carousel = {};

	function slideHide(ref, index, direction) {
		$( $(ref).find('.carouselSlide')[index] ).hide('slide', { direction: direction }, 'slow');
		$( $(ref).find('.selectButton')[index] ).removeClass( 'selected' );
	}

	function slideShow(ref, index, direction) {
		$( $(ref).find('.carouselSlide')[index] ).show('slide', { direction: direction }, 'slow');
		$(ref).find('.carouselSlider').attr( 'slide-index', index);
		$( $(ref).find('.selectButton')[index] ).addClass( 'selected' );
	}

	function hideArrows(ref, side) {
		if (side === 'right') {
			$(ref).find('.right.arrow').hide();
			$(ref).find('.right.smallArrow').hide();
		} else if (side === 'left') {
			$(ref).find('.left.arrow').hide();
			$(ref).find('.left.smallArrow').hide();
		}
	}

	function showArrows(ref, side) {
		if (side === 'right') {
			$(ref).find('.right.arrow').show();
			$(ref).find('.right.smallArrow').css('display','inline-block');
			if($.browser.msie && parseInt($.browser.version, 10) == 7) {
				$(ref).find('.right.smallArrow').css('display','inline');
			}
		} else if (side === 'left') {
			$(ref).find('.left.arrow').show();
			$(ref).find('.left.smallArrow').css('display','inline-block');
			if($.browser.msie && parseInt($.browser.version, 10) == 7) {
				$(ref).find('.left.smallArrow').css('display','inline');
			}
		}
	}

	function showNext(ref) {
		var slideIndex = $(ref).find('.carouselSlider').attr( 'slide-index');

		slideHide(ref, slideIndex, 'left');
		slideIndex++;
		slideShow(ref, slideIndex, 'right');
		showArrows(ref, 'left');

		if (slideIndex + 2 >  countSlides(ref)) {
			hideArrows(ref, 'right');
		}

		stepNumber = slideIndex + 1;
	}

	function showPrev(ref) {
		var slideIndex = $(ref).find('.carouselSlider').attr( 'slide-index');

		slideHide(ref, slideIndex, 'right');
		slideIndex--;
		slideShow(ref, slideIndex, 'left');
		showArrows(ref, 'right');

		if (slideIndex < 1) {
			hideArrows(ref, 'left');
		}

		stepNumber = slideIndex + 1;

	}

	function showIndex(ref, index) {
		var slideIndex = $(ref).find('.carouselSlider').attr( 'slide-index');

		if (slideIndex > index) {
			
			slideHide(ref, slideIndex, 'right');
			slideIndex = index;
			slideShow(ref, slideIndex, 'left');
			showArrows(ref, 'right');

			if (slideIndex < 1) {
				hideArrows(ref, 'left');
			}

		} else if(slideIndex < index) {
			
			slideHide(ref, slideIndex, 'left');
			slideIndex = index;
			slideShow(ref, slideIndex, 'right');
			showArrows(ref, 'left');

			if (slideIndex + 2 >  countSlides(ref)) {
				hideArrows(ref, 'right');
			}

		}
	}

	function initArrows(ref) {
		$(ref).find('.right.arrow').click(function() {
			showNext(ref);
			s.prop24='Step' + stepNumber + 'Next:LargeArrow'; //setting SiteCatalyst property
			fireSiteCatalystRequest();
		});

		$(ref).find('.left.arrow').click(function() {
			showPrev(ref);
			s.prop24='Step' + stepNumber + 'Previous:LargeArrow';
			fireSiteCatalystRequest();
		});

		$(ref).find('.right.smallArrow').click(function() {
			showNext(ref);
			s.prop24='Step' + stepNumber + 'Next:SmallArrow';
			fireSiteCatalystRequest();
		});

		$(ref).find('.left.smallArrow').click(function() {
			showPrev(ref);
			s.prop24='Step' + stepNumber + 'Previous:SmallArrow';
			fireSiteCatalystRequest();
		});

	}

	function fireSiteCatalystRequest() {
		s.linkTrackVars='prop17,prop24';
		s.linkTrackEvents='None';
		s.prop17=s.pageName;
		s.tl(true, 'o', s.prop1+':' + getCurrentTabName() + ':Interaction');
	}

	function getCurrentTabName() {
		return $('#tabsInfoServicesList > li > a.active').html().replace(/[^a-zA-Z0-9]/g, '');
	}


	function initNavigation(ref) {
		var container = $(ref).find('.buttonsContainer'),
			slidesTotal = countSlides(ref);

		if (slidesTotal > 1) {
			showArrows(ref, 'right');
			
			for (var i = 0; i < slidesTotal; i++) {
				if (i < 1) {
					$(container).append('<div class="selectButton selected" slide-index="' +i+ '"></div>');
				} else {
					$(container).append('<div class="selectButton" slide-index="' +i+ '"></div>');
				}
			}

			$(container).find('.selectButton').each( function() {
				$(this).click(function() {
					showIndex(ref, $(this).index() );
					var circleNumber = $(this).attr('slide-index');
					circleNumber++;
					s.prop24='Circle:Step' + circleNumber;
					fireSiteCatalystRequest();
				});
			});

			initArrows(ref);
		}
	}

	function countSlides(ref) {
		return $(ref).find('.carouselSlide').size();
	}

	function initSlidesContainer(ref) {
		$(ref).find('.carouselSlider').attr( 'slide-index', '0' );
	}
	
	function initCarouselHeight(ref) {
		var items = $(ref).find('.carouselSlider .carouselSlide'),
			heights = [],
			tallest,
			arrowPos,
			maxHeight = 525,
			maxArrowPos = 175;

		if (items.length) {
			items.each(function() {
				heights.push($(this).height());
			});
			tallest = Math.max.apply(null, heights);
			arrowPos = tallest/3;
			if (tallest <= maxHeight) {
				$(ref).find('.carouselSlider').css('height',tallest + 'px');
				$(ref).find('.right.arrow').css('top',arrowPos + 'px');
				$(ref).find('.left.arrow').css('top',arrowPos + 'px');
			} else {
				$(ref).find('.carouselSlider').css('height',maxHeight + 'px');
				$(ref).find('.right.arrow').css('top',maxArrowPos + 'px');
				$(ref).find('.left.arrow').css('top',maxArrowPos + 'px');
			}
		}
	}

	carousel.init = function (ref) {
		if (ref !== null || ref !== '') {
			initSlidesContainer(ref);
			initNavigation(ref);
			initCarouselHeight(ref);
		}
	};

	return carousel;
}());

var tabsModule = (function () {
	var tabs = {};
	tabs.init = function () {
	    var servicePanel = $('.tabInfoServicesPanel');

	    servicePanel.each(function() {
            $( this ).find('h2').first().hide();
        });

	    $('#tabsInfoServicesList li a').click(function( e ){
            e.preventDefault();

	        var that = $(this),
	            active = $('#tabsInfoServicesList li a.active'),
	            panelID = that.attr('href');

            servicePanel.hide();
			active.removeClass('active');
            that.addClass('active');
            $(panelID).fadeIn(250);
	    });

	    $('#tabsInfoServicesList li a').first().click();
	};
	return tabs;
}());

(function () {
	$(document).ready(function() {
		$('.carouselSliderContent').each( function(){
			carouselModule.init($(this));
		});
		tabsModule.init();
		footerModule.init();
	});
}());
