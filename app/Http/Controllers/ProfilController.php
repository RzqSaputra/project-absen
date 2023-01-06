<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

use App\Models\pegawai;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    Public function index()
    {
        $pegawai = pegawai::where('id', Auth::pegawai()->id)->first();

        return view ('profil.profil', compact('pegawai'));
    }


    Public function profil()
    {
        $title = 'My Profile';
        $pegawai = pegawai::where('id', Auth::pegawai()->id)->first();
        return view('profil.profil', compact('title', 'pegawai'));
    }

    public function PUpdate(Request $request,$id)
    {
        pegawai::where('id', $request->id)
        ->update([
            'nama'=>$request->nama,
            'nip'=>$request->nip,
            'tglLahir'=> $request->tglLahir,
            'jKel'=> $request->jKel,
            'alamat'=>$request->alamat,
            'noHp'=>$request->noHp,
            
        ]);

        session()->flash('pesan',"Update Profil {$request->nama} berhasil");
        return redirect(route('profil.index'));
    }

    function crop(Request $request)
    {
        $path = 'users/images/';
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }
        $file = $request->file('file');
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        if ($upload) {

            $userInfo = pegawai::where('id', '=', Auth::pegawai()->id)->first();
            $userphoto = $userInfo->image;
            if ($userphoto != '') {
                unlink($path . $userphoto);
            }
            pegawai::where('id', '=', Auth::pegawai()->id)->update(['image' => $new_image_name]);
            return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'nama' => $new_image_name]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }
    }
}
