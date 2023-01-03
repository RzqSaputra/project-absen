<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
<<<<<<< HEAD
    // use HasFactory;
    use SoftDeletes;
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
}
=======
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
>>>>>>> 9403d601fce832cd25edddb39f8368af4a4e084a
