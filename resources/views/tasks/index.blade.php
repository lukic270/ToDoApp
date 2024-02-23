@extends('tasks.layouts.app')

@section('content')

<h1>Task List</h1>  


@foreach($tasks as $task)

<div @if($task->isCompleted()) class="card border-success" @else class="card border-danger" @endif style="margin-bottom: 20px">
    <div class="card-body">

        @if($task->isCompleted())
        <span class="badge badge-success">Completed</span>
        @endif

        <p>{{ $task->description }}</p>
    </div>

    @if(!$task->isCompleted())
    <div class="card-footer">
        <form action='/tasks/{{ $task->id }}' method="POST"> 
            @method('PATCH')
            @csrf 
            <button type="submit" class="btn btn-light btn-block">Complete</button>
        </form>
    </div>
    @else
    <div class="card-footer">
        <form action='/tasks/{{ $task->id }}' method="POST"> 
            @method('DELETE')
            @csrf 
            <button type="submit" class="btn btn-danger btn-block">Delete</button>
        </form>
    </div>
    @endif

</div>

@endforeach

<a href="/tasks/create" class="btn btn-primary btn-lg btn-block">New Tasks</a>

@endsection
