<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $count = DB::table('pegawai')->count();
        return view('home', compact('count'));
    }
    public function dash(){
        return view('dashboard');
    }
}
