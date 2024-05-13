@extends('layouts.app')

@section('content')
<a href="{{route('tasks.create')}}">új feladat</a>
    <h2>folyamatban lévő feladatok</h2>
    <form action="" method="get">
        <label for="">keresés</label>
        <input type="text" name="title" value="{{request()->title}}" id="">
    </form>
        @foreach ($tasks_in_progress as $task)
            <h3><a href="{{route('tasks.show',$task->id)}}">{{$task->title}}</a></h3>
            <h4>{{$task->deadline}}</h4>
        
        @endforeach
    <h2>befejezett feladatok</h2>
    @foreach ($tasks_done as $task)
    <h3><a href="{{route('tasks.show',$task->id)}}">{{$task->title}}</a></h3>

        @endforeach
@endsection