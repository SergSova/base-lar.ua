<?php
/**
 * Created by PhpStorm.
 * User: sergs
 * Date: 20.03.2018
 * Time: 14:05
 *
 * @var \App\StaticPage $model
 */
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('adminBlog')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route('editStaticBlog'),'method'=>'post','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('title', 'Заголовок') }}
            {{ Form::text('title', null ,['class'=>'form-control']) }}
        </div>

        @include('admin.seo_form')

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection
