<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Page')</title>

@include('site.seo.meta')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/lib/jquery.mCustomScrollbar.css')}}">
    <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css">
@yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86271972-12"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-86271972-12');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter48458240 = new Ya.Metrika({
                        id: 48458240,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/48458240" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body class="{{$body_class??''}}" data-alias="{{$body_class??''}}">
@if(\Request::route()->getName()!='home')
    @include('site.menu')
@endif

@yield('body')

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        $('.preloader').delay(1000).fadeOut(300, function () {
            var scroll_up = 0;
        });
        $('.preloader svg').delay(1000).fadeOut(300);
    });
</script>
<script src="{{asset('assets/js/libs/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/preloader.js')}}"></script>
@if(isset($model) && method_exists($model,'getNext'))
    <script>
        var next_page = '{{$model->getNext()['alias']}}';
        var prev_page = '{{$model->getPrev()['alias']}}';
    </script>
@endif

@yield('scripts')
</body>
</html>
