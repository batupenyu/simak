<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="0">
    <tr>
        <td></td>
        <td>
            @foreach ($pists as $d)
            LAMPIRAN I
            <br>
            SURAT TUGAS KEPALA SMKN 1 SIMPANG RIMBA
            <br>
            Nomor :
            @if ($d->no_surat == '')
            094/............../SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
            @else
            094/{{ $d->no_surat }}/SMKN1/SR/{{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat('Y') }}.
            @endif
            <br>
            Tanggal :
            {{ Carbon\Carbon::Parse($d->tgl_surat)->translatedFormat(' d F Y') }}
            <br><br><br>
        </td>
    </tr>
</table>

<div class="col-md-12  card-body " style="text-align: center; text-transform:uppercase">
    <strong>DAFTAR NAMA KEGIATAN
    <br>
    {{ $d->acara }}
    </strong>
    <br>
</div>

@endforeach


<div class="card-body  ">
    @include('pists.template33')
</div>
    
<table border="0">
    <tr>
        <td></td>
        <td style="text-align: center">
            Kepala Sekolah
            <br><br><br><br>
            {{ $d->penilai->nama }}
            <br>
            {{ $d->penilai->pangkat_gol }}
            <br>
            NIP. {{ $d->penilai->nip }}
        </td>
    </tr>
</table>

</body>
</html>