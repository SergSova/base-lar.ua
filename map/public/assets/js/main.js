$(window).on('load', function() {
    $('.preloader').delay(1000).fadeOut(300, function() {
        var scroll_up = 0;

        $(window).on('scrollUp', function(e) {
    
            scroll_up += 1;
    
            if (scroll_up > 1) {
               // location.assign('/map');
            }
    
        });
    });

    $('.preloader svg').delay(1000).fadeOut(300);
});

(function($) {
    $.fn.speedSlider = function() {
        // console.log($.fn);
        return this.each(function() {
            // console.log(this);
            var th = $(this),
                tabs = th.find('.custom-slider_wrap'),
                currentY = 0,
                currentX = 0,
                currentTab,
                showItems = 3,
                delay = 500,
                scrollDisable = false,
                line = $('.line'),
                sliderWrap = $('#custom-slider'),
                currentItems;

                // console.log(th);
            if ($(window).width() < 768) {
                showItems = 1;
            }

            function setTab() {
                currentTab = $(tabs[currentY]);
                currentItems = currentTab.find('.custom-slider_section-content');

                // console.log(currentX);

                outOfTab();
                setActiveButton();

                $('.custom-slider_wrap').not(currentTab).removeClass('active');
                currentTab.addClass('active');
            }

            function outOfTab() {
                for (var z = 0; z < tabs.length; z++) {
                    if (z !== currentY) {
                        var t = $(tabs[z]),
                            i = t.find('.custom-slider_section-content');

                        if (z < currentY) {
                            i.each(function() {
                                $(this).addClass('before');
                            });
                        } else {
                            i.each(function() {
                                $(this).addClass('after');
                            });
                        }
                    }
                }
            }

            function setActiveItems() {
                for (var i = 0; i < currentX; i++) {
                    // console.log(1111111);
                    $(currentItems[i]).addClass('before');
                }

                for (var y = (currentX + showItems); y < currentItems.length; y++) {
                    $(currentItems[y]).addClass('after');
                }

                setTimeout(function() {
                    for (var i = 0; i < currentX; i++) {
                        $(currentItems[i]).removeClass('after active');
                    }

                    for (var z = currentX; z < (currentX + showItems); z++) {
                        $(currentItems[z]).addClass('active').removeClass('before after');
                    }

                    for (var y = (currentX + showItems); y < currentItems.length; y++) {
                        $(currentItems[y]).removeClass('before active');
                    } 
                }, delay);
            }

            function setActiveButton() {
                var btn = $('.nav-button')[currentY],
                    btnpan = $(btn).find('.nav-button-text'),
                    btnOffsetL;

                line.css('width', btnpan.width() + 'px');
                btnOffsetL = $(btnpan).offset().left - $(sliderWrap).offset().left;

                $('.nav-button').not(btn).removeClass('nav-button-active');
                $(btn).addClass('nav-button-active');
                setCirclePosition();
                line.css({'left': btnOffsetL + 'px'});
            }

            function setCirclePosition() {

            }

            setTab();
            setActiveItems();
            setActiveButton();

            // $('.custom-slider_wrap-top-text').on('mousewheel', function(e) {
            //     e.preventDefault();
            //     console.log(e)
            // })

            var text = document.querySelectorAll('.custom-slider_wrap-top-text');

            if (text) {
                for (var t = 0; t < text.length; t++) {
                    text[t].addEventListener('wheel', function(e) {
                        e.stopPropagation();
                    });
                }
            }

            var scroll_array = [current_position], current_position;

            $(window).on('scrollDown swipeUp', function(e) {
                if (!scrollDisable) {
                    if (currentX >= currentItems.length - showItems) {
                        if (currentY < tabs.length - 1) {
                            currentY++;
                            setTab();
                            setActiveButton();
                            currentX = 0;
                            setActiveItems();
                        } 
                    } else {
                        currentX += showItems;
                        setActiveItems();

                        if (currentY >= tabs.length - 1) {
                            $('body').addClass('scroll-stop');
                        } else {
                            $('body').removeClass('scroll-stop');
                        }
                    }
                }

                scroll_array.push(current_position);

                // if (scroll_array.length > 5) {
                //     location.assign('/consultants/');
                // }

            });

            $(window).on('scrollUp swipeDown', function() {
                if (!scrollDisable) {
                    if (currentX <= 0) {
                        if (currentY > 0) {
                            currentY--;
                            setTab();
                            setActiveButton();
                            currentX = currentItems.length - showItems;
                            setActiveItems();
                        } 
                    } else {
                        currentX -= showItems;
                        setActiveItems();

                        $('body').removeClass('scroll-stop');
                    }
                }

                scroll_array.pop(current_position);

                // if (scroll_array.length == 0) {
                //     location.assign('/Aids/bandit.html');
                // }

            });

            $(window).on('resize', function() {
                setActiveButton();
            });

            $('.nav-button').on('click', function() {
                var index = $(this).index();
                currentY = index;
                currentX = 0;
                setTab();
                setActiveItems();
                setActiveButton();
            });
        });
    };
}(jQuery));

