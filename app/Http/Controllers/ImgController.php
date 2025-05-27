<?php

namespace App\Http\Controllers;

use App\Models\Img;
use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImgController extends Controller
{
    public function img(int $izinId)
    {
        $izin = Izin::findOrFail($izinId);
        $img = Img::where('izin_id', $izinId)->get();
        return view('izin.img',compact('izin','img'));
    }

    public function store(Request $request, int $izinId)
    {
        $izin = Izin::findOrFail($izinId);
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
                $path = "images/img/";
                $file->move($path,$filename);
                $imageData[]=[
                    'izin_id'=> $izin->id,
                    'image'=> $path.$filename
                ];
            }
            Img::insert($imageData);
        }
        return redirect()->back()->with('status','Photo sudah ditambahkan');
    }

    public function destroy(int $imgId){
        $img = Img :: findOrFail($imgId);
        if (File :: exists ($img->image)) {
            File :: delete ($img->image);

        }
        $img->delete();
        return redirect()->back()->with('status','Photo berhasil dihapus!!');
    }
}
