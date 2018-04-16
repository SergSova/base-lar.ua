@extends('layouts.admin')

@section('title',$title)

@section('content')
    <div class="container">
        <a href="{{route('blog.index')}}" class="btn btn-sm btn-success mb-2">Назад</a>
        <h1>{{$title}}</h1>

        {!! Form::model($model,['url'=>route($route,[$model->id]),'method'=>$method,'class'=>'']) !!}

        @include('admin.blog.form.post_form')

        {{ Form::submit('Сохранить',['class'=>'btn btn-primary mb-2']) }}
        {!! Form::close() !!}
    </div>
@endsection
