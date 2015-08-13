@extends('layouts.default')

@section('title')
    <title>Login</title>
@stop

@section('content')
    <h1>Log in</h1><br>
    {!! Form::open(['action' => 'UsersController@authenticate']) !!}
    {!! Form::token() !!}
        <div class="logreg">
            {!! Form::label('email', 'E-mail: ') !!}
            {!! Form::text('email') !!} <br>
        </div>
        <div class="logreg">
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password') !!}
        </div><br>
        <div>
            {!! Form::submit('Log in') !!}<br><br>
            <p>Don't have acount? <a href="/users/create">Register</a></p>
        </div>
    {!! Form::close() !!}
@stop