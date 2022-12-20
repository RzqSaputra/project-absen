<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index(Request $request){
        $pegawai = Pegawai::select('*')
        ->paginate(5);
        
        return view('pegawai.home', ['pegawai' => $pegawai]);
    }

    
    public function tambahPegawai(){
        return view('pegawai.form-daftar');
    }


    public function simpanPegawai(Request $request){
        $validateData = $request->validate([
            'nip' => 'required|size:10|unique:pegawai',
            'nama' => 'required|min:1|max:50',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
            'jabatan' => 'required',
            'cabang' => 'required',
        ]);
        
        Pegawai::create($validateData);
        session()->flash('pesan',"Penambahan Data {$validateData['nama']} berhasil");
        return redirect(route('pegawai.index'));
    }


    public function editPegawai(Pegawai $pegawai)
    {
        return view('pegawai.edit',['pegawai' => $pegawai]);
    }


    public function ubahPegawai($id) {
    $pegawai = Pegawai::select('*')
        ->where('id', $id)
        ->get();

    return view('pegawai.edit', ['pegawai' => $pegawai]);
    }


    public function updatePegawai(Request $request) {
    $pegawai = Pegawai::where('id', $request->id)
        ->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'cabang' => $request->cabang,
        ]);

    return redirect()->route('pegawai.index');
    }

    
    public function destroy($id){
        $pegawai = Pegawai::where('id', $id);
        $pegawai->delete();
        return redirect()->route('pegawai.index');
    }
}
