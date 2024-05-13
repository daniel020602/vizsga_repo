<a href="{{route('products.index')}}">termékek</a>
<a href="{{route('orders.index')}}">rendelések</a>
<form action="{{route('products.store')}}" method="POST">
@csrf
    <label for="">
        név
    </label>
    <input type="text" name="name" id="">
    <label for="">leírás</label>
    <textarea name="desc" id=""></textarea>
    <label for="">ár</label>
    <input type="number" name="price" id="" min="0">
    <button type="submit">létrehozás</button>
</form>