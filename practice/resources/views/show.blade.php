@extends('layouts.app')

@section('content')
    <h2>{{$task->title}}</h2>
    <p>{{$task->desc}}</p>
    <p>{{$task->deadline}}</p>
   @if($task->done===false)
    <a href="{{route('tasks.edit',$task->id)}}">szerkesztés</a>
    <form action="{{route('tasks.destroy',$task->id)}}">
    @csrf
    @method('DELETE')
        <button type="button">törlés</button>submit
    </form>
    @endif
@endsection