$(document).ready(function () {
    var Slider = $('.full-content-slider');
    if (Slider.length > 0) {
        Slider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            pauseOnDotsHover: true,
            prevArrow: '<div class="PrevArrow slider-prev"></div>',
            nextArrow: '<div class="NextArrow slider-next"></div>',
            dots: true,
            dotsClass: 'line-dots',
            speed: 900,
            fade: true,
            infinite: true,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100
        });
    }
});