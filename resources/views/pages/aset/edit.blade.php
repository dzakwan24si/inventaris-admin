{{-- resources/views/aset/edit.blade.php --}}
@extends('layouts.admin.app')

@section('title', 'Edit Aset')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Formulir Edit Aset</h3>
                <p class="text-subtitle text-muted">Ubah data aset yang sudah ada.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('aset.index') }}">Daftar Aset</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Aset</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Aset: {{ $aset->nama_aset }}</h4>
            </div>
            <div class="card-body">
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
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->kategori_id }}" {{ old('kategori_id', $aset->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>
                                    {{ $kategori->nama }} ({{ $kategori->kode }})
                                </option>
                            @endforeach
                        </select>
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
                    <a href="{{ route('aset.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
