<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 04.04.2018
 * Time: 16:44
 */


/**
 * @var \App\StaticPage|\App\Post $model
 */
?>

<meta name="robots" content="noindex, nofollow">
<link rel="icon" type="image/png" href="{{asset('favicon.png')}}" />
@isset($model->seo->seo_description)
    <meta name="description" content="{{$model->seo->seo_description}}"/>
@endisset
@isset($model->seo->seo_keywords)
    <meta name="keywords" content="{{$model->seo->seo_keywords}}"/>
@endisset
@isset($model->seo->og_title)
    <meta property="og:title" content="{{$model->seo->og_title}}"/>
@endisset
@isset($model->seo->og_description)
    <meta property="og:description" content="{{$model->seo->og_description}}"/>
@endisset
@isset($model->seo->og_image)
    <meta property="og:image" content="{{$model->seo->og_image}}"/>
@endisset