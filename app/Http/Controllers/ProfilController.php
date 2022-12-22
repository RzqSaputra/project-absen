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

    public function PUpdate(Request $request,$id)
    {
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('users'),$image_name);
        $path = "/users/".$image_name;

        $user = User::where('id',$id)->first();
        $user-> name = $request->name;
        $user->save();
        return redirect('profil.profil');
    }
	
}
