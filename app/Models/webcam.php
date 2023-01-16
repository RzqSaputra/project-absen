<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webcam extends Model
{
    // use HasFactory;
    public $table = 'webcams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];  

    protected $fillable =[
        'image',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
