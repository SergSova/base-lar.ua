<?php

$lang = app()->getLocale();
$body_class = $model->alias??'';

?>

@extends('layouts.site')

@section('title',$model->seo_title)

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/with-who.css')}}">
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
    <div class="modal modal-wh">
        <div class="modal__inner">
            <div class="modal__icons">
                <div class="modal__icon wh-hand">
                    <?php include "assets/img/svg/with-who/wh-hand.svg"?>
                </div>
                <div class="modal__icon wh-peoples">
                    <div class="wh-people wh-people__1">
                        <?php include "assets/img/svg/with-who/wh-people__1.svg"?>
                    </div>
                    <div class="wh-people wh-people__2">
                        <?php include "assets/img/svg/with-who/wh-people__2.svg"?>
                    </div>
                    <div class="wh-people wh-people__3">
                        <?php include "assets/img/svg/with-who/wh-people__3.svg"?>
                    </div>
                </div>
            </div>
            <div class="modal__text">
                {!! $model->{'modal_text_'.$lang} !!}
            </div>
            <button class="modal__btn">{!! $model->{'modal_btn_'.$lang} !!}</button>
        </div>
    </div>

    <nav class="game-icons slider-controls slide-4">
        <a class="str str-prev">
            <?php include "assets/img/svg/with-who/str-prev.svg"?>
        </a>
        <a class="str str-next">
            <?php include "assets/img/svg/with-who/str-next.svg"?>
        </a>
        <div class="bullets">
            <?php include "assets/img/svg/with-who/bullets.svg"?>
        </div>
    </nav>
    <div class="container with-who">
        <div class="party-bg">
            <div class="title">
                <h1 class="neon-pink">{!! $model->title_mod !!}</h1>
            </div>
            <div class="humans">
                @foreach($model->{'Humans_'.$lang} as $human)
                    <div class="human">
                        <div class="human-option">
                            <div class="name-illness">
                                <div class="name">{{$human->title}}</div>
                                <div class="illness">{!!  str_replace('/','<br>', $human->illness) !!}</div>
                            </div>
                            <div class="human-img">
                                <img src="{{$human->images}}">
                            </div>
                            <div class="human-popup">
                                <div class="btn-close"></div>
                                <div class="pop-title">{!! $model->{'pop_title_'.$lang} !!}</div>
                                <form metod="GET" action="" accept-charset="UTF-8">
                                    <div class="form-you-know">
                                        @for($i=1;$i<=6;$i++)
                                            <label class="ill" for="check-ill-1-{{$i}}">
                                                <span>{!! $model->{'chk_'.$i.'_'.$lang} !!}</span>
                                                <input type="checkbox" class="checkbox" id="check-ill-1-{{$i}}">
                                                <span class="checkbox-custom"></span>
                                            </label>
                                        @endfor
                                    </div>
                                    <!-- <button type="" class="btn-test">Пройди тест</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('assets/js/with-who.js')}}"></script>
@endsection