<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 27.03.2018
 * Time: 16:05
 */

/**
 *
 * @var \App\Models\BlogCategory $model
 */

?>

@extends('layouts.admin')

@section('title', 'Категории')

@section('content')
    <div class="container">
        <h1>Категории</h1>
        <a href="{{route('blog-category.create')}}" class="btn btn-success btn-sm">Добавить категорию</a>
        <table class="table table-hover table-sm ">
            <thead>
            <tr>
                <td>Id</td>
                <td>Иконка</td>
                <td>Название</td>
                <td>В меню слева</td>
                <td></td>
            </tr>
            </thead>
            @forelse($model as $category)
                <tr>
                    <td>
                        <span>{{$category->id}}</span>
                    </td>
                    <td><img src="{{trim($category->icon)}}" class="img-fluid img-thumbnail" alt="" style="height: 50px"></td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->isMain?'&spades;':''}}</td>
                    <td>
                        <div class="btn-group float-right">
                            <a href="{{ route('blog-category.edit',[$category->id]) }}" class="btn btn-sm btn-info">Редактировать</a>
                            <form action="{{route('blog-category.destroy',$category->id)}}" method="delete">
                                <button class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection