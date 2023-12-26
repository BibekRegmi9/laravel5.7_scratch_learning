@extends('layout')

@section('content')
    <h1 class="title">{{$project->title}}</h1>
    <div class="content">
        {{ $project->description }}
    </div>
    <p>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </p>
{{--    @if($project->tasks->count())--}}
    <div>
        <h3>Tasks:</h3>
        @foreach($project->tasks as $task)
            <div>
                <form method="POST" action="/tasks/{{$task->id}}">
                    @method('PATCH')
                    @csrf
                    <label class="checkbox" {{$task->completed ? 'is-complete' : ''}} for="completed">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                        {{ $task->description }}
                    </label>
                </form>
            </div>
        @endforeach
    </div>
{{--    @endif--}}

    <form class="field" method="POST" action="/projects/{{$project->id}}/tasks">
        @csrf
        <div class="box">
            <label class="label" for="description">New Task:</label>
            <div>
                <input type="text" class="input" name="description" placeholder="New Task">
            </div>
        </div>
        <button type="submit">Add Task</button>
    </form>



@endsection
