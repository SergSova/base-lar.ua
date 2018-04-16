<?php

/**
 * @var \App\Models\StaticPage $model
 */
$body_class = $model->alias??'';

?>
@extends('layouts.site')

@section('title', $model->seo_title)

@section('styles')
    @parent
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main_map.css')}}">
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 563.36 656.04">
                <defs>
                <style>
                    .cls-1 {
                    fill: #fff;
                    }
    
                    .cls-2 {
                    fill: #ed302f;
                    }
    
                    .cls-3 {
                    fill: #e0e21b;
                    }
                </style>
                </defs>
                <title>Ресурс 5</title>
                <g id="Слой_2" data-name="Слой 2">
                <g id="Layer_1" data-name="Layer 1">
                    <path d="M469.66,304.79a155,155,0,0,0-27.57-77.31,156.58,156.58,0,0,0-52.92-47.42,95.35,95.35,0,1,0-108.79-15.2A154.63,154.63,0,0,0,194,218.51a98.06,98.06,0,1,0-34.76,96.66c0,.44,0,.88,0,1.33,0,36.43,11.83,69.09,35.17,97.08,10.58,32.27,41,54.75,74.14,54.75,2.41,0,4.77-.12,7.13-.35a24.92,24.92,0,0,0,7.89,10.63v13.95a22,22,0,0,0,11.16,19v16.84c0,9.66,8.33,17.51,18.57,17.51s18.56-7.84,18.57-17.48c8-2.56,13.81-9.7,13.81-18.07V491.56a49.31,49.31,0,0,0,21.23-16c27.51-13.66,57.38-34.7,80-56.37,19.85-19,43.93-47.81,45.9-77.13C493.84,326.87,484.6,312.13,469.66,304.79ZM335.91,510.32h0c0,5.15-4.75,9.33-10.61,9.33a12,12,0,0,1-3.2-.43v9.14c0,4.29-4,7.76-8.82,7.76s-8.82-3.47-8.82-7.76V505c-6.4-1.32-11.16-6.36-11.16-12.39V473.17c-5.59-2.44-9.42-7.5-9.42-13.36v-5.19l-.92.18-1.95.38a63.62,63.62,0,0,1-12.48,1.24c-25,0-53.2-12.62-58.84-36.75-1.49-6.36.19-20.42,2.58-26.68,7.38-19.4,30.56-32.94,56.38-32.94a70.24,70.24,0,0,1,17.53,2.2l13.76,3.57,16.52,4.27-13.79-10-11.49-8.37c-17.62-12.83-31.79-37.23-37.91-65.27-5-22.84-4.22-45.47,2.14-63.74,6.17-17.71,16.85-29.06,30-31.94a32.87,32.87,0,0,1,6.94-.73c22.44,0,48.47,21.39,60.53,49.74l4,9.39,4.79,11.25,1.43-12.14,1.19-10.13c2.21-18.91,9.18-31.88,18.18-33.85a12.38,12.38,0,0,1,2.59-.28c7.59,0,16.68,6.89,25,18.88,8.84,12.83,15.95,30.15,20,48.77,2.9,13.31,2.9,28.59,2.64,38.93l-.06,2.77-.08,3.33h6.1c12.38,0,26.42,0,35.72,6.43,4.64,3.21,7.08,10,6.53,18.16-1.73,25.54-24.08,51.9-42.52,69.51-22.19,21.21-51.37,41.67-78.07,54.73l-.58.28-.75.36-.48.67-.39.54a37.6,37.6,0,0,1-20.87,14.5c-.43.56-.89,1.1-1.37,1.61Z"/>
                    <path class="cls-1" d="M335.91,483.44a19.83,19.83,0,0,1-18.74,5.85C306.62,487.07,305.62,479,305.31,467c0,0,0-.1,0-.14-.61-.36-1.2-.74-1.79-1.13l-.06,0a38.23,38.23,0,0,1-4.61-3.65l-.86-.81-.06-.05a40.13,40.13,0,0,1-4.91-5.7,61,61,0,0,1-3.81-5.82h0a83.53,83.53,0,0,1-5.32-11.13v21.26c0,5.86,3.83,10.92,9.42,13.36v19.39c0,6,4.76,11.07,11.16,12.39v23.41c0,4.29,4,7.76,8.82,7.76s8.82-3.47,8.82-7.76v-9.14a12,12,0,0,0,3.2.43c5.86,0,10.61-4.18,10.61-9.33h0Z"/>
                    <path d="M415.81,400.63c21.29-12.86,31.85-34.4,23.57-48.12s-32.26-14.42-53.56-1.57S354,385.33,362.25,399.06,394.51,413.48,415.81,400.63Z"/>
                    <path d="M298,461.26l-.06-.05Z"/>
                    <path d="M298.84,462.07a38.23,38.23,0,0,0,4.61,3.65c-.59-.4-1.16-.81-1.73-1.24C300.65,463.65,299.69,462.84,298.84,462.07Z"/>
                    <path d="M289.2,449.69a61,61,0,0,0,3.81,5.82h0A61.4,61.4,0,0,1,289.2,449.69Z"/>
                    <path d="M303.51,465.76c.59.39,1.18.77,1.79,1.13h0C304.69,466.53,304.1,466.15,303.51,465.76Z"/>
                    <path d="M308.86,440.14a27.15,27.15,0,0,1,13.61,10.95,1.45,1.45,0,0,0,2,.49,1.41,1.41,0,0,0,.47-2,26.68,26.68,0,0,0-4.89-5.93,28.73,28.73,0,0,1,4.09,1.25c10.48,4,17.21,13.3,17.63,22.86h0a58,58,0,0,0,17-10.82c12.7-11.77,32.66-21.82,35.74-23.35,19.83-7.55,37-19.57,49.47-35.07,14.42-17.92,21.21-38.72,19.31-58.87,1,.06,2.1.12,3.15.23a2.17,2.17,0,1,0,.44-4.31,74.59,74.59,0,0,0-16.43.16,2.16,2.16,0,0,0,.24,4.31H451a67.77,67.77,0,0,1,8-.5c2,19.19-4.5,39.08-18.33,56.27-12,14.87-28.45,26.43-47.52,33.71l0,0-.3.14a134.71,134.71,0,0,1-36.3,8.16c-31.63,2.67-61.64-12.1-83.08-40.65,5.59-3.52,11.63-6.83,16.18-9.21,1.52-.8.7-2.62-1-2.21l-.09,0a65.84,65.84,0,0,0-18.07,7.27h0l-.24.16A57,57,0,0,0,256.89,404c-2.18,2.42,1.92,4.7,4.25,2.35a56.26,56.26,0,0,1,7.64-6.13c2.31,4.69,8.85,18.18,10.2,23.31a132.74,132.74,0,0,0,4.9,15,83.53,83.53,0,0,0,5.32,11.13q-1.81-3.14-3.45-6.72C291.39,438.59,299.56,436.57,308.86,440.14Z"/>
                    <path d="M338.54,334c7.86-9.79,11.64-14.68,18.9-24.41-8.58-6.44-13-9.64-22.11-16,6.33-9.12,9.36-13.67,15.17-22.68-10.19-6.6-15.43-9.87-26.21-16.32-5.24,8.87-8,13.35-13.77,22.35-9.67-6.23-14.64-9.32-24.83-15.43-5.55,9.38-8.47,14.11-14.6,23.64,9.64,6.25,14.32,9.41,23.43,15.76-6.33,9.13-9.63,13.72-16.49,22.92,9.06,6.81,13.44,10.23,21.91,17.09,7.43-9.26,11-13.89,17.91-23.1C326.4,324.21,330.54,327.45,338.54,334Z"/>
                    <path d="M368.57,294.89c6.08,5.58,8.95,8.38,14.35,14,6.53-6.45,9.63-9.67,15.52-16.11,5.74,5.28,8.45,7.93,13.59,13.23,6.88-6.82,10.14-10.23,16.3-17-5.79-5.28-8.83-7.92-15.22-13.17,5.21-6.39,7.65-9.58,12.23-15.91-7.4-5.47-11.27-8.19-19.33-13.56-3.94,6.23-6.06,9.38-10.62,15.7-7-5.17-10.69-7.74-18.3-12.83-4.18,6.59-6.44,9.92-11.32,16.61,7,5.18,10.3,7.8,16.68,13C377.21,285.24,374.44,288.45,368.57,294.89Z"/>
                    <path class="cls-2" d="M341.75,467.8h0c-.42-9.56-7.15-18.83-17.63-22.86a28.73,28.73,0,0,0-4.09-1.25,26.68,26.68,0,0,1,4.89,5.93,1.41,1.41,0,0,1-.47,2,1.45,1.45,0,0,1-2-.49,27.15,27.15,0,0,0-13.61-10.95c-9.3-3.57-17.47-1.55-23.11,2.82q1.63,3.59,3.45,6.72h0a61.4,61.4,0,0,0,3.8,5.81h0a40.13,40.13,0,0,0,4.91,5.7l.06.05.86.81c.85.77,1.81,1.58,2.88,2.41.57.43,1.14.84,1.73,1.24l.06,0c.59.39,1.18.77,1.79,1.13h0s0,.09,0,.14c.31,12,1.31,20,11.86,22.26a19.83,19.83,0,0,0,18.74-5.85c.48-.51.94-1.05,1.37-1.61a22.22,22.22,0,0,0,3.11-5.53A21,21,0,0,0,341.75,467.8Z"/>
                </g>
                </g>
            </svg>
            <svg class="preloader-inner__front" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 271.89 291.84">
                <defs>
                <style>
                    .cls-1 {
                    fill: #e0e21b;
                    }
                </style>
                </defs>
                <title>Ресурс 5</title>
                <g id="Слой_2" data-name="Слой 2">
                <g id="Layer_1" data-name="Layer 1">
                    <path class="cls-1" d="M69.86,233.52c-1.36-5.12-7.9-18.61-10.21-23.3A56.11,56.11,0,0,0,52,216.35c-2.33,2.35-6.44.07-4.26-2.35A57.08,57.08,0,0,1,61,203.21l.24-.17s0,0,0,0a65.78,65.78,0,0,1,18.06-7.27l.09,0c1.71-.42,2.53,1.4,1,2.21-4.55,2.38-10.58,5.68-16.17,9.2,21.43,28.55,51.45,43.33,83.07,40.65a134.33,134.33,0,0,0,36.3-8.15l.3-.14,0,0c19.07-7.28,35.55-18.84,47.52-33.71,13.83-17.19,20.29-37.09,18.33-56.27a65.68,65.68,0,0,0-8,.5h-.27a2.16,2.16,0,0,1-.25-4.31,74,74,0,0,1,16.43-.16,2.17,2.17,0,1,1-.43,4.31c-1.05-.11-2.1-.18-3.15-.23,1.89,20.15-4.9,40.94-19.32,58.87-12.48,15.5-29.63,27.52-49.47,35.07-3.08,1.53-23,11.58-35.74,23.34a58.19,58.19,0,0,1-17,10.83,21,21,0,0,1-1.36,8.49,22,22,0,0,1-3.11,5.54A37.61,37.61,0,0,0,149,277.34l.39-.54.48-.67.75-.36.59-.28c26.69-13.07,55.88-33.53,78.07-54.73,18.44-17.61,40.78-44,42.51-69.51.55-8.17-1.89-15-6.52-18.16-9.31-6.43-23.35-6.43-35.73-6.43h-6.1l.08-3.33.06-2.78c.26-10.33.26-25.61-2.64-38.92-4.06-18.62-11.17-35.94-20-48.77C192.67,20.86,183.57,14,176,14a11.74,11.74,0,0,0-2.59.28c-9,2-16,14.93-18.18,33.85L154,58.23l-1.43,12.15L147.8,59.13l-4-9.4C131.74,21.38,105.72,0,83.27,0a32.13,32.13,0,0,0-6.93.73C63.13,3.61,52.46,15,46.29,32.67c-6.37,18.27-7.12,40.9-2.14,63.73,6.11,28.05,20.28,52.45,37.9,65.28l11.49,8.37,13.8,10-16.52-4.28-13.77-3.56a70.24,70.24,0,0,0-17.53-2.21c-25.81,0-49,13.55-56.38,32.94C.75,209.25-.93,223.32.56,229.68c5.65,24.12,33.88,36.74,58.85,36.74a62.7,62.7,0,0,0,12.47-1.24l2-.37.92-.18V248.56A130.36,130.36,0,0,1,69.86,233.52Z"/>
                    <path class="cls-1" d="M168,59.2c7.61,5.08,11.27,7.66,18.29,12.83,4.56-6.33,6.68-9.47,10.62-15.7,8.06,5.37,11.93,8.09,19.34,13.56-4.58,6.33-7,9.52-12.24,15.91C210.37,91,213.41,93.68,219.2,99c-6.16,6.8-9.42,10.21-16.3,17-5.13-5.29-7.85-7.94-13.58-13.23-5.89,6.44-9,9.67-15.52,16.12-5.41-5.6-8.28-8.4-14.36-14,5.87-6.44,8.65-9.66,13.88-16.05-6.37-5.25-9.71-7.86-16.68-13C161.52,69.12,163.79,65.79,168,59.2Z"/>
                    <path class="cls-1" d="M176.69,161c21.3-12.86,45.28-12.15,53.56,1.57s-2.27,35.26-23.57,48.11-45.28,12.15-53.56-1.57S155.4,173.8,176.69,161Z"/>
                    <path class="cls-1" d="M90.81,150.88C82.35,144,78,140.59,68.9,133.79c6.87-9.21,10.16-13.8,16.5-22.92-9.11-6.36-13.8-9.51-23.44-15.76,6.13-9.53,9.05-14.26,14.6-23.64,10.19,6.1,15.16,9.19,24.83,15.43,5.77-9,8.53-13.48,13.78-22.36,10.77,6.45,16,9.72,26.2,16.32-5.8,9-8.84,13.56-15.17,22.69,9.11,6.35,13.53,9.56,22.11,16-7.26,9.74-11,14.62-18.9,24.41-8-6.49-12.14-9.73-20.69-16.17C101.83,137,98.24,141.62,90.81,150.88Z"/>
                </g>
                </g>
            </svg>
            <svg class="preloader-inner__eye preloader-inner__eye_l" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.35 86.34">
                <title>Ресурс 5</title>
                <g id="Слой_2" data-name="Слой 2">
                <g id="Layer_1" data-name="Layer 1">
                    <path d="M67.45,79.41C75.31,69.62,79.09,64.73,86.35,55c-8.58-6.44-13-9.64-22.11-16,6.33-9.12,9.37-13.66,15.17-22.68C69.22,9.72,64,6.45,53.21,0,48,8.87,45.2,13.35,39.43,22.36,29.76,16.12,24.79,13,14.6,6.93,9.05,16.3,6.13,21,0,30.57,9.64,36.81,14.33,40,23.44,46.32,17.1,55.45,13.81,60,6.94,69.25,16,76.05,20.39,79.47,28.85,86.34c7.43-9.27,11-13.89,17.91-23.1C55.31,69.68,59.45,72.92,67.45,79.41Z"/>
                </g>
                </g>
            </svg>
            <svg class="preloader-inner__eye preloader-inner__eye_r" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.56 62.55">
                <title>Ресурс 6</title>
                <g id="Слой_2" data-name="Слой 2">
                <g id="Layer_1" data-name="Layer 1">
                    <path d="M2.8,48.57c6.08,5.58,9,8.38,14.35,14,6.53-6.45,9.63-9.68,15.52-16.11,5.74,5.28,8.45,7.93,13.59,13.22,6.88-6.81,10.14-10.22,16.3-17-5.79-5.29-8.83-7.92-15.22-13.17,5.21-6.39,7.65-9.58,12.23-15.91C52.17,8.09,48.3,5.37,40.24,0,36.3,6.23,34.18,9.38,29.62,15.7c-7-5.17-10.69-7.74-18.3-12.83C7.14,9.46,4.88,12.79,0,19.48c7,5.18,10.3,7.79,16.68,13C11.44,38.92,8.67,42.13,2.8,48.57Z"/>
                </g>
                </g>
            </svg>
            <svg class="preloader-inner__nouse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82.77 68.08">
                <title>Ресурс 5</title>
                <g id="Слой_2" data-name="Слой 2">
                <g id="Layer_1" data-name="Layer 1">
                    <path d="M56.38,58.88C77.68,46,88.23,24.49,80,10.77S47.69-3.66,26.39,9.2-5.46,43.59,2.82,57.31,35.08,71.74,56.38,58.88Z"/>
                </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="map-wrap">
        <div class="content-section">
            @include('site.chanks.navigate_box')
        </div>
        <div id="map"></div>
        <div class="map-overlay"></div>
        <div class="map-inner">
            <div class="title">
                <div class="map-clip-fix">{{$model->title}}</div>
                <div class="map-toggle">
                </div>
            </div>
            <div class="marker-info hide">
                <h5 class="marker-info__title">Ночной клуб Индиго</h5>
                <div class="marker-info__content">
                    <p>Пр. Победы 17А <br>Пн, Ср, Пт - с 9:00 до 14:30<br>Вт, Чт - с 12:00 до 17:30<br/>
                        Возможность получить бесплатные презервативы</p>
                </div>
                <div class="marker-info__btns">
                    <a class="marker-info__btn marker-info__btn_1"></a>
                    <a class="marker-info__btn marker-info__btn_2"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeVHz95lv107f7pYWNL-FetK5BU1s7ps8&callback=initMap" async defer></script>
    <script type="text/javascript">

        var ADRESSES = {!! $model->adress !!};

        var TOWNS = {!! $model->towns !!};
        ADRESSES = Object.values(ADRESSES);

        $(document).ready(function () {
            $('.js-hover').hover(function () {
                var _this = this,
                    images = _this.getAttribute('data').split(','),
                    counter = 0;

                this.setAttribute('data-src', this.src);
                _this.timer = setInterval(function () {
                    if (counter > images.length) {
                        counter = 0;
                    }
                    if (images[counter] != undefined) {
                        _this.src = images[counter];
                    } else {
                        _this.src = _this.getAttribute('data-src');
                    }

                    counter++;
                }, 100);

            }, function () {
                this.src = this.getAttribute('data-src');
                clearInterval(this.timer);
            });

            if (prev_page.length) {
                $('.navigate-box__left').on('click', function () {
                    location.assign('/' + prev_page);
                });
            }

            if (!prev_page.length) {
                $('.navigate-box__left').css('display', 'none');
            }

            if (next_page.length) {
                $('.navigate-box__right').on('click', function () {
                    location.assign('/' + next_page);
                });
            }

            if (!next_page.length) {
                $('.navigate-box__right').css('display', 'none');
            }

        });

        $(window).on('load', function() {
            $('.preloader').hide();
        })

        document.addEventListener('DOMContentLoaded', function () {
            var mapToggle = document.querySelector('.map-toggle');

            TOWNS.forEach(function (i, z) {
                var active = '';

                if (z == 0) {
                    active = ' active';
                }

                mapToggle.innerHTML += '<a class="map-toggle__link' + active + '" data-id="' + z + '">' + i.title + '</a>';
            });
        })
        function initMap() {
            var markerInfo = document.querySelector('.marker-info'),
                markerInfoCont = markerInfo.querySelector('.marker-info__content'),
                markerInfoTitle = markerInfo.querySelector('.marker-info__title'),
                mapToggleCont = document.querySelector('.map-toggle'),
                townLinks = document.querySelectorAll('.map-toggle__link'),
                markerInfoBtns = document.querySelector('.marker-info__btns'),
                markers = [];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: parseFloat(TOWNS[0]['lat']), lng: parseFloat(TOWNS[0]['lng'])},
                streetViewControl: false,
                zoomControl: false,
                mapTypeControl: false,
                fullscreenControl: false,
                styles: [
                  {
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#090909"
                      }
                    ]
                  },
                  {
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#090909"
                      }
                    ]
                  },
                  {
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#090909"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.icon",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#3A3A3A"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "lightness": "-100"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#090909"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#626262"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#bdbdbd"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#626262"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#090909"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#747474"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "lightness": "-100"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#565656"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "lightness": "-100"
                      }
                    ]
                  },
                  {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#BEE363"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#BEE363"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#747474"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#000000"
                      },
                      {
                        "visibility": "on"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#747474"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#000000"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#747474"
                      }
                    ]
                  }
                ]
            });

            mapToggleCont.addEventListener('click', function (e) {
                if (e.target.className.indexOf('map-toggle__link') > -1) {
                    e.preventDefault();
                    var id = e.target.getAttribute('data-id');
                    map.setCenter({lat: parseFloat(TOWNS[id]['lat']), lng: parseFloat(TOWNS[id]['lng'])});

                    for (var i = 0; i < townLinks.length; i++) {
                        townLinks[i].classList.remove('active');
                    }

                    e.target.classList.add('active');
                }
            });

            var overlay = new google.maps.OverlayView();
            overlay.draw = function () {
            };
            overlay.setMap(map);

            for (var z = 0; z < ADRESSES.length; z++) {
                createMarker();
            }

            function createMarker() {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(ADRESSES[z]['lat']), lng: parseFloat(ADRESSES[z]['lng'])},
                    map: map,
                    icon: "{{asset('assets/img/map/marker3.png')}}",
                    title: ADRESSES[z]['title'],
                    info: ADRESSES[z]['info'],
                    dopInfo: ADRESSES[z]['dopInfo'],
                    ico_condom: ADRESSES[z]['ico_condom'],
                    ico_miki: ADRESSES[z]['ico_miki'],
                });

                marker.addListener('mouseover', mouseOver);
                marker.addListener('click', mouseOver);

                function mouseOver(e) {
                    //setTimeout(function() {
                    markerInfo.classList.add('anim');
                    markerInfo.classList.remove('hide');
                    markerInfoTitle.innerHTML = marker['title'];
                    markerInfoCont.innerHTML = '<p>' + marker['info'] + '</p>';
                    markerInfoCont.innerHTML += '<p>' + marker['dopInfo'] + '</p>';

                    if (marker['ico_condom']) {
                        markerInfoBtns.classList.add('condom');
                    } else {
                        markerInfoBtns.classList.remove('condom');
                    }

                    if (marker['ico_miki']) {
                        markerInfoBtns.classList.add('miki');
                    } else {
                        markerInfoBtns.classList.remove('miki');
                    }

                    var proj = overlay.getProjection();
                    var pos = marker.getPosition();
                    markers.forEach(function (m) {
                        m.setVisible(true);
                    });
                    marker.setVisible(false);
                    //marker.setIcon("assets/img/activeMarker.png");

                    if (proj) {
                        var p = proj.fromLatLngToContainerPixel(pos);
                        markerInfo.style.left = p.x + 'px';
                        markerInfo.style.top = p.y + 'px';

                        markerInfo.classList.add('moveEnd');
                    }
                    //}, 70)
                }

                markers.push(marker);
            }

            function mouseOut(e) {
                if (e.relatedTarget) {
                    if (e.relatedTarget.closest('.marker-info') === null) {
                        mouseOutAction()
                    }
                } else if (e.target) {
                    if ((e.target.closest('.gmnoprint') === null) && (e.target.closest('.marker-info') === null)) {
                        mouseOutAction();
                    }
                }
            }

            function mouseOutAction() {
                //setTimeout(function() {
                markerInfo.classList.add('hide');
                markers.forEach(function (m) {
                    //m.setIcon("assets/img/marker2.png");
                    m.setVisible(true);
                });
                //}, 70)
            }

            map.addListener('dragstart', function () {
                markerInfo.classList.remove('anim');
                mouseOutAction()
            });
            document.addEventListener('mouseout', mouseOut);
            window.addEventListener('click', mouseOut);
        }
    </script>
@endsection