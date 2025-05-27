<!DOCTYPE html>
<html>
<head>
    <title>Cuti Report</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <h1>Cuti Report</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Jumlah Hari</th>
            </tr>
        </thead>
            <?php
                if (!function_exists('hitungHariKerja')) {
                    function hitungHariKerja($tanggalAwal, $tanggalAkhir, $hariLibur = []) {
                    $jumlahHariKerja = 0;

                    // Ubah string tanggal ke timestamp
                    $currentDate = strtotime($tanggalAwal);
                    $endDate = strtotime($tanggalAkhir);

                    // Loop melalui setiap hari
                    while ($currentDate <= $endDate) {
                        // Cek apakah hari ini bukan Sabtu (6) atau Minggu (0)
                        $dayOfWeek = date('N', $currentDate); // 1 (Senin) sampai 7 (Minggu)
                        if ($dayOfWeek < 6) {
                            // Cek apakah hari ini bukan hari libur
                            $date = date('Y-m-d', $currentDate);
                            if (!in_array($date, $hariLibur)) {
                                $jumlahHariKerja++;
                            }
                        }
                        // Pindah ke hari berikutnya
                        $currentDate = strtotime('+1 day', $currentDate);
                    }

                    return $jumlahHariKerja;
                }
                }

                // Contoh penggunaan
                $tanggalAwal = '2023-10-01';
                $tanggalAkhir = '2023-10-31';
                $hariLibur = ['2023-10-05', '2023-10-17']; // Contoh hari libur

                $hasil = hitungHariKerja($tanggalAwal, $tanggalAkhir, $hariLibur);
                echo "Jumlah hari kerja: " . $hasil;
            ?>
        <tbody>
            @foreach($cutiData as $cuti)
            <tr>
                <td>{{ $cuti->user->name }}</td>
                <td>{{ Carbon\Carbon::Parse($cuti->tgl_awal)->translatedFormat(' d-m-Y') }}</td>
                {{-- <td>{{ Carbon\Carbon::Parse($cuti->tgl_awal)->addDays($cuti->jlh_hari)->translatedFormat(' d-m-Y') }}</td> --}}
                <td>{{ $cuti->jlh_hari }}</td>
                {{-- <td>{{ Carbon\Carbon::Parse($currentDate)->subDay(1)->translatedFormat(' d-m-Y') }}</td> --}}
                <td>{{ $currentDate }}</td>
                <td>{{ $hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>