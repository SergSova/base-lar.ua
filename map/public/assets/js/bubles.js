function DrugStore() {
    var th = this;

    th.canvasContainer = document.querySelector('#bubles-container');
    th.canvasContainerWidth = th.canvasContainer.clientWidth;
    th.canvasContainerHeight = th.canvasContainer.clientHeight;
    th.app = new PIXI.Application(th.canvasContainerWidth, th.canvasContainerHeight);
    //this.app.renderer.resize(this.winW, this.winH);
    th.topContainer = new PIXI.Container();
    th.aboutTextContainer = new PIXI.Container();
    th.circlesContainer = new PIXI.ParticleContainer();
    th.circlesArray = [];
    th.bgSprite;
    th.hand;
    th.b = new Bump(PIXI);
    th.su = new SpriteUtilities(PIXI);
    th.animId;
    th.cloudParalax;
    th.handMove;
    th.controls = document.querySelector('.slider-controls');
    th.handHideObjects = [document.querySelector('.burger'), document.querySelector('.top-logo'), document.querySelector('.slider-controls')];

    window.addEventListener('resize', function () {
        //rocket.setMetrics();
        if (window.screen.orientation.type == 'landscape-primary') {
            //rocket.reInit();   
        } else {
            //this.app.renderer.transparent = 0;
        }
        th.reInit();   
    });

    window.addEventListener('orientationchange', function() {
        th.reInit();
    });

    th.checkWindowTabIsActive();
}

DrugStore.prototype.checkWindowTabIsActive = function() {
    var th = this,
        vis = (function() {
            var stateKey, 
                eventKey = {event: '', hidden: ''}, 
                keys = {
                        hidden: "visibilitychange",
                        webkitHidden: "webkitvisibilitychange",
                        mozHidden: "mozvisibilitychange",
                        msHidden: "msvisibilitychange"
            };

            for (stateKey in keys) {
                if (stateKey in document) {
                    eventKey['event'] = keys[stateKey];
                    eventKey['hidden'] = stateKey;
                    break;
                }
            }

            document.addEventListener(eventKey['event'], function() {

                if (document.visibilityState == eventKey['hidden']) {
                    //th.destroy();
                    //console.log('hidden')
                } else {
                    //th.reInit();
                    //location.reload();
                    setTimeout(function() {
                        th.reInit();
                    }, 500)
                }
            })
        })();
}

DrugStore.prototype.init = function() {
    this.canvasContainer.appendChild(this.app.view);
}


DrugStore.prototype.reInit = function() {
    var th = this;

    th.destroy();
    th.setup();
}

DrugStore.prototype.destroy = function() {
    var th = this;

    th.clearTopContainer();
    th.topContainer.off('mousemove', th._handeMove);
    th.topContainer.off('touchmove', th._handeMove);
    th.app.stage.removeChild(th.topContainer);
    th.circlesArray = [];
    cancelAnimationFrame(th.animId);    
}

DrugStore.prototype.clearTopContainer = function() {
    var th = this;

    th.topContainer.children = [];
}

DrugStore.prototype.setup = function() {
    var th = this;
    th.canvasContainerWidth = th.canvasContainer.clientWidth;
    th.canvasContainerHeight = th.canvasContainer.clientHeight;
    th.app.renderer.resize(th.canvasContainerWidth, th.canvasContainerHeight);
    th.app.stage.addChild(this.topContainer);  

    th.bgSprite = new PIXI.Sprite(PIXI.loader.resources['/assets/img/drug-store/bg.jpg'].texture);
    th.bgSprite.width = th.canvasContainerWidth;
    th.bgSprite.height = th.canvasContainerHeight;
    th.topContainer.addChild(th.bgSprite);

    //alert(document.getElementsByTagName('canvas')[0].clientHeight + ' ' + document.getElementsByTagName('canvas')[0].clientWidth)
    //
    // var titleText = new PIXI.Text('ВЫБЕРИ\nСВОЮ МЕЧТУ', {
    //     font: '30px Montserrat-Medium',
    //     fill: 'white',
    //     align : 'center'
    // });
    // titleText.x = th._getWidth(44);
    // titleText.y = th._getHeight(21);
    // titleText.scale.set(th._getScale(titleText.width, 11));
    // th.topContainer.addChild(titleText);

    th._createHand();
    th._createOthers();
    th._createCircles();
    th._moveStart();
    th.topContainer.addChild(th.hand);

    var h1 = document.querySelector('h1');
    h1.classList.add('load');
    setTimeout(function () {
        h1.classList.remove('load');

        setTimeout(function() {
            h1.classList.add('active');
            h1.classList.add('load');
        }, 1000);
    }, 5000);
}

