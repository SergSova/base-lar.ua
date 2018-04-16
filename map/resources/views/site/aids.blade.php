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
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/drug-store/index.css')}}">
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
    <div class="modal modal-kolumb">
        <div class="modal__inner">
            <div class="modal__icons">
                <div class="modal__icon k-hands">
                    <div class="k-hand k-hand_hold">
                        <?php include "assets/img/svg/aids/k-hand_hold.svg"?>
                    </div>
                    <div class="k-hand k-hand_move">
                        <?php include "assets/img/svg/aids/k-hand_move.svg"?>
                    </div>
                </div>
                <div class="modal__icon k-hats">
                    <div class="k-hat">
                        <?php include "assets/img/svg/aids/k-hat.svg"?>
                    </div>
                </div>
            </div>
            <div class="modal__text">{!! $model->{'modal_text_'.$lang} !!}</div>
            <button class="modal__btn">{!! $model->{'modal_btn_'.$lang} !!}</button>
        </div>
        <div class="modal-bottom">
            {!! $model->{'modal_bottom_'.$lang} !!}
            <div class="modal-bottom__arrow">
                <?php include "assets/img/svg/aids/modal-bottom__arrow.svg"?>
            </div>
        </div>
    </div>

    {{--<div class="game-icons coffin">--}}
        {{--<img src="{{asset('assets/img/drug-store/coffin.png')}}" alt="">--}}
    {{--</div>--}}
    <nav class="game-icons slider-controls slide-1">
        <a href="<?= $prev['alias'] ?? '/bandit'?>" class="str str-prev">
            <?php include "assets/img/svg/aids/str-prev.svg"?>
        </a>
        <a href="<?= $next['alias'] ?? '/slide-bubles'?>" class="str str-next">
            <?php include "assets/img/svg/aids/str-next.svg"?>
        </a>
        <div class="bullets">
            <?php include "assets/img/svg/aids/bullets.svg"?>
        </div>
    </nav>
    <div class="main-scene full">
        <div class="games-wrapper">
            <div class="games full">
                <div class="game game1 full js-game1" id="game1">
                    <div class="game-wrap columb">
                        {{--<h1>{!! $model->title_mod !!}</h1>--}}
                        <h1><img src="assets/img/title.png"  data-end="assets/img/title-end.png" alt=""></h1>
                        <div class="bg-shlapnik full">
                            <div class="mouse resizeEl" data-w="253" data-h="207" data-bg-w="253" data-bg-h="2484"></div>
                            <div class="kolumb-plus-hats">
                                <div class="hats">
                                    <div class="hat resizeEl"></div>
                                    <div class="hat resizeEl"></div>
                                    <div class="hat resizeEl"></div>
                                    <div class="hat resizeEl"></div>
                                    <div class="hat resizeEl"></div>
                                </div>
                                <div class="hats-covers">
                                    <div class="hat-cover"></div>
                                    <div class="hat-cover"></div>
                                    <div class="hat-cover"></div>
                                    <div class="hat-cover"></div>
                                    <div class="hat-cover last"></div>
                                </div>
                                <div class="kolumb-wrap ">
                                    <div class="kolumb resizeEl" data-bg-w="4950" data-bg-h="413">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('assets/js/columb.js')}}"></script>

@endsection