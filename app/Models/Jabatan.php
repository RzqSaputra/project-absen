<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
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
