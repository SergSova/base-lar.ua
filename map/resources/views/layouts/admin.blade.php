<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}"/>

    <link href="{{asset('css/lib/bootstrap.min.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    @include('admin.navigation')
    @if(count($errors->all()))
        <div class="container">
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $message)
                    <p>{{$message}}</p>
                @endforeach
            </div>
        </div>
    @endif
    @if(Session::has('flash_message'))
        <div class="container">
            <div class="alert alert-success">
                {{Session::get('flash_message')}}
            </div>
        </div>
    @endif
    @yield('content')
</div>
<script src="{{asset('assets/js/libs/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/libs/popper.min.js')}}"></script>
<script src="{{asset("assets/js/libs/bootstrap.min.js")}}"></script>

@yield('scripts')
</body>
</html>