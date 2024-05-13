<a href="{{route('posts.index')}}">bejegyzések</a>
<form action="{{route('posts.store')}}" method="POST">
@csrf
<h2>új bejegyzés</h2>
<div>
    <label for="">nicknév:</label>
    <input type="text" name="nick">
</div>
<div>
    <label for="">cím:</label>
    <input type="text" name="title" value="">
</div>
<div>
    <label for="">bevezetés: </label>
    <input type="text" name="intro" id="">
</div>
<div><label for="">bejegyzés szövege</label>
<textarea name="desc" id=""></textarea>
</div>
<div>
    <button type="submit">létrehozás</button>
</div>
</form>