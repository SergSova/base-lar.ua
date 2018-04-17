<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 13:56
 */


/** @var \App\Models\InstitutionSubCategory $model */
$title = ($model->id
        ? "Редактирование \"$model->name\" "
        : 'Создание ')
    .'подкатегории'
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('institution-sub-categories.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route('institution-sub-categories.'.($model->id ?'update':'store'),$model->id),'method'=>$model->id ?'PUT':'POST','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('parent_id', 'Категория') }}
            {{ Form::select('parent_id', $all_category ,$model->parent_id,['class'=>'form-control','placeholder'=>'Выберите категорию']) }}
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Название') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>


        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection
