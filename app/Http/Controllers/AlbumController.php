<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\AlbumResource;
use App\Album;
use App\Image;

class AlbumController extends Controller
{
    public function create()
    {
        return view('album.create');
    }

public function store(Request $request)
{
  
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|integer',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        
        $imageName = time() . '_' . $file->getClientOriginalName();

      
        $file->move(public_path('album'), $imageName);
    } else {
        return response()->json(['error' => 'Image not uploaded'], 400);
    }

    
    $album = Album::create([
        'name' => $request->name,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'slug' => Str::slug($request->name),
        'user_id' => auth()->user()->id,
        'image' => $imageName
    ]);

   
    return response()->json(['id' => $album->id]);
}



}
