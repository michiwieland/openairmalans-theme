(function( $ ) {
	$(function(){
		const easeFunctions = {
			easeInQuad: function (t, b, c, d) {
				t /= d;
				return c * t * t + b;
			},
			easeOutQuad: function (t, b, c, d) {
				t /= d;
				return -c * t* (t - 2) + b;
			}
		}
		const moveTo = new MoveTo({
			tolerance: 20,
			duration: 800,
			easing: 'easeOutQuart'
		}, easeFunctions);
		const triggers = document.getElementsByClassName('move-to-trigger');
		for (let i = 0; i < triggers.length; i++) {
			moveTo.registerTrigger(triggers[i]);
		}

		$(document).on('lity:ready', function(event, lightbox) {
			const lityContent = $(event.currentTarget.activeElement).find('.lity-content');
			const title = !!lightbox.opener().data('title') ? lightbox.opener().data('title') : "";
			const description = !!lightbox.opener().data('desc') ? lightbox.opener().data('desc') : "";
			lityContent.prepend('<h1 class="lity-title">' + title + '</h1>');
			lityContent.append('<p class="lity-descr">' + description + '</p>');
		});

		// mobile nav
		handleMobileNav();
	});

	$( window ).resize(function() {
		handleMobileNav();
	});
})(jQuery);

function handleMobileNav() {
	if ( $("#hamburger").is(":visible") ) {
		$("#hamburger").click(function() {
			$("#navigation").find("ul").first().toggle("fast");
		});

		$("#navigation ul").click(function() {
			$("#navigation ul").hide();
		});
	} else {
		$("#navigation ul").show();
	}
}