$(document).ready(function() {
    $('.content-section').touch();
    $('.custom-slider_section').speedSlider();

    $('.custom-slider_wrap-add-caption').hover(function() {
        $(this).next('.custom-slider_wrap-add-text').addClass('visible');
    }, function() {
        $(this).next('.custom-slider_wrap-add-text').removeClass('visible');
    });

    function hoverImg(parentElement) {
        $(parentElement).on('mouseenter', function() {

            target = $(this).find('.custom-slider_section-content-img .origin-img');
            
            target.attr('data-origin', target.attr('src'));

            if(!$(this).find('.hover-img').length) {
                $('<img class=\'hover-img\' src=' + target.data('hover') + '></img>').insertAfter($(this).find(target));
            }

            // target.animate({
            //     opacity: 0,
            // }, 250);

            // target.next().animate({
            //     opacity: 1,
            // }, 250);
        });

        $(parentElement).on('mouseleave', function() {       
            // var th = $(this).find('.origin-img');
            // th.next().animate({
            //     opacity: 0,
            // }, 250);
            
            // th.animate({
            //     opacity: 1,
            // }, 250);
        });
    }

    hoverImg('.custom-slider_section-content');


    function rotate3dForImgByMouseMove(targetElement, rotatingElement) {
        var target = $(targetElement);
        var windowWidth = $(window).width();
        var halfWindow = windowWidth / 2;
        var koef = 0.037;

        target.on('mousemove', function(event) {

            $(rotatingElement).css({
                transform: 'rotate3d(0, 1, 0,' + ((halfWindow - event.clientX) * koef) + 'deg)'
            });
            
        });
    }

    rotate3dForImgByMouseMove('.content-section', '.custom-slider_section-content-img');

    var divFlag = true;

    function helpFullFunction(target, secondTarget) {
        W = $(window);
        windowScrollTop = W.scrollTop();
        windowHeight = W.height();
        targetSection = $(target);
        targetSectionOffsetTop = targetSection.offset().top;
        heightTargetSection = targetSection.height();
        targetContainer = $(secondTarget);
    }

    function animateEllipse() {

        helpFullFunction('.content-section', '.custom-slider_section-content-img');

        if (windowScrollTop + windowHeight / 3 > targetSectionOffsetTop && windowScrollTop < (targetSectionOffsetTop + heightTargetSection))  {
            targetSection.addClass('animate');

            if (divFlag) {
                targetContainer.prepend($('<div class="ellipse"></div>'));
                $('.ellipse').animate({
                    width: 7.291 + 'vw',
                    height: 7.291 + 'vw',
                    'max-width': 140 + 'px',
                    'max-height': 140 + 'px'
                }, 250);

                divFlag = false;
            }
            
        } else {
            targetSection.removeClass('animate');
            $('.ellipse').animate({
                width: 0 + 'px',
                height: 0 + 'px'
            }, 250, function() {
                $('.ellipse').remove();
            });
            
            divFlag = true;
        }
    }

    animateEllipse();

    $(window).trigger('scroll');

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