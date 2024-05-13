<a href="{{route('products.index')}}">termékek</a>
<a href="{{route('orders.index')}}">rendelések</a>
<a href="{{route('products.create')}}">új termék</a>
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
        @foreach ($products as $product)
        
            <tr>
                <td>
                <a href="{{route('products.show',$product->id)}}">{{ $product->name}}</a>
                </td>
                <td>
                    {{ $product->price}}
                </td>
            </tr>
        
        @endforeach
    </tbody>
</table>