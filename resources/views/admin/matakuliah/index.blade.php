@extends('layouts.app')
@section('title', 'Data Mata Kuliah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><i class="bi bi-book"></i> Data Mata Kuliah</h4>
    <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Mata Kuliah
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($matakuliahs as $index => $mk)
                <tr>
                    <td>{{ $matakuliahs->firstItem() + $index }}</td>
                    <td><span class="badge bg-secondary">{{ $mk->kode_matakuliah }}</span></td>
                    <td>{{ $mk->nama_matakuliah }}</td>
                    <td><span class="badge bg-primary">{{ $mk->sks }} SKS</span></td>
                    <td>
                        <a href="{{ route('admin.matakuliah.edit', $mk->kode_matakuliah) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.matakuliah.destroy', $mk->kode_matakuliah) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus mata kuliah ini?')">
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
                    <td colspan="5" class="text-center text-muted">Belum ada data mata kuliah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $matakuliahs->links() }}
    </div>
</div>
@endsection