<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 29.03.2018
 * Time: 12:31
 */


$allCategory = \App\BlogCategory::all();
?>

<div class="category-popup__box">
    <div class="category-popup__wrap">
        <div class="category-popup__content">
            <button class="category-popup__btn-search js-search-open">@lang('site.search')</button>
            <div class="top-search top-search-blog empty">
                <form action="/search" class="search-form">
                    {{ csrf_field() }}
                    <p class="search-form__top">
                        <input type="text" autocomplete="off" placeholder="Поиск" name="search" class="search-form__q" />
                    </p> 
                    <i class="search-form__clear"></i>
                </form>
                <div class="top-search-results">
                    <div class="top-search-results__inner">
                        <!-- <div class="top-search-result">
                            <div class="top-search-result__img">
                                <img src="http://3.j2landing.com/speed/img1.png" alt="">
                            </div>
                            <div class="top-search-result__content">
                                <h5 class="top-search-result__title">Заглавие какой-то статьи</h5>
                                <div class="top-search-result__desc">
                                    <p>Краткое описание для ознакомления</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <button class="category-popup__btn-close">@lang('site.close')</button>
            <h2 class="category-popup__heading">
                <a href="{{route('blog')}}">@lang('site.all_post')</a>
            </h2>
            <div class="category-popup__list-wrap">
                <ul class="category-popup__list">
                    @foreach($allCategory->where('isMain',true) as $category)
                        <li>
                            <img src="{{$category->icon}}" alt="{{$category->title}}">
                            <a href="{{route('blog.fitred',$category->slug)}}">{{$category->title}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="category-popup__separate-line category-popup__separate-line-clip-fix"></div>
                <ul class="category-popup__list">
                    @foreach($allCategory->where('isMain',false) as $category)
                        <li>
                            <img src="{{$category->icon}}" alt="{{$category->title}}">
                            <a href="{{route('blog.fitred',$category->slug)}}">{{$category->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>