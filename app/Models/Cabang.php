<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cabang extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'cabang';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];  

    protected $fillable =[
        'nama_cabang',
        'alamat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}   
