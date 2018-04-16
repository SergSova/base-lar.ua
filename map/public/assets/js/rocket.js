function Rocket() {
    var th = this;
    th.canvasContainer = document.querySelector('#rocket-container');
    th.canvasContainerWidth = window.innerWidth || window.clientWidth;
    th.canvasContainerHeight = window.innerHeight || window.clientHeight;
    th.app = new PIXI.Application(th.canvasContainerWidth, th.canvasContainerHeight);
    th.topContainer = new PIXI.Container();
    th.aboutTextContainer = new PIXI.Container();
    th.angleSprite;
    th.planetLilacSprite;
    th.planetOrangecSprite;
    th.planetHeir;
    th.planetHat;
    th.planetQueen;
    th.predmetSoska;
    th.predmetHeart;
    th.bgSprite;
    th.titleText;
    th.b = new Bump(PIXI);
    th.planets = [];
    th.su = new SpriteUtilities(PIXI);
    th.rocketInit = true;
    th.p = new PIXI.Graphics();
    th.rockets = [];
    th.prevDirection;
    th.rocketContainer;
    th._spaceHandler;
    th.predmetRock;
    th.animId;
    th.firstCollision = false;
    
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

Rocket.prototype.init = function() {
    this.canvasContainer.appendChild(this.app.view);
}

Rocket.prototype.mobileAndTabletcheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  
  return check;
};

Rocket.prototype.checkWindowTabIsActive = function() {
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
                    th.destroy();
                } else {
                    th.setup();
                }
            })
        })();
}

Rocket.prototype.setup = function() {
    var th = this;
    th.app.stage.addChild(this.topContainer);

    document.querySelector('h1').classList.add('load');
    
    th._addSpriteWithClone([
        ['bgSprite', '/assets/img/planets/bg.jpg'],
        ['angleSprite', '/assets/img/planets/angle.png'],
        ['planetLilacSprite', '/assets/img/planets/planetLilac.png', true],
        ['planetOrangecSprite', '/assets/img/planets/planetOrange.png', true],
        ['planetHeir', '/assets/img/planets/planetHeir.png', true],
        ['planetHat', '/assets/img/planets/planetHat.png', true],
        ['planetQueen', '/assets/img/planets/planetQueen.png', true],
        ['predmetSoska', '/assets/img/predmets/soska.png'],
        ['predmetHeart', '/assets/img/predmets/heart.png'],
        ['predmetPomada', '/assets/img/predmets/pomada.png'],
        ['predmetRock', '/assets/img/predmets/rock.png']
    ]);

    // th.titleText = new PIXI.Text('где припаркуется\nтвоя ракета\nсегодня', {
    //     font: '36px Montserrat-Medium',
    //     fill: 'white',
    //     align : 'center'
    // });
    // th.topContainer.addChild(th.titleText);

    th._setMetrics();
    th._createRocket();
    th._rocketStart();
    th.topContainer.interactive = true;

    var _parallaxSpeed = .01;
    var _currentX = '';
    var _currentY = '';

    if (th.app.renderer.width > 1400) {
            th.topContainer.on('mousemove', function(e) {
                if (_currentX == '') _currentX = e.data.global.x;
                var deltaX = e.data.global.x - _currentX;
                _currentX = e.data.global.x;

                if(_currentY == '') _currentY = e.data.global.y;
                var deltaY = e.data.global.y - _currentY;
                _currentY = e.data.global.y; 

                [th.predmetSoska, th.predmetHeart, th.predmetPomada].forEach(function(i, index) {
                    i.position.x -= (index + 1) * (deltaX * _parallaxSpeed);
                    i.position.y -= (index + 1) * (deltaY * _parallaxSpeed);
                })
            });
    }
}

Rocket.prototype._addSpriteWithClone = function(objects) {
    var th = this;

    objects.forEach(function(elem) {
        th[elem[0]] = new PIXI.Sprite(PIXI.loader.resources[elem[1]].texture);
        th.topContainer.addChild(th[elem[0]]);

        if (elem[2]) {
            th[elem[0]]['clone'] = th._createClone(th[elem[0]]);
        }
    })
}

