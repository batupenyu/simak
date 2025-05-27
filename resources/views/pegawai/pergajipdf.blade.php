<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p style="text-align: center">DATA GURU DAN TENAGA KEPENDIDIKAN HONORER <br> BERDASARKAN PEMBAYARAN GAJI </p>
    <table border="1" cellpadding="1" cellspasing="0">
        <tr style="text-align: center; background-color:rgb(182, 188, 193)">
            <td style="width: 30px" rowspan="2">No.</td>
            <td style="width: 150px" rowspan="2">Nama Sekolah</td>
            <td colspan="3">Jumlah GTT</td>
            <td colspan="3">Jumlah PTT</td>
        </tr>
        <tr style="text-align: center; background-color:rgb(182, 188, 193)">
            <td>APBN</td>
            <td>APBD</td>
            <td>IPP</td>
            <td>APBN</td>
            <td>APBD</td>
            <td>IPP</td>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td> SMK Negeri 1 Simpang Rimba</td>
            <td style="text-align: center">{{ $gttapbn }}</td>
            <td style="text-align: center">{{ $gttapbd }}</td>
            <td style="text-align: center">{{ $gttipp }}</td>
            <td style="text-align: center">{{ $pttapbn }}</td>
            <td style="text-align: center">{{ $pttapbd }}</td>
            <td style="text-align: center">{{ $pttipp }}</td>
        </tr>
    </table>
</body>
</html>