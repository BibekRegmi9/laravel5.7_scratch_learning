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

    <form  method="POST" action="/projects/{{$project->id}}/tasks" class="box">
        @csrf
        <div class="field">
            <label class="label" for="description">New Task:</label>
            <div>
                <input type="text" class="input" name="description" placeholder="New Task">
            </div>
        </div>

        <div class="field">
            <button type="submit" class="button is-link">Add Task</button>
        </div>
    </form>



@endsection