Rocket.prototype._setMetrics = function() {
    var th = this,
        offsetR = 0;
    th.canvasContainerWidth = window.innerWidth;
    th.canvasContainerHeight = window.innerHeight - 3;
    th.app.renderer.resize(th.canvasContainerWidth, th.canvasContainerHeight);

    if (th.canvasContainerWidth <= 900) {
        offsetR = 30;
    }

    th.bgSprite.width = th.canvasContainerWidth;
    th.bgSprite.height = th.canvasContainerHeight;

    th.angleSprite.scale.set(th._getScale(th.angleSprite.width, 9));
    th.angleSprite.x = th._getWidth(9, offsetR);
    th.angleSprite.y = th.app.renderer.height - 83 - th.angleSprite.height;

    th.planetLilacSprite.scale.set(th._getScale(th.planetLilacSprite.width, 13));
    th.planetLilacSprite.x = th._getWidth(61, offsetR);
    th.planetLilacSprite.y = th._getHeight(66);
    th._setMetricClone(th.planetLilacSprite, 0.55, 0.75);

    th.planetOrangecSprite.scale.set(th._getScale(th.planetOrangecSprite.width, 13));
    th.planetOrangecSprite.x = th._getWidth(43, offsetR);
    th.planetOrangecSprite.y = th._getHeight(25);
    th._setMetricClone(th.planetOrangecSprite, 0.5, 0.75);

    th.planetHeir.scale.set(th._getScale(th.planetHeir.width, 13));
    th.planetHeir.x = th._getWidth(12, offsetR);
    th.planetHeir.y = th._getHeight(16);
    th._setMetricClone(th.planetHeir, 0.66, 0.75);

    th.planetHat.scale.set(th._getScale(th.planetHat.width, 13));
    th.planetHat.x = th._getWidth(72, offsetR);
    th.planetHat.y = th._getHeight(8);
    th._setMetricClone(th.planetHat, 0.7, 0.75);
    
    th.planetQueen.scale.set(th._getScale(th.planetQueen.width, 13));
    th.planetQueen.x = th._getWidth(79, offsetR);
    th.planetQueen.y = th._getHeight(42);
    th._setMetricClone(th.planetQueen, 0.65, 0.76);

    th.predmetSoska.scale.set(th._getScale(th.predmetSoska.width, 4));
    th.predmetSoska.x = th._getWidth(29, offsetR);
    th.predmetSoska.y = th._getHeight(8);

    th.predmetHeart.scale.set(th._getScale(th.predmetHeart.width, 3));
    th.predmetHeart.x = th._getWidth(25, offsetR);
    th.predmetHeart.y = th._getHeight(46);

    th.predmetRock.scale.set(th._getScale(th.predmetRock.width, 17));
    th.predmetRock.x = th._getWidth(57, offsetR);
    th.predmetRock.y = th._getHeight(44);

    th.predmetPomada.x = th._getWidth(84, offsetR);
    th.predmetPomada.y = th._getHeight(25);

    // th.titleText.x = (th.app.renderer.width / 2) - (th.titleText.width / 2);
    // th.titleText.y = (th.app.renderer.height / 2) - (th.titleText.height / 2);

    [th.planetLilacSprite, th.planetHeir, th.planetHat, th.planetQueen, th.planetOrangecSprite].forEach(function(sprite, i) {
        var delay = i / 2;
        new TweenMax.fromTo([sprite, sprite['clone']], 1.5, 
            {
                ease: Power0.easeNone,
                y: sprite.position.y - 10, 
            },
            {
                ease: Power0.easeNone,
                y: sprite.position.y + 10, 
            },
        ).yoyo(true).repeat(-1).delay(delay).play()
        
    })
}

Rocket.prototype._setMetricClone = function (sprite, persentW, persentH) {
    var clone = sprite['clone'],
        widthClone = sprite.width * persentW,
        heightClone = sprite.height * persentH;
    
    clone.width = widthClone;
    clone.height = heightClone;
    clone.x = sprite.position.x + (sprite.width - widthClone) / 2; 
    clone.y = sprite.position.y + (sprite.height - heightClone) / 2;
}

