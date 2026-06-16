<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosens = [
            ['nidn' => '0101010001', 'nama' => 'pak tarmin'],
            ['nidn' => '0101010002', 'nama' => 'bu nazilah'],
            ['nidn' => '0101010003', 'nama' => 'pak lalan'],
        ];

        foreach ($dosens as $dosen) {
            Dosen::create($dosen);
        }
    }
}
