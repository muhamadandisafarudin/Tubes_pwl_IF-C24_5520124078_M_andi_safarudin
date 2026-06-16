<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $primaryKey = 'kode_matakuliah';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['kode_matakuliah', 'nama_matakuliah', 'sks'];

    // Satu matakuliah bisa ada di banyak jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kode_matakuliah', 'kode_matakuliah');
    }

    // Satu matakuliah bisa diambil banyak mahasiswa lewat KRS
    public function krs()
    {
        return $this->hasMany(Krs::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}