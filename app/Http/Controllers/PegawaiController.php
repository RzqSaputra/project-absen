<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pegawai;
// use App\Models\Task;
use App\Models\Jabatan;
use App\Models\Cabang;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $pegawai = Pegawai::where('nip', 'LIKE', '%'.$cari.'%')
        ->orWhere('nip', 'LIKE', '%'.$cari.'%')
        ->orWhere('nip', 'LIKE', '%'.$cari.'%')
        ->paginate(15);
        $pegawai->withPath('pegawai');
        $pegawai->appends($request->all());
        $jabatan = Jabatan::all();
        $user = User::all();
        $cabang = Cabang::all();
        return view('pegawai.home', compact('pegawai', 'cari','jabatan','cabang','user')
        );
    }


    public function simpanPegawai(Request $request){

        $validateData = $request->validate([
            'nip' => 'required|size:10|unique:pegawai',
            'user_id' => 'required',
            'tglLahir' => 'required',
            'jKel' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
            'jabatan_id' => 'required',
            'cabang_id' => 'required',
        ]);

        Pegawai::create([
            'nip' => $request->nip,
            'user_id' => $request->user_id,
            'tglLahir' => $request->tglLahir,
            'jKel' => $request->jKel,
            'alamat' => $request->alamat,
            'noHp' => $request->noHp,
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
            $validateData
        ]);
        session()->flash('pesan',"Penambahan Data berhasil");
        return redirect()->route('pegawai.index');
    }


    public function updatePegawai(Request $request) {
    $pegawai = Pegawai::with('user', 'jabatan', 'cabang')->where('id', $request->id)
        ->update([
            'nip' => $request->nip,
            'user_id' => $request->user_id,
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
        ]);

    return redirect()->route('pegawai.index');
    }
    
    public function deletePegawai($id){
        $pegawai = Pegawai::where('id',$id)->first();
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('msg',"Data {$pegawai['nama']} berhasil dihapus" );
    }
}