<a href="{{route('products.index')}}">termékek</a>
<a href="{{route('orders.index')}}">rendelések</a>
<h3>{{$product->name}}</h3>
<form action="{{route('orders.store')}}" method="POST">
@csrf

    <label for="">
        rendelő neve
    </label>

    <input type="text" name="person" id="">
    <label for="">mennyiség</label>
    <input type="number" name="quantity" id="" min="0">
    <input type="hidden" name="done" value="false">
    <input type="hidden" name="product" value="{{$product->id}}">
    <button type="submit">létrehozás</button>

</form>