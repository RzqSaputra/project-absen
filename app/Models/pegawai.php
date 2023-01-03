<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    // use HasFactory;
    public $table = 'pegawai';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];  
 
    protected $fillable =[
        'nip',
        'jabatan_id',
        'cabang_id',
        'nama',
        'tglLahir',
        'jKel',
        'alamat',
        'noHp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cabang()
    {
     return $this->belongsTo('App\Models\Cabang', 'cabang_id', 'id');
    }

    public function jabatan()
    {
     return $this->belongsTo('App\Models\Jabatan', 'jabatan_id', 'id');
    }

    public function task()
    {
     return $this->hasMany('App\Models\Task', 'id_pegawai');
    }

    public function presensi()
    {
     return $this->hasMany('App\Models\Presensi', 'pegawai_id');
    }
}