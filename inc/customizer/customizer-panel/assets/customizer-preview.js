(function ($) {
 // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.om-site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.om-site-description').text(to);
        });
    });

      wp.customize('online_magazine_tagline_position', function (value) {
        value.bind(function (to) {
            $(' #om-masthead').removeClass('om-tagline-inline-logo om-tagline-below-logo').addClass(to);
        });
    });

})(jQuery);
