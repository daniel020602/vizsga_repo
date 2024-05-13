<a href="{{route('products.index')}}">termékek</a>
<a href="{{route('orders.index')}}">rendelések</a>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Név:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}">
    
    <label for="desc">Leírás:</label>
    <textarea name="desc" id="desc">{{ $product->desc }}</textarea>
    
    <label for="price">Ár:</label>
    <input type="number" name="price" id="price" min="0" value="{{ $product->price}}">
    
    <button type="submit">Szerkesztés</button>
</form>
