<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskMingguan;


class TaskMingguanController extends Controller
{
    //task mingguan
    public function taskMingguan(Request $request){
        $cari = $request->cari;
        // $datas = Pegawai::all();
        $TaskMingguan = TaskMingguan::where('namaTask', 'LIKE', '%'.$cari.'%')
            ->orWhere('namaTask', 'LIKE', '%'.$cari.'%')
            ->paginate(15);
        $TaskMingguan->withPath('task');
        $TaskMingguan->appends($request->all());
        return view('taskM', compact(
            'TaskMingguan', 'cari'
        ));
    }


    public function simpanTaskMingguan(Request $request){
        $validateData = $request->validate([
            'namaTask' => 'required',
            'mulaiTask' => 'required',
            'selesaiTask' => 'required',
            'keterangan' => 'required',
        ]);
        
        TaskMingguan::create($validateData);
        session()->flash('pesan',"Penambahan Data {$validateData['namaTask']} berhasil");
        return redirect(route('taskMingguan.taskMingguan'));
    }

    public function updateTaskMingguan(Request $request) {
        $taskMingguan = TaskMingguan::where('id', $request->id)
            ->update([
                'namaTask' => $request->namaTask,
                'mulaiTask' => $request->mulaiTask,
                'selesaiTask' => $request->selesaiTask,
                'keterangan' => $request->keterangan,
            ]);
        return redirect()->route('taskMingguan.taskMingguan');
        }
}
