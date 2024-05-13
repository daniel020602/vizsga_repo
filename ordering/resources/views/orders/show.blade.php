<h2>{{ $order->name}}</h2>
<p>{{ $order->desc}}</p>
<p>{{ $order->price*$order->quantity}} Ft</p>
<a href="{{route('orders.edit',$order->id)}}">szerkesztés</a>
<form action="{{route('orders.destroy',$order->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit">törlés</button>
</form>
@if($order->done)
    <h3>teljesítve</h3>
@endif