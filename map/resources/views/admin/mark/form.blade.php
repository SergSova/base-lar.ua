<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 13:56
 */


/** @var \App\Models\Mark $model */
$title = ($model->id
        ? "Редактирование \"$model->name\" "
        : 'Создание ')
    .'метки'
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{$model->cat_id?route('institution-categories.show',$model->cat_id): route('mark.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route('mark.'.($model->id ?'update':'store'),$model->id),'method'=>$model->id ?'PUT':'POST','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('cat_id', 'Категория') }}
            {{ Form::select('cat_id', $all_category ,$model->cat_id,['class'=>'form-control','placeholder'=>'Выберите категорию']) }}
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Название') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>

        @include('admin.chanks.img_lfm',['id'=>'icon','name'=>'icon','title'=>'Картинка'])

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection


@section('scripts')
    @parent
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
@endsection