<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Photo;
use App\Models\Pists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;

class PhotoController extends Controller
{
    public function photo (int $pistsId)
    {
        $pists = Pists::findOrFail($pistsId);
        $photo = Photo::where('pists_id', $pistsId)->get();
        return view('pists.photo',compact('pists','photo'));
    }

    public function store(Request $request, int $pistsId)
    {
        $pist = Pists::findOrFail($pistsId);
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'images.*'=>'required|image|mimes:png,jpg,jpeg,webp'
        ]);

        if ($files = $request->file('images'))
        {
            $imageData =[];
            foreach ($files as $key => $file) {
                $extension  = $key .'-'.$file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $path = "images/photo/";
                $file->move($path,$filename);
                $imageData[]=[
                    'pists_id'=> $pist->id,
                    'image'=> $path.$filename
                ];
            }
            Photo::insert($imageData);
        }
        return redirect()->back()->with('status','Photo sudah ditambahkan');
    }

    public function destroy(int $photoId){
        $photo = Photo :: findOrFail($photoId);
        if (File :: exists ($photo->image)) {
            File :: delete ($photo->image);

        }
        $photo->delete();
        return redirect()->back()->with('status','Photo berhasil dihapus!!');
    }
}
