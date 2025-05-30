<?php

namespace App\Http\Controllers;

use App\Models\Angka_kredit;
use App\Models\Penilai;
use App\Models\User;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class AngkakreditController extends Controller
{
    //
    public function postCreate()
    {
        // $pegawai = User::orderBy('id', 'ASC')->get();
        $pegawai = User::where('status', '!=', 'p3k')->orderBy('name', 'ASC')->get();
        // $penilai = Penilai::where('unit_kerja', '=', 'SMK Negeri 1 Koba')->get();
        $penilai = Penilai::all();
        return view('project.addAK', compact('pegawai', 'penilai'));
    }


    public function postData(Request $request)
    {
        $data = $request->all();
        Angka_kredit::create($data);

        return redirect('pegawai.index')->with(['status' => 'Cuti berhasil diajukan! Cek status pengajuan Anda secara berkala!']);
    }

    public function index($id)
    {

        $pegawai = User::where('status', '!=', 'P3K')->where('status', '!=', 'HONOR')->orderBy('name', 'ASC')->get();
        $ak = Angka_kredit::with(['user'])->where('user_id', $id)->orderBy('tgl_akhir_penilaian', 'ASC')->get();
        $akintegrasi = Angka_kredit::with(['user'])->where('user_id', $id)->orderBy('tgl_akhir_penilaian', 'DESC')->first();

        $tglintegrasi = ('2022-01-01');

        //total ak

        $total = 0;
        $jenjang = ''; // Initialize $jenjang to avoid undefined variable error

        foreach ($ak as $order) {

            $predikat = $order->predikat;

            if ($predikat == '150') {
                $level = 'Sangat Baik';
            } elseif ($predikat == '100') {
                $level = 'Baik';
            } elseif ($predikat == '75') {
                $level = 'Perlu perbaikan';
            } elseif ($predikat == '50') {
                $level = 'Kurang';
            } elseif ($predikat == '25') {
                $level = 'Sangat Kurang';
            }


            if ($order->user && isset($order->user->pangkat_gol)) {
                if ($order->user->pangkat_gol == 'Penata Muda, III/a') {
                    $jenjang = 'Ahli Pertama';
                } elseif ($order->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
                    $jenjang = 'Ahli Pertama';
                } elseif ($order->user->pangkat_gol == 'Penata, III/c') {
                    $jenjang = 'Ahli Muda';
                } elseif ($order->user->pangkat_gol == 'Penata TK.I, III/d') {
                    $jenjang = 'Ahli Muda';
                } elseif ($order->user->pangkat_gol == 'Pembina, IV/a') {
                    $jenjang = 'Ahli Madya';
                } else {
                    $jenjang = '';
                }
            } else {
                $jenjang = '';
            }

            // koefisien

            $pangkat = $order->user ? $order->user->pangkat_gol : null;

            $koe = 0; // default value
            if ($pangkat == 'Penata Muda, III/a') {
                $koe = 12.5;
            } elseif ($pangkat == 'Penata Muda TK.I, III/b') {
                $koe = 12.5;
            } elseif ($pangkat == 'Penata, III/c') {
                $koe = 25;
            } elseif ($pangkat == 'Penata TK.I, III/d') {
                $koe = 25;
            } elseif ($pangkat == 'Pembina, IV/a') {
                $koe = 37.5;
            } else {
                // no valid pangkat, keep $koe as 0
            }

            $date1 = $order->tgl_awal_penilaian;
            $date2 = $order->tgl_akhir_penilaian;

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;


            // $time = Carbon::parse($order->tgl_awal_penilaian)->diff($order->tgl_akhir_penilaian);
            // return '<td>' . $time->y . ' Year' . $time->m . ' Month' . $time->d . ' Day' . '</td>';
            $total += number_format(($periodik / 12) * $koe * $predikat / 100, 3);
        }

        return view('project.angka_kredit', compact('pegawai', 'ak', 'total', 'akintegrasi', 'tglintegrasi', 'jenjang'));
    }

    // if (!empty($ak)) {
    //     foreach ($ak as $value) {
    //     }
    // } else {


    // }

    public function edit($id)
    {
        $pegawai = User::orderBy('nip', 'DESC')->get();
        $penilai = Penilai::all();
        $ak = Angka_kredit::with('user')->findOrFail($id);
        // $servicesarray = Angka_kredit::where('id', $id)->select('cat')->get()->toArray();
        // $json = json_encode($servicesarray);
        // $data = Angka_kredit::where('id', $id)->pluck('cat')->toArray();

        return view('project.editAK', compact('ak', 'pegawai', 'penilai'));
    }

    public function update($id, Request $request)
    {
        $data = Angka_kredit::findOrFail($id);
        $data->update($request->all());
        return redirect('pegawai.index');
    }


    public function delete($id)
    {
        Angka_kredit::findOrFail($id);
    }

    public function destroy($id)
    {
        $data = Angka_kredit::findOrFail($id);
        $data->delete();
        return redirect('pegawai.index');
    }

    public function konversi($id)
    {
        $kredit = Angka_kredit::with(['penilai'])->findOrFail($id);
        $periode = Angka_kredit::where('id', $id)->orderBy('created_at', 'DESC')->first();
        $tglpenetapan = Carbon::parse($kredit->tgl_akhir_penilaian)->translatedFormat('Y');


        $predikat = $kredit->predikat;
        if ($predikat == 150) {
            $level = 'Sangat Baik';
        } elseif ($predikat == 100) {
            $level = 'Baik';
        } elseif ($predikat == 75) {
            $level = 'Butuh Perbaikan';
        } elseif ($predikat == 50) {
            $level = 'Kurang';
        } elseif ($predikat == 25) {
            $level = 'Sangat Kurang';
        }

        if ($kredit->user->pangkat_gol == 'Penata Muda, III/a') {
            $jenjang = 'Ahli Pertama';
        } elseif ($kredit->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
            $jenjang = 'Ahli Pertama';
        } elseif ($kredit->user->pangkat_gol == 'Penata, III/c') {
            $jenjang = 'Ahli Muda';
        } elseif ($kredit->user->pangkat_gol == 'Penata TK.I, III/d') {
            $jenjang = 'Ahli Muda';
        } elseif ($kredit->user->pangkat_gol == 'Pembina, IV/a') {
            $jenjang = 'Ahli Madya';
        } else {
            echo '';
        }

        $view = view()->make('project.ak_konversiPDF', compact('kredit', 'periode', 'predikat', 'jenjang', 'level', 'tglpenetapan'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        $pdf::SetFillColor(0, 0, 255);
        $pdf::SetTopMargin(15);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('P', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Konversi Angka Kredit.');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('konversi ak an. ' . $kredit->user->name . ' - ' . $tglpenetapan . '.pdf');
    }

    public function akumulasi(Request $request, Angka_kredit $kredit, $id)
    {
        $a = [];

        $day_awal = $request->input('day_awal');
        $month_awal = $request->input('month_awal');
        $year_awal = $request->input('year_awal');

        // TODO: Add validation, sanitize, etc.
        $combined_awal = sprintf('%d-%d-%d', $day_awal, $month_awal, $year_awal);

        $a['tgl_awal_penilaian'] = $combined_awal; // new Carbon($combined);


        $b = [];

        $day_akhir = $request->input('day_akhir');
        $month_akhir = $request->input('month_akhir');
        $year_akhir = $request->input('year_akhir');

        // TODO: Add validation, sanitize, etc.
        $combined_akhir = sprintf('%d-%d-%d', $day_akhir, $month_akhir, $year_akhir);

        $b['tgl_akhir_penilaian'] = $combined_akhir; // new Carbon($combined);



        $start_date = date("Y-m-d", strtotime(preg_replace('/[^A-Za-z0-9\-]/', '', $combined_awal)));
        $end_date = date("Y-m-d", strtotime(preg_replace('/[^A-Za-z0-9\-]/', '', $combined_akhir)));


        // $start_date = $request->start_date;
        // $end_date = $request->end_date;

        $periodeAK = Angka_kredit::with('user')->whereBetween('tgl_awal_penilaian', [$start_date, $end_date])->where('user_id', $id)->orderBy('tgl_awal_penilaian', 'ASC')->get();
        $akintegrasi = Angka_kredit::with('user')->whereBetween('tgl_awal_penilaian', [$start_date, $end_date])->where('user_id', $id)->orderBy('tgl_awal_penilaian', 'ASC')->first();

        $kredit = Angka_kredit::with('user')->where('user_id', $id)->orderBy('created_at', 'ASC')->get();
        $pegawai = User::where('id', $id)->first();
        $periode = Angka_kredit::where('user_id', $id)->orderBy('created_at', 'DESC')->first();
        $tgldok = Carbon::parse($end_date)->translatedFormat('Y');


        if (!empty($periodeAK)) {
            foreach ($periodeAK as $value) {


                $tglintegrasi = ('2022-01-01');

                //integrasi

                if ($start_date == $tglintegrasi) {
                    $integrasi = $pegawai->ak_itegrasi;
                } else {
                    $integrasi = $pegawai->ak_itegrasi - $pegawai->ak_itegrasi;
                }




                $total = 0;
                foreach ($periodeAK as $order) {

                    $predikat = $order->predikat;
                    if ($predikat == 150) {
                        $level = 'Sangat Baik';
                    } elseif ($predikat == 100) {
                        $level = "Baik";
                    } elseif ($predikat == 75) {
                        $level = "Perlu Perbaikan";
                    } elseif ($predikat == 50) {
                        $level = 'Kurang';
                    } elseif ($predikat == 25) {
                        $level = "Sangat Kurang";
                    }

                    if ($akintegrasi->user->pangkat_gol == 'Penata Muda, III/a') {
                        $jenjang = 'Ahli Pertama';
                    } elseif ($akintegrasi->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
                        $jenjang = 'Ahli Pertama';
                    } elseif ($akintegrasi->user->pangkat_gol == 'Penata, III/c') {
                        $jenjang = 'Ahli Muda';
                    } elseif ($akintegrasi->user->pangkat_gol == 'Penata TK.I, III/d') {
                        $jenjang = 'Ahli Muda';
                    } elseif ($akintegrasi->user->pangkat_gol == 'Pembina, IV/a') {
                        $jenjang = 'Ahli Madya';
                    } else {
                        echo '';
                    }


                    //koefisien
                    if ($jenjang == 'Ahli Pertama') {
                        $koe = 12.5;
                    } elseif ($jenjang == 'Ahli Muda') {
                        $koe = 25;
                    } else {
                        $koe = 37.5;
                    }
                    $tglpenetapan = $order->tgl_penetapan;
                    $predikat = $order->predikat;
                    $date1 = $order->tgl_awal_penilaian;
                    $date2 = $order->tgl_akhir_penilaian;
                    $ab = $order->ak_baru;

                    $ts1 = strtotime($date1);
                    $ts2 = strtotime($date2);

                    $year1 = date('Y', $ts1);
                    $year2 = date('Y', $ts2);

                    $month1 = date('m', $ts1);
                    $month2 = date('m', $ts2);

                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                    $periodik = $diff + 1;

                    $total += number_format(($periodik / 12) * $koe * $order->predikat / 100, 3);
                }


                $view = view()->make('project.ak_akumulasiPDF', compact('pegawai',  'total', 'periode', 'periodeAK', 'start_date', 'kredit', 'tgldok', 'tglintegrasi', 'end_date', 'koe', 'akintegrasi'));
                $html = $view->render();
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once(dirname(__FILE__) . '/lang/eng.php');
                    $pdf::setLanguageArray($l);
                }
                $pdf::SetFillColor(0, 0, 255);
                $pdf::SetTopMargin(15);
                $pdf::setPrintHeader(false);
                $pdf::SetFooterMargin(0);
                $pdf::setPrintFooter(false);
                $pdf::SetFont('zapfdingbats', '', 14);
                $pdf::AddPage('P', 'A4');
                $pdf::SetLeftMargin(15);
                $pdf::SetAutoPageBreak(TRUE, 0);
                $pdf::setCellPaddings(0, '', '', 0);
                $pdf::SetFont('helvetica', '', 10);
                $pdf::lastPage();
                $pdf::setCellHeightRatio(1.5);
                $pdf::SetTitle('Akumulasi Angka Kredit.');
                $pdf::writeHTML($html, true, false, true, false, '');
                $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                $pdf::Output('akumulasi ak an. ' . $akintegrasi->user->name . ' th ' . $tgldok . '.pdf');
            }
        } else {
            //  return [];

        }
    }


    public function penetapan(Request $request,  $id)
    {
        $a = [];

        $day_awal = $request->input('day_awal');
        $month_awal = $request->input('month_awal');
        $year_awal = $request->input('year_awal');

        $combined_awal = sprintf('%d-%d-%d', $day_awal, $month_awal, $year_awal);

        $a['tgl_awal_penilaian'] = $combined_awal; // new Carbon($combined);

        $b = [];

        $day_akhir = $request->input('day_akhir');
        $month_akhir = $request->input('month_akhir');
        $year_akhir = $request->input('year_akhir');

        $combined_akhir = sprintf('%d-%d-%d', $day_akhir, $month_akhir, $year_akhir);

        $b['tgl_akhir_penilaian'] = $combined_akhir; // new Carbon($combined);

        $start_date = date("Y-m-d", strtotime(preg_replace('/[^A-Za-z0-9\-]/', '', $combined_awal)));
        $end_date = date("Y-m-d", strtotime(preg_replace('/[^A-Za-z0-9\-]/', '', $combined_akhir)));

        $periodeAK = Angka_kredit::with('user')->whereBetween('tgl_awal_penilaian', [$start_date, $end_date])->where('user_id', $id)->orderBy('tgl_awal_penilaian', 'ASC')->get();
        $akintegrasi = Angka_kredit::with('user')->whereBetween('tgl_awal_penilaian', [$start_date, $end_date])->where('user_id', $id)->orderBy('tgl_awal_penilaian', 'ASC')->first();
        $kredit = Angka_kredit::with('user')->where('user_id', $id)->orderBy('created_at', 'ASC')->get();
        $pegawai = User::where('id', $id)->first();
        $periode = Angka_kredit::where('user_id', $id)->orderBy('created_at', 'DESC')->first();
        $tgldok = Carbon::parse($end_date)->translatedFormat('Y');
        $periode_awal = Angka_kredit::where('user_id', $id)->orderBy('tgl_akhir_penilaian', 'DESC')->first();
        $akintegrasi = Angka_kredit::with(['user'])->where('user_id', $id)->first();


        $pilihan = $request->has(
            'pilih'
        );

        if ($pilihan == 1) {
            $pilih = $pegawai->ak_baru - $pegawai->ak_baru;
        } else {
            $pilih = $pegawai->ak_baru;
        }


        //integrasi

        $tglintegrasi = ('2022-01-01');

        if ($start_date == $pegawai->tmt_jabatan) {
            $integrasi = $akintegrasi->user->ak_integrasi;
        } else {
            $integrasi = $akintegrasi->user->ak_integrasi - $akintegrasi->user->ak_integrasi;
        }

        $tglintegrasi = ('2022-01-01');

        //tglintegrasi
        if ($start_date == $tglintegrasi) {
            $integrasi = $akintegrasi->user->ak_integrasi;
        } else {
            $integrasi = $akintegrasi->user->ak_integrasi - $akintegrasi->user->ak_integrasi;
        }

        //koefisien berdasarkan jenjang

        if ($pegawai->pangkat_gol == 'Penata Muda, III/a') {
            $jenjang = 'Ahli Pertama';
        } elseif ($pegawai->pangkat_gol == 'Penata Muda TK.I, III/b') {
            $jenjang = 'Ahli Pertama';
        } elseif ($pegawai->pangkat_gol == 'Penata, III/c') {
            $jenjang = 'Ahli Muda';
        } elseif ($pegawai->pangkat_gol == 'Penata TK.I, III/d') {
            $jenjang = 'Ahli Muda';
        } elseif ($pegawai->pangkat_gol == 'Pembina, IV/a') {
            $jenjang = 'Ahli Madya';
        } else {
            echo '';
        }

        if ($jenjang == 'Ahli Pertama') {
            $koe = 12.5;
        } elseif ($jenjang == 'Ahli Muda') {
            $koe = 25;
        } else {
            $koe = 37.5;
        }

        //total ak

        $total = 0;
        foreach ($periodeAK as $order) {

            $predikat = $order->predikat;
            if ($predikat == 150) {
                $level = 'Sangat Baik';
            } elseif ($predikat == 100) {
                $level = 'Baik';
            } elseif ($predikat == 75) {
                $level = 'Perlu Perbaikan';
            } elseif ($predikat == 50) {
                $level = "kurang";
            } elseif ($predikat == 25) {
                $level = 'Sangat Kurang';
            }



            $date1 = $order->tgl_awal_penilaian;
            $date2 = $order->tgl_akhir_penilaian;
            $ab = $order->ak_baru;

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;

            $total += number_format(($periodik / 12) * $koe * $order->predikat / 100, 3);

            $jumlah = $total + $integrasi;
        }


        $view = view()->make('project.ak_penetapanPDF', compact('pegawai', 'total', 'periode', 'periodeAK', 'start_date', 'end_date', 'start_date', 'periode_awal', 'kredit', 'integrasi', 'tglintegrasi', 'tgldok', 'akintegrasi'));
        $html = $view->render();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, true);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        $pdf::SetFillColor(0, 0, 255);
        $pdf::SetTopMargin(13);
        $pdf::setPrintHeader(false);
        $pdf::SetFooterMargin(0);
        $pdf::setPrintFooter(false);
        $pdf::SetFont('zapfdingbats', '', 14);
        $pdf::AddPage('P', 'A4');
        $pdf::SetLeftMargin(15);
        $pdf::SetAutoPageBreak(TRUE, 0);
        $pdf::setCellPaddings(0, '', '', 0);
        $pdf::SetFont('helvetica', '', 10);
        $pdf::lastPage();
        $pdf::setCellHeightRatio(1.5);
        $pdf::SetTitle('Penetapan Angka Kredit');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::Output('penetapan ak an. ' . $akintegrasi->user->name . ' th ' . $tgldok . '.pdf');
        // } else {
        //     //  return [];

        // }
    }

    public function pdfReport($id)
    {
        $pegawai = User::where('id', $id)->first();
        $ak = Angka_kredit::with(['user'])->where('user_id', $id)->orderBy('tgl_akhir_penilaian', 'ASC')->get();
        $akintegrasi = Angka_kredit::with(['user'])->where('user_id', $id)->orderBy('tgl_akhir_penilaian', 'DESC')->first();

        $total = 0;
        foreach ($ak as $order) {
            $predikat = $order->predikat;

            if ($predikat == 150) {
                $level = 'Sangat Baik';
            } elseif ($predikat == 100) {
                $level = 'Baik';
            } elseif ($predikat == 75) {
                $level = 'Perlu Perbaikan';
            } elseif ($predikat == 50) {
                $level = 'Kurang';
            } elseif ($predikat == 25) {
                $level = 'Sangat Kurang';
            } else {
                $level = 'Tidak Diketahui';
            }

            if ($order->user->pangkat_gol == 'Penata Muda, III/a' || $order->user->pangkat_gol == 'Penata Muda TK.I, III/b') {
                $jenjang = 'Ahli Pertama';
                $koe = 12.5;
            } elseif ($order->user->pangkat_gol == 'Penata, III/c' || $order->user->pangkat_gol == 'Penata TK.I, III/d') {
                $jenjang = 'Ahli Muda';
                $koe = 25;
            } elseif ($order->user->pangkat_gol == 'Pembina, IV/a') {
                $jenjang = 'Ahli Madya';
                $koe = 37.5;
            } else {
                $jenjang = '';
                $koe = 0;
            }
        }

        $total = 0;
        foreach ($ak as $order) {
            $date1 = $order->tgl_awal_penilaian;
            $date2 = $order->tgl_akhir_penilaian;

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $periodik = $diff + 1;

            $total += number_format(($periodik / 12) * $koe * $order->predikat / 100, 3);
        }

        $pdf = Pdf::loadView('project.ak_pdfReport', compact('pegawai', 'ak', 'total', 'akintegrasi', 'jenjang'));
        return $pdf->stream('laporan_ak_an_' . $pegawai->name . '_' . date('Ymd') . '.pdf');
        // return $pdf->download('laporan_ak_an_' . $pegawai->name . '_' . date('Ymd') . '.pdf');
    }
}
