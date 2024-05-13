<a href="{{route('images.index')}}"></a>
<h2>{{$image->title}}</h2>
<img src="{{ asset($image->image_url) }}" alt="" style="max-width: 150px;">
<p>{{$image->desc}}</p>