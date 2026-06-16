@extends('layouts.app')
@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.matakuliah.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kode Mata Kuliah</label>
                        <input type="text" name="kode_matakuliah"
                               class="form-control @error('kode_matakuliah') is-invalid @enderror"
                               value="{{ old('kode_matakuliah') }}" maxlength="8"
                               placeholder="Contoh: IF001">
                        @error('kode_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Mata Kuliah</label>
                        <input type="text" name="nama_matakuliah"
                               class="form-control @error('nama_matakuliah') is-invalid @enderror"
                               value="{{ old('nama_matakuliah') }}" maxlength="50"
                               placeholder="Masukkan nama mata kuliah">
                        @error('nama_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">SKS</label>
                        <input type="number" name="sks"
                               class="form-control @error('sks') is-invalid @enderror"
                               value="{{ old('sks') }}" min="1" max="6"
                               placeholder="Jumlah SKS">
                        @error('sks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.matakuliah.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection