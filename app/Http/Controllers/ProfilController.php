<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    Public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view ('profil.profil', compact('user'));
    }


    Public function profil()
    {
        $title = 'My Profile';
        $user = User::where('id', Auth::User()->id)->first();
        return view('profil.profil', compact('title', 'user'));
    }

}
