jQuery(document).ready(function($) {

    $(window).load(function() {
        slide_client();
    });
    // Client SLide
    function slide_client(){
        if ($("#owl-newsbox").length > 0) {
            var $owl_client=$("#owl-newsbox");
            $owl_client.owlCarousel({
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 2000,
                smartSpeed: 1000,
                loop: true,
                responsiveClass:true,
                responsive:{0:{items:1},480:{items:2},768:{items:3},992:{items:4},1200:{items:4}}
            });

            $('#team-prev').click(function (event) {
                 $owl_client.trigger('prev.owl.carousel');
            });

            $('#team-next').click(function (event) {
                $owl_client.trigger('next.owl.carousel');
            });
        }
    }

});

