jQuery(document).ready(function($) {
    $('.images-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.images-nav',
        nextArrow: $('.slick-btn-next'),
        prevArrow: $('.slick-btn-prev')
    });
    $('.images-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.images-for',
        dots: true,
        centerMode: false,
        focusOnSelect: true,
        arrows: false,
    });

    $('#btn-login').click(function() {
        $('.modal').addClass('show-modal');
    });

    $('.close').click(function() {
        $('.modal').removeClass('show-modal');
    });

    $('.overlay__content a').click(function() {
        $('.overlay').removeClass("overlay--active");
    })
});