DrugStore.prototype._createClouds = function() {
    var th = this,
        parallaxDirection = 1;
    
    [
        {name: 'cloudCenter', offsetX: 8, offsetY: 0, widthPersent: 100},
        {name: 'cloudBig', offsetX: 0, offsetY: 0, widthPersent: 100},
    ].forEach(function(cloud) {
        var sprite = new PIXI.Sprite(PIXI.loader.resources['/assets/img/drug-store/clouds/' + cloud['name'] + '.png'].texture),
            scale = th._getScale(sprite.width, cloud['widthPersent']);

        sprite.scale.set(scale);
        //th.topContainer.addChild(sprite)
    })
}

DrugStore.prototype._createHand = function() {
    var th = this,
        handTexture = th.su.filmstrip('/assets/img/drug-store/hand.png', 207, 250);

    th.topContainer.interactive = true; 
    th.hand = new PIXI.extras.MovieClip(handTexture);
    th.hand.play();
    th.hand.animationSpeed = 0.15;
    th.hand.scale.set(th._getScale(th.hand.width, 7));
    th.hand.x = 0;
    th.hand.y = 0;

    var controlsOffsets = [],
        can = false,
        hover = false;

    th.handHideObjects.forEach(function(o) {
        if (o) {
            var box = o.getBoundingClientRect();

            controlsOffsets.push(box);
        }
    });

    th.handMove = function(e) {
        hover = false;
        th.hand.anchor = { x: 0.5, y: 1 };
        th.hand.x = e.data.global.x;
        th.hand.y = e.data.global.y;
        var key,tims, op = 1;
        canOp = false;
        w_w = window.clientWidth || window.innerWidth;
        w_h = window.clientHeight || window.innerHeight;
        
        controlsOffsets.forEach(function(ob) {
            if (th.checkHand(e, ob, th.hand)) {
                hover = true;
            }
        });

        if (hover) {
            new TweenMax.to(th.hand, 0.32, {
                ease: Power0.easeNone,
                alpha: 0
            });
        } else {
            new TweenMax.to(th.hand, 0.32, {
                ease: Power0.easeNone,
                alpha: 1
            });
        }
        //console.log( e.data.global.x, controlsOffset.left, e.data.global.y, controlsOffset.top)
    }

    th.topContainer.on('touchmove', th.handMove);
    th.topContainer.on('mousemove', th.handMove);

    if (!modalVis) {
        th.topContainer.on('touchmove', th.handMove);
        th.topContainer.on('mousemove', th.handMove);
    }
}

DrugStore.prototype.checkHand = function(e, controlsOffset, hand) {
    var th = this,
        centerControlsX = controlsOffset.left + controlsOffset.width / 2,
        centerControlsY = controlsOffset.top + controlsOffset.height / 2,
        handCenterX = hand.centerX - hand.width / 2,
        handCenterY = hand.centerY - hand.height / 2,
        deltaX = Math.abs(centerControlsX - handCenterX),
        deltaY = Math.abs(centerControlsY - handCenterY),
        distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
        
    if (((controlsOffset.width / 2 + hand.width / 2) >= deltaX) && ((controlsOffset.height / 2 + hand.height / 2) >= deltaY)) {
        
        return true;
    } else {
        return false;
    }
    // if ((e.data.global.x > controlsOffset.left) && (e.data.global.x < controlsOffset.right) && (e.data.global.y > controlsOffset.top) && (e.data.global.y < controlsOffset.bottom)) {
    //     return true;
    // } else {
    //     return false;
    // }

}

DrugStore.prototype.mobileAndTabletcheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  
  return check;
};

