<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Warga - Sistem Inventaris</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
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
            </nav>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Data Warga</h6>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('warga.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus me-2"></i>Tambah Warga</a>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($wargas as $warga)
                                <tr>
                                    <td>{{ $warga->no_ktp }}</td>
                                    <td>{{ $warga->nama }}</td>
                                    <td>{{ $warga->jenis_kelamin }}</td>
                                    <td>{{ $warga->pekerjaan }}</td>
                                    <td>
                                        <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST" class="d-inline">
                                            <a href="{{ route('warga.edit', $warga->warga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $wargas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>
</html>