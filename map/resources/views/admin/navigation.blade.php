<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 21.03.2018
 * Time: 14:32
 */

$route = \Request::route()->getName();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;<li class="nav-item">
                    <a href="{{route('staticPage')}}" class="nav-link {{$route=='staticPage'?'active':''}}">Статические
                        страницы</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Блог</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('blog.index')}}">Статьи</a>
                        <a class="dropdown-item" href="{{route('blog-category.index')}}">Категории</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Место положения</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('country.index')}}">Страны</a>
                        <a class="dropdown-item" href="{{route('city.index')}}">Города</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('dist.index')}}">Районы</a>
                        <a class="dropdown-item" href="{{route('metro.index')}}">Метро</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Карта</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('institution-categories.index')}}">Категории</a>
{{--                        <a class="dropdown-item" href="{{route('institution-sub-categories.index')}}">Подкатегории</a>--}}
                        <a class="dropdown-item" href="{{route('institution.index')}}">Заведения</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('yammer.index')}}">Жалобы</a>
                        <a class="dropdown-item" href="{{route('review.index')}}">Отзывы</a>
                    </div>
                </li>
                @role('super-admin')
                <li class="nav-item">
                    <a href="{{route('user.index')}}"
                       class="nav-link {{$route=='user.index'?'active':''}}">Пользователи</a>
                </li>
                @endrole
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a>Roles("{{ join('", "', Auth::user()->getRoleNames()->toArray()) }}")</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>