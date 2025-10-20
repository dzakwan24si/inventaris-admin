<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Aset - Sistem Inventaris</title>
    <meta content="width=device-width, initial-scale-1.0" name="viewport">
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
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
                    <h6 class="mb-4">Formulir Edit Aset</h6>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('aset.update', $aset->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Kode Aset</label>
                            <input type="text" name="kode_aset" class="form-control" value="{{ old('kode_aset', $aset->kode_aset) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Aset</label>
                            <input type="text" name="nama_aset" class="form-control" value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                        </div>
                        {{-- (Lanjutkan untuk semua field lainnya) --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $aset->kategori) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Perolehan</label>
                            <input type="date" name="tanggal_perolehan" class="form-control" value="{{ old('tanggal_perolehan', $aset->tanggal_perolehan) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nilai Perolehan</label>
                            <input type="number" name="nilai_perolehan" class="form-control" value="{{ old('nilai_perolehan', $aset->nilai_perolehan) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <select name="kondisi" class="form-select" required>
                                <option value="Baik" {{ old('kondisi', $aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi', $aset->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi', $aset->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $aset->lokasi) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $aset->penanggung_jawab) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $aset->keterangan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal</a>
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