<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model dalam bentuk jamak
    protected $table = 'pertemuan';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nama_pertemuan', 'tanggal', 'keterangan'];

    // Tentukan format tanggal yang akan digunakan
    protected $dates = ['tanggal'];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
