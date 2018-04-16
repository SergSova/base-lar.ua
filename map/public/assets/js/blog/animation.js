$(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm = $preloader.find('.preo_prego');
    $svg_anm.fadeOut();
    $preloader.delay(1000).fadeOut('slow');
});


$(document).ready(function () {
    if (window.matchMedia("(min-width: 1025px)").matches) {
        $('.blog-news').hover(function () {
            $(this).find('.blog-image').addClass('hover');
        }, function () {
            $(this).find('.blog-image').removeClass('hover');
        });


        $('.large-translate .video .blog-news-content, .medium-translate .video .blog-news-content').hover(function () {
            $(this).addClass('hover');
        }, function () {
            $(this).removeClass('hover');
        });
    }

    $('.tilter__figure').append('<div class="tilter-span-liner"><span></span></span></div>');
    $('.tilter .blog-image').append('<div class="tilter__deco tilter__deco--shine"><div></div></div>');


    $('.SeoText').click(function () {
        $(this).parent().find('.about-description-p').toggleClass('full');
        if ($(this).parent().find('.about-description-p').hasClass('full')) {
            $(this).find('span.on').css('display', 'none')
            $(this).find('span.off').css('display', 'block')
        } else {
            $(this).find('span.on').css('display', 'block')
            $(this).find('span.off').css('display', 'none')
        }
    });


    $(function(){
        var hei_tilter = $(".large-translate article.tilter");
        var hei_medium_tilter = $(".medium-translate article.tilter");

        if (window.matchMedia("(max-width: 1700px)").matches) {
            hei_tilter.each(function(){
                if ($(this).height() < 400) {
                    $(this).addClass('small')
                } else {
                    $(this).removeClass('small')
                }
            });
        }

        if (window.matchMedia("(min-width: 990px)").matches) {
            hei_medium_tilter.each(function(){
                if ($(this).height() < 270) {
                    $(this).addClass('small')
                } else {
                    $(this).removeClass('small')
                }
            });
        }
    });
});
/****************************** munu ***************************/
$(document).on('scroll', function(e) {
    var scrlT = $(this).scrollTop();

    if (scrlT >= 5) {
        $('.header').addClass('move');
    } else {
        $('.header').removeClass('move');
    }
})

$(document).ready(function() {
    $('body').on('click', '.header-search', function(e) {
        $('.header-bottom__input').focus();
        s($('.header'), $('.header-search'), 'search-open', e, function() {
            $('.header-search').removeClass('action');
            $('.header').removeClass('link-hover')
        });
    });

    $('.header-bottom__item,.header-bottom__phone').hover(function() {
        $('.header').addClass('link-hover')
    }, function() {
        $('.header').removeClass('link-hover')
    })

    $('body').on('input', '.header-bottom__input', function() {
        $('.header-search').addClass('action');
        $('.header').addClass('link-hover')
    });
});

function s(obj, obj2, className, e, clbck) {
    if (!$(e.target).hasClass('header-bottom__exit')) {
        e.preventDefault();
        e.stopPropagation();
    }

    if (!obj.hasClass(className)) {
        $('body').on('click', clbck2);
        obj.addClass(className);
    }

    function clbck2(e) {
        var target = $(e.target);

        if (!target.closest(obj2).length || (target.hasClass('header-bottom__exit'))) {
            obj.removeClass(className);
            $('body').off('click', clbck2);
            clbck();
        }
    }
}
/****************************** munu end***************************/






/*****************************/
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);
$(window).scroll($.debounce( 150, true, function(){
    $('.scroll-container').css('pointer-events','none')
} ) );
$(window).scroll($.debounce( 150, function(){
    $('.scroll-container').css('pointer-events','auto')
} ) );


var hovered



