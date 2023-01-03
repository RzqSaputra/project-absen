<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // use HasFactory;
   public $table = 'status';

   protected $dates = [
       'created_at',
       'updated_at',
       'deleted_at',
   ];  

   protected $fillable =[
       'keterangan',
       'created_at',
       'updated_at',
       'deleted_at',
   ];

   public function presensi()
   {
    return $this->hasMany('App\Models\Presensi', 'status_id');
   }
}
