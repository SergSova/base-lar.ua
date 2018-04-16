<?php

/**
 * @var \App\Post $model
 */

?>
@if($model)
    @if($model->isVioletPostStyle)
        <article class="tilter">
            <div class="content-article">
                <figure class="tilter__figure">
                    <div class="blog-image">
                        <img src="{{$model->mainImage}}" alt="{{ strip_tags($model->mod_title) }}">
                        <div class="tilter-deco"></div>
                    </div>
                    <figcaption>
                        <div class="blog-news-content">
                            <div class="blog-news">
                                <div class="blog-news-category">
                                    <span><img src="{{$model->category->icon}}" alt="{{$model->category->title}}"></span>
                                </div>
                                <div class="blog-title">
                                    <h2 >{!! $model->mod_title !!}</h2>
                                </div>
                                <div class="bottom-link">
                                    <a href="{{$model->url}}">@lang('site.more')</a>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </article>
    @elseif ($model->isVideo)
        <article class="video">
            <div class="content-article">
                <figure>
                    <div class="blog-image">
                        <div class="video-to-play">
                            <div class="video-blog" data-video="{{$model->mainVideo}}"></div>
                        </div>
                    </div>
                    <figcaption>
                        <div class="blog-news-content">
                            <div class="blog-news">
                                <div class="blog-news-category">
                                    <span><img src="{{$model->category->icon}}" alt="{{$model->category->title}}"></span>
                                </div>
                                <div class="blog-title">
                                    <h3>{{$model->category->title}}</h3>
                                    <h2 >{!! $model->mod_title !!}</h2>
                                    <data>{{ $model->full_data }}</data>
                                </div>
                                <p>{!! $model->description !!}</p>
                                <div class="bottom-link">
                                    <a href="{{$model->url}}">@lang('site.more')</a>
                                </div>
                            </div>
                            <div class="blog-social">
                                <div class="blog-social-comments">
                                    <span> discus comment </span>
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
    @else
        <article class="blog-news">
            <div class="content-article">
                <figure>
                    <div class="blog-image">
                        <img src="{{$model->mainImage}}" alt="{{ strip_tags($model->mod_title) }}">
                    </div>
                    <figcaption>
                        <div class="blog-news-content">
                            <div class="blog-news">
                                <div class="blog-news-category">
                                    <span><img src="{{$model->category->icon}}" alt="{{$model->category->title}}"></span>
                                </div>
                                <div class="blog-title">
                                    <h3>{{$model->category->title}}</h3>
                                    <h2 >{!! $model->mod_title !!}</h2>
                                    <data>{!! $model->full_data !!}</data>
                                </div>
                                <p>{!! strip_tags($model->description)!!}</p>
                                <div class="bottom-link">
                                    <a href="{{$model->url}}">@lang('site.more')</a>
                                </div>
                            </div>
                            <div class="blog-social">
                                <div class="blog-social-comments">
                                    <span> discus comment </span>
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
    @endif
@endif