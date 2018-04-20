<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 16:37
 */


/**
 * @var \App\Models\Mark[] $models
 */
?>
@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <a href="{{route('mark.create')}}">
            <button class="btn btn-sm btn-primary">Добавить метку</button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Категория</th>
                <th>icon</th>
                <th>Имя</th>
                <th>Edit / Delete</th>
            </tr>
            @foreach($models as $model)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$model->id}}</td>
                    <td>
                        @isset($model->cat_id)
                            <a href="{{route('institution-categories.show',$model->parent->id)}}">{{$model->parent->name}}</a>
                        @else
                            Общий
                        @endisset
                    </td>
                    <td><img src="{{$model->icon}}" alt="{{$model->name}}"></td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="{{route('mark.edit',$model->id)}}" class="text-info">Edit</a>
                        /
                        <a class="text-danger  btn-destr"
                           data-url="{{route('mark.destroy',$model->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Page navigation example">
            {{$models->links('admin.blog.pagination')}}
        </nav>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $('.btn-destr').on('click', function (e) {
            e.preventDefault(e);
            if (confirm('Вы уверенны?'))
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $(this).data('url'),
                    method: 'delete',
                    success: function (resp) {
                        console.log(resp);
                        if (resp == 1) {
                            location.reload();
                        }
                    }
                });
        });
    </script>
@endsection