<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('admin.mahasiswa.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm'  => 'required|string|max:10|unique:mahasiswas,npm',
            'nidn' => 'required|exists:dosens,nidn',
            'nama' => 'required|string|max:50',
        ], [
            'npm.required'  => 'NPM wajib diisi.',
            'npm.unique'    => 'NPM sudah terdaftar.',
            'nidn.required' => 'Dosen wali wajib dipilih.',
            'nidn.exists'   => 'Dosen tidak ditemukan.',
            'nama.required' => 'Nama wajib diisi.',
        ]);

        Mahasiswa::create($request->only('npm', 'nidn', 'nama'));

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $dosens    = Dosen::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, string $npm)
    {
        $request->validate([
            'nidn' => 'required|exists:dosens,nidn',
            'nama' => 'required|string|max:50',
        ], [
            'nidn.required' => 'Dosen wali wajib dipilih.',
            'nama.required' => 'Nama wajib diisi.',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->update($request->only('nidn', 'nama'));

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}