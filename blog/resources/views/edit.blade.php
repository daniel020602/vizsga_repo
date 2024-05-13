<a href="{{route('posts.index')}}">bejegyzések</a>
<form action="{{route('posts.update',$post->id)}}" method="POST">
@csrf
@method('PUT')
<h2>bejegyzés szerkesztése</h2>
<div>
    <label for="">nicknév:</label>
    <input type="text" name="nick" value="{{$post->nick}}">
</div>
<div>
    <label for="">cím:</label>
    <input type="text" name="title" value="{{$post->title}}">
</div>
<div>
    <label for="">bevezetés: </label>
    <input type="text" name="intro" id="" value="{{$post->intro}}">
</div>
<div><label for="">bejegyzés szövege</label>
<textarea name="desc" id="" value="">{{$post->desc}}</textarea>
</div>
<div>
    <button type="submit">szerkesztés</button>
</div>
</form>