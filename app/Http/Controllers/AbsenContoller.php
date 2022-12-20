<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenContoller extends Controller
{
    public function index(){
        return view('absen');
    }
}
