<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 16:37
 */


/**
 * @var \App\Models\InstitutionSubCategory[] $models
 */
?>
@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{route('institution-categories.index')}}" class="btn btn-success btn-sm">К категориям</a>
        <h1>{{$title}}</h1>
        <a href="{{route('institution-sub-categories.create',$parent_id)}}">
            <button class="btn btn-sm btn-primary">Добавить подкатегорию</button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Имя</th>
                <th>Show / Edit / Delete</th>
            </tr>
            @foreach($models as $model)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="{{route('institution-sub-categories.show',$model->id)}}" class="text-primary">Show</a>
                        /
                        <a href="{{route('institution-sub-categories.edit',$model->id)}}" class="text-info">Edit</a>
                        /
                        <a href="#" class="text-danger btn-destr" data-url="{{route('institution-sub-categories.destroy',$model->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Page navigation example">
            {{$models->links('admin.blog.pagination')}}
        </nav>

        <a href="{{route('mark.create',$parent_id)}}">
            <button class="btn btn-sm btn-primary">Добавить метку</button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>icon</th>
                <th>Имя</th>
                <th>Edit / Delete</th>
            </tr>
            @foreach($marks as $mark)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mark->id}}</td>
                    <td><img src="{{$mark->icon}}" alt="{{$mark->name}}"></td>
                    <td>{{$mark->name}}</td>
                    <td>
                        <a href="{{route('mark.edit',$mark->id)}}" class="text-info">Edit</a>
                        /
                        <a href="#" class="text-danger btn-destr" data-url="{{route('mark.destroy',$mark->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Page navigation example">
            {{$marks->links('admin.blog.pagination')}}
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