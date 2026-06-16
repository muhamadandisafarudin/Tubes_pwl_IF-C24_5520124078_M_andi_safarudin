<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            ['npm' => '2024001001', 'nidn' => '0101010001', 'nama' => 'Andi '],
            ['npm' => '2024001002', 'nidn' => '0101010001', 'nama' => 'opik'],
            ['npm' => '2024001003', 'nidn' => '0101010002', 'nama' => 'dinar'],
            ['npm' => '2024001004', 'nidn' => '0101010002', 'nama' => 'salim'],
            ['npm' => '2024001005', 'nidn' => '0101010003', 'nama' => 'syahman'],
        ];

        foreach ($mahasiswas as $mhs) {
            Mahasiswa::create($mhs);
        }
    }
}
