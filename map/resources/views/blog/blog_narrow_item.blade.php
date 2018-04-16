<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 29.03.2018
 * Time: 13:42
 */
/**
 * @var \App\Post $post
 */
?>

@if($post->isVideo)
    <article class="video">
        <div class="content-article">
            <figure>
                <div class="blog-image">
                    <div class="video-to-play">
                        <div class="video-blog" data-video="{{$post->mainVideo}}"></div>
                    </div>
                </div>
                <figcaption>
                    <div class="blog-news-content">
                        <div class="blog-news">
                            <div class="blog-news-category">
                                <span><img src="{{$post->category->icon}}" alt="{{$post->category->title}}"></span>
                            </div>
                            <div class="blog-title">
                                <h3>{{$post->category->title}}</h3>
                                <h2 >{!! $post->mod_title !!}</h2>
                                <data>{!! $post->full_data !!}}</data>
                            </div>
                            <p>{{strip_tags($post->description)}}</p>
                            <div class="bottom-link">
                                <a href="{{$post->url}}">@lang('site.more')</a>
                            </div>
                        </div>
                        <div class="blog-social">
                            <div class="blog-social-comments">
                                <span> Disqus count </span>
                            </div>
                            <div class="blog-social-right">
                                <span class="eya">{{$post->viewers}}</span>
                                <span class="fab fa-facebook-f">{{$post->followers}}</span>
                            </div>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </article>
@elseif($post->isVioletPostStyle)
    <article class="tilter">
        <div class="content-article">
            <figure class="tilter__figure">
                <div class="blog-image">
                    <img src="{{$post->mainImage}}" alt="{{strip_tags($post->mod_title)}}">
                    <div class="tilter-deco"></div>
                </div>
                <figcaption>
                    <div class="blog-news-content">
                        <div class="blog-news">
                            <div class="blog-news-category">
                                <span><img src="{{$post->category->icon}}" alt="{{$post->category->title}}"></span>
                            </div>
                            <div class="blog-title">
                                <h2 >{!! $post->mod_title !!}</h2>
                            </div>
                            <div class="bottom-link">
                                <a href="{{$post->url}}">@lang('site.more')</a>
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
                    <img src="{{$post->mainImage}}" alt="{{strip_tags($post->mod_title)}}">
                </div>
                <figcaption>
                    <div class="blog-news-content">
                        <div class="blog-news">
                            <div class="blog-news-category">
                                <span><img src="{{$post->category->icon}}" alt="{{$post->category->title}}"></span>
                            </div>
                            <div class="blog-title">
                                <h3>{{$post->category->title}}</h3>
                                <h2 >{!! $post->mod_title !!}</h2>
                                <data>{{$post->full_data}}</data>
                            </div>
                            <p>{{strip_tags($post->description)}}</p>
                            <div class="bottom-link">
                                <a href="{{$post->url}}">@lang('site.more')</a>
                            </div>
                        </div>
                        <div class="blog-social">
                            <div class="blog-social-comments">
                                <span> Disqus count </span>
                            </div>
                            <div class="blog-social-right">
                                <span class="eya">{{$post->viewers}}</span>
                                <span class="fab fa-facebook-f">{{$post->followers}}</span>
                            </div>
                        </div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </article>
@endif
