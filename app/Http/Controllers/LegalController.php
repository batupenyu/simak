<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LegalController extends Controller
{
    //
    public function index()
    {
        //menampilkan halaman laporan untuk bagian legal
        return view('laporan');
    }

    public function cetak()
    {
        $data = 'ini adalah contoh laporan PDF';
        
        $pdf = PDF::loadView('laporan_pdf', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('laporan.pdf');
    }
}