DrugStore.prototype._createOthers = function() {
    var th = this,
        parallaxDirection = 1,
        _parallaxSpeed = .005;
    
    [
        {name: '/assets/img/drug-store/other/fly-man', offsetX: 7, offsetY: 70, widthPersent: 17},
        {name: '/assets/img/drug-store/other/fly-man2', offsetX: 50, offsetY: 52, widthPersent: 4},
        {name: '/assets/img/drug-store/other/fly-wooman2', offsetX: 80, offsetY: 5, widthPersent: 11},
        {name: '/assets/img/drug-store/other/fly-wooman', offsetX: 14, offsetY: 8, widthPersent: 11},
        {name: '/assets/img/drug-store/clouds/cloudBig', offsetX: 0, offsetY: 0, widthPersent: 100},
        {name: '/assets/img/drug-store/clouds/cloudCenter', offsetX: 8, offsetY: 0, widthPersent: 100},
    ].forEach(function(elem) {
        var sprite = new PIXI.Sprite(PIXI.loader.resources[elem['name'] + '.png'].texture),
            scale = th._getScale(sprite.width, elem['widthPersent']),
            _currentX = '',
            _currentY = '';

        sprite.scale.set(scale);
        sprite.x = th._getWidth(elem['offsetX']);
        sprite.y = th._getHeight(elem['offsetY']);

        if (elem['name'] == '/assets/img/drug-store/clouds/cloudBig') {
            sprite.alpha = 0.19;
            parallaxDirection *= -1;
        } 

        th.cloudParalax = function(e) {
            if (_currentX == '') { _currentX = e.data.global.x };
            var deltaX = e.data.global.x - _currentX;
            _currentX = e.data.global.x;

            if (_currentY == '') { _currentY = e.data.global.y };
            var deltaY = e.data.global.y - _currentY;
            _currentY = e.data.global.y; 
            
            sprite.position.x += (deltaX * _parallaxSpeed) * parallaxDirection;
            sprite.position.y += (deltaY * _parallaxSpeed) * parallaxDirection;

            parallaxDirection *= -1;
        }

        if (!th.mobileAndTabletcheck) {
            th.topContainer.on('mousemove', th.cloudParalax);
        } else {
            th.topContainer.on('touchmove', th.cloudParalax);
        }

        th.topContainer.addChild(sprite);
    });
}

DrugStore.prototype._createCircles = function() {
    var th = this,
        delayTime = 0,
        offsetR = 0,
        step = 0.1;

    if (window.innerWidth <= 900) {
        offsetR = 30;
    }

    [
        {name: 'bloger', offsetX: 8, offsetY: 51, mobileCoef: 0, widthPersent: 8, text: 'стать модным\nблогером', textOffset: 1},
        {name: 'boots', offsetX: 25, offsetY: 11, mobileCoef: 2, widthPersent: 13, text: 'фирменные\nкросы', textOffset: 0.91},
        {name: 'car', offsetX: 59, offsetY: 30, mobileCoef: 2, widthPersent: 14, text: 'крутую тачку', textOffset: 0.83},
        {name: 'figure', offsetX: 6, offsetY: 21, mobileCoef: 2, widthPersent: 12, text: 'стать\nстройной', textOffset: 0.83},
        {name: 'figureMan', offsetX: 19, offsetY: 33, mobileCoef: 1, widthPersent: 10, text: 'подкачаться\nи стать крутым', textOffset: 0.86},
        {name: 'flat', offsetX: 72, offsetY: 40, mobileCoef: 3, widthPersent: 13, text: 'жить отдельно\nот родителей', textOffset: 0.97},
        {name: 'friends', offsetX: 39, offsetY: 37, mobileCoef: 0, widthPersent: 9, text: 'много друзей', textOffset: 0.89},
        {name: 'love2', offsetX: 51, offsetY: 64, mobileCoef: 2, widthPersent: 11, text: 'найти\nвторую половинку', textOffset: 1},
        {name: 'wedding', offsetX: 40, offsetY: 66, mobileCoef: 0, widthPersent: 9, text: 'выйти замуж\nи родить детей', textOffset: 0.85},
        {name: 'mobile', offsetX: 65, offsetY: 62, mobileCoef: 0, widthPersent: 9, text: 'модный\nсмартфон', textOffset: 0.84},
        {name: 'parashut', offsetX: 23, offsetY: 58, mobileCoef: 3, widthPersent: 14, text: 'экстрим', textOffset: 0.84},
        {name: 'star', offsetX: 57, offsetY: 3, mobileCoef: 2, widthPersent: 11, text: 'стать звездой', textOffset: 0.91},
        {name: 'travel', offsetX: 71, offsetY: 11, mobileCoef: 2, widthPersent: 10, text: 'путешествовать\nпо миру', textOffset: 0.93},
        {name: 'visa', offsetX: 82, offsetY: 19, mobileCoef: 1, widthPersent: 10, text: 'иметь банковскую карту\nс безлимом', textOffset: 0.83}
    ].forEach(function(circle) {
        var circleContainer = new PIXI.Container(),
            sprite = new PIXI.Sprite(PIXI.loader.resources['/assets/img/drug-store/circles/' + circle['name'] + '.png'].texture),
            scale;
        if (!th.mobileAndTabletcheck()) {
            scale = th._getScale(sprite.width, circle['widthPersent']);
        } else {
            scale = th._getScale(sprite.width, (circle['widthPersent'] - circle['mobileCoef']));
        }
        //scale = th._getScale(sprite.width, circle['widthPersent']);
        sprite.scale.set(scale);

        circleContainer.addChild(sprite);

        if (th.app.renderer.width <= 991) {
            var circleText = new PIXI.Text(circle['text'], {
                font: '8px Montserrat-Medium',
                fill: 'white',
                wordWrap: true,
                align : 'center'
            });
        } else if (th.app.renderer.width <= 1200 && th.app.renderer.width > 991) {
            var circleText = new PIXI.Text(circle['text'], {
                font: '10px Montserrat-Medium',
                fill: 'white',
                wordWrap: true,
                align : 'center'
            });
        } else {
            var circleText = new PIXI.Text(circle['text'], {
                font: '12px Montserrat-Medium',
                fill: 'white',
                align : 'center'
            });
        }

        circleContainer.addChild(circleText);
       // circleText.width = sprite.width;

        circleText.x = (circleContainer.width / 2) - (circleText.width / 2);
        circleText.y = sprite.height * circle['textOffset'] + 10;
        sprite.x = (circleContainer.width / 2) - (sprite.width / 2);
        circleContainer.x = th._getWidth(circle['offsetX'], offsetR);
        circleContainer.y = th._getHeight(circle['offsetY']);

        var p = new PIXI.Graphics();
        //p.beginFill(0x000000);
        p.drawCircle(0, 0, (sprite.width / 2));
        p.endFill();
        var spriteShadow = new PIXI.Sprite(p.generateCanvasTexture());
        spriteShadow['p'] = circleContainer;
        spriteShadow.rotation = 0;
        spriteShadow.width = circleContainer.width;
        spriteShadow.height = circleContainer.height;
        spriteShadow.x = circleContainer.position.x;
        spriteShadow.y = circleContainer.position.y;
        circleContainer['_childShadow'] = spriteShadow;
        th.circlesArray.push({name: circle['name'], sprite: spriteShadow});
        th.topContainer.addChild(spriteShadow);

        delayTime += step;

        th.setAnim(circleContainer, delayTime);
        th.topContainer.addChild(circleContainer);
    })
}