/*****************************/
(function (window) {
    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }

        }

        return a;

    }



    function getMousePos(e) {

        var posx = 0, posy = 0;

        if (!e) var e = window.event;

        if (e.pageX || e.pageY) {

            posx = e.pageX;

            posy = e.pageY;

        }

        else if (e.clientX || e.clientY) {

            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;

            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;

        }

        return {x: posx, y: posy}

    }



    function TiltFx(el, options) {

        this.DOM = {};

        this.DOM.el = el;

        this.options = extend({}, this.options);

        extend(this.options, options);

        this._init();

    }



    TiltFx.prototype.options = {

        movement: {

            imgWrapper: {

                translation: {x: 0, y: 0, z: 0},

                rotation: {x: -5, y: 5, z: 0},

                reverseAnimation: {

                    duration: 1200,

                    easing: 'easeOutElastic',

                    elasticity: 600

                }

            },

            lines: {

                translation: {x: 10, y: 10, z: [0, 10]},

                reverseAnimation: {

                    duration: 1000,

                    easing: 'easeOutExpo',

                    elasticity: 600

                }

            },

            caption: {

                translation: {x: 20, y: 20, z: 0},

                rotation: {x: 0, y: 0, z: 0},

                reverseAnimation: {

                    duration: 1500,

                    easing: 'easeOutElastic',

                    elasticity: 600

                }

            },



            overlay: {

                translation: {x: 10, y: 10, z: [0, 50]},

                reverseAnimation: {

                    duration: 500,

                    easing: 'easeOutExpo'

                }

            },



            shine: {

                translation: {x: 50, y: 50, z: 0},

                reverseAnimation: {

                    duration: 1200,

                    easing: 'easeOutElastic',

                    elasticity: 600

                }

            }

        }

    };



    TiltFx.prototype._init = function () {

        this.DOM.animatable = {};

        this.DOM.animatable.imgWrapper = this.DOM.el.querySelector('.tilter .tilter__figure');

        this.DOM.animatable.lines = this.DOM.el.querySelector('.tilter .tilter-span-liner');

        this.DOM.animatable.caption = this.DOM.el.querySelector('.tilter .blog-news');

        this.DOM.animatable.overlay = this.DOM.el.querySelector('.tilter__deco--overlay');

        this.DOM.animatable.shine = this.DOM.el.querySelector('.tilter__deco--shine > div');



        this._initEvents();

    };

    TiltFx.prototype._initEvents = function () {

        var self = this;



        this.mouseenterFn = function () {

            for (var key in self.DOM.animatable) {

                anime.remove(self.DOM.animatable[key]);

            }

        };

        this.mousemoveFn = function (ev) {

            requestAnimationFrame(function () {

                self._layout(ev);

            });

        };

        this.mouseleaveFn = function (ev) {

            requestAnimationFrame(function () {

                for (var key in self.DOM.animatable) {

                    if (self.options.movement[key] == undefined) {

                        continue;

                    }

                    anime({

                        targets: self.DOM.animatable[key],

                        duration: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.duration || 0 : 1,

                        easing: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.easing || 'linear' : 'linear',

                        elasticity: self.options.movement[key].reverseAnimation != undefined ? self.options.movement[key].reverseAnimation.elasticity || null : null,

                        scaleX: 1,

                        scaleY: 1,

                        scaleZ: 1,

                        translateX: 0,

                        translateY: 0,

                        translateZ: 0,

                        rotateX: 0,

                        rotateY: 0,

                        rotateZ: 0

                    });

                }

            });

        };

        this.DOM.el.addEventListener('mousemove', this.mousemoveFn);

        this.DOM.el.addEventListener('mouseleave', this.mouseleaveFn);

        this.DOM.el.addEventListener('mouseenter', this.mouseenterFn);

    };

    TiltFx.prototype._layout = function (ev) {

        var mousepos = getMousePos(ev),

            docScrolls = {

                left: document.body.scrollLeft + document.documentElement.scrollLeft,

                top: document.body.scrollTop + document.documentElement.scrollTop

            },

            bounds = this.DOM.el.getBoundingClientRect(),

            relmousepos = {x: mousepos.x - bounds.left - docScrolls.left, y: mousepos.y - bounds.top - docScrolls.top};

        for (var key in this.DOM.animatable) {

            if (this.DOM.animatable[key] == undefined || this.options.movement[key] == undefined) {

                continue;

            }

            var t = this.options.movement[key] != undefined ? this.options.movement[key].translation || {

                    x: 0,

                    y: 0,

                    z: 0

                } : {x: 0, y: 0, z: 0},

                r = this.options.movement[key] != undefined ? this.options.movement[key].rotation || {

                    x: 0,

                    y: 0,

                    z: 0

                } : {x: 0, y: 0, z: 0},

                setRange = function (obj) {

                    for (var k in obj) {

                        if (obj[k] == undefined) {

                            obj[k] = [0, 0];

                        }

                        else if (typeof obj[k] === 'number') {

                            obj[k] = [-1 * obj[k], obj[k]];

                        }

                    }

                };



            setRange(t);

            setRange(r);



            var transforms = {

                translation: {

                    x: (t.x[1] - t.x[0]) / bounds.width * relmousepos.x + t.x[0],

                    y: (t.y[1] - t.y[0]) / bounds.height * relmousepos.y + t.y[0],

                    z: (t.z[1] - t.z[0]) / bounds.height * relmousepos.y + t.z[0],

                },

                rotation: {

                    x: (r.x[1] - r.x[0]) / bounds.height * relmousepos.y + r.x[0],

                    y: (r.y[1] - r.y[0]) / bounds.width * relmousepos.x + r.y[0],

                    z: (r.z[1] - r.z[0]) / bounds.width * relmousepos.x + r.z[0]

                }

            };



            this.DOM.animatable[key].style.WebkitTransform = this.DOM.animatable[key].style.transform = 'translateX(' + transforms.translation.x + 'px) translateY(' + transforms.translation.y + 'px) translateZ(' + transforms.translation.z + 'px) rotateX(' + transforms.rotation.x + 'deg) rotateY(' + transforms.rotation.y + 'deg) rotateZ(' + transforms.rotation.z + 'deg)';

        }

    };



    window.TiltFx = TiltFx;

})(window);

