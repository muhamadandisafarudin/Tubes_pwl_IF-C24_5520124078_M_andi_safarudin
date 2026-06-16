<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliahs = [
            ['kode_matakuliah' => 'IF001', 'nama_matakuliah' => 'Pemrograman Web I', 'sks' => 3],
            ['kode_matakuliah' => 'IF002', 'nama_matakuliah' => 'Pemrograman Web II', 'sks' => 3],
            ['kode_matakuliah' => 'IF003', 'nama_matakuliah' => 'Basis Data', 'sks' => 3],
            ['kode_matakuliah' => 'IF004', 'nama_matakuliah' => 'Algoritma & Struktur Data', 'sks' => 4],
            ['kode_matakuliah' => 'IF005', 'nama_matakuliah' => 'Jaringan Komputer', 'sks' => 3],
        ];

        foreach ($matakuliahs as $mk) {
            Matakuliah::create($mk);
        }
    }
}
