<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 04.04.2018
 * Time: 14:45
 */

/**
 * @var \App\FaqAnswer[] $faqs
 * @var \App\Post[] $posts
 */
?>


@foreach($posts as $post)
    <div class="top-search-result">
        <div class="top-search-result__img">
            <img src="{{$post->mainImage}}" alt="">
        </div>
        <div class="top-search-result__content">
            <a href="{{route('blogArticle',[$post->category->slug,$post->slug])}}">
                <h5 class="top-search-result__title">{!! $post->mod_title !!}</h5>
            </a>
        </div>
    </div>
@endforeach
@foreach($faqs as $faq)
    <div class="top-search-result">
        <div class="top-search-result__img">
            <img src="{{asset('assets/img/faq/FAQ big (1).png')}}" alt="Faq">
        </div>
        <div class="top-search-result__content">
            <a href="{{route('faq',$faq->index)}}">
                <h5 class="top-search-result__title">{{$faq->question}}</h5>
            </a>
        </div>
    </div>
@endforeach
