<?php
/**
 * Created by PhpStorm.
 * User: Chepur
 * Date: 16.04.2018
 * Time: 11:47
 */

/**
 * @var \App\User[] $users
 */

$title = 'Пользователи';
?>
@section('title',$title)

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$title}}</h1>
        @role('super-admin')
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Имя</th>
                @foreach($roles as $role)
                    <th>{{$role->name}}</th>
                @endforeach
                <th>Edit</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}} ({{$user->email}})</td>
                    @foreach($roles as $role)
                        <td>
                            @if($user->hasRole($role->name))
                                <input type="checkbox" checked onchange="window.location.assign('{{route('user.unsetRole',[$user->id,$role->name])}}')">
                            @else
                                <input type="checkbox" onchange="window.location.assign('{{route('user.setRole',[$user->id,$role->name])}}')">
                            @endif
                        </td>
                    @endforeach
                    <td>
                        <button class="btn-edit btn btn-sm btn-primary" data-url="{{route('user.edit',$user->id)}}">Edit</button>
                    </td>
                    <td>
                        @isset($user->property)
                            <button data-url="{{route('user.status',[$user->id,$user->property->ex_status])}}"
                                    class="btn-status btn btn-sm btn-{{$user->property->isActive()?'info':'success'}}">{{$user->property->isActive()?'Заблокировать':'Разблокировать'}}</button>
                        @endisset
                    </td>
                    <td>
                        <a class="btn-destr btn btn-danger btn-sm" data-url="{{route('user.destroy',$user->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Page navigation example">
            {{$users->links('admin.blog.pagination')}}
        </nav>
        @endrole
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
        $('.btn-status').on('click', function (e) {
            e.preventDefault(e);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(this).data('url'),
                method: 'post',
                success: function (resp) {
                    console.log(resp);
                    if (resp == 1) {
                        location.reload();
                    }
                }
            });
        })
        $('.btn-edit').on('click', function (e) {
            e.preventDefault(e);
            location.assign($(this).data('url'));
        })
    </script>
@endsection