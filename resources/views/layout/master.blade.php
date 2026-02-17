<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <title>@yield('title')</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          {{-- <a class="nav-link" href="/">Home</a> --}}
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="/student.index">Student</a> --}}
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="/class">Class</a> --}}
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="/eskul">Eskul</a> --}}
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="/guru">Guru</a> --}}
        </li>
        <li class="nav-item dropdown tampil">
          {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a> --}}
          <ul class="dropdown-menu">
            {{-- <li><a class="dropdown-item" href="/user.index">User</a></li> --}}
            <li>
              {{-- <a class="dropdown-item" href="/sdm.index">sdm</a> --}}
            </li>
            <li>
              {{-- <a class="dropdown-item" href="/skema.index">skema</a> --}}
            </li>
            <li>
              {{-- <a class="dropdown-item" href="/kon.index">kon</a> --}}
            </li>
            <li>
              {{-- <hr class="dropdown-divider"> --}}
            </li>
            <li>
              <a href="{{ url('pegawai.index') }}" class="text-decoration-none">Index Pegawai</a>
            </li>
            <li>
              <a href="{{ url('info') }}" class="text-decoration-none">Info</a>
            </li>
            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
          </ul>
          <li class="nav-item tampil">
            <a class="nav-link " href="/project">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SKP
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a class="dropdown-item" href="/project/">Rencana SKP</a></li> -->
              <li><a class="dropdown-item" href="/ekspektasi/index">Ekspektasi</a></li>
            </ul>
          </li>
          <li class="nav-item tampil">
            {{-- <a class="nav-link " href="/pasangan.index">Pasangan</a> --}}
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/pegawai.index">Dokumen</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/ekspektasi/index">Ekspektasi</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/rk">Rencana Kerja</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/tim.index">Tim Kerja</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/mapel">Mapel-Tugas</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/filter">Rekap Cuti</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/pegawai.rekap">Rekap kp4</a>
          </li>
          {{-- <li class="nav-item tampil">
            <a class="nav-link " href="/form/holidays/new">Libur</a>
          </li> --}}
          {{-- <li class="nav-item tampil">
            <a class="nav-link " href="products-ajax-crud">Perai</a>
          </li> --}}
          <li class="nav-item tampil">
            <a class="nav-link " href="/customers">Libur</a>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link " href="/indexbarang">Bmd</a>
          </li>
          <li class="nav-item tampil">
            <div class="dropdown show">
              <a class="btn light  dropdown-toggle" href="/tabel" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pegawai
              </a>
            
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/tabel">Tabel Pegawai</a>
                <a class="dropdown-item" href="/tabelrekap">Tabel Rekap</a>
                <a class="dropdown-item" href="/jekel">Tabel Jekel</a>
                <a class="dropdown-item" href="/all">Tabel All</a>
                <a class="dropdown-item" href="/pergaji">Tabel Pergaji</a>
                <a class="dropdown-item" href="/usulanapbd">Tabel Usulan SK-APBD</a>
                <a class="dropdown-item" href="/usulanapbn">Tabel Usulan SK-APBN</a>
                <a class="dropdown-item" href="/usulanipp">Tabel Usulan SK-IPP</a>
                {{-- <a class="dropdown-item" href="/barang">Barang</a> --}}
              </div>
            </div>
          </li>
          <li class="nav-item tampil">
            <a class="nav-link" href="{{ url('sk.index')}} " style="text-decoration: none">SPMT</a>
          </li>
          <li class="nav-item tampil">
            {{-- <a class="nav-link " href="/bku.bku">BKU</a> --}}
              <div class="dropdown show">
                <a class="btn light  dropdown-toggle" href="/bku.bku" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  BKU
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  {{-- <a class="dropdown-item" href="/bku.bku">BKU</a> --}}
                  <a class="dropdown-item" href="/filterpenerimaan">Penerimaan</a>
                  <a class="dropdown-item" href="/filterpengeluaran">Pengeluaran</a>
                </div>
              </div>
          </li>
          <li class="nav-item tampil">
            {{-- <a class="nav-link " href="/tupoksi_tugas.index">tupoksi_tugas</a> --}}
          </li>
        </li>
        {{-- <li class="nav-item tampil">
          <a class="nav-link disabled">Disabled</a>
        </li> --}}
      </ul>
      {{-- <form class="d-flex " role="search">
        <input class="form-control me-2 tampil" type="search"  aria-label="Search">
        <button class="btn btn-outline-success tampil" type="submit">Search</button>
      </form> --}}
    </div>
  </div>
</nav>
@yield('content')
{{-- @yield('title') --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>