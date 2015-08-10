@extends('layouts.default')

@section('title')
    <title>Login</title>
@stop
            
@section('content')
    <h1>Log in</h1>
    {!! Form::open(['action' => 'UsersController@authenticate']) !!}  
    {!! Form::token() !!}
        <div>
            {!! Form::label('email', 'E-mail: ') !!}
            {!! Form::text('email') !!} <br>
        </div>
        <div>
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password') !!} <br>
        </div>
        <div>
            {!! Form::submit('Log in') !!}<br><br>
            Don't have acount? <a href="/users/create">Register</a>
        </div>
    {!! Form::close() !!}
@stop