DrugStore.prototype.setAnim = function(sprite, delayTime) {
    var th = this,
        spriteWidth = sprite.width,
        spriteHeight = sprite.height;

    new TweenMax.fromTo([sprite['_childShadow'], sprite], 1.5, 
        {
            ease: Power0.easeNone,
            y: sprite['_childShadow'].position.y - 5, 
            width: spriteWidth - 5,
            height: spriteHeight - 5
        },
        {
            ease: Power0.easeNone,
            y: sprite['_childShadow'].position.y + 5, 
            width: spriteWidth + 5,
            height: spriteHeight + 5
        }
    ).yoyo(true).repeat(-1).delay(delayTime);
}

DrugStore.prototype._moveStart = function() {
    var th = this;
    anim();

    function anim() {
        th.animId = requestAnimationFrame(anim);
        th.hand.circular = true;

        for (var i = 0; i < th.circlesArray.length; i++) {
            var c1 = th.circlesArray[i]['sprite'],
                c1W = c1.width,
                c1H = c1.height,
                parentSprite = c1['p'];
                
            c1.circular = true;

            var collision = th.b.circleRectangleCollision(c1, th.hand);

            for (var x = i + 1; x < th.circlesArray.length; x++) {
                var c2 = th.circlesArray[x]['sprite'];
                c2.circular = true;
                c1.circular = true;
                var _x = c1.getGlobalPosition().x,
                    _y = c1.getGlobalPosition().y;

                var t = th.b.movingCircleCollision(c2, c1);
            }

            if (collision) {
                new TweenMax.to(parentSprite.children[1], 0.4, {
                    ease: Power0.easeNone,
                    alpha: 0
                });
            } else {
                new TweenMax.to(parentSprite.children[1], 0.4, {
                    ease: Power0.easeNone,
                    alpha: 1
                });
            } 
            
            th.b.contain(c1, {x: 0, y: 0, width: th.app.renderer.width, height: th.app.renderer.height}, true, function(c) {
                th._moveBubble(c1, c, c1W, c1H);
            });

            parentSprite.x = c1.position.x;
            parentSprite.y = c1.position.y;
        }
    }
}

