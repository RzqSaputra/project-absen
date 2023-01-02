<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class penggunaController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $user = User::where('name', 'LIKE', '%'.$cari.'%')
            ->paginate(5);
        $user->withPath('user');
        $user->appends($request->all());
        return view('pengguna.home', compact(
            'user', 'cari'
        ));
    }


    public function tambahPengguna(){
        return view('pengguna.form-daftar');
    }


    public function simpanPengguna(Request $request){
        $validateData = $request->validate([
           
            'name' => 'required|min:1|max:50',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'role' => 'required',
        ]);
        
        User::create($validateData);
        session()->flash('pesan',"Penambahan Data {$validateData['name']} berhasil");
        return redirect(route('pengguna.index'));
    }


    public function ubahPengguna($id)
    {
        $user = User::select('*')
                    ->where('id', $id)
                    ->get();

        return view('pengguna.edit', ['user' => $user]);
        }


    public function updatePengguna(Request $request)
    {
        $user = User::where('id', $request->id)
                    ->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'alamat'=>$request->alamat,
                            'nohp'=>$request->nohp,
                            'role' => $request->role,
                    ]);

        return redirect()->route('pengguna.index');
    }


    public function deletePengguna($id){
        $data =User::where('id',$id)->first();
        $data->delete();

        return redirect()->route('pengguna.index')->with('msg',"Data {$data['name']} berhasil dihapus" );
    }
}
