<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // use HasFactory;
    public $table = 'task';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];  
 
    protected $fillable =[
        'id_pegawai',
        'namaTask',
        'mulaiTask',
        'selesaiTask',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pegawai()
    {
     return $this->belongsTo('App\Models\pegawai', 'id_pegawai', 'id');
    }
}
