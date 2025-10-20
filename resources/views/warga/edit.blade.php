<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Warga - Sistem Inventaris</title>
    <meta content="width=device-width, initial-scale-1.0" name="viewport">
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>
        </div>

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-boxes me-2"></i>INVENTARIS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="ms-3">
                        <h6 class="mb-0">M. Dzakwan Syafiq</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="#" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('aset.index') }}" class="nav-item nav-link"><i class="fa fa-box-open me-2"></i>Daftar Aset</a>
                    <a href="{{ route('warga.index') }}" class="nav-item nav-link active"><i class="fa fa-users me-2"></i>Data Warga</a>
                </div>
            </nav>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>
            </nav>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Formulir Edit Data Warga</h6>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3"><label class="form-label">No. KTP</label><input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}" required></div>
                        <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}" required></div>
                        <div class="mb-3"><label class="form-label">Jenis Kelamin</label><select name="jenis_kelamin" class="form-select" required><option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option><option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option></select></div>
                        <div class="mb-3"><label class="form-label">Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}" required></div>
                        <div class="mb-3"><label class="form-label">Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required></div>
                        <div class="mb-3"><label class="form-label">No. Telepon</label><input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}"></div>
                        <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}"></div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>
</html>