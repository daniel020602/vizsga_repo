@extends('layouts.app')

@section('content')
<h2>új feladat létrehozása</h2>
<form action="{{route('tasks.update',$task->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div>
        <label for="">cím</label>
        <input type="text" name="title" value="{{$task->title}}">

    </div>
    <label for="">leírás</label>
    <textarea name="desc" id="">{{$task->desc}}</textarea>
    <div>
        <label for="">határidő</label>
        <input type="datetime" name="deadline" id="" value="{{$task->deadline}}">
    </div>
    <div>
        <label for="">kész</label>
        <input type="checkbox" name="done" id="" value="1">
    </div>
    <button type="submit">mentés</button>
</form>
@endsection