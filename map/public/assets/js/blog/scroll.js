window.requestAnimFrame = (function () {
  return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimationFrame ||
    function (/* function */ callback, /* DOMElement */ element) {
      window.setTimeout(callback, 1000 / 60);
    };
})();

function createObj() {
  var scrollTop,
    contAnim = 0,
    canScroll = true,
    scrollDown = true,
    scrollBefore = 0,
    elem = document.querySelector('.fixid-container'),
    perc = 0,
    biggest,
    scrollTop = 0,
    koef = [],
    bl = $('.translate-block'),
    scrollSubstitute = $('.scroll-substitute'),
    wraper = document.querySelector('main'),
    container = document.querySelector('.content'),
    head = document.querySelector('.scroll-container').offsetTop,
    k1 = document.querySelector('.content').clientHeight;

  scrollSubstitute.height(k1);

  function getSmall() {
    dascr = parseInt($('.about-description').css('padding-top')) * 2;
    w_h2 = $(window).height() - ($('.about-description').height() + $('footer').height() + dascr + 25);
    $('.translate-block').each(function (index) {
      biggest = index == 0 ? $(this).height() - w_h2 : biggest > $(this).height() - w_h2 ? biggest : $(this).height() - w_h2;
    })
    $('.translate-block').each(function (index) {
      koef[index] = (($(this).height() - w_h2) / biggest);
    })
  }

  getSmall();

  if (elem.addEventListener) {
    if ('onwheel' in document) {
      elem.addEventListener("wheel", onWheel);
    } else if ('onmousewheel' in document) {
      elem.addEventListener("mousewheel", onWheel);
    } else {
      elem.addEventListener("MozMousePixelScroll", onWheel);
    }
  } else {
    elem.attachEvent("onmousewheel", onWheel);
  }

  function onWheel(e) {
    eDelta = e.deltaY
    console.log(eDelta);
console.log(35243);
    scrollTop = wraper.pageYOffset || wraper.scrollTop;
    if( eDelta > 0) {
      if(scrollSubstitute.height() != scrollTop +  window.innerHeight ) {
        $('.scroll-substitute').css({'pointer-events': 'auto'});
      }
    }else {
      if(scrollTop != 0 ) {
        $('.scroll-substitute').css({'pointer-events': 'auto'});
      }
    }

  }

  wraper.onscroll = function () {
    getParams();
  }

  function getParams() {
    scrollTop = wraper.pageYOffset || wraper.scrollTop;
    offTop = $('.scroll-container').offset().top;
    scrollDown = scrollBefore < scrollTop ? true : false;
    scrollBefore = scrollTop;
    canAnim();
  }
l=0
  function canAnim() {
    canScroll = false;
    stopTrill = scrollDown ? (Math.floor(contAnim) >= Math.floor(scrollTop) - 1 /*|| k1 < Math.floor(scrollTop)*/) : Math.floor(contAnim) <= Math.floor(scrollTop);

    perc = (Math.floor(scrollTop) - contAnim) * 0.4
    if (stopTrill) {
      $('.scroll-substitute').css({'pointer-events': 'none'});
      canScroll = true;
      window.cancelAnimationFrame(canAnim);
      return;
    }
    contAnim += perc
    posBlock = contAnim - head

    container.style.webkitTransform = 'translate3d(0,-' + contAnim + 'px, 0 )';
    container.style.MozTransform = 'translate3d(0,-' + contAnim + 'px, 0 )';
    container.style.msTransform = 'translate3d(0,-' + contAnim + 'px, 0 )';
    container.style.OTransform = 'translate3d(0,-' + contAnim + 'px, 0 )';
    container.style.transform = 'translate3d(0,-' + contAnim + 'px, 0 )';
    window.requestAnimationFrame(canAnim);

    if (scrollTop > head && scrollDown || scrollTop > head && !scrollDown || !scrollDown && posBlock > 0) {
      for (i = 0; i < bl.length; i++) {
        tr = posBlock * (1 - koef[i]);
        if (koef[i] != 0) {
          // console.log(tr);
          bl[i].style.webkitTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.MozTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.msTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.OTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.transform = 'translate3d(0,' + tr + 'px, 0 )';
        }
      }
    } else if (!scrollDown && scrollTop >= 0) {
      for (i = 0; i < bl.length; i++) {
        tr = (0);
        if (koef[i] != 0) {
          bl[i].style.webkitTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.MozTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.msTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.OTransform = 'translate3d(0,' + tr + 'px, 0 )';
          bl[i].style.transform = 'translate3d(0,' + tr + 'px, 0 )';
        }
      }
    }
  }

  $('.about-description h4').click(function () {
    $('.translate-block').each(function (index) {
      var f = $(this).html();
      $(this).append(f)
    })
  })
}

/* YouTube Player */
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
/* YTPLAYER */
var player = [];
var videoDiv = document.querySelectorAll('.video-blog')

function onYouTubeIframeAPIReady() {
  if (videoDiv.length) {
    for (var i = 0; i < videoDiv.length; i++) {
      videoDiv[i].id = 'video' + i
      video = videoDiv[i].getAttribute('data-video');
      player['video' + i] = new YT.Player(videoDiv[i], {
        height: '360',
        width: '640',
        videoId: videoDiv[i].getAttribute('data-video'),
        playerVars: {
          'showinfo': 0,
          'color': 'white',
          'cc_load_policy': 1,
          'disablekb': 1,
          'enablejsapi': 1,
          'loop': 1,
          'modestbranding': 1,
          'rel': 0,
          'fs': 0
        },
        events: {
          'onReady': function (event) {
            $('.video-to-play').hover(function () {
              ids = $(this).find('.video-blog').attr('id');
              player[ids].playVideo();
            }).mouseleave(function (event) {
              ids = $(this).find('.video-blog').attr('id');
              player[ids].pauseVideo();
            })
            createObj()
          },
        }
      });
    }
  }else {
    createObj()
  }
}

function buttonToTop() {
  var aaa2 = $('.wrap-top-top').offset().top;
  var aaa3 = $('footer').offset().top;
  if ($(this).scrollTop() > 2500) {
    $('.wrap-top-top').css({'opacity': 1, 'height': 'auto', 'width': 'auto'})
  } else {
    $('.wrap-top-top').css({'opacity': 0, 'height': '0', 'width': '0'});
  }
  if (aaa2 >= aaa3) {
    $('.wrap-top-top').addClass('top-top_1')
  } else {
    $('.wrap-top-top').removeClass('top-top_1')
  }
}


