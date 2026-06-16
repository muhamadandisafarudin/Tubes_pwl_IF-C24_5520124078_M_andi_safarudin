<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::paginate(10);
        return view('admin.dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|string|max:10|unique:dosens,nidn',
            'nama' => 'required|string|max:50',
        ], [
            'nidn.required' => 'NIDN wajib diisi.',
            'nidn.unique'   => 'NIDN sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
        ]);

        Dosen::create($request->only('nidn', 'nama'));

        return redirect()->route('admin.dosen.index')
                         ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $nidn)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
        ], [
            'nama.required' => 'Nama wajib diisi.',
        ]);

        $dosen = Dosen::findOrFail($nidn);
        $dosen->update($request->only('nama'));

        return redirect()->route('admin.dosen.index')
                         ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();

        return redirect()->route('admin.dosen.index')
                         ->with('success', 'Data dosen berhasil dihapus.');
    }
}