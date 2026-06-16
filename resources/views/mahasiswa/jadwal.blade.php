@extends('layouts.app')
@section('title', 'Jadwal Perkuliahan')

@section('content')
<div class="mb-3">
    <h4><i class="bi bi-calendar3"></i> Jadwal Perkuliahan</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $index => $jadwal)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jadwal->matakuliah->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $jadwal->dosen->nama ?? '-' }}</td>
                    <td><span class="badge bg-secondary">Kelas {{ $jadwal->kelas }}</span></td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }} WIB</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection