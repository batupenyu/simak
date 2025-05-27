<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
        <p style="text-align: center"><strong>DATA NAMA GURU DAN TENAGA KEPENDIDIKAN <br>SMK NEGERI 1 SIMPANG RIMBA</strong></p>
        {{-- <table border="1" cellpadding="2"> --}}
        <table border="1" cellpadding="2" cellspacing="0" style="width: 609px;">
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th style="width: 20px">No</th>
                <th style="width: 120px">Nama Lengkap</th>
                <th style="width: 110px">NIP</th>
                <th style="width: 130px">Pangkat/Gol</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th style="width: 130px">Jabatan</th>
                {{-- <th>TMT</th> --}}
                {{-- <th style="width: 30px">Ket</th> --}}
            </tr>
            @foreach ($pns as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td style="text-align: center">{{ $item->nip}}</td>
                <td style="text-align: center">{{ $item->pangkat_gol}}</td>
                <td style="text-align: center">{{ $item->jk}}</td>
                <td style="text-align: center">{{ $item->pendidikan}}</td>
                <td style="text-align: center">{{ $item->jabatan}}</td>
                {{-- <td class="text-center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td> --}}
                {{-- <td>-</td> --}}
            </tr>
            @endforeach
        </table>
            <tr nobr = "true">
                <td> </td>
            </tr>
        <p style="text-align: center"><strong>DATA NAMA GURU DAN TENAGA KEPENDIDIKAN PPPK<br>SMK NEGERI 1 SIMPANG RIMBA</strong></p>
        {{-- <table border="1" cellpadding="2"> --}}
        <table border="1" cellpadding="2" cellspacing="0" style="width: 609px;">
            <tr style="text-align: center; background-color:rgb(182, 188, 193)">
                <th style="width: 20px">No</th>
                <th style="width: 120px">Nama Lengkap</th>
                <th style="width: 110px">NIP</th>
                <th style="width: 130px">Pangkat/Gol</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th style="width: 130px">Jabatan</th>
                {{-- <th>TMT</th> --}}
                {{-- <th style="width: 30px">Ket</th> --}}
            </tr>
            @foreach ($p3k as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td style="text-align: center">{{ $item->nip}}</td>
                <td style="text-align: center">{{ $item->pangkat_gol}}</td>
                <td style="text-align: center">{{ $item->jk}}</td>
                <td style="text-align: center">{{ $item->pendidikan}}</td>
                <td style="text-align: center">{{ $item->jabatan}}</td>
                {{-- <td class="text-center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td> --}}
                {{-- <td>-</td> --}}
            </tr>
            @endforeach
        </table>
        <tr nobr = "true">
            <td> </td>
        </tr>
        <br>
        <p style="text-align: center"><strong>DATA NAMA GURU DAN TENAGA KEPENDIDIKAN NON ASN<br>SMK NEGERI 1 SIMPANG RIMBA</strong></p>
        {{-- <table border="1" cellpadding="2"> --}}
        <table border="1" cellpadding="2" cellspacing="0" style="width: 750px;">
        {{-- <table style="margin-top:10px; margin-left:300px;" width="50%" border="1" align="left" cellpadding="5" cellspacing="0">'; --}}
            <tr  style="text-align: center; background-color:rgb(182, 188, 193);">
                <th style="width: 20px ">- <br> No</th>
                <th style="width: 125px">- <br> Nama Lengkap</th>
                <th>- <br> Jenis Kelamin</th>
                <th>- <br> Pendidikan</th>
                <th>- <br> Jabatan</th>
                <th>- <br> TMT</th>
                <th>Status <br> Pembiayaan Non PNS <br>
                APBD/APBN/IPP</th>
            </tr>
            @foreach ($honor as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $item->name}}
                    <a href="/project.edit_user/{{ $item->id }}" style="text-decoration: none"> <i class="fa fa-edit"></i></a> 
                </td>
                <td style="text-align: center">{{ $item->jk}}</td>
                <td style="text-align: center">{{ $item->pendidikan}}</td>
                <td style="text-align: center">{{ $item->jabatan}}</td>
                <td style="text-align: center">{{ Carbon\Carbon::Parse($item->tmt_pangkat)->translatedFormat('d/m/Y') }}</td>
                <td style="text-align: center">{{ $item->sumber_gaji}}</td>
            </tr>
            @endforeach
        </table>
</body>
</html>