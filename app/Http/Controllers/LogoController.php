<?php

namespace App\Http\Controllers;

use App\Livewire\Actions\Logout;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    // Menampilkan halaman utama dengan logo saat ini
    public function index()
    {
        $logo = Logo::first(); // Ambil logo pertama jika ada
        return view('logo.index', compact('logo'));
    }

    // Menampilkan form untuk mengganti logo
    public function create()
    {
        return view('logo.create');
    }

    // Menampilkan form untuk mengedit logo yang ada
    public function edit(Logo $logo)
    {
        return view('logo.edit', compact('logo'));
    }

    // Menyimpan logo baru ke database dan storage
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Simpan file gambar ke storage
        $path = $request->file('image')->store('image/logos', 'public');

        // Hapus logo lama jika ada
        $oldLogo = Logo::first();
        if ($oldLogo) {
            Storage::disk('public')->delete($oldLogo->image);
            $oldLogo->update(['image' => $path]);
        } else {
            Logo::create(['image' => $path]);
        }

        return redirect()->route('logo.index')->with('success', 'Logo berhasil diperbarui.');
    }

    // Menghapus logo
    public function destroy(Logo $logo)
    {
        if ($logo->image) {
            Storage::disk('public')->delete($logo->image); // Hapus file dari storage
        }
        $logo->delete();

        return redirect()->route('logo.index')->with('success', 'Logo berhasil dihapus.');
    }
}