Rocket.prototype._createRocket = function() {
    var th = this;
    var rocketTween, rocketTweenScale;
    th.rocketContainer = new PIXI.Container();
    var rocketSprite = new PIXI.Sprite(PIXI.loader.resources['/assets/img/planets/rocket2.png'].texture);

    rocketSprite.x = 0;
    th.rocketContainer.addChild(rocketSprite);

    this.p.beginFill(0x000000); //
    //this.p.drawRect(0, 0, 25, 25);
    this.p.drawCircle(0, 0, 5);
    this.p.endFill(); //
    var rocketPointer = new PIXI.Sprite(this.p.generateCanvasTexture());
    rocketPointer.x = rocketSprite.width;
    rocketPointer.y = (rocketSprite.height / 2) - 2.5;
    rocketPointer.alpha = 0;
    th.rocketContainer.addChild(rocketPointer);

    var rocketFireTexture = th.su.filmstrip('/assets/img/planets/rocket-fire2.png', 258, 118);
    var rocketFire = new PIXI.extras.MovieClip(rocketFireTexture);
    rocketFire.width = 158;
    rocketFire.height = 118;
    rocketFire.anchor = { x: 0, y: 0 };
    rocketFire.position.x -= rocketFire.width -20;
    rocketFire.position.y -= rocketSprite.height - 5;
    rocketFire.play();
    rocketFire.animationSpeed = 0.4;
    rocketFire.alpha = 0;
    th.rocketContainer.addChild(rocketFire);
    th._setRocketMetrics();

    var scaleRocketAnimId, 
        scaleRocket = th.rocketContainer.scale._x,
        scaleRocketStart = 0;

    if (window.innerWidth < 768) {
        document.querySelector('.rocket-btn-wrap').style.left = th.angleSprite.x + 'px';
    }

    scaleAction();
    function scaleAction() {
        scaleRocketStart += 0.03;
        
        if (scaleRocketStart <= scaleRocket) {
            th.rocketContainer.scale.set(scaleRocketStart);
            scaleRocketAnimId = requestAnimationFrame(scaleAction);
        } else {
            cancelAnimationFrame(scaleRocketAnimId);
            th.rocketContainer.scale.set(scaleRocket);
            rocketTween = new TweenMax.to(th.rocketContainer, 1, {
                ease: Power0.easeNone,
                rotation: 0
            }).repeat(-1).yoyo(true);
        }
    }    
    th._spaceHandler = spaceHandler;
    window.addEventListener('keydown', th._spaceHandler);
    document.querySelector('.rocket-btn').addEventListener('click', th._spaceHandler);

    function spaceHandler(e) {
        if (( e.keyCode === 32 ) || (e.type == 'click')) {
            rocketTween.pause();
            rocketFire.alpha = 1;
            window.removeEventListener('keydown', th._spaceHandler);
            document.querySelector('.rocket-btn')
              .removeEventListener('click', th._spaceHandler)
            document.querySelector('.rocket-btn').classList.add('hover');
            
              setTimeout(function() {
                document.querySelector('.rocket-btn').classList.remove('hover');
              }, 500);
            th.prevDirection = null;

            

            setTimeout(function() {
                th.rockets.push(th.rocketContainer);
                th.rocketContainer.pivot.x = th.rocketContainer.width / 2;
                th._moveElem(th.rocketContainer, th.rocketContainer.width / 2);
            }, 600);
        }
    }

    th.topContainer.addChild(th.rocketContainer);
}

Rocket.prototype._setRocketMetrics = function() {
    var th = this,
        scale = th._getScale(th.rocketContainer.width, 15);
    th.rocketContainer.scale.set(scale);
    th.rocketContainer['start_scale'] = scale;
    th.rocketContainer.pivot.x = 0;
    th.rocketContainer.pivot.y = th.rocketContainer.children[0].height / 2;
    
    th.rocketContainer.rotation = -1.6;
    //rocketContainer.rotation = -0.8;
    th.rocketContainer.x = th.angleSprite.position.x + ((th.angleSprite.width * 13) / 100);
    th.rocketContainer.y = th.angleSprite.position.y + th.angleSprite.height - ((th.angleSprite.width * 13) / 100);
}

