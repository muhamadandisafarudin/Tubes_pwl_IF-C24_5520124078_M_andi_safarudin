@extends('layouts.app')
@section('title', 'Edit Jadwal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Jadwal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mata Kuliah</label>
                        <select name="kode_matakuliah" class="form-select @error('kode_matakuliah') is-invalid @enderror">
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach($matakuliahs as $mk)
                                <option value="{{ $mk->kode_matakuliah }}"
                                    {{ old('kode_matakuliah', $jadwal->kode_matakuliah) == $mk->kode_matakuliah ? 'selected' : '' }}>
                                    {{ $mk->nama_matakuliah }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Dosen Pengajar</label>
                        <select name="nidn" class="form-select @error('nidn') is-invalid @enderror">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->nidn }}"
                                    {{ old('nidn', $jadwal->nidn) == $dosen->nidn ? 'selected' : '' }}>
                                    {{ $dosen->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('nidn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kelas</label>
                        <select name="kelas" class="form-select @error('kelas') is-invalid @enderror">
                            @foreach(['A','B','C','D'] as $kelas)
                                <option value="{{ $kelas }}"
                                    {{ old('kelas', $jadwal->kelas) == $kelas ? 'selected' : '' }}>
                                    Kelas {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Hari</label>
                        <select name="hari" class="form-select @error('hari') is-invalid @enderror">
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $hari)
                                <option value="{{ $hari }}"
                                    {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                        @error('hari') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jam</label>
                        <input type="time" name="jam"
                               class="form-control @error('jam') is-invalid @enderror"
                               value="{{ old('jam', \Carbon\Carbon::parse($jadwal->jam)->format('H:i')) }}">
                        @error('jam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection