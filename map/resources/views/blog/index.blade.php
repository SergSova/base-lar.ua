<?php

/**
 * @var \App\Models\Blog $model
 */
?>
@extends('layouts.site')

@section('title', $model->seo_title)

@section('styles')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900&amp;subset=latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/lib/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/media-blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/media.css')}}">

@endsection
@section('body')
   {{-- <div class="landscape">
        <div class="landscape-inner">
            <div class="landscape-icon">
                <div class="landscape-icon__condom_fill"></div>
                <div class="landscape-icon__condom_stroke"></div>
                <div class="landscape-icon__condom_arrow"></div>
            </div>

            <h5 class="landscape-title">@lang('site.landscape_title')</h5>
            <p class="landscape-desc">@lang('site.landscape_desc')</p>
        </div>
    </div>--}}
    <div class="preloader">
        <div class="preloader-inner">
            <?php include "assets/img/svg/about/preloader-inner.svg" ?>
        </div>
    </div>
    <main>
        <div class="main-content">
            <div class="wrapper">
                <div class="fixid-container">
                    <header class="header">
                        <div class="menu-box category-popup-btn__box">
                            <div class="potate-category">
                            <svg version="1.1" id="Слой_2_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                     y="0px" viewBox="0 0 56.8 82.3" style="enable-background:new 0 0 56.8 82.3;" xml:space="preserve">
