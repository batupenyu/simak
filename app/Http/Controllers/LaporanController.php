<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    //
    public function index()
    {
        //menampilkan halaman laporan
        return view('laporan');
    }

    public function cetak()
    {
        // $data = PDF ::loadview('laporan_pdf', ['data' => 'ini adalah contoh laporan PDF']);
        // return $data->stream();
        // return $data->download('laporan.pdf');

        // $pdf = PDF::loadview('pegawai_pdf', ['pegawai' => $pegawai]);
        // return $pdf->stream();
    }
}
