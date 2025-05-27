<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Pists;
use Symfony\Contracts\Service\Attribute\Required;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $pists = Pists::all();
        return view('imageUpload',compact('pists'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();  
                $image->move(public_path('images'), $imageName);
                $images[]['name'] = $imageName;
            }
        }
        foreach ($images as $key => $image) {
            Image::create($image);
        }
        return back()
                ->with('success','Foto Kegiatan')
                ->with('images', $images); 
    }
}