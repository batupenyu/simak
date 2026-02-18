@extends('layout.sidebar')

@section('content')

<style>
    .dashboard-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 4px solid;
    }
    .dashboard-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    .dashboard-card.blue { border-left-color: #667eea; }
    .dashboard-card.green { border-left-color: #11998e; }
    .dashboard-card.orange { border-left-color: #f093fb; }
    .dashboard-card.red { border-left-color: #fa709a; }
    .dashboard-card.purple { border-left-color: #a8edea; }
    .dashboard-card.cyan { border-left-color: #4facfe; }
    
    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin: 5px 0;
    }
    .stat-label {
        font-size: 0.85rem;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.3;
        position: absolute;
        right: 20px;
        top: 20px;
    }
    .chart-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    .pegawai-card {
        background: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }
    .pegawai-card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        border-color: #667eea;
    }
    .pegawai-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
    }
    .badge-custom {
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .badge-pns { background: #667eea; color: white; }
    .badge-p3k { background: #11998e; color: white; }
    .badge-honor { background: #fa709a; color: white; }
    .badge-guru { background: #f093fb; color: white; }
    .badge-tu { background: #4facfe; color: white; }
    
    .search-box {
        background: white;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    .birthday-card {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 10px;
    }
    .table-custom {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .table-custom thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
</style>

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="fa fa-users me-2"></i>Data Pegawai</h2>
            <p class="text-muted mb-0">Sistem Informasi Manajemen Kepegawaian</p>
        </div>
        <a href="{{ url('pegawai.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-2"></i>Tambah Pegawai
        </a>
    </div>

    <!-- Search Box -->
    <div class="search-box">
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="searchPegawai" placeholder="Cari pegawai...">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="PNS">PNS</option>
                    <option value="P3K">P3K</option>
                    <option value="honor">Honor</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterJabatan">
                    <option value="">Semua Jabatan</option>
                    <option value="GURU">Guru</option>
                    <option value="TU">TU</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100">
                    <i class="fa fa-search me-1"></i>Cari
                </button>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card blue position-relative">
                <i class="fa fa-user-tie stat-icon"></i>
                <div class="stat-label">Total PNS</div>
                <div class="stat-number">{{ $totalPNS ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-check-circle"></i> Aktif</small>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card green position-relative">
                <i class="fa fa-users stat-icon"></i>
                <div class="stat-label">Total P3K</div>
                <div class="stat-number">{{ $totalP3K ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-clock"></i> Kontrak</small>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card orange position-relative">
                <i class="fa fa-chalkboard-teacher stat-icon"></i>
                <div class="stat-label">Total Guru</div>
                <div class="stat-number">{{ $totalGuru ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-graduation-cap"></i> Pengajar</small>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card red position-relative">
                <i class="fa fa-briefcase stat-icon"></i>
                <div class="stat-label">Total TU</div>
                <div class="stat-number">{{ $totalTU ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-building"></i> Admin</small>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card cyan position-relative">
                <i class="fa fa-male stat-icon"></i>
                <div class="stat-label">Laki-Laki</div>
                <div class="stat-number">{{ $totalLakiLaki ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-user"></i> Pria</small>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="dashboard-card purple position-relative">
                <i class="fa fa-female stat-icon"></i>
                <div class="stat-label">Perempuan</div>
                <div class="stat-number">{{ $totalPerempuan ?? 0 }}</div>
                <small class="text-muted"><i class="fa fa-user"></i> Wanita</small>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-chart-pie me-2"></i>Status Kepegawaian</h5>
                <canvas id="statusChart"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-chart-bar me-2"></i>Jabatan</h5>
                <canvas id="jabatanChart"></canvas>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-chart-area me-2"></i>Pangkat/Golongan</h5>
                <canvas id="pangkatChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Pegawai List -->
        <div class="col-lg-8">
            <div class="chart-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="fa fa-list me-2"></i>Daftar Pegawai</h5>
                    <span class="badge bg-primary">{{ count($pegawai ?? []) }} Pegawai</span>
                </div>
                
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Pangkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pegawai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="pegawai-avatar me-2" style="width: 35px; height: 35px; font-size: 0.9rem;">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </div>
                                        <strong>{{ Str::limit($item->name, 30) }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $item->jenis == 'GURU' ? 'badge-guru' : 'badge-tu' }}">
                                        {{ $item->jenis }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $item->status == 'PNS' ? 'badge-pns' : ($item->status == 'P3K' ? 'badge-p3k' : 'badge-honor') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td><small>{{ $item->pangkat_gol ?? '-' }}</small></td>
                                <td>
                                    <a href="{{ url('pegawai.info/'.$item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('project.edit_user/'.$item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fa fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                    <p class="text-muted">Belum ada data pegawai</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-clock me-2"></i>Aktivitas Terbaru</h5>
                @if(isset($recentUsers) && $recentUsers->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentUsers as $user)
                            <a href="{{ url('pegawai.info/'.$user->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-user-circle text-primary me-2"></i>
                                    <strong>{{ Str::limit($user->name, 20) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $user->jabatan ?? 'N/A' }}</small>
                                </div>
                                <span class="badge bg-info">{{ $user->status }}</span>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center mb-0">Belum ada aktivitas</p>
                @endif
            </div>

            <!-- Birthdays -->
            <div class="chart-container mt-3">
                <h5 class="fw-bold mb-3"><i class="fa fa-birthday-cake me-2"></i>Ulang Tahun Bulan Ini</h5>
                @if(isset($birthdaysThisMonth) && $birthdaysThisMonth->count() > 0)
                    @foreach($birthdaysThisMonth as $birthday)
                        <div class="birthday-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-gift me-2"></i>
                                    <strong>{{ $birthday->name }}</strong>
                                    <br>
                                    <small>{{ $birthday->jabatan ?? 'N/A' }}</small>
                                </div>
                                <span class="badge bg-white text-dark">
                                    <i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($birthday->tgl_lahir)->format('d M') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center mb-0">Tidak ada ulang tahun bulan ini</p>
                @endif
            </div>

            <!-- Quick Links -->
            <div class="chart-container mt-3">
                <h5 class="fw-bold mb-3"><i class="fa fa-link me-2"></i>Tautan Cepat</h5>
                @include('pegawai.link')
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Status Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($statusCounts ?? [])) !!},
            datasets: [{
                data: {!! json_encode(array_values($statusCounts ?? [])) !!},
                backgroundColor: ['#667eea', '#11998e', '#fa709a'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Jabatan Chart
    const jabatanCtx = document.getElementById('jabatanChart').getContext('2d');
    new Chart(jabatanCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($jabatanCounts ?? [])) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode(array_values($jabatanCounts ?? [])) !!},
                backgroundColor: ['#f093fb', '#4facfe', '#667eea'],
                borderWidth: 0,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            },
            plugins: { legend: { display: false } }
        }
    });

    // Pangkat Chart
    const pangkatCtx = document.getElementById('pangkatChart').getContext('2d');
    new Chart(pangkatCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($pangkatCounts ?? [])) !!},
            datasets: [{
                label: 'Pegawai',
                data: {!! json_encode(array_values($pangkatCounts ?? [])) !!},
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.2)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#667eea'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            },
            plugins: { legend: { display: false } }
        }
    });

    // Search functionality
    document.getElementById('searchPegawai').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let name = row.cells[1]?.innerText.toLowerCase();
            row.style.display = name && name.includes(filter) ? '' : 'none';
        });
    });
</script>

@endsection
