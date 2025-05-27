<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p class="mt-3 text-center" style="text-align: center"><strong>REKAP PEGAWAI <br>SMK NEGERI 1 SIMPANG RIMBA</strong></p>

@include('pegawai.tabeljekel')
<tr nobr = "true">
    <td> </td>
</tr>
@include('pegawai.tabelkuadik')
<tr nobr = "true">
    <td> </td>
</tr>
@include('pegawai.gurupns')
<tr nobr = "true">
    <td> </td>
</tr>
@include('pegawai.tu')
<tr nobr = "true">
    <td> </td>
</tr>
@include('pegawai.gurup3k')

</body>
</html>