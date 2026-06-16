@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h4><i class="bi bi-speedometer2"></i> Dashboard Admin</h4>
        <p class="text-muted">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>
</div>

{{-- Statistik --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Total Dosen</h6>
                    <h2 class="mb-0">{{ $data['total_dosen'] }}</h2>
                </div>
                <i class="bi bi-person-badge fs-1 opacity-50"></i>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.dosen.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Total Mahasiswa</h6>
                    <h2 class="mb-0">{{ $data['total_mahasiswa'] }}</h2>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.mahasiswa.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Total Mata Kuliah</h6>
                    <h2 class="mb-0">{{ $data['total_matakuliah'] }}</h2>
                </div>
                <i class="bi bi-book fs-1 opacity-50"></i>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.matakuliah.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Total Jadwal</h6>
                    <h2 class="mb-0">{{ $data['total_jadwal'] }}</h2>
                </div>
                <i class="bi bi-calendar3 fs-1 opacity-50"></i>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.jadwal.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection