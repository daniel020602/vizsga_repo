<form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div>
        <label for="">cím</label>
        <input type="text" name="title" id="">
    </div>
    <div>
        <label for="">leírás (nem kötelező)</label>
        <textarea name="desc" id=""></textarea>
    </div>
    <div>
        <label for="">kép feltöltése:</label>
        <input type="file" name="image_url" id="">
    </div>

    <button type="submit">létrehozás</button>
</form>