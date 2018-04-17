<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 13:56
 */


/** @var \App\Models\Metro $model */
$title = ($model->id
        ? "Редактирование \"$model->name\" "
        : 'Создание')
    .' метро';
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('metro.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route('metro.'.($model->id ?'update':'store'), $model->id),'method'=>$model->id ?'PUT':'POST','class'=>'']) !!}

        <div class="form-row">
            <div class="form-group col">
                {{ Form::label('country_id', 'Страна') }}
                {{ Form::select('country_id', $all_countries ,$model->city?$model->city->country_id:null,['class'=>'form-control country-sel','placeholder'=>'Выберите страну']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('city_id', 'Город') }}
                {{ Form::select('city_id', $city_arr??[] ,$model->city_id,['class'=>'form-control city-sel','placeholder'=>'Выберите город','disabled'=>'']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Название') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection


@section('scripts')
    <script>
        $('#country_id').on('change', function (e) {
            e.preventDefault(e);
            var val = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('cityByCountry')}}' + '/' + val,
                method: 'post',
                success: function (resp) {
                    resp = JSON.parse(resp);

                    $('.city-sel').removeAttr('disabled');
                    var options = '';
                    $.each(resp, function (key, city) {
                        options += '<option value="' + key + '">' + city + '</option>'
                    });
                    $('.city-sel').html(options);
                }
            });
        });
    </script>
@endsection