Rocket.prototype._rocketStart = function() {
    var th = this;
    var speed = this.app.renderer.width * 0.007;
    var scale = 1;

    anim();
    function anim() {
        th.animId = requestAnimationFrame(anim);
        var newArr = [];
        var collision;

        for (var x = 0; x < th.rockets.length; x++) {
            for (var i = 0; i < th.planets.length; i++) {
                if (th.rockets[x].children[1]) {
                    
                    var _x = th.rockets[x].children[1].getGlobalPosition().x - th.rockets[x].children[1].width / 2;
                    var _y = th.rockets[x].children[1].getGlobalPosition().y - th.rockets[x].children[1].height / 2;
                    collision = th.b.hit({x: _x, y: _y}, th.planets[i])

                    if (collision) {  
                        if (!th.firstCollision) {
                            var h1 = document.querySelector('h1');

                            h1.classList.remove('load');

                            setTimeout(function() {
                                h1.classList.add('active');
                                h1.classList.add('load');
                            }, 1000);
                        }

                        var collisionDirection = th.getCollisionPlace({x: _x, y: _y}, th.planets[i]);
                        new TweenMax.fromTo(th.planets[i]['p'], 0.1, 
                            {
                                x: th.planets[i]['p'].position.x - 3, 
                            },
                            {
                                ease: Power2.easeOut,
                                x: th.planets[i]['p'].position.x + 3, 
                            }
                        ).yoyo(true).repeat(2).play();

                        switch (collisionDirection) {
                            case "topLeft":
                                if (th.prevDirection == 'fromTop') {
                                    th.rockets[x].rotation += 1.7;
                                    th.prevDirection = 'fromBottom';
                                } else {
                                    th.rockets[x].rotation -= 1.7;
                                    th.prevDirection = 'fromTop';
                                }
                                break;
                            case "topRight":
                                if (th.prevDirection == 'fromTop') {
                                    th.rockets[x].rotation -= 1.7;
                                    th.prevDirection = 'fromBottom';
                                } else {
                                    th.rockets[x].rotation += 1.7;
                                    th.prevDirection = 'fromTop';
                                }
                                break;
                            case "bottomLeft":
                                if (!th.prevDirection) {
                                    if (th.rockets[x].rotation < -1) {
                                        th.rockets[x].rotation -= 1.7;
                                    } else {
                                        th.rockets[x].rotation += 1.7;
                                    }

                                    th.prevDirection = 'fromTop';
                                } else if (th.prevDirection == 'fromTop') {
                                    th.rockets[x].rotation -= 1.7;
                                    th.prevDirection = 'fromBottom';
                                } else {
                                    th.rockets[x].rotation += 1.7;
                                    th.prevDirection = 'fromTop';
                                }
                                break;
                            case "bottomRight":
                                if (th.prevDirection == 'fromTop') {
                                    th.rockets[x].rotation -= 1.7;
                                    th.prevDirection = 'fromBottom';
                                } else {
                                    th.rockets[x].rotation += 1.7;
                                    th.prevDirection = 'fromTop';
                                }
                                break;
                            default:
                                th.rockets[x].rotation -= 1.7;
                                break;
                        }
                    }
                }
            }


            th._moveElem(th.rockets[x], speed);

            if (th.rocketContainer.scale._x >= (th.rocketContainer['start_scale'] - 0.15)) {
                var s = th.rocketContainer['start_scale'] - ((th.rockets[x].x / th.app.renderer.width) / 3);
                th.rocketContainer.scale.set(s);
            } 
            
            if ((th.rockets[x].position.x <= 0 ) || (th.rockets[x].position.x >= th.app.renderer.width) || (th.rockets[x].position.y >= th.app.renderer.height) || (th.rockets[x].position.y <= 0))  {
                th.topContainer.removeChild(th.rockets[x]);
                th._createRocket();
            } else {
                newArr.push(th.rockets[x]);
            }        
        }

        th.rockets = newArr;
    }
}

Rocket.prototype._moveElem = function(elem, speed) {
    elem.x += Math.cos(elem.rotation) * speed;
    elem.y += Math.sin(elem.rotation) * speed;
}

Rocket.prototype.getCollisionPlace = function(position, static) {
    var staticHeight = static.height,
        staticWidth = static.width,
        staticTop = static.getGlobalPosition().y,
        staticBottom = staticTop + staticHeight,
        staticAxiosHorizontal = staticTop + staticHeight / 2,
        staticLeft = static.getGlobalPosition().x,
        staticRight = staticLeft + staticWidth,
        staticAxiosVertical = staticLeft + staticWidth / 2,
        collision;
    
    if (position.y <= staticAxiosHorizontal) {
        collision = 'top';

        if (position.x <= staticAxiosVertical) {
            collision = 'topLeft';
        } else {
            collision = 'topRight';
        }
    } else {
        collision = 'bottom';

        if (position.x <= staticAxiosVertical) {
            collision = 'bottomLeft';
        } else {
            collision = 'bottomRight';
        }
    }

    return collision;
}

Rocket.prototype._createClone = function (sprite) {
    var p = new PIXI.Graphics();
    //p.beginFill(0x000000);
    p.drawCircle(0, 0, (sprite.width / 2));
    p.endFill();
    var spriteShadow = new PIXI.Sprite(p.generateCanvasTexture());
    spriteShadow['p'] = sprite;
    spriteShadow.rotation = 0;
    this.topContainer.addChild(spriteShadow);
    this.planets.push(spriteShadow);

    return spriteShadow;
}

Rocket.prototype._getScale = function(metric, persent) {
    var widthRelativelyWindow = this._getWidth(persent);

    return widthRelativelyWindow / metric;
}

