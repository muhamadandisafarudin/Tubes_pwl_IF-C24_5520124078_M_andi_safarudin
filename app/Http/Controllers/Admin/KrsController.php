<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Mahasiswa;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->paginate(10);
        return view('admin.krs.index', compact('krs'));
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('admin.krs.index')
                         ->with('success', 'KRS berhasil dihapus.');
    }
}