<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function index()
    {
        $images = Gambar::latest()->first();
        return view('upload-image', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hapus gambar lama jika ada
        $oldImage = Gambar::latest()->first();
        if ($oldImage) {
            Storage::delete($oldImage->filepath);
            $oldImage->delete();
        }

        // Simpan gambar baru
        $imagePath = $request->file('image')->store('images', 'public');
        $imageName = $request->file('image')->getClientOriginalName();

        Gambar::create([
            'filename' => $imageName,
            'filepath' => $imagePath,
        ]);

        return back()->with('success', 'Image uploaded successfully!');
    }



    // Di ImageController.php
    public function getLatestImage()
    {
        $image = Gambar::latest()->first();

        return response()->json([
            'image_url' => $image ? Storage::url($image->filepath) : null,
            'updated_at' => $image ? $image->updated_at : null
        ]);
    }
}
