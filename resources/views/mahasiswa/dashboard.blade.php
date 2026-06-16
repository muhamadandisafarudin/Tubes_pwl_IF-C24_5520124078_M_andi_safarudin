@extends('layouts.app')
@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h4><i class="bi bi-speedometer2"></i> Dashboard Mahasiswa</h4>
        <p class="text-muted">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Mata Kuliah Diambil</h6>
                    <h2 class="mb-0">{{ $krs->count() }}</h2>
                </div>
                <i class="bi bi-journal-text fs-1 opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title">Total SKS</h6>
                    <h2 class="mb-0">{{ $totalSks }}</h2>
                </div>
                <i class="bi bi-bookmark-check fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

@if($krs->count() > 0)
<div class="card mt-4">
    <div class="card-header">
        <h6 class="mb-0"><i class="bi bi-list-ul"></i> KRS Saya</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($krs as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->matakuliah->kode_matakuliah }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $item->matakuliah->sks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection