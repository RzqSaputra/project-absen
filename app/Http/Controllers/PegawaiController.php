<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Task;
use App\Models\Jabatan;
use App\Models\Cabang;

class PegawaiController extends Controller
{
    public function index(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $pegawai = Pegawai::where('nama', 'LIKE', '%'.$cari.'%')
        ->orWhere('nip', 'LIKE', '%'.$cari.'%')
        ->orWhere('nama', 'LIKE', '%'.$cari.'%')
        ->paginate(15);
        $pegawai->withPath('pegawai');
        $pegawai->appends($request->all());
        $jabatan = Jabatan::all();
        $cabang = Cabang::all();
        return view('pegawai.home', compact('pegawai', 'cari', 'jabatan', 'cabang')
        );
    }


    public function simpanPegawai(Request $request){
        $validateData = $request->validate([
            'nip' => 'required|size:10|unique:pegawai',
            'nama' => 'required|min:1|max:50',
            'tglLahir' => 'required',
            'jKel' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
            'jabatan_id' => 'required',
            'cabang_id' => 'required',
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
            'jabatan_id' => $request->jabatan_id,
            'cabang_id' => $request->cabang_id,
        ]);

    return redirect()->route('pegawai.index');
    }

    
    public function destroy($id){
        $pegawai = Pegawai::where('id', $id);
        $pegawai->delete();
        return redirect()->route('pengawai.index')->with('msg',"Data {$pegawai['name']} berhasil dihapus" );
    }

    public function absen(){
        return view('absen');
    }

    //task harian
    public function task(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $task = Task::where('namaTask', 'LIKE', '%'.$cari.'%')
            ->orWhere('namaTask', 'LIKE', '%'.$cari.'%')
            ->paginate(15);
        $task->withPath('task');
        $task->appends($request->all());
        return view('task', compact(
            'task', 'cari'
        ));
    }

    public function simpanTask(Request $request){
        $validateData = $request->validate([
            'namaTask' => 'required',
            'mulaiTask' => 'required',
            'selesaiTask' => 'required',
            'keterangan' => 'required',
            'id_pegawai' => ''
        ]);
        
        Task::create($validateData);
        session()->flash('pesan',"Penambahan Data {$validateData['namaTask']} berhasil");
        return redirect(route('task.task'));
    }

    public function updateTask(Request $request) {
        $task = Task::where('id', $request->id)
            ->update([
                'namaTask' => $request->namaTask,
                'mulaiTask' => $request->mulaiTask,
                'selesaiTask' => $request->selesaiTask,
                'keterangan' => $request->keterangan,
            ]);
        return redirect()->route('task.task');
        }

}
