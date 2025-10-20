<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Aset - Sistem Inventaris</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('aset.index') }}" class="nav-item nav-link active"><i class="fa fa-box-open me-2"></i>Daftar Aset</a>
                    <a href="{{ route('warga.index') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Data Warga</a>
                </div>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
                <div class="navbar-nav align-items-center ms-auto">
                    {{-- (Navbar items like profile dropdown) --}}
                </div>
            </nav>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Data Aset Inventaris</h6>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('aset.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus me-2"></i>Tambah Aset</a>

                    <div class="table-responsive">
                        <table id="asetTable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Aset</th>
                                    <th>Kategori</th>
                                    <th>Kondisi</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asets as $aset)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $aset->kode_aset }}</td>
                                    <td>{{ $aset->nama_aset }}</td>
                                    <td>{{ $aset->kategori }}</td>
                                    <td>
                                        @if($aset->kondisi == 'Baik')
                                            <span class="badge bg-success">{{ $aset->kondisi }}</span>
                                        @elseif($aset->kondisi == 'Rusak Ringan')
                                            <span class="badge bg-warning">{{ $aset->kondisi }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $aset->kondisi }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $aset->lokasi }}</td>
                                    <td>
                                        <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('aset.destroy', $aset->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#asetTable').DataTable();
        });
    </script>
</body>
</html>