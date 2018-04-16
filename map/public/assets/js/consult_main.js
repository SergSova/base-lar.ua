$(window).on('load', function() {
    $('.preloader').delay(1000).fadeOut(300, function() {
        var scroll_up = 0;

        $(window).on('scrollUp', function(e) {
    
            // scroll_up += 1;
    
            // if (scroll_up > 1) {
            //     location.assign('/map');
            // }
    
        });
    });

    $('.preloader svg').delay(1000).fadeOut(300);
});

$(document).ready(function() {

    $('.consultants-btn').on('click', function() {
        $('.popup-box__consultants').show(500).addClass('open');
        $('.popup-wrapper__consultants').addClass('open');
    });

    $('.popup-wrapper__consultants-crosshair').on('click', function () {
        $('.popup-wrapper__consultants, .popup-box__consultants').removeClass('open');

        setTimeout(function() {
            $('.popup-box__consultants').hide(500);
        }, 500);
    });

    var popup = $('.popup-wrapper__consultants');

    $('.popup-box__consultants').on('click', function(event) {
        var x = event.clientX;
        var y = event.clientY;

        if (x < popup.offset().left || x > popup.offset().left + popup.outerWidth() || y < popup.offset().top || y > popup.offset().top + popup.outerHeight()) $('.popup-wrapper__consultants-crosshair').trigger('click');
        
    });

    $('.call-jivochat').on('click', function() {
        jivo_api.open();
    });

    var date = new Date();

    var current_day = date.getDay();

    $('.popup-wrapper__consultants-column').each(function(index) {

        if (current_day != 0) {
            $(this).find('.popup-wrapper__consultants-cell:nth-child(' + (current_day + 1) + ')').addClass('current-day');
        }

        if (current_day == 0) {
            $(this).find('.popup-wrapper__consultants-cell:last-child').addClass('current-day');
        }
    });

    $('.popup-wrapper__consultants-column').find('.current-day').siblings().each(function() {$(this).removeClass('current-day');});



    /*----------------- onhover logo dragstore  -----------------*/
        $('.js-hover').hover(function() {
            var _this = this,
                images = _this.getAttribute('data').split(','),
                counter = 0;
    
            this.setAttribute('data-src', this.src);
            _this.timer = setInterval(function(){
                if(counter > images.length) {
                    counter = 0;
                }
                if (images[counter] != undefined) {
                    _this.src = images[counter];
                } else {
                    _this.src = _this.getAttribute('data-src');
                }
    
                counter++;
            }, 100);
    
        }, function() {
            this.src = this.getAttribute('data-src');
            clearInterval(this.timer);
        });
    /*----------------- end onhover logo dragstore  -----------------*/

});