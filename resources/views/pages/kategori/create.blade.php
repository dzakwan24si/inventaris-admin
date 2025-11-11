@extends('layouts.admin.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="page-heading"><h3>Formulir Tambah Kategori</h3></div>
<section class="section">
    <div class="card">
        <div class="card-header"><h4 class="card-title">Data Kategori Baru</h4></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Kategori</label>
                    <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</section>
@endsection