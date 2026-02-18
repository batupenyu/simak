@extends('layout.sidebar')
@section('content')

<style>
    .dashboard-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 25px;
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
    }
    .dashboard-card.blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .dashboard-card.green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .dashboard-card.orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .dashboard-card.red { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
    .dashboard-card.cyan { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
    .dashboard-card.purple { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333; }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        margin: 10px 0;
    }
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .chart-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .pegawai-list {
        max-height: 400px;
        overflow-y: auto;
    }
    .pegawai-item {
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }
    .pegawai-item:hover {
        background: #f8f9fa;
    }
    .pegawai-item a {
        text-decoration: none;
        color: #333;
        display: block;
    }
    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-pns { background: #667eea; color: white; }
    .badge-p3k { background: #38ef7d; color: white; }
    .badge-honor { background: #f5576c; color: white; }
</style>

<div class="container-fluid mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="fa fa-dashboard me-2"></i>Dashboard Pegawai</h2>
        <a href="{{ url('pegawai.create') }}" class="btn btn-warning">
            <i class="fa fa-plus me-2"></i>Tambah Pegawai
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card blue">
                <div class="stat-label">Total PNS</div>
                <div class="stat-number">{{ $totalPNS ?? 0 }}</div>
                <div><i class="fa fa-user-tie me-1"></i>Pegawai Negeri</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card green">
                <div class="stat-label">Total P3K</div>
                <div class="stat-number">{{ $totalP3K ?? 0 }}</div>
                <div><i class="fa fa-users me-1"></i>Kontrak Pemerintah</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card orange">
                <div class="stat-label">Total Guru</div>
                <div class="stat-number">{{ $totalGuru ?? 0 }}</div>
                <div><i class="fa fa-chalkboard-teacher me-1"></i>Tenaga Pengajar</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card red">
                <div class="stat-label">Total TU</div>
                <div class="stat-number">{{ $totalTU ?? 0 }}</div>
                <div><i class="fa fa-briefcase me-1"></i>Tata Usaha</div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="dashboard-card cyan">
                <div class="stat-label">Laki-Laki</div>
                <div class="stat-number">{{ $totalLakiLaki ?? 0 }}</div>
                <div><i class="fa fa-male me-1"></i>Pegawai Pria</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card purple">
                <div class="stat-label">Perempuan</div>
                <div class="stat-number">{{ $totalPerempuan ?? 0 }}</div>
                <div><i class="fa fa-female me-1"></i>Pegawai Wanita</div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-chart-pie me-2"></i>Distribusi Status Pegawai</h5>
                <canvas id="statusChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-chart-bar me-2"></i>Distribusi Jabatan</h5>
                <canvas id="jabatanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Quick Access & Recent Activity -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-list me-2"></i>Daftar Pegawai</h5>
                
                <ul class="nav nav-tabs mb-3" id="pegawaiTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pns-tab" data-bs-toggle="tab" data-bs-target="#pns" type="button" role="tab">PNS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="p3k-tab" data-bs-toggle="tab" data-bs-target="#p3k" type="button" role="tab">P3K</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="honor-tab" data-bs-toggle="tab" data-bs-target="#honor" type="button" role="tab">Honor</button>
                    </li>
                </ul>

                <div class="tab-content" id="pegawaiTabContent">
                    <div class="tab-pane fade show active" id="pns" role="tabpanel">
                        <div class="pegawai-list">
                            @foreach ($pegawai as $item)
                                <div class="pegawai-item">
                                    <a href="{{ url('pegawai.info/'.$item->id) }}">
                                        <i class="fa fa-user-circle me-2"></i>
                                        {{ $loop->iteration }}. {{ $item->name }}
                                        <span class="badge badge-status badge-pns float-end">PNS</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="p3k" role="tabpanel">
                        <div class="pegawai-list">
                            @foreach ($p3k as $item)
                                <div class="pegawai-item">
                                    <a href="{{ url('pegawai.info/'.$item->id) }}">
                                        <i class="fa fa-user-circle me-2"></i>
                                        {{ $loop->iteration }}. {{ $item->name }}
                                        <span class="badge badge-status badge-p3k float-end">P3K</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="honor" role="tabpanel">
                        <div class="pegawai-list">
                            @foreach ($honor as $item)
                                <div class="pegawai-item">
                                    <a href="{{ url('pegawai.info/'.$item->id) }}">
                                        <i class="fa fa-user-circle me-2"></i>
                                        {{ $loop->iteration }}. {{ $item->name }}
                                        <span class="badge badge-status badge-honor float-end">Honor</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="chart-container">
                <h5 class="fw-bold mb-3"><i class="fa fa-clock me-2"></i>Aktivitas Terbaru</h5>
                @if(isset($recentUsers) && $recentUsers->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentUsers as $user)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-user-circle text-primary me-2"></i>
                                    <strong>{{ Str::limit($user->name, 25) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $user->jabatan }}</small>
                                </div>
                                <span class="badge bg-info">{{ $user->status }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center">Belum ada aktivitas</p>
                @endif
            </div>

            <div class="chart-container mt-3">
                <h5 class="fw-bold mb-3"><i class="fa fa-link me-2"></i>Akses Cepat</h5>
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
                backgroundColor: [
                    '#667eea',
                    '#38ef7d',
                    '#f5576c',
                    '#4facfe',
                    '#fee140'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
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
                label: 'Jumlah Pegawai',
                data: {!! json_encode(array_values($jabatanCounts ?? [])) !!},
                backgroundColor: [
                    '#667eea',
                    '#38ef7d',
                    '#f5576c',
                    '#4facfe',
                    '#fee140',
                    '#a8edea'
                ],
                borderWidth: 0,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

@endsection
