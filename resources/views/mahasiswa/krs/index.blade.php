@extends('layouts.app')
@section('title', 'KRS Saya')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h4><i class="bi bi-journal-text"></i> Kartu Rencana Studi (KRS)</h4>
        <p class="text-muted">Total SKS: <strong>{{ $totalSks }} SKS</strong></p>
    </div>
</div>

<div class="row">
    {{-- Form Tambah KRS --}}
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h6 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Mata Kuliah</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Mata Kuliah</label>
                        <select name="kode_matakuliah"
                                class="form-select @error('kode_matakuliah') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            @foreach($matakuliahs as $mk)
                                <option value="{{ $mk->kode_matakuliah }}">
                                    {{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)
                                </option>
                            @endforeach
                        </select>
                        @error('kode_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle"></i> Ambil Mata Kuliah
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Daftar KRS --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-list-ul"></i> Mata Kuliah yang Diambil</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
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
                        @forelse($krs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $item->matakuliah->kode_matakuliah }}</span></td>
                            <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                            <td>{{ $item->matakuliah->sks }} SKS</td>
                            <td>
                                <form action="{{ route('mahasiswa.krs.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Drop mata kuliah ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Drop
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada mata kuliah yang diambil.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if($krs->count() > 0)
                    <tfoot>
                        <tr class="table-primary fw-bold">
                            <td colspan="3" class="text-end">Total SKS:</td>
                            <td>{{ $totalSks }} SKS</td>
                            <td></td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection