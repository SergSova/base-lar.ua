<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 16:37
 */


/**
 * @var \App\Models\InstitutionCategory[] $models
 */
?>
@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <a href="{{route('institution-categories.create')}}">
            <button class="btn btn-sm btn-primary">Добавить категорию</button>
        </a>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Имя</th>
                <th>Show / Edit / Delete</th>
            </tr>
            @foreach($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="{{route('institution-categories.show',$model->id)}}">Show</a>
                        /
                        <a href="{{route('institution-categories.edit',$model->id)}}" class="text-info">Edit</a>
                        /
                        <a class="text-danger  btn-destr"
                           data-url="{{route('institution-categories.destroy',$model->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Page navigation example">
            {{$models->links()}}
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