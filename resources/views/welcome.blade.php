@extends('layout')

@section('content')
    <h1>Welcome to Laravel 5.7  {{$foo}}</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    </ul>

@endsection
