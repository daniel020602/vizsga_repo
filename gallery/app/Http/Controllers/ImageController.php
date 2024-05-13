<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->order === 'title') {
            $orderBy = 'title';
        }
        else
        {
            $orderBy='created_at';
        }
        
        $results = Image::query()->orderBy(
            $orderBy,
            $request->direction === 'desc' ? 'desc' : 'asc',
        )->search($request)->get();
        return view('index',[
            'images'=>$results,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        // Validate the incoming request using the ImageRequest class
        $validated = $request->validated();
        
        // Get the uploaded image file from the request
        //dd($validated);
        $filename= time().$request->file('image_url')->getClientOriginalName();
        $path=$request->file('image_url')->storeAs('images',$filename,'public');
        $validated['image_url']='/storage/'.$path;
        Image::create($validated);
        
        // Redirect the user to the index page
        return redirect()->route('images.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return view('show',['image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('edit',['image'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, Image $image)
    {
                // Validate the incoming request using the ImageRequest class
                $validated = $request->validated();
                if ($image->image_url) {
                    Storage::disk('images')->delete($image->image_url);
                }
                // Get the uploaded image file from the request
                //dd($validated);
                $filename= time().$request->file('image_url')->getClientOriginalName();
                $path=$request->file('image_url')->storeAs('images',$filename,'public');
                $validated['image_url']='/storage/'.$path;
                $image->update($validated);
                
                // Redirect the user to the index page
                return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('images.index');
    }
}
