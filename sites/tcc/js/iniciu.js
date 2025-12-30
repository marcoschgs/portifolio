(function($) {

    "use strict"

    $(function() {
        if ($('#backTop').length) {
            var scrollTrigger = 900, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#backTop').addClass('show');
                    } else {
                        $('#backTop').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            $('#backTop').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }

    });

})(jQuery);