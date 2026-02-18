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
            <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="homeSubmenuToggle">
              <i class="fa fa-home me-2"></i>Home
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                <a href="{{ url('project/') }}"><i class="fa fa-user me-2"></i>Pegawai</a>
              </li>
              <li>
                <a href="{{ url('pegawai.index') }}"><i class="fa fa-file me-2"></i>Dokumen</a>
              </li>
              <li>
                <a href="{{url('show_ak')}}"><i class="fa fa-list me-2"></i>Angka Kredit</a>
              </li>
              <li>
                <a href="{{ url('cuti.index') }}"><i class="fa fa-calendar me-2"></i>Cuti Pegawai</a>
              </li>
              <li>
                <a href="{{ url('ekspektasi/index') }}"><i class="fa fa-chart-line me-2"></i>Ekspektasi</a>
              </li>
              <li>
                <a href="{{ isset($user) ? url('project.main/'.$user->id.'#rencana') : url('project/') }}"><i class="fa fa-bullseye me-2"></i>Sasaran SKP</a>
              </li>
              <li>
                <a href="{{ isset($user) ? url('project.main/'.$user->id.'#evaluasi') : url('project/') }}"><i class="fa fa-clipboard-check me-2"></i>Evaluasi SKP</a>
              </li>
              <li>
                <a href="{{ isset($user) ? url('project.main/'.$user->id.'#report') : url('project/') }}"><i class="fa fa-file-alt me-2"></i>Laporan SKP</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#penilaianSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-clipboard-check me-2"></i>Penilaian
            </a>
            <ul class="collapse list-unstyled" id="penilaianSubmenu">
              <li class="nav-item tampil">
                <a class="nav-link" href="/atasan.index"><i class="fa fa-user-tie me-2"></i>Atasan</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/penilai.index"><i class="fa fa-user-check me-2"></i>Penilai</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/rk"><i class="fa fa-tasks me-2"></i>RK Atasan</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/tim.index"><i class="fa fa-users me-2"></i>Tim Kerja</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/mapel"><i class="fa fa-briefcase me-2"></i>Mapel-Tugas</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#dataSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-database me-2"></i>Data
            </a>
            <ul class="collapse list-unstyled" id="dataSubmenu">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('unit_kerja.index') }}" id="unit_kerja"><i class="fa fa-building me-2"></i>Unit Kerja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('pasangan.index') }}" id="pasangan"><i class="fa fa-heart me-2"></i>Pasangan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pasangan.kp4_list') }}"><i class="fa fa-file-invoice me-2"></i>KP-4.1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pasangan.kp3_list') }}"><i class="fa fa-file-invoice me-2"></i>KP-4.2</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/customers"><i class="fa fa-calendar-check me-2"></i>Libur</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/indexbarang"><i class="fa fa-box me-2"></i>BMD</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#laporanSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-file-alt me-2"></i>Laporan
            </a>
            <ul class="collapse list-unstyled" id="laporanSubmenu">
              <li class="nav-item tampil">
                <a class="nav-link" href="/filter"><i class="fa fa-file-excel me-2"></i>Rekap Cuti</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="/pegawai.rekap"><i class="fa fa-file-pdf me-2"></i>Rekap KP4</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#pengaturanSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-cog me-2"></i>Pengaturan
            </a>
            <ul class="collapse list-unstyled" id="pengaturanSubmenu">
              <li class="nav-item tampil">
                <a class="nav-link" href="{{ route('image.index') }}"><i class="fa fa-image me-2"></i>Photo</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="{{ url('pists.index') }}" id="pists"><i class="fa fa-envelope me-2"></i>Surat-Tugas</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="{{ url('pists.index') }}"><i class="fa fa-file-pdf me-2"></i>ST-PDF</a>
              </li>
              <li class="nav-item tampil">
                <a class="nav-link" href="{{ url('izin.index') }}"><i class="fa fa-file-contract me-2"></i>Surat Izin</a>
              </li>
            </ul>
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