DrugStore.prototype._moveBubble = function(sprite, c, cW, cH) {
    var th = this,
        c1 = sprite,
        c1Top = c1.position.y,
        c1Left = c1.position.x,
        handH = th.hand.height,
        handW = th.hand.width,
        deltaX = 0,
        deltaY = 0,
        rendW = th.app.renderer.width,
        rendH = th.app.renderer.height;

    if (c.has('top') || c.has('bottom') ) {
        if (rendW / 2 <= c1.position.x) {
            deltaX = -handW - cW;
        } else {
            deltaX = handW + cW;
        }

        if (c.has('top')) {
            deltaY = handH + cH;
        } else {
            deltaY = -handH - cH;
        }
    } else if (c.has('left') || c.has('right') ) {
        if (rendH / 2 <= c1.position.y) {
            deltaY = -handH - cH;
        } else {
            deltaY = handH + cH;
        }

        if (c.has('left')) {
            deltaX = handW + cW;
        } else {
            deltaX = -handW - cW;
        }
    }

    new TweenMax.fromTo(c1, 0.4, 
        {
            ease: Power0.easeNone,
            y: c1Top,
            x: c1Left,
        },
        {
            ease: Power0.easeNone,
            y: c1Top + deltaY, 
            x: c1Left + deltaX,
        }
    ).yoyo(true).repeat(0);

    new TweenMax.fromTo([c1.scale, c1['p'].scale], 0.4, 
        {
            y: 0.3,
            x: 0.3
        },
        {
            ease: Power0.easeNone,
            y: 1, 
            x: 1
        }
    ).yoyo(true).repeat(0);
}

DrugStore.prototype._getScale = function(metric, persent) {
    var widthRelativelyWindow = this._getWidth(persent);

    return widthRelativelyWindow / metric;
}

DrugStore.prototype._getWidth = function(persent, coef) {
    var w = this.app.renderer.width,
        widthRelativelyWindow;

    if (coef) {
        widthRelativelyWindow = ((w - coef) * persent) / 100;
    } else {
        widthRelativelyWindow = (w * persent) / 100;
    }

    return widthRelativelyWindow;
}

DrugStore.prototype._getHeight = function(persent) {
    var winH = this.app.renderer.height,
        heightRelativelyWindow = (winH * persent) / 100;

    return heightRelativelyWindow;
}

DrugStore.prototype.reInit = function() {
    var th = this;
    th.circlesArray = [];
    th.clearTopContainer();
    th.topContainer.off('mousemove', th.handMove);
    th.topContainer.off('touchmove', th.handMove);
    th.topContainer.off('mousemove', th.cloudParalax);
    th.topContainer.off('mousemove', th.cloudParalax);
    th.app.stage.removeChild(th.topContainer);

    cancelAnimationFrame(th.animId);

    th.setup();
}

DrugStore.prototype.clearTopContainer = function() {
    var th = this;
    var arr = [];
    th.topContainer.children = [];
}

document.addEventListener('DOMContentLoaded', function() {
    var D = new DrugStore();
    D.init();
    
    PIXI.loader
    .add('/assets/img/drug-store/bg.jpg')
    .add('/assets/img/drug-store/hand.png')
    .add('/assets/img/drug-store/circles/bloger.png')
    .add('/assets/img/drug-store/circles/boots.png')
    .add('/assets/img/drug-store/circles/car.png')
    .add('/assets/img/drug-store/circles/figure.png')
    .add('/assets/img/drug-store/circles/figureMan.png')
    .add('/assets/img/drug-store/circles/flat.png')
    .add('/assets/img/drug-store/circles/friends.png')
    .add('/assets/img/drug-store/circles/love2.png')
    .add('/assets/img/drug-store/circles/wedding.png')
    .add('/assets/img/drug-store/circles/mobile.png')
    .add('/assets/img/drug-store/circles/parashut.png')
    .add('/assets/img/drug-store/circles/star.png')
    .add('/assets/img/drug-store/circles/travel.png')
    .add('/assets/img/drug-store/circles/visa.png')
    .add('/assets/img/drug-store/other/fly-man.png')
    .add('/assets/img/drug-store/other/fly-man2.png')
    .add('/assets/img/drug-store/other/fly-wooman.png')
    .add('/assets/img/drug-store/other/fly-wooman2.png')
    .add('/assets/img/drug-store/clouds/cloudCenter.png')
    .add('/assets/img/drug-store/clouds/cloudBig.png')
    .add('/assets/fonts/Montserrat/Montserrat-Medium.ttf')
    .load(D.setup.bind(D))
});

$(window).on('load', function() {
    $(window).trigger('start')
})