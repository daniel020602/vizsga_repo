@extends('layouts.app')

@section('content')
@auth

<h2>új feladat létrehozása</h2>
<form action="{{route('tasks.store')}}" method="POST">
@csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div>
        <label for="">cím</label>
        <input type="text" name="title">

    </div>
    <label for="">leírás</label>
    <textarea name="desc" id=""></textarea>
    <div>
        <label for="">határidő</label>
        <input type="datetime" name="deadline" id="">
    </div>
    <button type="submit">létrehozás</button>
</form>
@endauth
@endsection