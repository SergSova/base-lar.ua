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
                <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link {{$route=='blog.index'?'active':''}}">Блог</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog-category.index')}}"
                       class="nav-link {{$route=='blog-category.index'?'active':''}}">Категории блога</a>
                </li>
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