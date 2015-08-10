@extends('layouts.default')

@section('title')
    <title>List of registered users</title>
@stop

@section('dropdown')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->first_name }} {{ $user->last_name }}<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="/logout">Log out</a></li>
        </ul>
    </li>
@stop

@section('content')
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
@stop

