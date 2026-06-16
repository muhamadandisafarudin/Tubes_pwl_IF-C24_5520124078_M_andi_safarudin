@extends('layouts.app')
@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.matakuliah.update', $matakuliah->kode_matakuliah) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kode Mata Kuliah</label>
                        <input type="text" class="form-control"
                               value="{{ $matakuliah->kode_matakuliah }}" disabled>
                        <small class="text-muted">Kode tidak dapat diubah.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Mata Kuliah</label>
                        <input type="text" name="nama_matakuliah"
                               class="form-control @error('nama_matakuliah') is-invalid @enderror"
                               value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}"
                               maxlength="50">
                        @error('nama_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">SKS</label>
                        <input type="number" name="sks"
                               class="form-control @error('sks') is-invalid @enderror"
                               value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6">
                        @error('sks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Update
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