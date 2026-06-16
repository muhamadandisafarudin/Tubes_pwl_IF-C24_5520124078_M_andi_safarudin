<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    // Redirect ke dashboard sesuai role
    public function index()
    {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('mahasiswa.dashboard');
    }

    // Dashboard Admin
    public function adminDashboard()
    {
        $data = [
            'total_dosen'      => Dosen::count(),
            'total_mahasiswa'  => Mahasiswa::count(),
            'total_matakuliah' => Matakuliah::count(),
            'total_jadwal'     => Jadwal::count(),
            'total_krs'        => Krs::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}