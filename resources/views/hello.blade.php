@extends('layouts.default')

@section('title')
    <title>Hello page</title>
@stop
            
@section('content')
    <h1>Hello, {{ $name }}!</h1>
@stop
