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
    <link rel="stylesheet" href="{{asset('assets/css/consult_main.css')}}">
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

            <div class="consultants__left-box">
                <div class="main-caption clip">
                    {!! str_replace('/',' - <br>',$model->title) !!}
                </div>

                <div class="consultants__add-text">
                    {!! $model->description !!}
                </div>
            </div>

            <div class="consultants-content">
                <h3 class="consultants-content__heading">
                    <span>{!! $model->longtitle !!}</span>
                </h3>
                <div class="consultants-content__content">
                    @foreach($model->{'list_'.app()->getLocale()} as $i=>$val)
                        <div class="consultants-content__content-item">
                            <div class="consultants-content__img-wrap">
                                <img src="/assets/img/consultants/consultants-img-{{$i}}.png" alt="">
                            </div>
                            <div class="consultants-content__text">{{ $val }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="consultants-content__button-box">
                    <div class="consultants-content__button-wrapper">
                        <button class="consultants-content__button consultants-btn">
                            <span>@lang('site.consult_schedule')</span>
                        </button>
                    </div>

                    <div class="consultants-content__button-wrapper">
                        <button class="consultants-content__button call-jivochat">
                            <span>@lang('site.consult_specialist')</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="popup-box__consultants">
                <div class="popup-wrapper__consultants">
                    <div class="popup-wrapper__consultants-content">
                        <div class="popup-wrapper__consultants-column">
                            <div class="popup-wrapper__consultants-cell"></div>
                            @for($i=1;$i<=7;$i++)
                                <div class="popup-wrapper__consultants-cell">{{ $model->{'consHeader_'.$i.'_'.app()->getLocale()} }}</div>
                            @endfor
                        </div>
                        @foreach($model->{'Consultant_'.app()->getLocale()} as $consultant)
                            <div class="popup-wrapper__consultants-column">
                                <div class="popup-wrapper__consultants-cell">{!! $consultant->title !!}</div>

                                @foreach($consultant->days as $day)
                                    <div class="popup-wrapper__consultants-cell">{!! $day !!}</div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div class="popup-wrapper__consultants-crosshair"></div>
                </div>
            </div>

            @include('site.chanks.navigate_box')
        </div>

    </main>
@endsection
@section('scripts')
    @parent
    <script src="{{asset('assets/js/libs/wheel-indicator.js')}}"></script>
    <script src="{{asset('assets/js/consult_main.js')}}"></script>
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
        (function () {
            var widget_id = 'UUEQ86LJp1';
            var d = document;
            var w = window;

            function l() {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = '//code.jivosite.com/script/widget/' + widget_id;
                var ss = document.getElementsByTagName('script')[0];
                ss.parentNode.insertBefore(s, ss);
            }

            if (d.readyState == 'complete') {
                l();
            } else {
                if (w.attachEvent) {
                    w.attachEvent('onload', l);
                } else {
                    w.addEventListener('load', l, false);
                }
            }
        })();</script>
    <!-- {/literal} END JIVOSITE CODE -->
@endsection