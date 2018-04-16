<?php

/**
 * @var \App\Models\StaticPage $model
 */
$lang = app()->getLocale();
$body_class = $model->alias ?? '';

?>
@extends('layouts.site')

@section('title',$model->seo_title)
<meta name="apple-mobile-web-app-capable"
      content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"/>
@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('assets/css/main_about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bandit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/resize.css')}}">

@endsection

@section('body')
    <div class="preloader">
        <div class="preloader-inner">
            <?php include "assets/img/svg/about/preloader-inner.svg" ?>
        </div>
    </div>
    <div class="landscape">
        <div class="landscape-inner">
            <div class="landscape-icon">
                <div class="landscape-icon__condom_fill"></div>
                <div class="landscape-icon__condom_stroke"></div>
                <div class="landscape-icon__condom_arrow"></div>
            </div>

            <h5 class="landscape-title">@lang('site.landscape_title')</h5>
            <p class="landscape-desc">@lang('site.landscape_desc')</p>
        </div>
    </div>

    <div class="modal modal-band">
        <div class="modal__inner">
            <div class="modal__icons">
                <div class="modal__icon wh-hand">
                    <?php include 'assets/img/svg/bandit/wh-hand.svg'?>
                </div>
                <div class="modal__icon band-start">
                    <?php include 'assets/img/svg/bandit/band-start.svg'?>
                </div>
            </div>
            <div class="modal__text">{!! $model->{'modal_text_'.$lang} !!}</div>
            <button class="modal__btn">{!! $model->{'modal_btn_'.$lang} !!}</button>
        </div>
    </div>


    <div class="main-scene full bandit">
        <div class="games-wrapper">
            <div class="games full">
                <div class="game game2 full js-game2" id="game2">
                    <div class="game-wrap full">
                        <h1><span>{!! $model->title_mod !!}</span></h1>
                        <div class="container-game">
                            <a href="{{route('condoms')}}">
                                <div class="rocket-btn-wrap">
                                    <div class="door-wrap">
                                        <img src="{{asset('assets/img/bandit/door.png')}}" alt="">
                                        <img src="{{asset('assets/img/bandit/d_h.png')}}" alt="">
                                    </div>
                                    <button class="rocket-btn">{!! $model->{'rocket_btn_'.$lang} !!}</button>
                                </div>
                            </a>
                            <div class="rotator-game">
                                <div class="head-rotator">
                                    <span>{!! $model->{'rotator1_'.$lang} !!}</span>
                                    <span>{!! $model->{'rotator2_'.$lang} !!}</span>
                                    <span>{!! $model->{'rotator3_'.$lang} !!}</span>
                                    <span>{!! $model->{'rotator4_'.$lang} !!}</span>
                                </div>

                                <div class="spins-wrap ">
                                    <div class="rotator-row-line1 before"></div>
                                    <div class="rotator-row-line2 before"></div>
                                    <div class="rotator-row-line3 before"></div>
                                    <div class="rotator-row-wrap rotator-row1 resizeEl" id="spiner1">
                                        <div class="spin spin1 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin2 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin3 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin4 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin5 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-863"></div>
                                        </div>
                                        <div class="spin spin6 resizeEl" data-t-o="-450">
                                            <div class="spin-bg resizeEl" data-t-o="-450"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-1072"></div>
                                        </div>
                                        <div class="spin spin7 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin8 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin9 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin10 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin11 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin12 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                    </div>
                                    <!--Spin 2-->
                                    <div class="rotator-row-wrap rotator-row2 resizeEl" id="spiner2">
                                        <div class="spin spin1 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin2 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin3 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin4 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin5 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-863"></div>
                                        </div>
                                        <div class="spin spin6 resizeEl" data-t-o="-450">
                                            <div class="spin-bg resizeEl" data-t-o="-450"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-1072"></div>
                                        </div>
                                        <div class="spin spin7 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin8 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin9 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin10 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin11 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin12 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                    </div>
                                    <!--Spin 3-->
                                    <div class="rotator-row-wrap rotator-row3 resizeEl" id="spiner3">
                                        <div class="spin spin1 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin2 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin3 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin4 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin5 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-863"></div>
                                        </div>
                                        <div class="spin spin6 resizeEl" data-t-o="-450">
                                            <div class="spin-bg resizeEl" data-t-o="-450"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-1072"></div>
                                        </div>
                                        <div class="spin spin7 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin8 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin9 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin10 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin11 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin12 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                    </div>
                                    <!--Spin 4-->
                                    <div class="rotator-row-wrap rotator-row4 resizeEl" id="spiner4">
                                        <div class="spin spin1 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin2 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin3 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin4 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin5 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-863"></div>
                                        </div>
                                        <div class="spin spin6 resizeEl" data-t-o="-450">
                                            <div class="spin-bg resizeEl" data-t-o="-450"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-1072"></div>
                                        </div>
                                        <div class="spin spin7 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin8 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-4"></div>
                                        </div>
                                        <div class="spin spin9 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-220"></div>
                                        </div>
                                        <div class="spin spin10 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-436"></div>
                                        </div>
                                        <div class="spin spin11 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                        <div class="spin spin12 resizeEl" data-t-o="-450">
                                            <div class="spin-bg"></div>
                                            <div class="spin-image resizeEl" data-bg-w="637" data-bg-h="1250" data-bg-x="0" data-bg-y="-650"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--MEN-->
                            <div class="men-right">
                                <div class="men-wrap">
                                    <div class="men-on-off">
                                    </div>
                                    <div class="men-turn-on-off">
                                        <div class="men-turn-on-off-content" data-on="{!! $model->{'tumb_on_off_'.$lang}[0] !!}" data-off="{!! $model->{'tumb_on_off_'.$lang}[1] !!}">
                                            <div><span class="turn-on-off">{!! $model->{'tumb_on_off_'.$lang}[0] !!}</span><br/>{!! $model->{'tumb_on_off_'.$lang}[2] !!}</div>
                                            <div class="turn"></div>
                                        </div>
                                    </div>
                                    <div class="lightning-s">
                                        <img src="{{asset('assets/img/bandit/men/lightnings1.png')}}">
                                        <img src="{{asset('assets/img/bandit/men/lightnings2.png')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="game-shine"></div>-->
                </div>
            </div>
        </div>
    </div>
    <nav class="game-icons slider-controls slide-5">
        <a class="str str-prev">
            <?php include 'assets/img/svg/bandit/str-prev.svg'?>
        </a>
        <a class="str str-next">
            <?php include 'assets/img/svg/bandit/str-next.svg'?>
        </a>
        <div class="bullets">
            <?php include 'assets/img/svg/bandit/bullets.svg'?>
        </div>
    </nav>
    <div class="pusk">
        <div class="img-line">
            <img src="{{asset('assets/img/bandit/line-top.png')}}" alt="">
        </div>
        <div class="pusk-btn resizeEl" data-bg-w="110" data-bg-h="1116"></div>
    </div>
@endsection

@section('scripts')
    @parent/
    <script src="{{asset('assets/js/libs/detect.min.js')}}"></script>
    <script src="{{asset('assets/js/main22.js')}}"></script>

@endsection