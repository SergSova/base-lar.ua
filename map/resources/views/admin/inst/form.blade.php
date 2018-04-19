<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 19.04.2018
 * Time: 13:06
 */

/**
 * @var \App\Models\Institution $model
 */

$title = ($model->id
        ? "Редактирование \"$model->name\" "
        : 'Создание ')
    .'Заведение'
?>

@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('institution-categories.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>
        {!! Form::model($model,['url'=>route('institution-categories.'.($model->id ?'update':'store'),$model->id),'method'=>$model->id ?'PUT':'POST','class'=>'']) !!}

        <div class="form-group">
            {{ Form::label('name', 'Название') }}
            {{ Form::text('name', null ,['class'=>'form-control']) }}
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('country_id', 'Страна') }}
                    {{ Form::select('country_id', $all_country, $model->district?$model->district->city->country->id:null ,['class'=>'form-control','placeholder'=>'Выберите страну']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('city_id', 'Город') }}
                    {{ Form::select('city_id', [] ,$model->district?$model->district->city->id:null,['class'=>'form-control city-sel','placeholder'=>'Выберите город','disabled'=>'']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('district_id', 'Район') }}
                    {{ Form::select('district_id', [] ,$model->district?$model->district->id:null,['class'=>'form-control dist-sel','placeholder'=>'Выберите район','disabled'=>'']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Адрес') }}
                    {{ Form::text('address', null ,['class'=>'form-control']) }}
                </div>
            </div>
            <div id="map" class="map col"></div>
        </div>
        <div class="form-group">
            {{ Form::label('metro_id', 'Ближайшее метро') }}
            {{ Form::select('metro_id', [] ,$model->district?$model->district->id:null,['class'=>'form-control metro-sel','placeholder'=>'Выберите метро','disabled'=>'']) }}
        </div>

        <div class="form-group">
            {{ Form::label('avg_cost', 'Средний чек') }}
            {{ Form::text('avg_cost', null ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('cuisine', 'Кухня') }}
            {{ Form::text('cuisine', null ,['class'=>'form-control']) }}
        </div>

        <div class="card">
            <p class="card-header">Телефоны</p>
            <div class="form-row card-body">
                @for($i=0;$i<3;$i++)
                    <div class="form-group col">
                        {{ Form::label("phones[$i]", 'Телефон '.($i+1)) }}
                        {{ Form::text("phones[$i]", $model->phones[$i] ,['class'=>'form-control']) }}
                    </div>
                @endfor
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null ,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('web', 'Сайт') }}
            {{ Form::text('web', null ,['class'=>'form-control']) }}
        </div>

        <div class="card">
            <p class="card-header">Социальные сети</p>
            <div class="form-row card-body">
                <div class="form-group col">
                    {{ Form::label("socials[facebook]", 'Facebook') }}
                    {{ Form::text("socials[facebook]", $model->phones['facebook'] ,['class'=>'form-control']) }}
                </div>
                <div class="form-group col">
                    {{ Form::label("socials[instagram]", 'Instagram') }}
                    {{ Form::text("socials[instagram]", $model->phones['instagram'] ,['class'=>'form-control']) }}
                </div>
                <div class="form-group col">
                    {{ Form::label("socials[twitter]", 'Twitter') }}
                    {{ Form::text("socials[twitter]", $model->phones['twitter'] ,['class'=>'form-control']) }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Категории</div>
            <div class="card-body category-wrap">
                @foreach($all_category as $id=>$category)
                    <div class="form-inline">
                        {{ Form::radio("category_id", $id, $model->category_id==$id ,['class'=>'form-check-input','id'=>'cat'.$id]) }}
                        {{ Form::label('cat'.$id, $category,['class'=>'form-check-label']) }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="card-header">Подкатегории</div>
            <div class="card-body sub-cat">
            </div>
        </div>


        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection


@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6eYPVrcBB2xUKn26N_oW7756dny5hgXo&callback=initMap&language=ru&region=Ru"
            async defer></script>
    <script src="{{asset('assets/js/map/map.js')}}"></script>
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
                    var options = $('.city-sel option:first-of-type').clone()[0].outerHTML;
                    $.each(resp, function (key, city) {
                        options += '<option value="' + key + '">' + city + '</option>'
                    });
                    $('.city-sel').html(options);

                    //выключить селекторы и удалить лишние значения
                    $('.dist-sel').attr('disabled', '');
                    $('.dist-sel option:not(:first-of-type)').remove();
                    $('.metro-sel').attr('disabled', '');
                    $('.metro-sel option:not(:first-of-type)').remove();
                }
            });
        });
        $('#city_id').on('change', function (e) {
            e.preventDefault(e);
            val = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('distByCity')}}' + '/' + val,
                method: 'post',
                success: function (resp) {
                    resp = JSON.parse(resp);

                    $('.dist-sel').removeAttr('disabled');
                    var options = $('.dist-sel option:first-of-type').clone()[0].outerHTML;
                    $.each(resp, function (key, district) {
                        options += '<option value="' + key + '">' + district + '</option>'
                    });
                    $('.dist-sel').html(options);
                }
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('metroByCity')}}' + '/' + val,
                method: 'post',
                success: function (resp) {
                    resp = JSON.parse(resp);

                    $('.metro-sel').removeAttr('disabled');
                    var options = $('.metro-sel option:first-of-type').clone()[0].outerHTML;
                    $.each(resp, function (key, metro) {
                        options += '<option value="' + key + '">' + metro + '</option>'
                    });
                    $('.metro-sel').html(options);
                }
            });
        });

        $('.category-wrap input[type="radio"]').on('change', function (e) {
            val = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('subcatByCategory')}}' + '/' + val,
                method: 'post',
                success: function (resp) {
                    options = '';
                    $.each(resp, function (key, subcat) {
                        options += '<div class="form-inline">' +
                            '<input class="form-check-input" id="sub_cat' + key + '" name="sub_category[' + key + ']" type="checkbox" value="1">' +
                            '<label for="sub_cat' + key + '">' + subcat + '</label>' +
                            '</div>'
                    });
                    $('.sub-cat').html(options);
                }
            });
        });
    </script>
@endsection