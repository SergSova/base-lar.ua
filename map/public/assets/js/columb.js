/**
 * Created by Админ on 16.11.2017.
 */
function init() {
  var mouse = document.querySelector('.mouse'),
    shlapnik = document.querySelector('.bg-shlapnik'),
    hatBl = document.querySelector('.hats'),
    hatsCovers = document.querySelector('.hats-covers'),
    kolumbWr = document.querySelector('.kolumb-wrap'),
    kolumb = document.querySelector('.kolumb'),
    hat = document.querySelectorAll('.hat'),
    hatCover = document.querySelectorAll('.hat-cover'),
    resizeEl = document.querySelectorAll('.resizeEl'),
    namesWr = document.querySelectorAll('.name-wrap'),
    names = document.querySelector('.names'),
    games = document.querySelector('.games'),
    burger = document.querySelector('.burger'),
    game = document.querySelectorAll('.burger'),
    canAnimate = false,
    elStats = {},
    w_w = window.innerWidth,
    w_h = window.innerHeight,
    WKoef = w_w / 1920,
    HKoef = w_h / 945,
    elem = null,
    z = 0,
    switchHat = 0;
  var mouseX, mouseY, mouseCanAnim = false;
  var uniKoef = innerWidth / window.innerHeight >= 1.979 ? HKoef : WKoef



  for (var i = 0; i < resizeEl.length; i++) {
    resizeEl[i].setAttribute('data-w', resizeEl[i].clientWidth);
    resizeEl[i].setAttribute('data-h', resizeEl[i].clientHeight);
  }


  document.addEventListener('mousemove', function (e) {
    mouseMoving(e);
    animateMan(e);
    animateMouse(e);
  })

  window.onresize = function () {
    w_w = window.innerWidth,
      w_h = window.innerHeight,
      WKoef = w_w / 1920,
      HKoef = w_h / 945,
      uniKoef = innerWidth / window.innerHeight >= 1.979 ? HKoef : WKoef
    resizeElents();
    gameNamesPosition();
  }

  function resizeElents() {
    /* h smaller */
    for (var i = 0; i < resizeEl.length; i++) {
      elW = resizeEl[i].getAttribute('data-w');
      elH = resizeEl[i].getAttribute('data-h');
      bgResW = resizeEl[i].getAttribute('data-bg-w');
      bgResH = resizeEl[i].getAttribute('data-bg-h');
      bg_pos_x = resizeEl[i].getAttribute('data-bg-x');
      bg_pos_y = resizeEl[i].getAttribute('data-bg-y');
      transOrig = resizeEl[i].getAttribute('data-t-o');

      resizeEl[i].style.width = elW * uniKoef + 'px';
      resizeEl[i].style.height = elH * uniKoef + 'px';
      
      if (bgResW && bgResH) {
        resizeEl[i].style.backgroundSize = Math.floor(bgResW * uniKoef) + 'px ' + Math.floor(bgResH * uniKoef) + 'px';
      }
      if(bg_pos_x && bg_pos_y) {
        resizeEl[i].style.backgroundPosition = Math.floor(bg_pos_x * uniKoef) + 'px ' + Math.floor(bg_pos_y * uniKoef) + 'px';
      }
      if(transOrig) {
        resizeEl[i].style.transformOrigin  ='50% ' + '50% ' + Math.floor(transOrig* uniKoef) + 'px' ;
      }
    }
    setTimeout(function () {
      positHats();
    },1000)
  }
  resizeElents()

  function positHats() {
    if(window.matchMedia('max-width:768px') && $(this).hasClass('already')){return}
    for (i = 0; i < hat.length; i++) {
      i == 0 ? (hat[i].classList.add('active'), hat[i].classList.add('dragable'), hatCover[i].classList.add('active')) : '';
      if (!hat[i].classList.contains('already')) {
        hat[i].style.top = kolumbWr.offsetTop - hat[i].clientHeight + (60 * WKoef) + 'px';
        hat[i].style.left = window.innerWidth / 2 - hat[i].clientWidth / 2 + 'px';
      } else {
        console.log(WKoef);
        hat[i].style.top = hat[i].getAttribute('data-top') * HKoef + 'px';
        hat[i].style.left = hat[i].getAttribute('data-left') * WKoef + 'px';
      }

      hatCover[i].style.top = kolumbWr.offsetTop - hat[i].clientHeight / 1.5 + 'px';
      hatCover[i].style.left = kolumbWr.offsetLeft + kolumbWr.clientWidth / 2 - hat[i].clientWidth / 2 + 'px';
      hatCover[i].style.width = hat[i].clientWidth + 'px';
      hatCover[i].style.height = hat[i].clientHeight + 'px';
      // hatCover[i].style.background = 'red';
    }
  }

  positHats();

  function mouseMoving(e) {
    /* mouse - hand */
    mouseX = e.pageX;
    mouseY = e.pageY;
    mouseW = mouse.clientWidth / 3;
    mouseH = mouse.clientHeight - mouse.clientHeight / 5;
    mL = mouseX - mouseW;
    mT = mouseY - mouseH
    $('.mouse').css({
      left:  mL + 'px',
      top: mT + 'px'
    })
// alert(12)

    // mouse.style.left = mL + 'px';
    // mouse.style.top = mT + 'px';

    /* background -paralax */
    w_w = window.innerWidth;
    w_h = window.innerHeight;

    bgX = w_w / 2 > mouseX ? mouseX : -mouseX;
    bgY = w_h / 2 > mouseY ? mouseY : -mouseY;
    // shlapnik.style.backgroundPosition = bgX * .01 + 'px  ' + bgY * .01 + 'px ';

    if (elem != null) {
      if (!elem.classList.contains('last')) {
        if (mouseX - elStats.startX > 500 || mouseY - elStats.startY > 500 || mouseX - elStats.startX < -500 || mouseY - elStats.startY < -500) {
          canAnimate = false;
          elem = null;
          hatCover[z].classList.remove('active');
          hat[z].style.left = mouseX - mouseW + 'px';
          hat[z].style.top = mouseY - mouseH + 'px';
          hat[z].setAttribute('data-left', mouseX - mouseW);
          hat[z].setAttribute('data-top', mouseY - mouseH);
          hat[z].classList.remove('dragable');
          hat[z].classList.add('already');
          z++
          hatCover[z].classList.add('active');
          hat[z].classList.add('dragable');
          hat[z].classList.add('active');
          return true;
        }
      }else {
        $('h1 img').attr('src', $('h1 img').attr('data-end'));
      }
      elem.style.left = mouseX - elStats.positionX + 'px';
      elem.style.top = mouseY - elStats.positionY + 'px';
    }
    w_w = window.clientWidth || window.innerWidth;
    w_h = window.clientHeight || window.innerHeight;
    if(mouseX < 200 && mouseY < 200 ||
      mouseX > w_w - 200 && mouseY < 200 ||
      mouseX < 200 && mouseY > w_h - 200 ||
      mouseX > w_w - 400 && mouseY > w_h - 200) {
        $('.mouse').css({opacity:0});
        $('.game1').css({cursor:'auto'})
    }else {
      $('.mouse').css({opacity:1});
      $('.game1').css({cursor:'none'})
    }
  }

  /* drag - drop */
  function dragHats() {
    for (i = 0; i < hat.length; i++) {
      hatCover[i].addEventListener('touchstart', touchMoveHat)
      hatCover[i].onmousedown = function (e) {

        elem = this
        elem.W = elem.clientWidth;
        elStats.x = elem.offsetLeft;
        elStats.y = elem.offsetTop;
        elStats.startX = e.pageX;
        elStats.startY = e.pageY;
        elStats.positionX = e.pageX - elStats.x;
        elStats.positionY = e.pageY - elStats.y;
        mouse.style.backgroundPositionY = -1035 * uniKoef + 'px';

        elem.ondragstart = function () {
          return false;
        };
        canAnimate = true
        document.onmouseup = function () {
          if (elem) {
            hatBl.querySelector('.hat.dragable').style.transform = 'rotate(' + 0 + 'deg) translate(' + 0 + 'px)';
            elem.style.left = elStats.x + 'px';
            elem.style.top = elStats.y + 'px';
            elem = null;
            canAnimate = false;
          }
        }
      }
    }
  }
  function touchMoveHat(e) {
    elem = this
    elem.W = elem.clientWidth;
    elStats.x = elem.offsetLeft;
    elStats.y = elem.offsetTop;
    elStats.startX = e.changedTouches[0].pageX;
    elStats.startY = e.changedTouches[0].pageY;
    elStats.positionX = e.changedTouches[0].pageX - elStats.x;
    elStats.positionY = e.changedTouches[0].pageY - elStats.y;
    mouse.style.backgroundPositionY = -1035 * uniKoef + 'px';

    mouseW = mouse.clientWidth / 3;
    mouseH = mouse.clientHeight - mouse.clientHeight / 5;

    mouse.style.left = elStats.startX - mouseW + 'px';
    mouse.style.top = elStats.startY - mouseH + 'px';

    elem.ontouchmove = function (e) {
    /* move hand */
      animateMan(e)
      elStats.moveX = e.changedTouches[0].pageX;
      elStats.moveY = e.changedTouches[0].pageY;
      mouseX = e.changedTouches[0].pageX;
      mouseY = e.changedTouches[0].pageY;

      mouse.style.left = elStats.moveX - mouseW + 'px';
      mouse.style.top = elStats.moveY - mouseH + 'px';

      elem.style.left = elStats.moveX - mouseW + 'px';
      elem.style.top = elStats.moveY - mouseH + 'px';
      canAnimate = true;

        if (!elem.classList.contains('last')) {
          if (elStats.x - elStats.moveX > w_w / 4 || elStats.x - elStats.moveX < -w_w / 4 ||
            elStats.y - elStats.moveY > w_h / 4 || elStats.y - elStats.moveY < -w_h / 4) {
            if (canAnimate) {
              hat[z].style.left = elStats.moveX - mouseW + 'px';
              hat[z].style.top = elStats.moveY - mouseH + 'px';
              hat[z].setAttribute('data-left', elStats.moveX - mouseW);
              hat[z].setAttribute('data-top', elStats.moveY - mouseH);
              hat[z].classList.remove('dragable');
              hat[z].classList.add('already');
              this.removeEventListener('touchstart', touchMoveHat)
              elem = null;
              canAnimate = false;
              z++
              hatCover[z].classList.add('active');
              hat[z].classList.add('dragable');
              hat[z].classList.add('active');
            }

          }
        }else {
          $('h1').html('ПРИЕХАЛИ!')
        }
    }
    elem.ontouchend = function (e) {
      if (elem) {
        hatBl.querySelector('.hat.dragable').style.transform = 'rotate(' + 0 + 'deg) translate(' + 0 + 'px)';
        elem.style.left = elStats.x + 'px';
        elem.style.top = elStats.y + 'px';
        elem = null;
        canAnimate = false;
      }
    }
  }
  dragHats();

  kolumb.classList.add('active-left');

  function animateMan(e) {
    if (!canAnimate) {
      kolumb.style.backgroundPositionX = 0;
      kolumb.classList.remove('active-left');
      kolumb.classList.remove('active-right');
      return;
    }

    if (mouseX > window.innerWidth / 2) {
      hatBl.querySelector('.hat.dragable').classList.remove('left');
      hatBl.querySelector('.hat.dragable').classList.add('right');
      kolumb.classList.remove('active-left');
      kolumb.classList.add('active-right');
    } else {
      hatBl.querySelector('.hat.dragable').classList.remove('right');
      hatBl.querySelector('.hat.dragable').classList.add('left');
      kolumb.classList.remove('active-right');
      kolumb.classList.add('active-left');
    }
    bgPosX = mouseX - elStats.startX < 0 ? ((mouseX - elStats.startX) * -1) : mouseX - elStats.startX;
    bgPosY = mouseY - elStats.startY < 0 ? ((mouseY - elStats.startY) * -1) : mouseY - elStats.startY;

    if (bgPosX > +bgPosY) {
      koef = Math.round(bgPosX / (500 / 9));
      koef = koef > 9 ? 9 : koef;
      kolumb.style.backgroundPositionX = -kolumb.clientWidth * koef + 'px';
      koef = hatBl.querySelector('.hat.dragable').classList.contains('left') ? koef * (-1) : koef;
      hatBl.querySelector('.hat.dragable').style.transform = 'rotate(' + koef + 'deg) translate(' + koef * 5 + 'px)';

    } else {
      koef = Math.round(bgPosY / (500 / 9));
      koef = koef > 9 ? 9 : koef;
      kolumb.style.backgroundPositionX = -kolumb.clientWidth * koef + 'px';
      koef = hatBl.querySelector('.hat.dragable').classList.contains('left') ? koef * (-1) : koef;
      hatBl.querySelector('.hat.dragable').style.transform = 'rotate(' + koef + 'deg) translate(' + koef * 5 + 'px)';
    }
  }

  function animateMouse(e) {
    if (canAnimate) {
      return
    }
    hatActive = document.querySelector('.hat-cover.active');
    hatActiveLeft = hatActive.offsetLeft;
    hatActiveTop = hatActive.offsetTop;
    hatActiveWidth = hatActive.clientWidth;
    hatActiveHeight = hatActive.clientHeight;
    koef = null;
    posX = mouseX > window.innerWidth / 2 ? (mouseX - (hatActiveLeft + hatActiveWidth)) : ((hatActiveLeft) - mouseX );
    posY = mouseY > window.innerHeight / 2 ? (mouseY - (hatActiveTop + hatActiveHeight)) : ((hatActiveTop) - mouseY );

    if (posX > posY) {
      koef = Math.round(posX / (500 / 4));
      if (posX < 0 || koef > 4) {
        return
      }
    } else {
      koef = Math.round(posY / (500 / 4));
      if (posY < 0 || koef > 4) {
        return
      }
    }
    if ((-828 * uniKoef + (207 * koef * uniKoef)) == 0) {
      if (!mouseCanAnim) {
        mouseCanAnim = true
        handCicl()
      }

    } else {
      mouseCanAnim = false;
      mouse.style.backgroundPositionY = -828 * uniKoef + (207 * koef * uniKoef) + 'px';
    }
  }

  function handCicl() {
    if (!mouseCanAnim) {
      window.cancelAnimationFrame(handCicl);
      return;
    }
    setTimeout(function () {
      window.requestAnimationFrame(handCicl);
    }, 300)
    switchHat = switchHat == 2 ? 3 : 2;

    mouse.style.backgroundPositionY = -828 * uniKoef + (207 * switchHat * uniKoef) + 'px';
  }


  /* burger click */
  burger.onclick = function () {
    this.classList.toggle('active');
    this.classList.contains('active') ? games.classList.add('active') : games.classList.remove('active');

  }


  /* game names */

  function gameNamesPosition() {
    games.style.width = w_w * document.querySelectorAll('.game').length + 'px';
    // names.style.width = w_w * namesWr.length + 'px';
  };
  gameNamesPosition();


  $('.str').click(function () {
    var pos

    $('.game').removeClass('active active-prev active-next');
    if ($(this).hasClass('str-next')) {
      pos = -w_w;
      $('.game').eq(1).addClass('active-prev');
      $('.game').eq(2).addClass('active');
      $('.game').eq(3).addClass('active-next');
    } else {
      pos = w_w;
      $('.game').eq(0).addClass('active');
    }
    $('.games').animate({
      left: pos + 'px'
    }, 800, function () {
      $('.game').eq(0).appendTo($('.games'));
      $('.games').css({'left': 0 + 'px'});

    });

  })
  $('.str-prev').click(function () {
    // names.style.left = 0 +'px';
    games.style.left = 0 + 'px';
  })


  $('.game').eq(0).addClass('active');
  $('.game:last-child').prependTo($('.games'));
  $('.name-wrap:last-child').prependTo($('.names'));

  $('.game').eq(0).addClass('active-prev');
  $('.game').eq(1).addClass('active');
  $('.game').eq(2).addClass('active-next');
  
}
document.addEventListener("DOMContentLoaded", init);

