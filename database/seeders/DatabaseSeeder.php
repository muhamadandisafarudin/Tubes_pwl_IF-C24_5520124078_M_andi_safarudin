<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DosenSeeder::class,       // 1. dulu karena FK dari mahasiswa & jadwal
            MatakuliahSeeder::class,  // 2. dulu karena FK dari jadwal & krs
            MahasiswaSeeder::class,   // 3. setelah dosen
            JadwalSeeder::class,      // 4. setelah dosen & matakuliah
            UserSeeder::class,        // 5. setelah mahasiswa
        ]);
    }
}