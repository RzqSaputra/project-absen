<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function presensi(){
        return view('presensi.index');
    }

    public function simpanPresensi(){

    }
}