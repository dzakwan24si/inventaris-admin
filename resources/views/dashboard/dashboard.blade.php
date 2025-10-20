<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard - Sistem Inventaris Aset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets-admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-boxes me-2"></i>INVENTARIS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('assets-admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">M. Dzakwan Syafiq</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('aset.index') }}" class="nav-item nav-link"><i class="fa fa-box-open me-2"></i>Daftar Aset</a>
                    <a href="{{ route('warga.index') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Data Warga</a>
                </div>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
                {{-- (Navbar content seperti profile, notifikasi, dll.) --}}
            </nav>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-boxes fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Aset</p>
                                <h6 class="mb-0">{{ $total_aset }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-check-circle fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Aset Baik</p>
                                <h6 class="mb-0">{{ $aset_baik }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-tools fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Aset Rusak</p>
                                <h6 class="mb-0">{{ $aset_rusak }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Jumlah Aset per Kategori</h6>
                                <a href="">Lihat Detail</a>
                            </div>
                            <canvas id="asset-by-category"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Status Aset</h6>
                                <a href="">Lihat Detail</a>
                            </div>
                            <canvas id="asset-status"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Daftar Aset Terbaru</h6>
                        <a href="{{ route('aset.index') }}">Lihat Semua</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>Kode</th>
                                    <th>Nama Aset</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($daftar_aset as $aset)
                                <tr>
                                    <td>{{ $aset['kode'] }}</td>
                                    <td>{{ $aset['nama'] }}</td>
                                    <td>
                                        @if ($aset['kondisi'] == 'Baik')
                                            <span class="badge bg-success">{{ $aset['kondisi'] }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ $aset['kondisi'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $aset['lokasi'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data aset.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
    <script>
        // Data untuk Grafik (bisa dibuat dinamis nanti)
        (function ($) {
            "use strict";
            var ctx1 = $("#asset-by-category").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, { type: "bar", data: { labels: ["Elektronik", "Furnitur", "Lainnya"], datasets: [{ label: "Jumlah", data: [10, 5, 3], backgroundColor: "rgba(0, 156, 255, .7)" }] }, options: { responsive: true } });
            var ctx2 = $("#asset-status").get(0).getContext("2d");
            var myChart2 = new Chart(ctx2, { type: "pie", data: { labels: ["Baik", "Rusak"], datasets: [{ backgroundColor: ["rgba(0, 156, 255, .7)", "rgba(255, 193, 7, .7)"], data: [{{ $aset_baik }}, {{ $aset_rusak }}] }] }, options: { responsive: true } });
        })(jQuery);
    </script>
</body>
</html>