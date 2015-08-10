@extends('layouts.default')

@section('title')
    <title>List of registered users</title>
@stop
            
@section('content')
    @if ($users->count())
        <h1>Hello, {{ $user->first_name }}!</h1>
        @foreach ($users as $user)
            <li>{{ $user->first_name }} {{ $user->last_name }}</li>
        @endforeach
    @else
        <p>There are no users.</p>
    @endif
    <br>
    <a href="/logout">Logout</a>
@stop
            