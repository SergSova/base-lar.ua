<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 28.03.2018
 * Time: 9:24
 */

/**
 * @var \App\Models\Post $model
 * @var \App\Models\Post $prev
 * @var \App\Models\Post $next
 * @var \App\Models\Post $post
 * @var \App\Models\Post $morePosts
 */

$body_class = 'one_blog';
?>
@extends('layouts.site')

@section('title', strip_tags($model->mod_title))

@section('styles')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900&amp;subset=cyrillic,latin-ext"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900&amp;subset=latin-ext"
          rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/blog/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/media-blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog/one-blog.css')}}">
@endsection

@section('body')
    <div class="preloader">
        <div class="preloader-inner">
            <?php include "assets/img/svg/about/preloader-inner.svg" ?>
        </div>
    </div>
    <main>
        <div class="wrapper">
            <div class="content-head">
                <div class="wrapper-breadcrumb-filter">
                    <div class="bread-crumbs" id="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"
                             class="button">
                            <a href="{{route('blog')}}" itemprop="item">
                                <span itemprop="name" class="label1">@lang('menu.blog')</span>
                                <meta itemprop="position" content="1">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"
                             class="button">
                            <a href="{{route('blog.fitred',$model->category->slug)}}" itemprop="item">
                                <span itemprop="name" class="label1">{{$model->category->title}}</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </div>
                        <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"
                             class="button">
                            <span itemprop="name" class="label1">{{strip_tags($model->mod_title)}}</span>
                            <meta itemprop="position" content="3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixid-container">
                <div class="content">

                    <div class="content-wrapper scroll-container" id="scroll">
                        <div class="article-wrap">
                            <div class="blog-main one-blog translate-block">
                                <article class="video">
                                    <div class="content-article">
                                        <figure>
                                            <div class="blog-image">
                                                <img src="{{$model->mainImage}}">
                                                <h1 {{$model->isBlackTitle?'class=black-title':''}}>
                                                    {!! $model->mod_title !!}
                                                </h1>
                                            </div>
                                            <figcaption>
                                                <div class="blog-news-content">
                                                    <div class="blog-news">
                                                        <div class="blog-news-category">
                                                            <span><img src="{{ $model->category->icon }}" alt="{{ $model->category->title }}"></span>
                                                        </div>
                                                        <div class="blog-title">
                                                            <h3>{{ $model->category->title }}</h3>
                                                        </div>
                                                        <div class="blog-content">
                                                            {!! $model->{'content_'.app()->getLocale()} !!}
                                                            <div class="share-with">
                                                                <img src="{{asset('assets/img/blog/icon-filter/fb-square.png')}}">@lang('site.share')
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="blog-social">
                                                        <div class="blog-social-comments">
                                                            <span> Disqus count </span>
                                                        </div>
                                                        <div class="athor-date">
                                                            <div class="flexibal">
                                                                @if($model->authorImage)
                                                                    <div class="athor"><img src="{{$model->authorImage}}"></div>
                                                                @endif
                                                                {{$model->author}}
                                                            </div>
                                                            <div class="flexibal">
                                                                <div class="">
                                                                    <img src="{{asset('assets/img/blog/icon-filter/calendar.png')}}">
                                                                </div>
                                                                {{$model->full_data}}
                                                            </div>
                                                        </div>
                                                        <div class="blog-social-right">
                                                            <span class="eya">{{$model->viewers}}</span>
                                                            <span class="fab fa-facebook-f">{{$model->followers}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </article>
                                <div class="disqus-thread">
                                    <div id="disqus_thread">

                                    </div>
                                </div>

                                <div class="blog-navi">
                                    <a href="{{$prev->url}}" class="blog-prev">
                                        <img src="{{$prev->mainImage}}">
                                        <div class="blog-navi-text">
                                            <img src="{{asset('assets/img/blog/icon-filter/blog-nav-arr-prev.png')}}">
                                            {!! $prev->mod_title !!}
                                        </div>
                                    </a>
                                    <a href="{{$next->url}}" class="blog-next">
                                        <img src="{{$next->mainImage}}">
                                        <div class="blog-navi-text">
                                            {!! $next->mod_title !!}
                                            <img src="{{asset('assets/img/blog/icon-filter/blog-nav-arr-next.png')}}">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <aside class="blog-narrow translate-block">
                            <div class="small-translate translate-block">
                                @each('blog.blog_narrow_item', $morePosts,'post')
                            </div>
                        </aside>
                        <div class="ajax-blog"></div>
                    </div>

                </div>
            </div>
            <div class="scroll-substitute"></div>
        </div>
        <a href="{{route('blog')}}" itemprop="item" class="back-blog">
            <div class="navigate-box">
                <div class="navigate-box__left">
                    <div class="navigate-box__left-wrap">
                        <span class="navigate-box__line"></span>
                        <span class="navigate-box__line"></span>
                    </div>
                    <div class="navigate-box__text">к блогу</div>
                </div>
            </div>
        </a>
        @if($model->slider->count())
            <div class="full-content-slider">
                @foreach($model->slider as $photo)
                    @if($photo->path)
                        @if(isset($photo->isVideo))
                            <div class="video-to-play">
                                <div class="video-blog" data-video="{{$photo->path}}"></div>
                            </div>
                        @else
                            <div class=""><img src="{{$photo->path}}"></div>
                        @endif
                    @endif
                @endforeach
            </div>
        @endif
    </main>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            $('.full-content-slider').insertBefore('.slide-insert');
            $('.slide-insert').remove();
        });
    </script>
    <script src="{{asset('assets/js/libs/vibrant.js')}}"></script>
    <script src="{{asset('assets/js/libs/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/libs/anime.min.js')}}"></script>
    <script async="" src="{{asset('assets/js/blog/animation.js')}}"></script>
    <script async="" src="{{asset('assets/js/blog/scroll.js')}}"></script>

    <script src="{{asset('/assets/js/libs/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/blog-slider.js')}}"></script>
    <div id="disqus_thread"></div>
    <script>
        (function () { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://drugstore-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection