@extends('layouts.default')

@section('title')
    <title>List of registered users</title>
@stop

@section('dropdown')
    <li><a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->first_name }} {{ $user->last_name }}</a></li>
    <li><a href="/logout">Log out</a></li>
@stop

@section('content')
    <div class="col-md-6">
        @if ($users->count())
            <h1>Hello, {{ $user->first_name }}!</h1>
            <br>
            <ul>
            @foreach ($users as $user)
                    <li>{{ $user->first_name }} {{ $user->last_name }}</li>
            @endforeach
            </ul>
        @else
            <p>There are no users.</p>
        @endif
        <br>
    </div>

    <div class="col-md-6" ng-app="myApp">

        <div ng-view></div>

    </div>
@stop

