<!doctype html>
<html lang="en">

<head>
  <title>Data Pegawai</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Main Application -->
  <title>@yield('title') | Sistem Manajemen Cuti</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-3 pt-5">
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="homeSubmenuToggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                <a href="{{ url('project/') }}">Pegawai</a>
              </li>
              <li>
                <a href="{{ url('pegawai.index') }}">Dokumen</a>
              </li>
              <li>
                {{-- <a href="{{ url('karyawan/') }}">Karyawan</a> --}}
              </li>
              <li>
                <a href="{{url('show_ak')}}">Angka Kredit</a>
              </li>

              <li>
                <a href="{{ url('cuti.index') }}">Cuti Pegawai</a>
              </li>
              <!-- <li>
                <a href="{{ url('project/') }}">Rencana SKP</a>
              </li> -->
              <li>
                <a href="{{ url('ekspektasi/index') }}">Ekspektasi</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/atasan.index">Atasan</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/penilai.index">Penilai</a>
              </li>

            </ul>
          </li>

          <li>
            <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Halaman</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('unit_kerja.index') }}" id="unit_kerja">Unit Kerja</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/atasan.index">Atasan</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/penilai.index">Penilai</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/rk">RK Atasan</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/tim.index">Tim Kerja</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/mapel">Mapel-Tugas</a>
              </li>
              <li class="nav-item tampil">
                {{-- <a class="nav-link " href="{{ route('logo.index') }}">Logo</a> --}}
                <a href="{{ route('image.index') }}">Photo</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/filter">Rekap Cuti</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/pegawai.rekap">Rekap kp4</a>
              </li>

              <li class="nav-item tampil">
                <a class="nav-link " href="/customers">Libur</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link " href="/indexbarang">Bmd</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('pasangan.index') }}" id="pasangan">Pasangan</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('pists.index') }}" id="pists">Surat-Tugas</a>
              </li>
            </ul>
          </li>
          <li>
            {{-- <a class="dropdown-item" href="/tabel">Tabel Pegawai</a>
                            <a class="dropdown-item" href="/tabelrekap">Tabel Rekap</a>
                            <a class="dropdown-item" href="/jekel">Tabel Jekel</a>
                            <a class="dropdown-item" href="/all">Tabel Pegawai & Mapel</a>
                            <a class="dropdown-item" href="/pergaji">Tabel Pergaji</a>
                            <a class="dropdown-item" href="/usulanapbd">Tabel Usulan SK-APBD</a>
                            <a class="dropdown-item" href="/usulanapbn">Tabel Usulan SK-APBN</a>
                            <a class="dropdown-item" href="/usulanipp">Tabel Usulan SK-IPP</a>
                            <a class="dropdown-item" href="/filterpenerimaan">Penerimaan</a>
                            <a class="dropdown-item" href="/filterpengeluaran">Pengeluaran</a>
                            <a class="dropdown-item" href="/bku.bku">Buku Kas Umum</a>
                            <a class="nav-link" href="{{ url('sk.index')}} " style="text-decoration: none">SPMT</a> --}}
          </li>
        </ul>

        <div class="footer">
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            {{-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> --}}
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>

      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>

          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="{{ url('sesi') }}" id="skp">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      @yield('content')
    </div>
  </div>

  <!-- <script src="{{asset ('js/jquery.min.js') }}"></script> -->
  <!-- <script src="{{asset ('js/popper.js') }}"></script> -->
  <!-- <script src="{{asset ('js/bootstrap.min.js') }}"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="{{ url('js/main.js') }}"></script>
  <script src="{{ url('js/script.js') }}"></script>
  
  <script>
    // Initialize Bootstrap collapse for submenus
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize all collapse elements
      const collapseElementList = document.querySelectorAll('.collapse');
      collapseElementList.forEach(collapseEl => {
        new bootstrap.Collapse(collapseEl, {
          toggle: false
        });
      });
      
      // Handle submenu toggle clicks
      const submenuToggles = document.querySelectorAll('[data-bs-toggle="collapse"]');
      submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
          e.preventDefault();
          const target = this.getAttribute('href');
          const targetElement = document.querySelector(target);
          
          if (targetElement) {
            const collapseInstance = bootstrap.Collapse.getInstance(targetElement);
            if (collapseInstance) {
              collapseInstance.toggle();
            }
          }
          
          // Toggle aria-expanded
          const isExpanded = this.getAttribute('aria-expanded') === 'true';
          this.setAttribute('aria-expanded', !isExpanded);
        });
      });
    });
  </script>



</body>

</html>
