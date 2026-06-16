<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $npm = auth()->user()->npm;

        // KRS yang sudah diambil mahasiswa ini
        $krs = Krs::with('matakuliah')
                   ->where('npm', $npm)
                   ->get();

        // Kode matakuliah yang sudah diambil
        $sudahAmbil = $krs->pluck('kode_matakuliah')->toArray();

        // Matakuliah yang belum diambil
        $matakuliahs = Matakuliah::whereNotIn('kode_matakuliah', $sudahAmbil)->get();

        $totalSks = $krs->sum(fn($k) => $k->matakuliah->sks ?? 0);

        return view('mahasiswa.krs.index', compact('krs', 'matakuliahs', 'totalSks'));
    }

    public function store(Request $request)
    {
        $npm = auth()->user()->npm;

        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliahs,kode_matakuliah',
        ], [
            'kode_matakuliah.required' => 'Pilih mata kuliah terlebih dahulu.',
            'kode_matakuliah.exists'   => 'Mata kuliah tidak ditemukan.',
        ]);

        // Cek apakah sudah diambil
        $sudah = Krs::where('npm', $npm)
                    ->where('kode_matakuliah', $request->kode_matakuliah)
                    ->exists();

        if ($sudah) {
            return redirect()->route('mahasiswa.krs.index')
                             ->with('error', 'Mata kuliah sudah ada di KRS kamu.');
        }

        Krs::create([
            'npm'             => $npm,
            'kode_matakuliah' => $request->kode_matakuliah,
        ]);

        return redirect()->route('mahasiswa.krs.index')
                         ->with('success', 'Mata kuliah berhasil ditambahkan ke KRS.');
    }

    public function destroy(string $id)
    {
        $npm = auth()->user()->npm;
        $krs = Krs::where('id', $id)->where('npm', $npm)->firstOrFail();
        $krs->delete();

        return redirect()->route('mahasiswa.krs.index')
                         ->with('success', 'Mata kuliah berhasil di-drop dari KRS.');
    }

    public function jadwal()
    {
        $jadwals = Jadwal::with(['dosen', 'matakuliah'])->get();
        return view('mahasiswa.jadwal', compact('jadwals'));
    }
}