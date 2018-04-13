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
                </tr>
            @endforeach
        </table>
        @endrole
    </div>
@endsection
