<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 16:37
 */

/**
 * @var \App\Models\Metro[] $models
 */
?>
@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <a href="{{route('metro.create')}}">
            <button class="btn btn-sm btn-primary">Добавить метро</button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Город</th>
                <th>Имя</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($models as $model)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$model->id}}</td>
                    <td>{{$model->city->name}}</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="{{route('metro.edit',$model->id)}}" class="btn btn-sm btn-info">Edit</a>
                    </td>
                    <td><a class="btn-destr btn btn-danger btn-sm"
                           data-url="{{route('metro.destroy',$model->id)}}">Delete</a></td>
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