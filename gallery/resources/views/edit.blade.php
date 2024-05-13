<form action="{{route('images.update',$image->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT');
    <div>
        <img src="{{ asset($image->image_url) }}" alt="" style="max-width: 150px;">
    </div>
    <div>
        <label for="">cím</label>
        <input type="text" name="title" id="" value="{{$image->title}}">
    </div>
    <div>
        <label for="">leírás (nem kötelező)</label>
        <textarea name="desc" id="">{{$image->desc}}</textarea>
    </div>
    <div>
        <label for="">kép feltöltése:</label>
        <input type="file" name="image_url" id="">
    </div>

    <button type="submit">létrehozás</button>
</form>