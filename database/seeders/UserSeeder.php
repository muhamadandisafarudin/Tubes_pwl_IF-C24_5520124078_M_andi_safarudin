<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;     
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@siakad.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
            'npm'      => null,
        ]);

        // Akun Mahasiswa (npm harus sama dengan data di tabel mahasiswas)
        $mahasiswas = [
            ['name' => 'Andi',  'email' => 'andi@siakad.com',  'npm' => '2024001001'],
            ['name' => 'opik',  'email' => 'opik@siakad.com',  'npm' => '2024001002'],
            ['name' => 'dinar',    'email' => 'dinar@siakad.com', 'npm' => '2024001003'],
            ['name' => 'salim',  'email' => 'salim@siakad.com',  'npm' => '2024001004'],
            ['name' => 'syahman',   'email' => 'syahman@siakad.com',   'npm' => '2024001005'],
        ];

        foreach ($mahasiswas as $mhs) {
            User::create([
                'name'     => $mhs['name'],
                'email'    => $mhs['email'],
                'password' => Hash::make('password123'),
                'role'     => 'mahasiswa',
                'npm'      => $mhs['npm'],
            ]);
        }
    }
}
