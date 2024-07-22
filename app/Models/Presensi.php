<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model{
    use HasFactory;

    protected $table = 'presensi';
    protected $fillable = ['jadwal_id','mahasiswa_id','matkul_id', 'absent', 'keterangan'];

    public function getJadwal(){
        return $this->belongsTo('App\Models\Jadwal', 'jadwal_id');
    }
    public function getStudent()
{
    return $this->belongsTo('App\Models\Student', 'mahasiswa_id');
}

    // public function getStudent(){
    //     return $this->belongsTo('App\Models\Student', 'mahasiswa_id');
    // }
    public function getMatkul(){
        return $this->belongsTo('App\Models\Matkul', 'matkul_id');
    }
}
