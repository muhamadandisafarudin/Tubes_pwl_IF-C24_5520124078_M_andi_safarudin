<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'npm';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['npm', 'nidn', 'nama'];

    // Mahasiswa punya dosen wali
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    // Mahasiswa ke banyak KRS
    public function krs()
    {
        return $this->hasMany(Krs::class, 'npm', 'npm');
    }

    public function matakuliahs()
    {
        return $this->belongsToMany(
            Matakuliah::class,
            'krs',
            'npm',
            'kode_matakuliah'
        );
    }
}