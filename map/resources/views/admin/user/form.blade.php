<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 13:56
 */


/** @var \App\User $user */
$title = 'Редактирование пользователя "'.$user->name.'"'
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('user.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($user,['url'=>route('user.update',$user->id),'method'=>'post','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('name', 'Имя') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phones', 'Телефон') }}
            {{ Form::text('phones', $user->property->phones ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('sex', 'Пол') }}
            {{ Form::select('sex', $sex_arr ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('birthday', 'День рождения') }}
            {{ Form::date('birthday', $user->property->birthday ,['class'=>'form-control']) }}
        </div>


        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
@endsection