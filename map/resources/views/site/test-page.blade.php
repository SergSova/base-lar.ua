<?php

/**
 * @var \App\Models\StaticPage $model
 */

$lang = app()->getLocale();
$body_class = $model->alias??'';

?>
@extends('layouts.site')

@section('title',$model->seo_title)

@section('styles')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/rangeslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/test_main.css')}}">
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
    <main class="content test-section test-video-fix">
        <div class="content-section">

            <div class="test__left-box">
                <div class="main-caption clip-fix">{{$model->title}}</div>

                <div class="test__questions-wrap">

                    <div class="test__preview-box">
                        <div class="text">
                            {!! $model->description !!}
                            <button class="test__preview-box-btn">{{$model->{'test_btn_'.$lang} }}</button>
                        </div>
                        <div class="text mobile-text">
                            {!! $model->{'short_description_'.app()->getLocale()} !!}
                            <button class="test__preview-box-btn">{{$model->{'test_btn_'.$lang} }}</button>
                        </div>
                    </div>

                    <form class="questions">
                        <div class="questions-wrap"></div>

                        <button type="submit" class="js-questions-next test__test-btn none">{{$model->{'test_btn_next_'.$lang} }}</button>

                        <button class="test__test-btn js-questions-refresh test__test-btn-refresh none">{{$model->{'test_btn_refresh_'.$lang} }}</button>
                    </form>
                </div>
            </div>

            <div class="test-content">
                <!-- <h3 class="test-content__heading">
                    <span>{{$model->{'longtitle_'.$lang} }}</span>
                </h3> -->

                <div class="test-content_tv-box">
                    <div class="test-content_tv-wrap">
                        <div class="test-content_tv-channels">
                            <img class="test-default-tv" src="{{asset('assets/img/aids-test/test-default-tv.gif')}}" alt="">
                            <video class="test-default-tv test-default-tv_iframe" src="{{asset('assets/video/noise.mp4')}}" loop="loop" playsinline></video>
                            <audio class="test-noize-audio" style="display: none;" src="{{asset('assets/video/noise-audio.mp3')}}" loop></audio>

                            <img src="{{asset('assets/img/aids-test/test-tv-tv-stand.png')}}" alt="">
                        </div>
                        <div class="test-content_tv_togglers-wrap">
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                            <div class="test-content_tv_toggler-item"></div>
                        </div>
                        <div class="tv-volume">
                            <div class="sound">
                                <div class="sound--icon fa fa-volume-off"></div>
                                <div class="sound-wave__wrapper">
                                    <div class="sound--wave sound--wave_one"></div>
                                    <div class="sound--wave sound--wave_two"></div>
                                </div>
                            </div>
                            <div>
                                <input type="range" min="0" val="0.2" max="1" step="0.1" data-rangeslider>
                                <output></output>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <img class="test-bottom-shadow" src="{{asset('assets/img/aids-test/test-bottom-shadow.png')}}" alt="">
            @include('site.chanks.navigate_box')
        </div>
    </main>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('assets/js/libs/wheel-indicator.js')}}"></script>
    <script src="{{asset('assets/js/libs/rangeslider.js')}}"></script>
    <script>
        var QUESTIONS = {!! json_encode($model->{'Quest_'.$lang},JSON_UNESCAPED_UNICODE) !!};
        var totals = {!!  json_encode($model->{'Answer_'.$lang},JSON_UNESCAPED_UNICODE) !!} ;
    </script>
    <script src="{{asset('assets/js/test_main.js')}}"></script>
@endsection