(function () {

    var tiltSettings = [

        {},

        {

            movement: {

                imgWrapper: {

                    translation: {x: 10, y: 10, z: 30},

                    rotation: {x: 0, y: -7, z: 0},

                    reverseAnimation: {duration: 400, easing: 'easeOutQuad'}

                },

                lines: {

                    translation: {x: 10, y: 10, z: [0, 70]},

                    rotation: {x: 0, y: 0, z: -2},

                    reverseAnimation: {duration: 2000, easing: 'easeOutExpo'}

                },

                caption: {

                    rotation: {x: 0, y: 0, z: 2},

                    reverseAnimation: {duration: 200, easing: 'easeOutQuad'}

                },

                overlay: {

                    translation: {x: 10, y: -10, z: 0},

                    rotation: {x: 0, y: 0, z: 2},

                    reverseAnimation: {duration: 2000, easing: 'easeOutExpo'}

                },

                shine: {

                    translation: {x: 100, y: 100, z: 0},

                    reverseAnimation: {duration: 200, easing: 'easeOutQuad'}

                }

            }

        }];



    function init() {

        var idx = 1;

        [].slice.call(document.querySelectorAll('article.tilter')).forEach(function (el, pos) {

            new TiltFx(el, tiltSettings[idx - 1]);

        });

    }



    imagesLoaded(document.querySelector('main'), function () {

        init();

    });



})();

/************************** video *****************************/









/***************************** box-shadow **************************/
//
// "use strict";
//
// !function(a){function b(a,b){
//     var c="rgba("+a[0].toFixed()+","+a[1].toFixed()+","+a[2].toFixed()+","+b+")";return"0 2px 2px "+c+", 0 4px 4px "+c+", 0 8px 8px "+c+", 0 16px 16px "+c+", 0 16px 32px "+c}
//     function c(b,c){b.hover(function(){
//         a(this).css("box-shadow",c)},
//         function(){
//         a(this).css("box-shadow","none")})}
// var d=a(".scroll-container article.blog-news,.scroll-container article.video,.one_blog .disqus-thread") ;
// window.initShadow=function(a){var d=a.find("img"),e=new Image;e.crossOrigin="anonymous",e.onload=function(){var d,e=new Vibrant(this),f=e.swatches();d=f.Muted?f.Muted.getRgb():!f.Muted&&f.DarkVibrant?f.DarkVibrant.getRgb():[777,777,777];var g=b(d,.2);c(a,g)},e.src=d.attr("src")},d.each(function(b,c){initShadow(a(c))})}(jQuery);
//
//







// $(document).ready(function () {
//     var hovered
//
//     $('article').hover(function () {
//         var el = $(this)
//         hovered = setTimeout(function () {
//             el.find('.blog-image').addClass('hover');
//             el.addClass('pointer-events')
//         }, 1000)
//     }).mouseleave(function () {
//         clearTimeout(hovered);
//         $(this).find('.blog-image').removeClass('hover');
//         $(this).removeClass('pointer-events');
//     })
// })
//
//
//
// /***************************** box-shadow **************************/
//
// "use strict";
//
// !function(a){function b(a,b){
//
//     var c="rgba("+a[0].toFixed()+","+a[1].toFixed()+","+a[2].toFixed()+","+b+")";return"0 2px 2px "+c+", 0 4px 4px "+c+", 0 8px 8px "+c+", 0 16px 16px "+c+", 0 16px 32px "+c}
//
//     var key
//
//     function c(b,c){b.hover(function(){
//         var  el = this
//         key = setTimeout(function () {
//             a(el).css("box-shadow",c)
//         },1000)
//     },function(){
//         clearTimeout(key)
//         a(this).css("box-shadow","none")})}
//
//     var d=a(".scroll-container article.blog-news,.scroll-container article.video") ;
//
//
//
//     window.initShadow=function(a){var d=a.find("img"),e=new Image;e.crossOrigin="anonymous",e.onload=function(){var d,e=new Vibrant(this),f=e.swatches();d=f.Muted?f.Muted.getRgb():!f.Muted&&f.DarkVibrant?f.DarkVibrant.getRgb():[777,777,777];var g=b(d,.2);c(a,g)},e.src=d.attr("src")},d.each(function(b,c){initShadow(a(c))})}(jQuery);



//***** scroll top ****//
$(document).ready(function () {
    $('.wrap-top-top').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });

    $('.category-popup-btn__box').on('click', function() {
        $('.category-popup__box').show(500);
        $('.category-popup__content').addClass('opened');
    });

    $('.category-popup__btn-close').on('click', function() {
        $('.category-popup__content').removeClass('opened');

        setTimeout(function() {
            $('.category-popup__box').hide(500);
        }, 500);
    });
});

//**** end scroll top ****//
//
//
// var disqus_config = function () {
// this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
// this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
// };

// (function() {
//     var d = document, s = d.createElement('script');
//     s.src = 'https://prego-1.disqus.com/embed.js';
//     s.setAttribute('data-timestamp', +new Date());
//     (d.head || d.body).appendChild(s);
// })();