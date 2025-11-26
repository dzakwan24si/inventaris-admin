@extends('layouts.admin.app')

@section('title', 'Detail Aset')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Aset: {{ $aset->nama_aset }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('aset.index') }}">Aset</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Aset</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kode Aset</th>
                                    <td>{{ $aset->kode_aset }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $aset->kategoriAset->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Kondisi</th>
                                    <td>
                                        @if ($aset->kondisi == 'Baik')
                                            <span class="badge bg-success">Baik</span>
                                        @elseif($aset->kondisi == 'Rusak Ringan')
                                            <span class="badge bg-warning">Rusak Ringan</span>
                                        @else
                                            <span class="badge bg-danger">Rusak Berat</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $aset->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Penanggung Jawab</th>
                                    <td>{{ $aset->penanggung_jawab }}</td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a href="{{ route('aset.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Dokumen & Foto Aset</h4>
                        </div>
                        <div class="card-body">

                            {{-- Form Upload --}}
                            {{-- Ubah action ke media.store --}}
                            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data"
                                class="mb-4">
                                @csrf
                                <input type="hidden" name="ref_table" value="aset">
                                <input type="hidden" name="ref_id" value="{{ $aset->id }}">

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Upload File</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="files[]" id="formFileMultiple"
                                            multiple required>
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-upload"></i>
                                            Upload</button>
                                    </div>
                                    <small class="text-muted">Format: Gambar (jpg,png) atau Dokumen (pdf,doc,xls).</small>
                                </div>
                            </form>

                            <hr>

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="list-group">
                                @forelse($files as $file)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{-- Ikon berdasarkan mime_type (opsional, bisa dibuat lebih canggih) --}}
                                            <i class="bi bi-file-earmark-text me-3 fs-4"></i>
                                            <div>
                                                {{-- Gunakan $file->file_name --}}
                                                <a href="{{ asset('uploads/' . $file->file_name) }}" target="_blank"
                                                    class="fw-bold text-decoration-none">
                                                    {{ Str::limit($file->caption, 25) }}
                                                </a>
                                                <br>
                                                <small
                                                    class="text-muted">{{ $file->created_at->format('d M Y, H:i') }}</small>
                                            </div>
                                        </div>

                                        {{-- Gunakan media_id untuk hapus --}}
                                        <form action="{{ route('media.destroy', $file->media_id) }}" method="POST"
                                            onsubmit="return confirm('Hapus file ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                @empty
                                    <div class="text-center py-3 text-muted">
                                        Belum ada file yang diupload.
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
