<?php
/**
 * @var \App\User[] $users
 */

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
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
                                <input type="checkbox" checked onchange="window.location.assign('{{route('unsetRole',[$user->id,$role->name])}}')">
                            @else
                                <input type="checkbox" onchange="window.location.assign('{{route('setRole',[$user->id,$role->name])}}')">
                            @endif
                        </td>
                    @endforeach
                    <td>Edit</td>
                    <td>
                        @isset($user->property)
                            @switch($user->property->status)
                                @case('active')
                                <a href="{{route('userStatus',[$user->id,$user->property->status])}}" class="btn btn-sm btn-info">Заблокировать</a>
                                @break
                                @case('blocked')
                                <a href="{{route('userStatus',[$user->id,$user->property->status])}}" class="btn btn-sm btn-success">Разблокировать</a>
                                @break
                            @endswitch
                        @endisset
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm destr">Delete</a>
                        <form id="destroy-form" action="{{route('destroyUser',$user->id)}}" method="delete" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @endrole
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $('.destr').on('click', function (e) {
            e.preventDefault(e);
            $('.destroy-form').submit();
        });
    </script>
@endsection