Rocket.prototype._getWidth = function(persent, coef) {
    var w = this.app.renderer.width,
        widthRelativelyWindow;

    if (coef) {
        widthRelativelyWindow = ((w - coef) * persent) / 100;
    } else {
        widthRelativelyWindow = (w * persent) / 100;
    }

    return widthRelativelyWindow;
}

Rocket.prototype._getHeight = function(persent) {
    var winH = this.app.renderer.height,
        heightRelativelyWindow = (winH * persent) / 100;

    return heightRelativelyWindow;
}

Rocket.prototype.destroy = function() {
    var th = this;

    th.clearTopContainer();
    th.app.stage.removeChild(th.topContainer);
    window.removeEventListener('keydown', th._spaceHandler);
    document.querySelector('.rocket-btn').removeEventListener('click', th._spaceHandler);
    th.rockets = [];
    th.planets = [];
    cancelAnimationFrame(th.animId);
}

Rocket.prototype.reInit = function() {
    var th = this;
    
    th.destroy();
    th.setup();
}

Rocket.prototype.clearTopContainer = function() {
    var th = this;
    var arr = [];

    th.topContainer.children = [];
}

document.addEventListener('DOMContentLoaded', function() {
    var R = new Rocket();
    R.init();
    
    PIXI.loader
    .add('/assets/img/planets/bg.jpg')
    .add('/assets/img/planets/angle.png')
    .add('/assets/img/planets/rocket2.png')
    .add('/assets/img/planets/planetLilac.png')
    .add('/assets/img/planets/planetOrange.png')
    .add('/assets/img/planets/planetHeir.png')
    .add('/assets/img/planets/planetHat.png')
    .add('/assets/img/planets/planetQueen.png')
    .add('/assets/img/predmets/soska.png')
    .add('/assets/img/predmets/heart.png')
    .add('/assets/img/predmets/pomada.png')
    .add('/assets/img/planets/rocket-fire2.png')
    .add('/assets/img/predmets/rock.png')
    .add("/assets/fonts/Montserrat/Montserrat-Medium.ttf")
    .load(R.setup.bind(R))

    document.querySelector('.rocket-btn').addEventListener('mouseenter', function() {
        this.classList.add('hover');
    })

    document.querySelector('.rocket-btn').addEventListener('mouseleave', function() {
        this.classList.remove('hover');
    });

    var btnWrap = document.querySelector('.rocket-btn-wrap'),
        btn = btnWrap.querySelector('.rocket-btn'),
        btnOffsetL = btn.getBoundingClientRect().left,
        btnWrapOffsetL = btnWrap.getBoundingClientRect().left,
        delta = btnOffsetL + btn.offsetWidth / 2 - btnWrapOffsetL;
    btnWrap.style.left = (btnWrapOffsetL - delta) + 'px';
});

//window.addEventListener('resize', initSlide);

function initSlide() {
    //if (window.screen.orientation.type == 'landscape-primary') {
       // window.removeEventListener('resize', initSlide);
        var R = new Rocket();
        R.init();
        
        PIXI.loader
        .add('/assets/img/planets/bg.jpg')
        .add('/assets/img/planets/angle.png')
        .add('/assets/img/planets/rocket2.png')
        .add('/assets/img/planets/planetLilac.png')
        .add('/assets/img/planets/planetOrange.png')
        .add('/assets/img/planets/planetHeir.png')
        .add('/assets/img/planets/planetHat.png')
        .add('/assets/img/planets/planetQueen.png')
        .add('/assets/img/predmets/soska.png')
        .add('/assets/img/predmets/heart.png')
        .add('/assets/img/predmets/pomada.png')
        .add('/assets/img/planets/rocket-fire2.png')
        .add('/assets/img/predmets/rock.png')
        .add("/assets/fonts/Montserrat/Montserrat-Medium.ttf")
        .load(R.setup.bind(R))

        document.querySelector('.rocket-btn').addEventListener('mouseenter', function() {
            this.classList.add('hover');
        })

        document.querySelector('.rocket-btn').addEventListener('mouseleave', function() {
            this.classList.remove('hover');
        });

        var btnWrap = document.querySelector('.rocket-btn-wrap'),
            btn = btnWrap.querySelector('.rocket-btn'),
            btnOffsetL = btn.getBoundingClientRect().left,
            btnWrapOffsetL = btnWrap.getBoundingClientRect().left,
            delta = btnOffsetL + btn.offsetWidth / 2 - btnWrapOffsetL;
        btnWrap.style.left = (btnWrapOffsetL - delta) + 'px';
    //} 
}