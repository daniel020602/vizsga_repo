<a href="{{route('products.index')}}">termékek</a>
<a href="{{route('orders.index')}}">rendelések</a>
<table>
    <thead>
        <tr>
            <th>
                név
            </th>
            <th>
                ár
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        
            <tr>
                <td>
                <a href="{{route('orders.show',$order->id)}}">{{ $order->name}}</a>
                </td>
                <td>
                    {{ $order->price}}
                </td>
            </tr>
        
        @endforeach
    </tbody>
</table>