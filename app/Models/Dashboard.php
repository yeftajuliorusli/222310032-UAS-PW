<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['matkul_id','kelas_id','dosen_id','jam','hari'];

    public function getMatkul(){
        return $this->belongsTo('App\Models\Matkul', 'matkul_id');
    }
    public function getKelas(){
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }
    public function getDosen(){
        return $this->belongsTo('App\Models\Dosen', 'dosen_id');
    }
}
