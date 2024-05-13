<h1>képgaléria</h1>
<a href="{{route('images.create')}}">új kép</a>
<div>
    <a class="text-decoration-none text-dark" href="{{ url()->current() . '?' . http_build_query([...request()->all(), 'order' => 'title', 'direction' => 'desc']) }}">
                        <i class="fa-solid fa-arrow-up">csökkenő-cím</i>
                    </a>
</div>
                <div>
                    <a class="text-decoration-none text-dark" href="{{ url()->current() . '?' . http_build_query([...request()->all(), 'order' => 'title', 'direction' => 'asc']) }}">
                        <i class="fa-solid fa-arrow-down">növekvő-cím</i>
                    </a>
                </div>
                <div>
                    <a class="text-decoration-none text-dark" href="{{ url()->current() . '?' . http_build_query([...request()->all(), 'order' => 'created_at', 'direction' => 'desc']) }}">
                        <i class="fa-solid fa-arrow-up">csökkenő-dátum</i>
                    </a>
                </div>
                <div>
                    <a class="text-decoration-none text-dark" href="{{ url()->current() . '?' . http_build_query([...request()->all(), 'order' => 'created_at', 'direction' => 'asc']) }}">
                        <i class="fa-solid fa-arrow-down">növekvő-dátum</i>
                    </a>
                </div>
                <h2>keresés</h2>
                <form action="" method="get">
                    <label for="">cím</label>
                    <input type="text" name="title" value="{{ request()->title }}">
                    <label for="">dátum</label>
                    <input type="date" name="created_at[from]" id="" value="{{request()->created_at && request()->created_at['from']}}">-
                    <input type="date" name="created_at[to]" id="" value="{{request()->created_at && request()->created_at['to']}}">
                    <button type="submit">keres</button>
                </form>
@foreach ($images as $image)
    <h3><a href="{{route('images.show',$image->id)}}">{{ $image->title }} - {{ date('Y-m-d', strtotime($image->created_at)) }}</a></h3>
    <a href="{{route('images.edit',$image->id)}}">szerkesztés</a>
    <form action="{{route('images.destroy',$image->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">törlés</button>
    </form>
    <div>
        <img src="{{ asset($image->image_url) }}" alt="" style="max-width: 150px;">
    </div>
@endforeach
