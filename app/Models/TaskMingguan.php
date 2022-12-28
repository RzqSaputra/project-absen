<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMingguan extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $primaryKey ='id';
    protected $fillable = ['namaTask','mulaiTask','selesaiTask','keterangan'];
}
