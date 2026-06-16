<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $jadwals = [
            ['kode_matakuliah' => 'IF001', 'nidn' => '0101010001', 'kelas' => 'A', 'hari' => 'Senin',  'jam' => '08:00:00'],
            ['kode_matakuliah' => 'IF002', 'nidn' => '0101010002', 'kelas' => 'A', 'hari' => 'Selasa', 'jam' => '10:00:00'],
            ['kode_matakuliah' => 'IF003', 'nidn' => '0101010003', 'kelas' => 'B', 'hari' => 'Rabu',   'jam' => '13:00:00'],
            ['kode_matakuliah' => 'IF004', 'nidn' => '0101010001', 'kelas' => 'A', 'hari' => 'Kamis',  'jam' => '08:00:00'],
            ['kode_matakuliah' => 'IF005', 'nidn' => '0101010002', 'kelas' => 'B', 'hari' => 'Jumat',  'jam' => '10:00:00'],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
