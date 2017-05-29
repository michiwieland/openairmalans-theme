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

		// smoth scroll
		$('.move-to-trigger').on('click', function(event){
			event.preventDefault();
			console.log("sadf");
			$('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    	}, 500);
		});

		// mobile nav
		$("#hamburger").click(function() {
			$("#navigation").find("ul").first().toggle("fast");
		});
		$("#navigation ul").click(function() {
			if ( $("#hamburger").is(":visible") ) {
				$("#navigation ul").hide();
			} else {
				$("#navigation ul").show();
			}
		});
	});
})(jQuery);
