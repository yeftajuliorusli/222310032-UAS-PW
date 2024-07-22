<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['matkul_id','ruangan'];

    public function getMatkul(){
        return $this->belongsTo('App\Models\Matkul', 'matkul_id');
    }
}
