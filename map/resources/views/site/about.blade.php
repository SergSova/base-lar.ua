<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 23.03.2018
 * Time: 13:02
 */

/**
 * @var \App\Models\StaticPage $model
 */
$body_class = $model->alias ?? '';
?>
@extends('layouts.site')

@section('title', $model->seo_title)

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('assets/js/libs/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/libs/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main_about.css')}}">
@endsection

@section('body')
    <div class="preloader">
        <div class="preloader-inner">
            <?php include "assets/img/svg/about/preloader-inner.svg"?>
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

    <main class="content">
        <div class="content-section">

            <div class="content__left-box">
                <h1 class="main-caption clip-fix">{!! $model->title !!}</h1>
            </div>

            <div class="content__center-box">
                <div class="content__additional-logo-box">
                    <div class="text">{{$model->{'supported_'.app()->getLocale()} }}</div>
                    <img src="{{asset('assets/img/about/Alians.svg')}}" alt="">
                    <img src="{{asset('assets/img/about/ejaf_3_green__logo_with_text_with_border2.png')}}" alt="">
                </div>

                <h2 class="content__heading">{{$model->{'desc_title_'.app()->getLocale()} }}</h2>

                <div class="content__text-wrap">
                    {!! $model->description !!}
                </div>

                <div id="logo-slider">
                    <div class="logo-slider__img-wrap">
                        @foreach($model->slider as $inx=>$slide)
                            @if($inx % 5 == 0 && $inx!=0)
                    </div>
                    <div class="logo-slider__img-wrap">
                        @endif
                        <img src="{{$slide->path}}" alt=""
                             style="{{$slide->{'max-height'}?'max-height:'.$slide->{'max-height'}:'' }}{{$slide->{'max-width'}? ($slide->{'max-height'}?';':'').' max-width:'.$slide->{'max-width'}:'' }}">
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="content__bottom-box">
                <a href="http://freshweb.agency" class="freshagency-logo-box">
                    <img src="{{asset('assets/img/about/freshagency-logo.svg')}}" alt="">
                </a>

                <div class="copyright-text">Copyright © 2018 Drugstore. @lang('site.reserved')</div>
            </div>

            @include('site.chanks.navigate_box')
        </div>
    </main>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('assets/js/libs/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/libs/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/js/libs/wheel-indicator.js')}}"></script>
@endsection
