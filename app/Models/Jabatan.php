<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
   // use HasFactory;
   public $table = 'jabatan';

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at',
   ];  

   protected $fillable =[
       'nama_jabatan',
       'created_at',
       'updated_at',
       'deleted_at',
   ];

   public function pegawai()
   {
    return $this->hasMany('App\Models\Pegawai', 'jabatan_id', 'id');
   }
}