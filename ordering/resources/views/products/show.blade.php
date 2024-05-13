<h2>{{ $product->name}}</h2>
<p>{{ $product->desc}}</p>
<p>{{ $product->price}}</p>
<a href="{{route('products.edit',$product->id)}}">szerkesztés</a>
<form action="{{route('products.destroy',$product->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit">törlés</button>
</form>
<a href="{{route('orders.create',$product->id)}}">rendelés</a>