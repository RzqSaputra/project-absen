<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    // use HasFactory;
    public $table = 'presensi';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];  
 
    protected $fillable =[
        'id_pegawai',
        'status_id',
        'tglPresensi',
        'jamMasuk',
        'jamPulang',
        'keterangan',
        'foto',
        'lokasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function status()
    {
     return $this->belongsTo('App\Models\status', 'status_id', 'id');
    }
}