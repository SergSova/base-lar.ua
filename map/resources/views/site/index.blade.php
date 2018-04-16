<?php

/**
 * @var \App\Models\StaticPage $model
 */

$body_class = $model->alias??'';
?>
@extends('layouts.site')

@section('title',$model->seo_title)

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
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
    <canvas id="canvas"></canvas>
    <div class="texts-wrap">
        <div class="scroll-box">
            <div class="scroll-box-text hidden">
            {!! $model->title_mod !!}
            </div>
            <div class="scroll-box-line"></div>
            <div class="scroll-box-text">{{$model->description}}</div>
        </div>
        <div class="no-aids">
            <div class="no-inside">
                <div>
                    {!! $model->longtitle_mod !!}
                </div>
                <div class="after-text">
                   <div class="if-ready">Узнать больше</div>
                    <a href="{{$model->getNext()['alias']}}">
                        <div class="navigate-box__right">
                            <div class="navigate-box__right-wrap">
                                <span class="navigate-box__line"></span>
                                <span class="navigate-box__line"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('assets/js/libs/detect.min.js')}}"></script>
    <script src="{{asset('assets/js/madam.js')}}"></script>
@endsection