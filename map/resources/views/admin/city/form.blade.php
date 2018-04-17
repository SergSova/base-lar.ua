<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 13:56
 */


/** @var \App\Models\City $model */
$title = ($model->id
        ? "Редактирование \"$model->name\" "
        : 'Создание ')
    .'города'
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('city.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route('city.'.($model->id ?'update':'store'),$model->id),'method'=>$model->id ?'PUT':'POST','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('name', 'Название') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('country_id', 'Страна') }}
            {{ Form::select('country_id', $all_countries ,$model->country_id,['class'=>'form-control','placeholder'=>'Выберите страну']) }}
        </div>

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection
