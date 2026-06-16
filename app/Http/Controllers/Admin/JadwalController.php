<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['dosen', 'matakuliah'])->paginate(10);
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $dosens       = Dosen::all();
        $matakuliahs  = Matakuliah::all();
        return view('admin.jadwal.create', compact('dosens', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliahs,kode_matakuliah',
            'nidn'            => 'required|exists:dosens,nidn',
            'kelas'           => 'required|string|max:1',
            'hari'            => 'required|string',
            'jam'             => 'required',
        ], [
            'kode_matakuliah.required' => 'Mata kuliah wajib dipilih.',
            'nidn.required'            => 'Dosen wajib dipilih.',
            'kelas.required'           => 'Kelas wajib diisi.',
            'hari.required'            => 'Hari wajib dipilih.',
            'jam.required'             => 'Jam wajib diisi.',
        ]);

        Jadwal::create($request->only('kode_matakuliah', 'nidn', 'kelas', 'hari', 'jam'));

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $jadwal      = Jadwal::findOrFail($id);
        $dosens      = Dosen::all();
        $matakuliahs = Matakuliah::all();
        return view('admin.jadwal.edit', compact('jadwal', 'dosens', 'matakuliahs'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliahs,kode_matakuliah',
            'nidn'            => 'required|exists:dosens,nidn',
            'kelas'           => 'required|string|max:1',
            'hari'            => 'required|string',
            'jam'             => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->only('kode_matakuliah', 'nidn', 'kelas', 'hari', 'jam'));

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil dihapus.');
    }
}