<?php
namespace App\Http\Controllers;
use App\Models\pengguna;
use Illuminate\Http\Request;

class penggunaController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $pengguna = Pengguna::where('nama', 'LIKE', '%'.$cari.'%')
            ->orWhere('nip', 'LIKE', '%'.$cari.'%')
            ->orWhere('nama', 'LIKE', '%'.$cari.'%')
            ->paginate(5);
        $pengguna->withPath('pengguna');
        $pengguna->appends($request->all());
        return view('pengguna.home', compact(
            'pengguna', 'cari'
        ));
    }


    public function tambahPengguna(){
        return view('pengguna.form-daftar');
    }


    public function simpanPengguna(Request $request){
        $validateData = $request->validate([
            'nip' => 'required|size:10|unique:pengguna',
            'nama' => 'required|min:1|max:50',
            'email' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
            'jabatan' => 'required',
        ]);
        
        Pengguna::create($validateData);
        session()->flash('pesan',"Penambahan Data {$validateData['nama']} berhasil");
        return redirect(route('pengguna.index'));
    }


    public function ubahPengguna($id)
    {
        $pengguna = Pengguna::select('*')
                    ->where('id', $id)
                    ->get();

        return view('pengguna.edit', ['pengguna' => $pengguna]);
        }


    public function updatePengguna(Request $request)
    {
        $pengguna = Pengguna::where('id', $request->id)
                    ->update([
                            'nama' => $request->nama,
                            'email' => $request->email,
                            'jabatan' => $request->jabatan,
                    ]);

        return redirect()->route('pengguna.index');
    }


    public function deletePengguna($id){
        $data =Pengguna::where('id',$id)->first();
        $data->delete();
        return redirect()->route('pengguna.index');
    }
}
