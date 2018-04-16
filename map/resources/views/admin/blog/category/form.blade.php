<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 27.03.2018
 * Time: 16:19
 */
/**
 * @var \App\Models\BlogCategory $model
 */
?>
@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('blog-category.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route($route,[$model->id]),'method'=>$method,'class'=>'']) !!}

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach(\App\Http\Middleware\Locale::$languages as $lang)
                    <a class="nav-item nav-link {{$loop->first?'active':''}}" id="nav-{{$lang}}-tab" data-toggle="tab"
                       role="tab" aria-controls="nav-{{$lang}}" aria-selected="true"
                       href="#nav-{{$lang}}">{{$lang=='uk'?'ua':$lang}}</a>
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach(\App\Http\Middleware\Locale::$languages as $lang)
                <div class="tab-pane fade {{$loop->first?'show active':''}}" id="nav-{{$lang}}" role="tabpanel" aria-labelledby="nav-{{$lang}}-tab">
                    <div class="form-group">
                        {{ Form::label('title_'.$lang, 'Заголовок '.$lang) }}
                        {{ Form::text('title_'.$lang, null ,['class'=>'form-control']) }}
                    </div>
                </div>
                @endforeach
        </div>
        <div class="form-group ">
            {{ Form::label('isMain', 'В левом списке',['class'=>'form-check-label']) }}
            {{ Form::checkbox('isMain', 1, null ) }}
        </div>

        @include('admin.chanks.img_lfm',[
                'id'=>'icon',
                'name'=>"icon",
                'title'=>'Картинка',
                'value'=>$model->icon ??null
                ])

        {{--@include('admin.seo_form')--}}

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection

