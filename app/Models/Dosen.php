<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $primaryKey = 'nidn';
    protected $keyType = 'string';  
    public $incrementing = false;   

    protected $fillable = ['nidn', 'nama'];

    // Satu dosen ke jadi wali banyak mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'nidn', 'nidn');
    }

    // Satu dosen bisa ke banyak jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'nidn', 'nidn');
    }
}