<?php
/**
 * Created by PhpStorm.
 * User: sergs
 * Date: 20.03.2018
 * Time: 14:13
 */

use Carbon\Carbon;

/**
 *
 * @var \App\Models\Blog $model
 */
$title = 'Блог';

$date = Carbon::now()->diffForHumans();
?>

@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <div class="btn-toolbar">
            <a href="{{route('blog.create')}}" class="btn btn-success btn-sm ">Добавить статью</a>
            {{Form::open(['route'=>['blog.clear'], 'method'=>'delete'])}}
            <button onclick="return confirm('are you sure?')" type="submit" class="btn-sm  btn btn-danger">
                Удалить все помеченые на удаление
            </button>
            {{Form::close()}}
        </div>
        <table class="table table-sm table-hover table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                {{--<td>index</td>--}}
                <td>Картинка</td>
                <td>Категория</td>
                <td>Заголовок</td>
                <td>Опубликовано</td>
                <td>Важно/Сир./Заг./Видео</td>
                <td></td>
            </tr>
            </thead>
            @forelse($models=$model->posts()/*->where('lang',app()->getLocale())*/ as $post)
                <tr {{$post->trashed()?'class=table-danger':''}}>
                    <td>{{$post->id}}</td>
                    {{--                    <td>{{$post->index}}</td>--}}
                    <td><img src="{{trim($post->mainImage)}}" class="img-fluid img-thumbnail" alt=""
                             style="height: 50px"></td>
                    <td>
                        @if($post->category)
                            {{$post->category->title}}
                        @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{!! $post->format_data  !!}</td>
                    <td>{{$post->isBig?'да':'нет'}}/{{$post->isVioletPostStyle?'да':'нет'}}
                        /{{$post->isBlackTitle?'да':'нет'}}/{{$post->isVideo?'да':'нет'}}</td>
                    <td>
                        <div class="btn-group">
                            @if(!$post->trashed())
                                <a href="{{$post->url}}" class="btn-sm  btn btn-secondary" target="_blank">Посмотреть</a>
                                <a href="{{ route('blog.edit',[$post->id]) }}" class="btn-sm  btn btn-info">Редактировать</a>                                <a href="{{ route('blog.pub',[$post->id]) }}"
                                   class="btn-sm  btn {{$post->published?'btn-warning':'btn-success'}}">{{$post->published?'Снять с публикации':'Опубликовать'}}</a>
                            @else
                                {{Form::open(['route'=>['blog.restore',$post->id],'method'=>'post'])}}
                                <input type="submit" class="btn-sm  btn btn-success" value="Востановить"/>
                                {{Form::close()}}
                            @endif
                            {{Form::open(['route'=>[($post->trashed()?'blog.clear':'blog.destroy'), $post->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('are you sure?')" type="submit"
                                    class="btn-sm  btn btn-danger">
                                {{$post->trashed()?'Удалить совсем':'Удалить'}}
                            </button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
        <nav aria-label="Page navigation example">
            {{$models->links('admin.blog.pagination')}}
        </nav>
    </div>
@endsection

