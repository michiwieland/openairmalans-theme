(function( $ ) {
	$(function(){

    // Lity lightbox
		$(document).on('lity:ready', function(event, lightbox) {
			const lityContent = $(event.currentTarget.activeElement).find('.lity-content');
			const title = !!lightbox.opener().data('title') ? lightbox.opener().data('title') : "";
			const description = !!lightbox.opener().data('desc') ? lightbox.opener().data('desc') : "";
			lityContent.prepend('<h1 class="lity-title">' + title + '</h1>');
			lityContent.append('<p class="lity-descr">' + description + '</p>');
		});

		// onepage navigation hack
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


		// mobile nav
		$("#hamburger").click(function() {
			$("#navigation").find("ul").first().toggle("fast");
		});
		$(".main-nav").click(function() {
			if ( $("#hamburger").is(":visible") ) {
				$(".main-nav").hide();
			} else {
				$(".main-nav").show();
			}
		});
	});
})(jQuery);