<style type="text/css">
    .st0{fill:none;stroke:#FFFFFF;stroke-width:0.75;stroke-linecap:round;stroke-miterlimit:10;}
    .st1{fill:#AECD56;}
    .st2{fill:#FFFFFF;}
</style>
                                    <g class="potate">
                                        <polygon class="st0" points="11.8,41.9 5.1,41 1.5,21 7.6,19.9 	"/>
                                        <polyline class="st0" points="49.3,19.6 55.4,20.8 51.5,40.8 	"/>
                                        <line class="st0" x1="22.4" y1="20.3" x2="25.8" y2="43.2"/>
                                        <polygon class="st0" points="32,43.4 25.5,43.5 30.4,19.9 36.4,21 	"/>
                                        <polygon class="st0" points="17.6,42.6 11.8,41.9 11.8,7.6 18,7.6 	"/>
                                        <line class="st0" x1="49.3" y1="19.6" x2="44.2" y2="42"/>
                                        <line class="st0" x1="46.3" y1="13.5" x2="39.5" y2="42.6"/>
                                        <line class="st0" x1="51" y1="19.8" x2="52.3" y2="14.9"/>
                                        <line class="st0" x1="46.3" y1="13.5" x2="52.3" y2="14.9"/>
                                        <line class="st0" x1="5.9" y1="19.9" x2="6" y2="15"/>
                                        <line class="st0" x1="11.8" y1="14.7" x2="6" y2="15"/>
                                        <line class="st0" x1="22.4" y1="20.3" x2="22.3" y2="3.5"/>
                                        <line class="st0" x1="22.3" y1="3.5" x2="28.5" y2="3.5"/>
                                        <line class="st0" x1="28.5" y1="29.2" x2="28.5" y2="3.7"/>
                                        <line class="st0" x1="28.5" y1="12.5" x2="34.1" y2="12.5"/>
                                        <line class="st0" x1="34.1" y1="20.6" x2="34.1" y2="12.5"/>
                                        <line class="st0" x1="34.1" y1="14.8" x2="39.9" y2="14.8"/>
                                        <line class="st0" x1="39.9" y1="4.8" x2="40.2" y2="39.9"/>
                                        <line class="st0" x1="47.1" y1="13.7" x2="47.2" y2="5"/>
                                        <line class="st0" x1="39.9" y1="4.8" x2="46.9" y2="5"/>
                                        <line class="st0" x1="34.1" y1="32.4" x2="34.1" y2="43.2"/>
                                        <line class="st0" x1="18" y1="21.1" x2="22.3" y2="20.4"/>
                                        <line class="st0" x1="20.4" y1="43" x2="17.8" y2="29.5"/>
                                    </g>
                                    <path d="M51.7,78.3"/>
                                    <path d="M46.6,80.7c-3.5-1.6-9.9-4-18.3-4c-7.8,0-13.8,2-17.3,3.5C8.9,66.7,6.8,53.3,4.8,39.9c2.6,0.6,6,1.2,10,1.7
	c1.8,0.2,6.9,0.8,13.6,0.8c6.6,0,11.7-0.6,17.4-1.3c2.6-0.3,4.7-0.6,6.3-0.8C50.2,53.8,48.4,67.2,46.6,80.7z"/>
                                    <path class="st1" d="M34.9,51c2.4,0,4.3,1.9,4.3,4.3s-1.9,4.3-4.3,4.3l0,0h-0.4c1.1,3.3-0.6,7.1-3.9,8.2s-7.1-0.6-8.2-3.9
	c-0.6-1.5-0.6-3,0-4.3H22c-2.4,0-4.3-1.9-4.3-4.3S19.6,51,22,51s4.3,1.9,4.3,4.3c0,0.2,0,0.2,0,0.4c0.7-0.2,1.5-0.4,2.2-0.4
	s1.5,0.2,2.2,0.4c0-0.2,0-0.2,0-0.4C30.6,52.9,32.6,51,34.9,51z"/>
                                    <g id="XMLID_1_">
                                        <g>
                                            <path class="st2" d="M52.8,40c0,0.1,0,0.3-0.1,0.3L52.8,40H52l-0.1,0.5c-3.8,0.5-6.9,0.9-9.5,1.2C35.2,42.5,31.7,43,28.3,43
			c-3.3,0-6.6-0.4-12.9-1.2c-2.8-0.4-6.1-0.8-10.3-1.3L5,39.9c0-0.2-0.2-0.3-0.4-0.3l0,0c4.4,0.5,7.9,1,10.8,1.3
			c12.8,1.7,12.8,1.7,26.8-0.1c2.8-0.4,6.1-0.8,10.1-1.3C52.6,39.6,52.8,39.8,52.8,40z"/>
                                            <path class="st2" d="M52.7,40.1v0.2c0,0.1-0.1,0.1-0.2,0.1c-0.2,0-0.4,0-0.6,0.1L52,40L52.7,40.1z"/>
                                            <path class="st2" d="M52.6,40.3l-6,40.4l-0.4-0.1l0,0c-17.4-4.9-19.4-4.9-35.3,0c0,0,0,0-0.1,0c0.2,0,0.3-0.2,0.3-0.4L11,79.8
			c15.4-4.7,18-4.7,34.9,0l5.9-39.3c0.2,0,0.4,0,0.6-0.1C52.5,40.4,52.6,40.3,52.6,40.3z"/>
                                            <path class="st2" d="M11.2,80.1c0,0.2-0.1,0.4-0.3,0.4c-0.1,0-0.2,0-0.3-0.1c0,0-0.1,0-0.1-0.1v-0.1c0,0,0,0,0-0.1
			c0-0.2,0.1-0.3,0.3-0.4c0.1,0,0.3-0.1,0.4-0.1L11.2,80.1z"/>
                                            <path class="st2" d="M5.1,40.4l6.1,39.3c-0.1,0.1-0.3,0.1-0.4,0.1c-0.2,0.1-0.3,0.2-0.3,0.4L4.2,40.1c0,0,0,0,0-0.1
			c0,0.2,0.1,0.3,0.3,0.4C4.7,40.4,4.9,40.4,5.1,40.4z"/>
                                            <path class="st2" d="M10.5,80.4L10.5,80.4L10.5,80.4z"/>
                                            <path class="st2" d="M10.4,80.3L10.4,80.3C10.5,80.4,10.4,80.3,10.4,80.3L10.4,80.3z"/>
                                            <path class="st2" d="M5.1,40.4c-0.2,0-0.3,0-0.5-0.1c-0.2,0-0.3-0.2-0.3-0.4l0,0v-0.1c0,0,0,0,0-0.1c0,0,0,0,0-0.1l0.1-0.1
			c0,0,0,0,0.1,0h0.1l0,0c0.2,0,0.3,0.1,0.4,0.3L5.1,40.4z"/>
                                            <path class="st2" d="M4.6,39.6C4.6,39.6,4.5,39.6,4.6,39.6C4.5,39.6,4.5,39.6,4.6,39.6L4.6,39.6z"/>
                                            <path class="st2" d="M4.5,39.7C4.5,39.7,4.4,39.7,4.5,39.7C4.4,39.7,4.5,39.7,4.5,39.7z"/>
                                            <path class="st2" d="M4.3,39.8L4.3,39.8L4.3,39.8z"/>
                                            <path class="st2" d="M4.2,40C4.2,39.9,4.2,39.9,4.2,40C4.2,39.9,4.2,40,4.2,40L4.2,40z"/>
                                        </g>
                                    </g>
</svg>
                            </div>
                            <strong class="menu-box_text category-popup-btn__text">@lang('site.category')</strong>
                        </div>
                    </header>

                    <div class="content">
                        <div class="content-head">
                            <h1 class="main-caption clip-fix">{!! $model->title !!}</h1>
                        </div>
                        <div class="content-wrapper scroll-container" id="scroll">
                            <div class="blog-main">
                                <section class="blog-large">
                                    <div class="large-translate translate-block">
                                        @each('blog.item_blog', $arr[0]??[],'model')
                                    </div>
                                </section>
                                <section class="blog-small">
                                    <div class="medium-translate translate-block">
                                        @each('blog.item_blog', $arr[1]??[],'model')
                                    </div>
                                </section>
                            </div>
                            <aside class="blog-narrow">
                                <div class="small-translate translate-block">
                                    @each('blog.item_blog', $arr[2]??[],'model')
                                </div>
                            </aside>
                            <div class="ajax-blog"></div>
                        </div>
                        <div class="about-description">
                        </div>
                        <footer>
                        </footer>
                    </div>

                </div>
                <div class="scroll-substitute">
                    <span></span>
                </div>

            </div>
            @include('site.chanks.navigate_box')
        </div>

        @include('blog.category')

    </main>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('assets/js/libs/vibrant.js') }}"></script>
    <script src="{{ asset('assets/js/libs/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/anime.min.js') }}"></script>
    <script src="{{ asset('assets/js/blog/animation.js') }}"></script>
    <script src="{{ asset('assets/js/blog/scroll.js') }}"></script>
@endsection