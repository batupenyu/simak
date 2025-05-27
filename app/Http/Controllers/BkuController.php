<?php

namespace App\Http\Controllers;

use App\Models\Bku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;

class BkuController extends Controller
{
    public function index()
    {
        $data = Bku::get();
        $penerimaan = DB::table('bku')->get()->sum('penerimaan');
        $pengeluaran = DB::table('bku')->get()->sum('pengeluaran');
        $saldoawal = DB::table('bku')->get()->sum('saldo');
        return view('bku.bku', compact('data', 'penerimaan', 'pengeluaran', 'saldoawal'));
    }

    public function umum()
    {
        $data = Bku::get();
        $penerimaan = Bku::where('type', '=', 'penerimaan')->get()->sum('nominal');
        $pengeluaran = Bku::where('type', '=', 'pengeluaran')->get()->sum('nominal');
        $saldobank = Bku::where('type', '=', 'saldobank')->get()->sum('nominal');
        $runningTotal = $penerimaan;
        if ($penerimaan > 0) {
            $runningTotal = $runningTotal - $pengeluaran;
        } else {
            $runningTotal += $runningTotal + $penerimaan;
        }

        $bku = Bku::get();
        $driverAccounts     = [];
        $volume = 0;
        foreach ($bku as $account) {
            $volume += $account->nominal;
            $currentDriverAccounts  = [];
            $currentDriverAccounts['id'] = $account->id;
            $currentDriverAccounts['nominal'] = $account->nominal;
            $currentDriverAccounts['volume']  = $volume;
            array_push($driverAccounts, $currentDriverAccounts);
        }

        $beforeFirstDay = Bku::all();
        $originalBalance = 0;
        foreach ($beforeFirstDay as $day) {
            $originalBalance = $day->nominal;
        }

        $start_date = Carbon::createFromFormat('Y-m-d', '2024-07-21')->startOfDay();
        $end_date = Carbon::createFromFormat('Y-m-d', '2024-07-21')->endOfDay();
        $posts = Bku::whereBetween('created_at', [$start_date, $end_date])->get();

        $query = Bku::selectRaw('sum(nominal) as nominal, DATE(created_at) as date')
            ->where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->groupBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date'  => date('d M', strtotime($item->tgl_transaksi)),
                    'total' => $item->nominal,
                ];
            });

        $tglawalperiode = Carbon::createFromFormat('Y-m-d', '2024-07-01')->startOfDay();
        $tglakhirperiode = Carbon::createFromFormat('Y-m-d', '2024-07-30')->endOfDay();
        $periode = Bku::where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$tglawalperiode, $tglakhirperiode])
            ->get()
            ->sum('nominal');

        $tglawal_penerimaan = Carbon::createFromFormat('Y-m-d', '2024-07-20')->startOfDay();
        $tglakhir_penerimaan = Carbon::createFromFormat('Y-m-d', '2024-07-20')->endOfDay();
        $penerimaan_lalu = Bku::where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$tglawal_penerimaan, $tglakhir_penerimaan])
            ->get()
            ->sum('nominal');

        $tglawal_pengeluaran = Carbon::createFromFormat('Y-m-d', '2024-07-20')->startOfDay();
        $tglakhir_pengeluaran = Carbon::createFromFormat('Y-m-d', '2024-07-20')->endOfDay();
        $pengeluaran_lalu = Bku::where('type', '=', 'pengeluaran')
            ->whereBetween('created_at', [$tglawal_pengeluaran, $tglakhir_pengeluaran])
            ->get()
            ->sum('nominal');

        return view('bku.bku_umum', compact('data', 'penerimaan', 'pengeluaran', 'saldobank', 'runningTotal', 'driverAccounts', 'originalBalance', 'beforeFirstDay', 'query', 'posts', 'start_date', 'end_date', 'penerimaan_lalu', 'tglakhir_penerimaan', 'tglawal_penerimaan', 'pengeluaran_lalu', 'tglawal_pengeluaran', 'tglakhir_pengeluaran', 'tglawalperiode', 'tglakhirperiode'));
    }

    public function filterpengeluaran(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $penerimaan = Bku::where('type', '=', 'penerimaan')->orderBy('tgl_transaksi', 'asc')->get()->sum('nominal');
        $pengeluaran = Bku::where('type', '=', 'pengeluaran')->orderBy('tgl_transaksi', 'asc')->get()->sum('nominal');
        $saldobank = Bku::where('type', '=', 'saldobank')->get()->sum('nominal');
        $penerimaan_lalu = Bku::where('type', '=', 'penerimaan')->where('tgl_transaksi', '<', [$start_date])->get()->sum('nominal');
        $pengeluaran_lalu = Bku::where('type', '=', 'pengeluaran')->where('tgl_transaksi', '<', [$start_date])->get()->sum('nominal');
        $penerimaanini = Bku::where('type', '=', 'penerimaan')->whereBetween('tgl_transaksi', [$start_date, $end_date])->get()->sum('nominal');
        $pengeluaranini = Bku::where('type', '=', 'pengeluaran')->whereBetween('tgl_transaksi', [$start_date, $end_date])->get()->sum('nominal');
        $hasil = Bku::whereBetween('tgl_transaksi', [$start_date, $end_date])->get(); // Ensure $hasil is defined
        return view('bku.bku_umum', compact('hasil', 'start_date', 'end_date', 'penerimaan', 'pengeluaran', 'penerimaan_lalu', 'pengeluaran_lalu', 'penerimaanini', 'pengeluaranini'));
    }

    public function generatePdf($id)
    {

        $item = Bku::find($id); // Fetch the specific item by ID
        $view = view('bku.viewBkuPDF', compact('item'));
        $pdf = new Dompdf();
        $pdf->loadHtml($view->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('pengeluaran.pdf');
    }

    public function filterpenerimaan(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $penerimaan = Bku::where('type', '=', 'penerimaan')->orderBy('tgl_transaksi', 'asc')->get()->sum('nominal');
        $pengeluaran = Bku::where('type', '=', 'pengeluaran')->orderBy('tgl_transaksi', 'asc')->get()->sum('nominal');
        $saldobank = Bku::where('type', '=', 'saldobank')->get()->sum('nominal');
        $penerimaan_lalu = Bku::where('type', '=', 'penerimaan')->where('tgl_transaksi', '<', [$start_date])->get()->sum('nominal');
        $pengeluaran_lalu = Bku::where('type', '=', 'pengeluaran')->where('tgl_transaksi', '<', [$start_date])->get()->sum('nominal');
        $penerimaanini = Bku::where('type', '=', 'penerimaan')->whereBetween('tgl_transaksi', [$start_date, $end_date])->get()->sum('nominal');
        $pengeluaranini = Bku::where('type', '=', 'pengeluaran')->whereBetween('tgl_transaksi', [$start_date, $end_date])->get()->sum('nominal');
        $hasil = Bku::whereBetween('tgl_transaksi', [$start_date, $end_date])->get();
        return view('bku.bku_umum', compact('hasil', 'start_date', 'end_date', 'penerimaan', 'pengeluaran', 'penerimaan_lalu', 'pengeluaran_lalu', 'penerimaanini', 'pengeluaranini'));
    }

    public function pengeluaran()
    {
        $data = Bku::get();
        $penerimaan = Bku::where('type', '=', 'penerimaan')->get()->sum('nominal');
        $pengeluaran = Bku::where('type', '=', 'pengeluaran')->get()->sum('nominal');
        $saldobank = Bku::where('type', '=', 'saldobank')->get()->sum('nominal');
        $runningTotal = $penerimaan;
        if ($penerimaan > 0) {
            $runningTotal = $runningTotal - $pengeluaran;
        } else {
            $runningTotal += $runningTotal + $penerimaan;
        }

        $bku = Bku::get();
        $driverAccounts     = [];
        $volume = 0;
        foreach ($bku as $account) {
            $volume += $account->nominal;
            $currentDriverAccounts  = [];
            $currentDriverAccounts['id'] = $account->id;
            $currentDriverAccounts['nominal'] = $account->nominal;
            $currentDriverAccounts['volume']  = $volume;
            array_push($driverAccounts, $currentDriverAccounts);
        }

        $beforeFirstDay = Bku::all();
        $originalBalance = 0;
        foreach ($beforeFirstDay as $day) {
            $originalBalance = $day->nominal;
        }

        $start_date = Carbon::createFromFormat('Y-m-d', '2024-07-21')->startOfDay();
        $end_date = Carbon::createFromFormat('Y-m-d', '2024-07-21')->endOfDay();
        $posts = Bku::whereBetween('created_at', [$start_date, $end_date])->get();

        $query = Bku::selectRaw('sum(nominal) as nominal, DATE(created_at) as date')
            ->where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->groupBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date'  => date('d M', strtotime($item->tgl_transaksi)),
                    'total' => $item->nominal,
                ];
            });

        $tglawalperiode = Carbon::createFromFormat('Y-m-d', '2024-07-01')->startOfDay();
        $tglakhirperiode = Carbon::createFromFormat('Y-m-d', '2024-07-30')->endOfDay();
        $periode = Bku::where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$tglawalperiode, $tglakhirperiode])
            ->get()
            ->sum('nominal');

        $tglawal_penerimaan = Carbon::createFromFormat('Y-m-d', '2024-07-20')->startOfDay();
        $tglakhir_penerimaan = Carbon::createFromFormat('Y-m-d', '2024-07-20')->endOfDay();
        $penerimaan_lalu = Bku::where('type', '=', 'penerimaan')
            ->whereBetween('created_at', [$tglawal_penerimaan, $tglakhir_penerimaan])
            ->get()
            ->sum('nominal');

        $tglawal_pengeluaran = Carbon::createFromFormat('Y-m-d', '2024-07-20')->startOfDay();
        $tglakhir_pengeluaran = Carbon::createFromFormat('Y-m-d', '2024-07-20')->endOfDay();
        $pengeluaran_lalu = Bku::where('type', '=', 'pengeluaran')
            ->whereBetween('created_at', [$tglawal_pengeluaran, $tglakhir_pengeluaran])
            ->get()
            ->sum('nominal');

        return view('bku.pengeluaran', compact('data', 'penerimaan', 'pengeluaran', 'saldobank', 'runningTotal', 'driverAccounts', 'originalBalance', 'beforeFirstDay', 'query', 'posts', 'start_date', 'end_date', 'penerimaan_lalu', 'tglakhir_penerimaan', 'tglawal_penerimaan', 'pengeluaran_lalu', 'tglawal_pengeluaran', 'tglakhir_pengeluaran', 'tglawalperiode', 'tglakhirperiode'));
    }

    public function create()
    {
        $data = Bku::get();
        return view('bku.create', compact('data'));
    }
    public function store(Request $request)
    {
        Bku::create($request->all());
        return redirect('filterpengeluaran');
    }
}
