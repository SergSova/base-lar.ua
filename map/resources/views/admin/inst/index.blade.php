<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 19.04.2018
 * Time: 13:11
 */

?>

@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        <a href="{{route('inst.create')}}">
            <button class="btn btn-sm btn-primary">Добавить заведение</button>
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
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="{{route('inst.show',$model->id)}}">Show</a>
                        /
                        <a href="{{route('inst.edit',$model->id)}}" class="text-info">Edit</a>
                        /
                        <a href="#" class="text-danger  btn-destr" data-url="{{route('inst.destroy',$model->id)}}">Delete</a>
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
            if (confirm('Вы уверенны?')) {
                // console.log($(this).siblings('form.form-del').submit());
                // $(this).siblings().find('form.form-del').submit();

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
            }
        });

    </script>
@endsection