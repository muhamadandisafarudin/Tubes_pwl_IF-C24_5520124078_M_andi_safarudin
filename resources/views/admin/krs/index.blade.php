@extends('layouts.app')
@section('title', 'Data KRS')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><i class="bi bi-journal-text"></i> Data KRS Semua Mahasiswa</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($krs as $index => $item)
                <tr>
                    <td>{{ $krs->firstItem() + $index }}</td>
                    <td>{{ $item->mahasiswa->npm ?? '-' }}</td>
                    <td>{{ $item->mahasiswa->nama ?? '-' }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $item->matakuliah->sks ?? '-' }} SKS</td>
                    <td>
                        <form action="{{ route('admin.krs.destroy', $item->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus KRS ini?')">
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
                    <td colspan="6" class="text-center text-muted">Belum ada data KRS.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $krs->links() }}
    </div>
</div>
@endsection