<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model {

    use HasFactory;

    protected $table = 'matkul';
    protected $fillable = ['dosen_id','nama_matkul'];

    public function getDosen(){
        return $this->belongsTo('App\Models\Dosen', 'dosen_id');
    }
}
