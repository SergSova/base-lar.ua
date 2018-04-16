var modalVis = true;

$(window).on('load', function () {
    $('.preloader').delay(1000).fadeOut(300, function () {
        var scroll_up = 0;

        $(window).on('scrollUp', function (e) {

            scroll_up += 1;


        });
    });
    $('.preloader svg').delay(1000).fadeOut(300);
});

$(document).ready(function () {
    if ($('#logo-slider').length) {
        $('#logo-slider').slick({
            dots: false,
            fade: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
        });
    }

    /*----------------- onhover logo dragstore  -----------------*/
    $('.js-hover').hover(function () {
        var _this = this,
            images = _this.getAttribute('data').split(','),
            counter = 0;

        this.setAttribute('data-src', this.src);
        _this.timer = setInterval(function () {
            if (counter > images.length) {
                counter = 0;
            }
            if (images[counter] != undefined) {
                _this.src = images[counter];
            } else {
                _this.src = _this.getAttribute('data-src');
            }

            counter++;
        }, 100);

    }, function () {
        this.src = this.getAttribute('data-src');
        clearInterval(this.timer);
    });
    /*----------------- end onhover logo dragstore  -----------------*/
    /*----------------- NEXT page REVOLVER  -----------------*/
    if ($('.str-next').length) {
        $('.str-next').click(function (event) {
            event.preventDefault();
            $(this).parents('.game-icons').toggleClass('shoot');
            if (next_page)
                linkLocation = next_page;
            else
                linkLocation = this.href;

            setTimeout(function () {
                window.location = linkLocation;
            }, 1700)
        });
    }
    if ($('.str-prev').length) {
        $('.str-prev').click(function (event) {
            event.preventDefault();
            $(this).toggleClass('active');
            if (prev_page)
                linkLocation = prev_page;
            else
                linkLocation = this.href;

            setTimeout(function () {
                window.location = linkLocation;
            }, 1000)
        });
    }
    /*----------------- end NEXT page REVOLVER  -----------------*/

    /*----------------- MODAL TOOLTIPS on 5pages  -----------------*/
    /*Columb*/

    $(document).ready(function () {

        var modalAnimId,
            handWrap = $('.k-hands'),
            hand = $('.k-hand_move svg > g'),
            containerOffsetT = $('.modal__icons').length ? $('.modal__icons').offset().top : "",
            containerOffsetL = $('.modal__icons').length ? $('.modal__icons').offset().left : "",
            bubles = $('.bb-buble'),
            hat = $('.k-hat>svg>g'),
            clickTimer;

        $('.modal__btn').on('click', function (e) {
            e.preventDefault();
            $('.modal').fadeOut();
            modalVis = false;
            $(window).trigger('start');
        });

        function modalAnim() {
            if (handWrap.length) {
                if ((handWrap.offset().top + handWrap.height() * 0.68) >= hat.offset().top) {
                    handWrap.addClass('hold');
                } else {
                    handWrap.removeClass('hold');
                }


                if (modalVis) {
                    modalAnimId = requestAnimationFrame(modalAnim)
                } else {
                    cancelAnimationFrame(modalAnimId)
                }
            }

        }

        modalAnim()
    });
    /*end Columb*/

    /*Bubble*/

    $(document).ready(function () {

        var modalAnimId,
            hand = $('.wh-hand path'),
            cl = $('.bb-click'),
            containerOffsetT = $('.modal__icons').length ? $('.modal__icons').offset().top : "",
            containerOffsetL = $('.modal__icons').length ? $('.modal__icons').offset().left : "",
            bubles = $('.bb-buble'),
            clickTimer;

        $('.modal__btn').on('click', function (e) {
            e.preventDefault();
            $('.modal').fadeOut();
            modalVis = false;
            $(window).trigger('start');
        });

        function modalAnim() {
            bubles.each(function () {
                var th = $(this),
                    t = hand.offset().top - containerOffsetT,
                    l = hand.offset().left - containerOffsetL;

                cl.css({'left': (l - cl.width() / 3.5) + 'px', 'top': (t - cl.height() / 5) + 'px'});

                if (((th.offset().left + th.width() * 0.4) <= hand.offset().left) && ((th.offset().left + th.width() * 0.6) >= hand.offset().left)
                    && ((th.offset().top <= hand.offset().top) && ((th.offset().top + th.height()) >= hand.offset().top))) {
                    cl.css({'opacity': 1});
                } else {
                    clearTimeout(clickTimer);
                    clickTimer = setTimeout(function () {
                        cl.css({'opacity': 0});
                    }, 25);
                }

            });

            if (modalVis) {
                modalAnimId = requestAnimationFrame(modalAnim)
            } else {
                cancelAnimationFrame(modalAnimId)
            }
        }

        modalAnim()
    });
    /*end Bubble*/

    /*Rocket*/
    $(document).ready(function () {
        var modalAnimId,
            hand = $('.r-hand path'),
            rocket = $('.r-bow'),
            btn = $('.r-space > svg > path'),
            clickTimer;

        $('.modal__btn').on('click', function (e) {
            e.preventDefault();
            $('.modal').fadeOut();
            modalVis = false;
        });

        function modalAnim() {
            if (hand.length) {

                if (hand.offset().top <= $(btn[0]).offset().top + 15) {
                    rocket.addClass('shoot').delay(1000).queue(function (next) {
                        $(this).removeClass('shoot');
                        next();
                    })
                }

                if (modalVis) {
                    modalAnimId = requestAnimationFrame(modalAnim)
                } else {
                    cancelAnimationFrame(modalAnimId)
                }
            }
        }

        modalAnim()
    });
    /*end Rocket*/

    /*Party*/

    $('.modal__btn').on('click', function (e) {
        e.preventDefault();
        $('.modal').fadeOut();
        modalVis = false;
    });

    var hand = $('.wh-hand path'),
        peoples = $('.wh-people'),
        whAnimId;

    function withWhoAnim() {
        peoples.each(function () {
            //p = $(p);

            if ((($(this).offset().left + $(this).width() / 7) <= hand.offset().left) && (($(this).offset().left + $(this).width() * 0.7) >= hand.offset().left)) {
                peoples.not(this).removeClass('active');
                $(this).addClass('active');
            }
        });

        if (modalVis) {
            whAnimId = requestAnimationFrame(withWhoAnim)
        } else {
            cancelAnimationFrame(whAnimId)
        }
    }

    withWhoAnim();
    /*end Party*/

    /*Bandit*/
    var modalAnimId,
        btn = $('.band-start'),
        hand = $('.wh-hand path');


    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }

    if (getCookie('alias')) {
        getStr = getCookie('alias');
        alias = $('body').attr('data-alias');
        if (getStr.search(alias) >= 0) {
          if(!window.matchMedia('(max-width:770px)').matches){
            $('.modal').fadeOut(0);
          }
        }
    }

    $('.modal__btn').on('click', function (e) {
        e.preventDefault();
        $('.modal').fadeOut();
        modalVis = false;
        alias = $('body').attr('data-alias');
        if (getCookie('alias')) {
            getStr = getCookie('alias')
        } else {
            getStr = ''
        }
        getStr = getStr + ',' + alias

        setCookie('alias', getStr)

        if (window.matchMedia("(max-width: 1000px) and (orientation: landscape)").matches) {
            if (document.body.requestFullscreen) {
                document.body.requestFullscreen();
            } else if (document.body.mozRequestFullScreen) {
                document.body.mozRequestFullScreen();
            } else if (document.body.webkitRequestFullscreen) {
                document.body.webkitRequestFullscreen();
            }
            if (document.body.webkitEnterFullScreen) {
                document.body.webkitEnterFullScreen();
            }

        }

    });

    function modalAnim() {
        if (btn.length && hand.length) {
            if ((btn.offset().left <= hand.offset().left) && ((btn.offset().left + btn.width() - 12) >= hand.offset().left)) {
                btn.addClass('active');
            } else {
                btn.removeClass('active');
            }

            if (modalVis) {
                modalAnimId = requestAnimationFrame(modalAnim)
            } else {
                cancelAnimationFrame(modalAnimId)
            }
        }
    }

    modalAnim();
    /*end Bandit*/
    /*----------------- end MODAL TOOLTIPS on 5pages  -----------------*/

});