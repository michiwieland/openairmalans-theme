(function( $ ) {
	$(function(){
    // onepage navigation hack
    $('#navigation a').on('click', function(event){
        event.preventDefault();
        this.href.prepend();

        // smooth scroll to
        $('html, body').animate({
            let hashLink = this.attr('href');
            if (link.indexOf("#") == -1 ) {
              hashLink = '#' + hashLink;
            }
            scrollTop: $( hashLink ).offset().top
        }, 500);
    });
  });
})(jQuery);
