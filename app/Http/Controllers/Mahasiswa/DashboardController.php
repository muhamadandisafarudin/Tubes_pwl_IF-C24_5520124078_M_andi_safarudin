<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        $npm = auth()->user()->npm;

        $krs = Krs::with('matakuliah')
                    ->where('npm', $npm)
                    ->get();

        $totalSks = $krs->sum(fn($k) => $k->matakuliah->sks ?? 0);

        return view('mahasiswa.dashboard', compact('krs', 'totalSks'));
    }
}