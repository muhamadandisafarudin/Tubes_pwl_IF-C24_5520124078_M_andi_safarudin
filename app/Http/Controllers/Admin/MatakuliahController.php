<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::paginate(10);
        return view('admin.matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:8|unique:matakuliahs,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:6',
        ], [
            'kode_matakuliah.required' => 'Kode mata kuliah wajib diisi.',
            'kode_matakuliah.unique'   => 'Kode mata kuliah sudah terdaftar.',
            'nama_matakuliah.required' => 'Nama mata kuliah wajib diisi.',
            'sks.required'             => 'SKS wajib diisi.',
        ]);

        Matakuliah::create($request->only('kode_matakuliah', 'nama_matakuliah', 'sks'));

        return redirect()->route('admin.matakuliah.index')
                         ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit(string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, string $kode)
    {
        $request->validate([
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:6',
        ]);

        $matakuliah = Matakuliah::findOrFail($kode);
        $matakuliah->update($request->only('nama_matakuliah', 'sks'));

        return redirect()->route('admin.matakuliah.index')
                         ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);
        $matakuliah->delete();

        return redirect()->route('admin.matakuliah.index')
                         ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}