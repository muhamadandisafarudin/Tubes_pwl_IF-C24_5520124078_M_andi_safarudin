@extends('layouts.app')
@section('title', 'Data Jadwal')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><i class="bi bi-calendar3"></i> Data Jadwal</h4>
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Jadwal
    </a>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $index => $jadwal)
                <tr>
                    <td>{{ $jadwals->firstItem() + $index }}</td>
                    <td>{{ $jadwal->matakuliah->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $jadwal->dosen->nama ?? '-' }}</td>
                    <td><span class="badge bg-secondary">Kelas {{ $jadwal->kelas }}</span></td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }} WIB</td>
                    <td>
                        <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus jadwal ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $jadwals->links() }}
    </div>
</div>
@endsection