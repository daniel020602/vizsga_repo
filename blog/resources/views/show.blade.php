<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</head>
<body>
    <a href="{{route('posts.edit',$post->id)}}">szerkesztés</a>
    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">törlés</button>
    </form>
    <a href="{{route('posts.index')}}">bejegyzések</a>
    <h2>{{$post->title}} - {{$post->nick}}</h2>
        <p>{{$post->updated_at}}</p>
        <h4>{{$post->intro}}</h4>
    <p>{{$post->desc}}</p>

    <p>kommentek:</p>
    @foreach ($comments as $comment)
    <p>{{$comment->comment}}</p>
    @endforeach
    {{$comments->links()}}
    <form action="{{route('comments.store',)}}" method="POST">
    @csrf
<fieldset>
    <legend>hozzászólás írása</legend>
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <input type="text" name="comment" id="">
</fieldset>
    </form>
</body>
</html>