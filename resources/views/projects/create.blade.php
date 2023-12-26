<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a project</title>
</head>
<body>
<h1>Create a new project: </h1>

<form method="POST" action="/projects">
    {{csrf_field()}}
<div>
    <input type="text", name="title" placeholder="Project Title: " required>
</div>

<div>
    <textarea name="description" placeholder="Project Description: " required>


    </textarea>
</div>
    <button type="submit">Create Project</button>
{{--<div>--}}

{{--    @if($errors()->any())--}}
{{--        <div class="notification is-danger">--}}
{{--            <ul>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{$error}}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}

</div>
</form>

</body>
</html>
