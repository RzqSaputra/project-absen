<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    
    public function login(Request $request)
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $name = auth()->user()->name;
            request()->session()->regenerate();
<<<<<<< HEAD
            return redirect()->intended('home')->with('success', 'Selamat datang kembali');
=======
            return redirect()->intended('home')->with('success', "Selamat Datang $name");
>>>>>>> 274fe3f8838e7d34e59b07664dec7f57912010c4
        }

        return back()->with('error', 'Email atau Password Salah')->onlyInput('email');
    }

    
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
