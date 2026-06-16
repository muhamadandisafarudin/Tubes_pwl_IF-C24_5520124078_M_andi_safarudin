@extends('layouts.app')
@section('title', 'Data Dosen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><i class="bi bi-person-badge"></i> Data Dosen</h4>
    <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Dosen
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosens as $index => $dosen)
                <tr>
                    <td>{{ $dosens->firstItem() + $index }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $dosen->mahasiswas->count() }} mahasiswa
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.dosen.edit', $dosen->nidn) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.dosen.destroy', $dosen->nidn) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus dosen ini?')">
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
                    <td colspan="5" class="text-center text-muted">Belum ada data dosen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $dosens->links() }}
    </div>
</div>
@endsection