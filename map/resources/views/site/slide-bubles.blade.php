<?php

$lang = app()->getLocale();
$body_class = $model->alias ?? '';

?>
@extends('layouts.site')

@section('title',$model->seo_title)
@section('styles')
    @parent
    <meta name="viewport" content="width=device-width, initial-scale=1.0001, minimum-scale=1.0001, maximum-scale=1.0001, user-scalable=no">
    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sliderCanvas.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/resize.css')}}">
@endsection

@section('body')
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
    <div class="preloader">
        <div class="preloader-inner">
            <?php include "assets/img/svg/about/preloader-inner.svg" ?>
        </div>
    </div>
    <div class="modal modal-bb">
        <div class="modal__inner">
            <div class="modal__icons">
                <div class="modal__icon wh-hand">
                    <?php include('assets/img/svg/slide-bubles/wh_hand.svg') ?>
                </div>
                <div class="modal__icon bb-click">
                    <?php include('assets/img/svg/slide-bubles/bb_click.svg') ?>
                </div>
                <div class="modal__icon bb-bubles">
                    <div class="bb-buble bb-buble__1 yellow">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-1.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__2 yellow">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-2.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__3 yellow">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-3.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__4 yellow">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-4.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__5 pink">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-5.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__6 pink">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-6.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__7 pink">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-7.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__8 pink">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-8.svg') ?>
                    </div>
                    <div class="bb-buble bb-buble__9 pink">
                        <?php include('assets/img/svg/slide-bubles/bb-buble-9.svg') ?>
                    </div>
                </div>
            </div>
            <div class="modal__text"><p>{!! $model->{'modal_text_'.$lang} !!}</p></div>
            <button class="modal__btn">{!! $model->{'modal_btn_'.$lang} !!}</button>
        </div>
    </div>

    <nav class="game-icons slider-controls slide-2">
        <a href="<?= $prev['alias'] ?? '/aids'?> " class="str str-prev">
            <?php include('assets/img/svg/slide-bubles/str_prev.svg') ?>
        </a>
        <a href="<?= $next['alias'] ?? '/slide-rocket'?>" class="str str-next">
            <?php include('assets/img/svg/slide-bubles/str_next.svg') ?>
        </a>
        <div class="bullets">
            <?php include('assets/img/svg/slide-bubles/bullets.svg') ?>
        </div>
    </nav>
    <div class="main-scene full">
        <div id="bubles-container"></div>
        <div class="games-wrapper">
            <div class="games full bubbles">
                <h1 class="neon-blue bubbles-title">
                    <span>{!! $model->title !!}</span>
                    <span class="went-wrong">{!! $model->{'wrong_'.$lang} !!}</span>
                </h1>
                <div class="game game4 full js-game4" id="game4">
                    <div class="game-wrap full">
                    </div>
                </div>
                <div class="game game5 full js-game5" id="game5">
                    <div class="game-wrap full"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        var bubles = [
            {name: 'bloger', text:'{{Lang::get('bubles.bloger')}}' },
            {name: 'boots', text:'{{Lang::get('bubles.boots')}}' },
            {name: 'car', text:'{{Lang::get('bubles.car')}}' },
            {name: 'figure', text:'{{Lang::get('bubles.figure')}}' },
            {name: 'figureMan', text:'{{Lang::get('bubles.figureMan')}}' },
            {name: 'flat', text:'{{Lang::get('bubles.flat')}}' },
            {name: 'friends', text:'{{Lang::get('bubles.friends')}}' },
            {name: 'love2', text:'{{Lang::get('bubles.love2')}}' },
            {name: 'wedding', text:'{{Lang::get('bubles.wedding')}}' },
            {name: 'mobile', text:'{{Lang::get('bubles.mobile')}}' },
            {name: 'parashut', text:'{{Lang::get('bubles.parashut')}}' },
            {name: 'star', text:'{{Lang::get('bubles.star')}}' },
            {name: 'travel', text:'{{Lang::get('bubles.travel')}}' },
            {name: 'visa', text:'{{Lang::get('bubles.visa')}}' }
        ];
    </script>
    <script src="{{asset('assets/js/libs/pixi.js')}}"></script>
    <script src="{{asset('assets/js/libs/bump.js')}}"></script>
    <script src="{{asset('assets/js/libs/tweenMax.js')}}"></script>
    <script src="{{asset('assets/js/libs/CSSPlugin.min.js')}}"></script>
    <script src="{{asset('assets/js/libs/spriteUtilities.js')}}"></script>
    <script src="{{asset('assets/js/bubles.js')}}"></script>
@endsection