$(function(){

	/*
	 * LITY LIGHTBOX
	 *
	 */
	$(document).on('lity:ready', function(event, lightbox) {
		const lityContent = $(event.currentTarget.activeElement).find('.lity-content');
		const title = !!lightbox.opener().data('title') ? lightbox.opener().data('title') : "";
		const description = !!lightbox.opener().data('desc') ? lightbox.opener().data('desc') : "";
		lityContent.prepend('<h1 class="lity-title">' + title + '</h1>');
		lityContent.append('<p class="lity-descr">' + description + '</p>');
	});


	/*
	 * ONE PAGE NAVIGATION
	 * Default: scroll to anchor, if we are on the front page
	 * Use http link, if we are on a detail page (e.g news)
	 */
    $('.nav-main-link').on('click', function(e){
				e.preventDefault();

		var link = $(this).attr('href');
		var sectionSlug = link; // some links already link to an anchor
		if (sectionSlug.indexOf('#') === -1) {
			sectionSlug = '#' + getSlug(link);
		}

		if ( $(sectionSlug).length > 0 ) {
			// move to anchor
			$('html, body').animate({
					scrollTop: $( sectionSlug ).offset().top - 30
			}, 500);

		} else {
			// we are in a detail page
			var newURL = window.location.protocol + "//" + window.location.host + "/" + sectionSlug;
			window.location.replace(newURL);
		}
    });

	function getSlug(fullLink) {
		var linkParts = fullLink.split('/');
		return linkParts[linkParts.length - 2];
	}


	/*
	 * MOBILE MENU
	 */

	// toggle mobile menu
	$("#hamburger").click(function() {
		if ($(".main-nav").is(":visible")){
				$(".main-nav").hide("fast");
		} else {
				$(".main-nav").show("fast");
		}
	});

	// close mobile menu if user clicks anywhere
	$(document).click(function(e){
		if (mobileMenuVisible() && !$(e.target).is("#hamburger")) {
			$(".main-nav").hide("fast");
		}
	});

	// maintain correct visibility while resizing
	$( window ).resize(function() {
        if (!isMobile()) {
						$(".main-nav").show();
        } else {
            $(".main-nav").hide();
        }
    });

		function isMobile() {
        return $("#hamburger").is(":visible");
    }

    function mobileMenuVisible() {
        return isMobile() && $(".main-nav").is(":visible");
    }

});