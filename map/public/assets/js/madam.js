(function () {
    d =  document.createElement('div')
    d.style.position = 'absolute'
    d.style.top = '50%'
    d.style.left = '0'
    d.style.color = '#fff',
    document.body.prepend(d)
    var detect;
  if (detect) {
    var ua = detect.parse(navigator.userAgent);
    if(ua.os.family == 'iOS') {
      $('body').addClass('ios-active');
    }
  }
  // window.onerror = function myErrorHandler(errorMsg, url, lineNumber) {
  //     d.append(errorMsg+' --1-- '+url+' --1-- '+lineNumber);
  // }

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

  if(getCookie('man') != undefined){
    man = getCookie('man');
    man = man == '1' ? '0' : '1';
    setCookie('man', man);
  }else {
    man = Math.floor(Math.random() * 1);
    setCookie('man', man);
  }

  imgs = [], img = [];
  var glob = 0;
  var count = 0;
  var str = man == 1 ? 'assets/img/girl/1280/' : 'assets/img/man/1280/'
  var forw = true;
  var anim = false;
  var waitTime  = false;
  var backAnim = false;
  var paus = 1;

  /* canvas */
  var c = document.getElementById('canvas');
  var ctx = c.getContext('2d');
  var dpr = window.devicePixelRatio;
  var cw = window.innerWidth;
  var ch = window.innerHeight;
  c.width = window.innerWidth;
  c.height = window.innerHeight;


  function beforeLoadingImages() {
    for (var i = 1; i <= 16; i++) {
      img[i - 1] = str + i + '.jpg'
    }
  }

  beforeLoadingImages();
  function initScene(counts, callback) {
    for (var i = 0; i <= counts.length - 1; i++) {
      imgs[i] = new Image();
      imgs[i].src = counts[i];
      if (i == counts.length - 1) {
        callback(true);
      }
    }
  };
  initScene(img, function () {
    ctx.drawImage(imgs[glob], 0, 0, c.width, c.height);

    function drawFirst(nn, callback) {
      k = new Image();
      k.src = img[glob];
      k.onload = function () {
        callback(k);
      }
    }

    drawFirst(glob, function (k) {
      ctx.drawImage(k, 0, 0, c.width, c.height);
    });
  })

  if (window.addEventListener) {
    if ('onwheel' in document) {
      window.addEventListener("wheel", onWheel);
    } else if ('onmousewheel' in document) {
      window.addEventListener("mousewheel", onWheel);
    } else {
      window.addEventListener("MozMousePixelScroll", onWheel);
    }
  } else {
    window.attachEvent("onmousewheel", onWheel);
  }


  c.addEventListener("touchstart", function(e) {
    e.preventDefault();
    var touchobj = e.changedTouches[0]
    c.addEventListener('touchend', function(e){
      e.preventDefault();

      // d.append(paus + ' --1-- ')
      if( paus == 1 || paus == 4) {
        paus++;
        beforeDraw();
      }
    })
  })

  function onWheel(e) {
    e = e || window.event;
    delta  = e.pageY;
    // console.log(paus);

    if(delta > 0 &&  paus == 1 || paus == 4) {
      paus++;
      beforeDraw();
    }
  }
  function beforeDraw() {
      count = backAnim ? imgs.length - 1 : Math.floor((imgs.length - 1) / 2);
      backAnim = true;
      forw = true
      drawImg();
  }

  function drawImg() {
    forw ? glob++ : glob = glob == 0 ? 0 : glob - 1 ;
    anim = true;
    if(count == imgs.length - 1 ) {
      document.querySelector('.scroll-box').classList.add('hidden');
    }
    if (count == glob && forw || !forw && count == glob) {
      anim = false;
      forw = true;
      window.cancelAnimationFrame(drawImg);
      if(count == imgs.length - 1) {
        document.querySelector('.no-aids').classList.add('open');
      }
      if (paus == 2) {
        count = 0;
        forw = false;
        paus =  3;
        drawImg();
      }else  if (paus == 3){
        paus =  4;
        document.querySelector('.scroll-box-text.hidden').classList.add('active');
      }
      return true;
    }
    setTimeout(function () {
      window.requestAnimationFrame(drawImg);
    }, 80)
    ctx.drawImage(imgs[glob], 0, 0, c.width, c.height);
  }

  window.onresize = function () {
    // d.append( c.width + ' - ' +  c.height +'/');
    c.width = window.innerWidth;
    c.height = window.innerHeight;
    ctx.drawImage(imgs[glob], 0, 0, c.width, c.height);
  }
})();